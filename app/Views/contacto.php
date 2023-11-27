<?php if (session()->getFlashdata('Mensaje')) {
            echo "
            <div class='mt-3 mb-3 h4 text-center alert alert-success alert-dismissible'>
            <button type='button' class='btn-close' data-bs-dismiss='alert'></button>" . session()->getFlashdata('Mensaje') . "
            </div>";
        } ?>


<div class="container">
        <h1 class="mt-4 mb-4 text-center">Formulario de contacto</h1>
        
        <?php echo form_open ('registrarConsulta');?>

            <div class="row">
                <div class="mb-3">
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
            <p class="is-danger"><?=session('errors.nombre')?></p>
        </div>


        <div class=" mb-3">
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
            <p class="is-danger"><?=session('errors.correo')?></p>
        </div>

        <div class="mb-3">
            <label for="motivo" class="form-label">Asunto:</label>
            <?php
            $data = [
                'name'        => 'motivo',
                'id'          => 'motivo',
                'class'       => 'form-control',
                'placeholder' => 'Ingrese asunto',
                'value' =>old('motivo')
            ];
            echo form_input($data);
            ?>
            <p class="is-danger"><?=session('errors.motivo')?></p>
        </div>

        <div class="mb-3">
            <label for="consulta" class="form-label">Mensaje:</label>
            <?php
            $data = [
                'name'        => 'consulta',
                'id'          => 'consulta',
                'class'       => 'form-control r-5',
                'placeholder' => 'Ingrese consulta',
                'value' =>old('consulta')
            ];
            echo form_textarea($data);
            ?>
            <p class="is-danger"><?=session('errors.consulta')?></p>
        </div>
        

            <button type="submit" class="mi-boton mt-1 ">Enviar</button>
            <?php echo form_close(); ?>

            </div>
        <h1 class="mt-3">Ubicación</h1>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3539.6654966712345!2d-58.828426425429484!3d-27.47967141712955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456b631f18ca45%3A0xcc70d6478b75de14!2sGral.%20Paz%202080%2C%20W3402%20Corrientes!5e0!3m2!1ses!2sar!4v1682395151245!5m2!1ses!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-100 mt-3"></iframe>
 </div>
</div>
