

<div class="container">

<?php if (session()->getFlashdata('mensaje_editado')): ?>
        <div class="alert alert-success text-center">
            <h2><?= session()->getFlashdata('mensaje_editado')?></h2>
        </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('mensaje_registro')): ?>
        <div class="alert alert-success text-center">
            <h2><?= session()->getFlashdata('mensaje_registro')?></h2>
        </div>
        <?php endif; ?>

<h1 class="text-center mt-5 mb-3">Listado de productos</h1>

<a href="<?php echo base_url('agregarProducto');?>">
    <button class="btn btn-dark mt-3">Agregar Producto</button>
</a>
    <table id="mytable" class="mt-2 table table-bordered table-striped table-hover">
        <thead>
            <th>Título</th>
            <th>Color</th>
            <th>Stock</th>
            <th>Categoria</th>
            <th>Imagen</th>
            <th>Precio</th>
            <th>Editar</th>
            <th>Activar/Eliminar</th>
        </thead>
        <tbody>
            <?php foreach ($producto as $row){ ?>
            <tr>
                <td> <?php echo $row['producto_nombre'];?></td>
                <td> <?php echo $row['descripcion'];?></td>
                <td> <?php echo $row['producto_stock'];?></td>
                <td><?php echo $row['categoria_descrip'];?></td>

                <td><img src="<?php echo base_url('assets/img/'.$row['producto_imagen']);?>" alt="" height="100" width="100"></td>
                <td> <?php echo $row['producto_precio'];?></td>
                <td>
                    <a class="btn btn-success" href="<?php echo base_url('editar/'.$row['id_producto']);?>">Editar</a></td>
                
                
                <?php
                if ($row['producto_estado']==1)
                {?>
                    <td><a class="btn btn-danger" href="<?php echo base_url('eliminar/'.$row['id_producto']);?>">Eliminar</a></td>
                    <?php } else {
                    ?>
                    <td><a class="btn btn-danger" href="<?php echo base_url('activar/'.$row['id_producto']);?>">Activar</a></td>
                    <?php } ?>
                </tr>
                <?php } ?>
        </tbody>
    </table>
</div>