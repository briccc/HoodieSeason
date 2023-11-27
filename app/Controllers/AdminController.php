<?php

namespace App\Controllers;
use Config\Services;
use App\Models\ProductosModel;
use App\Models\CategoriaModel;

class AdminController extends BaseController
{
    public function inicio_admin(){ 
        $data['title']= 'Inicio';
        return view('header', $data).view('back/navbarAdmin').view('back/inicioAdmin').view('footer');
    }



    public function agregar_producto(){
        $categoria = new CategoriaModel();
        $data ['categorias'] = $categoria->findAll();
        $data['title']= 'Agregar producto';

        return view('header', $data).view('back/navbarAdmin').view('back/agregarProducto').view('footer');
    }

    public function registrar_producto(){

        if (! $this->request->is('post')) {
            $data['title']= 'Agregar producto';

            return view('header', $data).view('back/navbarAdmin').view('back/agregarProducto').view('footer');
        }

        $validation = \Config\Services::validation();
        $request = \Config\Services::request();

        $validation->setRules([
            'titulo' => 'required',
            'color' => 'required',
            'descripcion' => 'required',
            'categoria' => 'is_not_unique[categorias.id_categoria]', 
            'stock' => 'required|integer|greater_than_equal_to[0]',
            'precio' => 'required|numeric',
            'imagen' => 'uploaded[imagen]|max_size[imagen,4095]|is_image[imagen]'
        ], [
            'titulo' => [
            'required' => 'El campo titulo es obligatorio',
        ],
        'color' => [
            'required' => 'El campo color es obligatorio',
        ],
        'descripcion' => [
            'required' => 'El campo descripcion es obligatorio',
        ],
            'categoria' => [
                'is_not_unique' => 'Producto ya registrado'
            ],
            'stock' => [
                'required' => 'El campo stock es obligatorio',
                'integer' => 'El campo stock debe ser un número entero',
                'greater_than_equal_to' => 'El campo stock debe ser mayor o igual a 0'
            ],
            'precio' => [
                'required' => 'El campo precio es obligatorio',
                'numeric' => 'El campo precio debe ser un número'
            ],
            'imagen' => [
                'uploaded' => 'Debe subir una imagen',
                'max_size' => 'El tamaño de la imagen debe ser menor a 4 MB',
                'is_image' => 'El archivo seleccionado no es una imagen válida'
            ]
        ]);

        if (!$validation->withRequest($request)->run()) {
            return redirect()->back()->withInput()->with('errors',$validation->getErrors());
        }else{
            $img = $this-> request->getFile('imagen');
            $nombre_aleatorio = $img->getRandomName();
            $img->move(ROOTPATH.'assets/img', $nombre_aleatorio);

            $data = [
            'producto_nombre' => $request->getPost('titulo'),
            'producto_color' => $request->getPost('color'),
            'producto_descrip' => $request->getPost('descripcion'),
            'producto_stock' => $request->getPost('stock'),
            'producto_precio' => $request->getPost('precio'),
            'producto_imagen' => $nombre_aleatorio,
            'producto_categoria' => $request->getPost('categoria'),
            'producto_estado' => 1 
            ];

            $producto = new ProductosModel();
            $producto->insert($data);

            return redirect()->route('gestionar')->with('mensaje_registro', 'Agregado correctamente');
            
        }
           
    }

    public function listar_productos() {

        $categoriaId = $this->request->getGet('categoria');
        if ($categoriaId == 0 || $categoriaId == null)
        {
             $producto_model = new ProductosModel();
        $data['producto'] = $producto_model
        ->where('producto_estado', 1)
        ->where('producto_stock >', 0)
        ->join('categorias', 'categorias.id_categoria = productos.producto_categoria')
        ->findAll();

        $categoria = new CategoriaModel();
        $data['categoria'] = $categoria->findAll();
        $data['title'] = 'Listar productos';
            
        return view('header', $data) . view('navbar') . view('catalogoProductos') . view('footer');
        }

        $producto_model = new ProductosModel();
        $data['producto'] = $producto_model
        ->where('producto_estado', 1)
        ->where('producto_stock >', 0)
        ->where('producto_categoria', $categoriaId)
        ->join('categorias', 'categorias.id_categoria = productos.producto_categoria')
        ->findAll();
       
        $categoria = new CategoriaModel();
        $data['categoria'] = $categoria->findAll();
        $data['title'] = 'Listar productos';
            
        return view('header', $data) . view('navbar') . view('catalogoProductos') . view('footer');
 
    }
    


    
    public function gestionar_productos(){
        $producto_model = new ProductosModel();
        $categoria = new CategoriaModel();
        $data['categorias']= $categoria->findAll();
        $data['producto']= $producto_model->join('categorias', 'categorias.id_categoria = productos.producto_categoria')->findAll();
        $data['title']='Listar productos';

        return view('header', $data).view('back/navbarAdmin').view('back/listarProductos').view('footer');
    }


    public function editar_producto_vista($id=null){  
        $producto_model= new ProductosModel();
        $categoria = new CategoriaModel();
        $data['categorias']= $categoria->findAll();
        $data['producto']= $producto_model->join('categorias', 'categorias.id_categoria = productos.producto_categoria')->findAll();
        
        $data['producto']= $producto_model->where('id_producto', $id)->first();
        $data['title']='Edición producto';

        return view('header', $data).view('back/navbarAdmin').view('back/editarProducto').view('footer');
    }

    public function editar_producto_validacion() {
        $CategoriasModel = new CategoriaModel();
        $ProductosModel = new ProductosModel();
        
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();


        $data['categorias']= $CategoriasModel->findAll();

        $id = $this->request->getPost('id_producto');

        $producto = $ProductosModel->where('id_producto', $id)->first();
        $imagen_producto = $producto['producto_imagen'];
        $nueva_imagen = $this->request->getFile('imagen');

        
        $validation->setRules([
            'imagen' => 'is_image[imagen]|mime_in[imagen,image/jpg,image/jpeg,image/png,image]'
        ],
        [
            "imagen"=>[
             "is_image"=>'Solo se aceptan archivos .jpg o .png',
             "mime_in "=>'Solo se aceptan archivos .jpg, .jpeg o .png',
 
            ]
        ] );

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors',$validation->getErrors());
        }else if($nueva_imagen->isValid()){
            $imagen_producto = $nueva_imagen->getRandomName();
            $nueva_imagen->move(ROOTPATH.'assets/img',$imagen_producto);
        }

        $validation->setRules([
            'titulo' => 'required',
            'descripcion' => 'required|alpha_space|max_length[100]',
            'stock' => 'required|is_natural',
            'precio' => 'required|numeric'
        ],
        [
            "titulo" => [
                "required" => 'El nombre es obligatorio'
            ],
            "descripcion" => [
                "required" => 'La descripcion es obligatoria',
                "alpha_space" => 'No se permiten numeros',
                "max_length" => 'Se admiten hasta 100 caracteres'
            ],

            "stock" => [
                "required" => 'El stock es obligatorio',
                "is_natural_no_zero" => 'Solo se aceptan numeros naturales '
            ],
            "precio" => [
                "required" => 'El precio es obligatorio',
                "numeric" => 'Solo se aceptan valores numericos'
            ],
            
        ]);

            if (!$validation->withRequest($this->request)->run()) {
                return redirect()->back()->withInput()->with('errors',$validation->getErrors());
            } else {
                $categoriaSeleccionada = $request->getPost('categoria');

              $data = [
                'producto_nombre' => $request->getPost('titulo'),
                'producto_descrip' => $request->getPost('descripcion'),
                'producto_categoria' => $categoriaSeleccionada,
                'producto_stock' => $request->getPost('stock'),
                'producto_precio' =>$request->getPost('precio'),
                'producto_imagen' => $imagen_producto
              ];
              $ProductosModel->update($id,$data);
              return redirect()->to('gestionar')->with('mensaje_editado','Editado exitosamente.');
            }
        }

    

    public function eliminar_producto($id=null){
        //se actualiza el estado del producto
        $data = array ('producto_estado'=>'0');
        $producto = new ProductosModel();
        $producto->update($id, $data);
        
        return redirect()-> route('gestionar');
    }

    public function activar_producto($id=null){
        //se actualiza el estado del producto
        $data = array('producto_estado'=> '1');
        $producto = new ProductosModel();
        $producto->update ($id, $data);

        return redirect()-> route('gestionar');
    }

}