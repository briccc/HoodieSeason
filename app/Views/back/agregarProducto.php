

<div class="container ">
<h1 class="text-center mt-4">Registro de productos</h1>
    <div class="w-50 mx-auto mt-5">
        <?php if (isset($validation)){ ?>
        <div class="alert-danger">
            <?= $validation -> listErrors();?>
        </div>
        <?php }?>

        <?php echo form_open_multipart('insertarProducto')?>

        <div class="form-group">
            <label for="titulo">Título</label>
            <?php echo form_input(['name'=> 'titulo', 'id' => 'titulo', 'class' => 'form-control', 'placeholder' => 'Ingrese título del producto', 'value' => set_value('titulo')]);?>
            <p class="is-danger"><?=session('errors.titulo')?></p>
        </div>

        <div class="form-group">
            <label for="color">Color</label>
            <?php echo form_input(['name'=> 'color', 'id' => 'color', 'class' => 'form-control', 'placeholder' => 'Ingrese color del producto', 'value' => set_value('color')]);?>
            <p class="is-danger"><?=session('errors.color')?></p>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <?php echo form_input(['name'=> 'descripcion', 'id' => 'descripcion', 'class' => 'form-control', 'placeholder' => 'Ingrese descripcion del producto', 'value' => set_value('descripcion')]);?>
            <p class="is-danger"><?=session('errors.descripcion')?></p>
        </div>

        <div class="form-group">
            <label for="stock">Stock</label>
            <?php echo form_input(['name'=> 'stock', 'id' => 'stock', 'class' => 'form-control', 'placeholder' => 'Ingrese stock del producto', 'value' => set_value('stock')]);?>
            <p class="is-danger"><?=session('errors.stock')?></p>
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <?php echo form_input(['name'=> 'precio', 'id' => 'precio', 'class' => 'form-control', 'placeholder' => 'Ingrese precio del producto', 'value' => set_value('precio')]);?>
            <p class="is-danger"><?=session('errors.precio')?></p>
        </div>


        <div class="form-group">
            <label for="categoria">Categoría</label>
            <?php 
            $lista['0'] = 'Seleccione categoria';

            foreach($categorias as $row){
                $id_categoria = $row['id_categoria'];
                $categoria_descrip = $row['categoria_descrip'];
                $lista[$id_categoria] = $categoria_descrip;
        }
            echo form_dropdown('categoria', $lista, '0', 'class="form-control"');
            ?>
        </div>

        <div class="form-group">
            <label for="imagen">Imagen</label>
            <?php echo form_input(['name'=> 'imagen', 'id' => 'imagen', 'type' => 'file', 'value' => set_value('imagen')]);?>
            <p class="is-danger"><?=session('errors.imagen')?></p>
        </div>

        <div class="form-group mt-3">
            <?php echo form_submit('Agregar', 'Agregar', "class='btn btn-success'");?>
        </div>

        <?php echo form_close();?>

    </div>

</div>
