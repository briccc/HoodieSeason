<?php if (session()->getFlashdata('mensaje_registro')): ?>
                <div style="margin:10px " class="alert alert-success text-center">
                    <h2><?= session()->getFlashdata('mensaje_registro')?></h2>
                </div>
                <?php endif; ?>
                <?php echo form_close(); ?>

<div class="container align-center ">
    <h1 class="mt-4 mb-4 text-center">Registrarse</h1>
   

    <?php echo form_open('registrarUsuario') ?>

    <div class="row d-flex justify-content-center">
        <div class="col-md-10 mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <?php
            
            $data = [
                'name'        => 'nombre',
                'id'          => 'nombre',
                'class'       => 'form-control',
                'placeholder' => 'Ingrese nombre',
                'value' =>old('nombre') 
            ];
            echo form_input($data);
            ?>
            <p class="error_message"><?=session('errors.nombre')?></p>
        </div>

        <div class="col-md-10 mb-3">
            <label for="apellido" class="form-label">Apellido:</label>
            <?php
            $data = [
                'name'        => 'apellido',
                'id'          => 'apellido',
                'class'       => 'form-control',
                'placeholder' => 'Ingrese apellido',
                'value' =>old('apellido')
            ];
            echo form_input($data);
            ?>

            <p class="error_message"><?=session('errors.apellido')?></p>
        </div>

        <div class="col-md-10 mb-3">
            <label for="correo" class="form-label">Correo electrónico:</label>
            <?php
            $data = [
                'name'        => 'correo',
                'id'          => 'correo',
                'class'       => 'form-control',
                'placeholder' => 'Ingrese correo electrónico',
                'value' =>old('correo')
            ];
            echo form_input($data);
            ?>
            <p class="error_message"><?=session('errors.correo')?></p>
        </div>

        

        <div class="col-md-10 mb-3">
            <label for="pass" class="form-label">Contraseña:</label>
            <?php
            $data = [
                'name'        => 'pass',
                'id'          => 'pass',
                'class'       => 'form-control',
                'placeholder' => 'Ingrese contraseña',
                'value' =>old('pass')
            ];
            echo form_password($data);
            ?>
            <p class="error_message"><?=session('errors.pass')?></p>
        </div>

        <div class="col-md-10 mb-3">
            <label for="repass" class="form-label">Confirme contraseña:</label>
            <?php
            $data = [
                'name'        => 'repass',
                'id'          => 'repass',
                'class'       => 'form-control',
                'placeholder' => 'Ingrese contraseña',
                'value' =>old('repass')
            ];
            echo form_password($data);
            ?>
            <p class="error_message"><?=session('errors.repass')?></p>
        </div>

        <div class="d-flex justify-content-center">

        <button type="submit" class="btn btn-dark mb-5">Registrarse</button>

        </div>

        
        
    </div>

    <?php echo form_close(); ?>
    
</div>
