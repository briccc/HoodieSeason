<div class="container ">
    <h1 class="text-center mt-5">Registro de productos</h1>
    <div class="w-50 mx-auto mt-5 d-flex flex-column">
        <?php if (isset($validation)){ ?>
        <div class="alert-danger">
            <?= $validation -> listErrors();?>
        </div>
        <?php }?>

        <?php echo form_open_multipart('insertarProducto')?>

        <div class="form-group mt-3">
            <label for="titulo" class="font-weight-bold">Título</label>
            <?php echo form_input(['name'=> 'titulo', 'id' => 'titulo', 'class' => 'form-control', 'placeholder' => 'Ingrese título del producto', 'value' => set_value('titulo')]);?>
            <p class="error_message">
                <?=session('errors.titulo')?>
            </p>
        </div>

        <div class="form-group mt-3">
            <label for="color" class="font-weight-bold">Color</label>
            <?php 
            $lista[''] = 'Seleccione un color';

            foreach($color as $row){
                $id_color = $row['id_color'];
                $color_descrip = $row['descripcion'];
                $lista[$id_color] = $color_descrip;
            }
            echo form_dropdown('color', $lista, '', 'class="form-control"');

            ?>
            <p class="error_message">
                <?= session('errors.color') ?>
            </p>

        </div>


        <div class="form-group mt-3">
            <label for="descripcion" class="font-weight-bold">Descripción</label>
            <?php echo form_input(['name'=> 'descripcion', 'id' => 'descripcion', 'class' => 'form-control', 'placeholder' => 'Ingrese descripcion del producto', 'value' => set_value('descripcion')]);?>
            <p class="error_message">
                <?=session('errors.descripcion')?>
            </p>
        </div>

        <div class="form-group mt-3">
            <label for="stock" class="font-weight-bold">Stock</label>
            <?php echo form_input(['name'=> 'stock', 'id' => 'stock', 'class' => 'form-control', 'placeholder' => 'Ingrese stock del producto', 'value' => set_value('stock')]);?>
            <p class="error_message">
                <?=session('errors.stock')?>
            </p>
        </div>

        <div class="form-group mt-3">
            <label for="precio" class="font-weight-bold">Precio</label>
            <?php echo form_input(['name'=> 'precio', 'id' => 'precio', 'class' => 'form-control', 'placeholder' => 'Ingrese precio del producto', 'value' => set_value('precio')]);?>
            <p class="error_message">
                <?=session('errors.precio')?>
            </p>
        </div>


        <div class="form-group mt-3">
            <label for="categoria">Categoría</label>
            <?php 
            $list[''] = 'Seleccione categoria';

            foreach($categorias as $row){
                $id_categoria = $row['id_categoria'];
                $categoria_descrip = $row['categoria_descrip'];
                $list[$id_categoria] = $categoria_descrip;
        }
            echo form_dropdown('categoria', $list, '', 'class="form-control"');
            ?>
            <p class="error_message">
                <?= session('errors.categoria') ?>
            </p>

        </div>

        <div class="form-group mt-3">
            <label for="imagen">Imagen</label>
            <?php echo form_input(['name'=> 'imagen', 'id' => 'imagen', 'type' => 'file', 'value' => set_value('imagen')]);?>
            <p class="error_message">
                <?=session('errors.imagen')?>
            </p>
        </div>

        <div class="form-group mt-4 mb-5  text-center s">
            <?php echo form_submit('Agregar', 'Agregar', "class='btn btn-dark px-4'");?>
        </div>

        <?php echo form_close();?>

    </div>

</div>