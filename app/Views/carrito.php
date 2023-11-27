<?php $cart = \Config\Services::cart();?>

<?php if (session()->getFlashdata('mensaje_error')): ?>
    <div style="margin-top:15px" class="alert alert-danger text-center">
        <h2><?= session()->getFlashdata('mensaje_error') ?></h2>
    </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('mensaje_exito')): ?>
        <div class="alert alert-success text-center">
            <h2><?= session()->getFlashdata('mensaje_exito')?></h2>
        </div>
        <?php endif; ?>


<div class="container ">

<h1 class="text-center mt-4">Carrito de compras</h1>
<a href="productos" class="btn btn-dark" role="button">Agregar producto</a>



<?php if ($cart-> contents() == NULL){ ?>
    <div class="m-5 row justify-content-center h-80">
        <div class="col-md-2  d-flex justify-content-center align-items-center">
            <h2 class="ml-2 fw-bold" >Carrito vacío</h2>
        </div>
        <div class="col-md-2 ">
            <img class="text_center" src="<?php echo base_url('assets/img/carritovacio.png')?>">
        </div>
    </div>
    <?php } ?>

    <table id="maytable" class="mt-5 table table-bordred table-striped"> 
       <?php if ($cart1 = $cart->contents()):?>
       
        
        
       <thead>
            <td>N° item</td>
            <td>Nombre</td>
            <td>Precio</td>
            <td>Cantidad</td>
            <td>Subtotal</td>
            <td>Acción</td>
       </thead>

       <tbody>
        <?php
            $total = 0;
            $i = 1;

            foreach ($cart1 as $item):?>

            <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $item['name'];?></td>
                <td>$<?php echo $item['price'];?></td>
                <td><?php echo $item['qty'];?></td>
                <td><?php echo $item['subtotal'];$total=$total + $item ['subtotal']?></td>
                <td><?php echo anchor('eliminarItem/'.$item['rowid'], 'Eliminar');?></td>

            </tr>

            <?php endforeach; ?>
            <tr>
                <td>Total Compra:$<?php echo $total; ?></td>
                <td><a href="<?php echo base_url('vaciarCarrito/all');?>" class="btn btn-dark">Vaciar carrito</a></td>
                <td><a href="<?php echo base_url('ventas');?>" class="btn btn-dark" role='button'>Ordenar compra</a></td>
            </tr>
            
            <?php endif; ?>
       </tbody>
    </table>
</div>
