

<div class="container">

<?php if (session()->getFlashdata('Mensaje')) {
            echo "
            <div class='mt-3 mb-3 h4 text-center alert alert-success alert-dismissible'>
            <button type='button' class='btn-close' data-bs-dismiss='alert'></button>" . session()->getFlashdata('Mensaje') . "
            </div>";
        } ?>


<h1 class="text-center mt-4">Edición de Producto</h1>
<div class="w-50 mx-auto"> 
    <?php echo form_open_multipart('actualizar')?>

    <div class="form-group">
    <label for="titulo">Título</label>
        <?php echo form_input(['name' => 'titulo', 'class' => 'form-control', 'autofocus' => 'autofocus', 'value' =>$producto['producto_nombre']]);?>
        <p class="is-danger"><?=session('errors.titulo')?></p>
    </div>

    <div class="form-group">
        <label for="color">Color</label>
        <?php 
        $lista[''] = 'Seleccione color';
        foreach($color as $row){
            $lista[$row['id_color']]= $row ['descripcion'];
        }
        $sel=$producto['producto_color'];
        echo form_dropdown ('color', $lista, $sel, 'class= "form-control"');?>
        
    </div>

    <div class="form-group">
        <label for="stock">Stock</label>
        <?php echo form_input(['name' => 'stock', 'class' => 'form-control','value' => $producto['producto_stock']]);?>
        <p class="is-danger"><?=session('errors.stock')?></p>
    </div>

    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <?php echo form_input(['name' => 'descripcion', 'class' => 'form-control','value' => $producto['producto_descrip']]);?>
        <p class="is-danger"><?=session('errors.descripcion')?></p>
    </div>

    <div class="form-group">
        <label for="precio">Precio</label>
        <?php echo form_input(['name' => 'precio', 'class' => 'form-control','value' => $producto['producto_precio']]);?>
        <p class="is-danger"><?=session('errors.precio')?></p>
    </div>

    <div class="form-group"> 
        <label for="imagen"></label>
        <img src="<?php echo base_url('assets/img/'.$producto['producto_imagen']);?>" alt="" height="100" width="100">
        <?php echo form_input(['name' => 'imagen', 'id' => 'imagen', 'type' => 'file']);?>
        <p class="is-danger"><?=session('errors.imagen')?></p>
    </div>

    <div class="form-group"> 
        <label for="categoria">Categoria</label>
        <?php 
        $list[''] = 'Seleccione categoria';
        foreach($categorias as $row){
            $list[$row['id_categoria']]= $row ['categoria_descrip'];
        }
        $selec=$producto['producto_categoria'];
        echo form_dropdown ('categoria', $list, $selec, 'class= "form-control"');?>
    </div>

    <?php echo form_hidden('id_producto', $producto['id_producto']);?>

    
    <div class="form-group mt-4 mb-5  text-center ">
            <?php echo form_submit('Modificar', 'Modificar', "class='btn btn-dark px-4'");?>
        </div>


    </div>

</div>