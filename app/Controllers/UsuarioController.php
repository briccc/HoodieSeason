<?php

namespace App\Controllers;

use Config\Services;
use App\Models\UsuariosModel;
use App\Models\ConsultaModel;
use App\Entities\User;

class UsuarioController extends BaseController
{
    protected $helpers = ['form', 'form_validation'];

    public function registrar_consulta(){
        $request = \Config\Services::request();
        $validation = \Config\Services::validation();


        $validation->setRules([
            'nombre' => 'required',
            'motivo' => 'required',
            'correo' => 'required|valid_email',
            'consulta' => 'required|max_length[2500]',
        ], [
            'nombre' => [
                'required' => 'Campo de nombre obligatorio'
            ],
            'motivo' => [
                'required' => 'Campo de motivo obligatorio'
            ],

            'correo' => [
                'required' => 'Campo de correo electrónico obligatorio',
                'valid_email' => 'Debe ingresar una dirección de correo válida',
            ],
            'consulta' => [
                'required' => 'Campo de consulta obligatoria',
                'max_length' => 'Máximo de caracteres 2500',

            ]
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors',$validation->getErrors());
        }else{
            $data = [
                'nombre' => $request->getPost('nombre'), 
                'asunto' => $request->getPost('motivo'),
                'mail' => $request->getPost('correo'),
                'consulta' => $request->getPost('consulta'),

            ];


        $userConsulta = new ConsultaModel();
        $userConsulta-> insert($data);

        return redirect()->to('contacto')->with('Mensaje', 'Se registró su consulta!');

        }
    }
    

    public function listar_consultas(){
            $consulta = new ConsultaModel();
            $data['title']= "Listado de consultas";
            $data['mensajes']= $consulta->findAll();
    
            return view ('header', $data).view('back/navbarAdmin').view('back/listarConsultas').view('footer');
        
    }

    
    public function listar_usuarios(){
        $usuario_model = new UsuariosModel();
        $data['title']= "Listado de usuarios";
        $data['usuarios']= $usuario_model->findAll();

        return view ('header', $data).view('back/navbarAdmin').view('back/listarUsuarios').view('footer');
    
}

    public function registrar_usuario()
    {
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();

        if (!$this->request->is('post')) {
            $data['title'] = "Registrarse";
            return view('header', $data) . view('navbar') . view('registro') . view('footer');
        }

        

        $validation->setRules([
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required|valid_email|is_unique[usuarios.usuario_mail]',
            'pass' => 'required|min_length[8]',
            'repass' => 'required|min_length[8]|matches[pass]'
        ], [
            'nombre' => [
                'required' => 'Campo de nombre obligatorio'
            ],
            'apellido' => [
                'required' => 'Campo de apellido obligatorio'
            ],
            'correo' => [
                'required' => 'Campo de correo electrónico obligatorio',
                'valid_email' => 'Debe ingresar una dirección de correo válida',
                'is_unique' => 'Usuario ya se encuentra registrado'
            ],
            'pass' => [
                'required' => 'Contraseña obligatoria',
                'min_length' => 'Campo de contraseña debe tener al menos 8 caracteres'
            ],
            'repass' => [
                'required' => 'El campo repetir contraseña es obligatorio',
                'matches' => 'Contraseñas no coinciden',
                'min_length' => 'Campo de repetir contraseña debe tener al menos 8 caracteres'
                
            ]
        ]);
        
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors',$validation->getErrors());
        }else{
            $data = [
                'usuario_nombre' => $request->getPost('nombre'), 
                'usuario_apellido' => $request->getPost('apellido'),
                'usuario_mail' => $request->getPost('correo'),
                'usuario_pass' => password_hash($request->getPost('pass'), PASSWORD_BCRYPT),
                'perfil_id' => 2,
                'usuario_estado' => 1,
            ];

            $userRegister = new UsuariosModel();
            $userRegister->insert($data);

            
            return redirect()->route('registrarUsuario')->with('mensaje_registro', '¡Usuario registrado con éxito!');
        }

        
    }

    public function inicio_sesion(){
        $data ['title'] = 'Iniciar Sesión';

        return view('header', $data).view('navbar').view('inicioSesion').view('footer');
    }

    public function iniciar_sesion(){
        $request = \Config\Services::request();
        $validation = \Config\Services::validation();
        $session = session ();

        $validation->setRules([
            'correo' => 'required|valid_email',
            'pass' => 'required|min_length[8]',
        ], [
            'correo' => [
                'required' => 'Campo de correo electrónico obligatorio',
                'valid_email' => 'Debe ingresar una dirección de correo válida',

            ],
            'pass' => [
                'required' => 'Contraseña obligatoria',
                'min_length' => 'Campo de contraseña debe tener al menos 8 caracteres'
            ] 
        
            ]);
        

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors',$validation->getErrors());
        }else{


            $userRegister = new UsuariosModel();

            $mail = $request->getPost('correo');
            $pass = $request->getPost('pass');
            $user = $userRegister->where('usuario_mail', $mail)->first();

            if ($user){
                $pass_user = $user ['usuario_pass'];
                $pass_verif = password_verify($pass, $pass_user);

                if($pass_verif){
                    $data = ['id' => $user ['id_usuario'],
                    'nombre' => $user['usuario_nombre'],
                    'apellido' => $user['usuario_apellido'],
                    'perfil' => $user ['perfil_id'],
                    'login' =>TRUE
                ];
                

                $session-> set ($data);

                switch (session ('perfil')){
                    case '1':
                        return redirect () -> route ('inicioAdmin');
                        break;
                    case '2' :
                        return redirect()->route('/');
                        break;
                }
                
            }else{
                    $session ->setFlashdata('Mensaje', 'Correo y/o contraseña incorrecto');
                }
            }else{
                    $session ->setFlashdata('Mensaje', 'Correo y/o contraseña incorrecto');
                }
                return redirect()->route ('iniciarSesion');
                }
            }

            public function cerrar_sesion(){
                $session = session();
                $session->destroy();
                return redirect()->route('/');
            }
            
    }

