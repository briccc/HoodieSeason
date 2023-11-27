<?php $cart = \Config\Services::cart();?>

<div class="container">
<div class="w-80 mx-auto text-center">
    <h1 class="mt-4">Listado de Ventas</h1>
    <table id="mytable" class="mt-5 table table-bordered table-striped table-hover" >
        <thead>
            <tr>
                <th>N° Venta</th>
                <th>Nombre de cliente</th>
                <th>Fecha de Venta</th>
            </tr>
        </thead>
        <tbody>
           
            <?php foreach ($ventas as $venta) { ?>

                <tr>
                    <td><?= $venta['id_venta']; ?></td>
                    <td><?= $venta['id_usuario']; ?></td>
                    <td><?= $venta['venta_fecha']; ?></td>
                    <td><a href="<?php echo base_url ('verDetalle/'.$venta['id_venta']);?>">Ver detalles</a></td>
                </tr>
            <?php } ?>



        </tbody>
     </table>

    </div>
</div>
