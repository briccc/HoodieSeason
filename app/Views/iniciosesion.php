<?php if (session()->getFlashdata('Mensaje')): ?>
        <div class="alert alert-danger text-center">
            <h2><?= session()->getFlashdata('Mensaje')?></h2>
        </div>
        <?php endif; ?>

<div class="container align-center">
        <h1 class="mt-4 mb-4 text-center">Iniciar Sesión</h1>
        <?php echo form_open ('iniciarSesion');?>


            <div class="row d-flex justify-content-center">

                    <div class="col-md-10 mb-3">

                    <label for="correo" class="form-label">Correo:</label>
                    <?php
                    
                    $data = [
                        'name'      => 'correo',
                        'id'    => 'correo',
                        'class' => 'form-control',
                        'placeholder'      => 'Ingrese correo electrónico',
                        ];
                    echo form_input($data);?>
                    <p class="is-danger"><?=session('errors.correo'); ?></p>

                    </div>

                    <div class="col-md-10  mb-3">
                        <label for="pass" class="form-label">Contraseña:</label>
                        
                        <?php
                        $data = [
                            'name'      => 'pass',
                            'id'    => 'pass',
                            'class' => 'form-control',
                            'placeholder'      => 'Ingrese contraseña',

                            ];
                        echo form_password($data);?>
                       <p class="is-danger"><?=session('errors.pass') ?></p>
                    </div>

                    <div class="text-center">
                    <p>¿Desea registrarse? <a href="<?php echo base_url('registrarUsuario'); ?>">Regístrese aquí</a></p>
                    </div>

                    <div class="d-flex justify-content-center">

                    <button type="submit" class="mi-boton mt-1">Ingresar</button>

                    </div>


            </div>
     

<?php echo form_close();?>

</div>
