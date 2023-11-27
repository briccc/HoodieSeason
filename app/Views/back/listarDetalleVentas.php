<div class="container">
<div class="w-80 mx-auto  text-center">
    <h1 class="mb-3 ">Detalles de la venta</h1>
    <table id="mytable" class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>ID Venta</th>
                <th>ID Producto</th>
                <th>Detalle Cantidad</th>
                <th>Detalle Precio</th>

            </tr>
        </thead>
        <tbody>
           
            <?php
            
            $total = 0;

            foreach ($detalle as $detalle) { ?>

                <tr>
                    <td><?= $detalle['id_venta']; ?></td>
                    <td><?= $detalle['id_producto']; ?></td>
                    <td><?= $detalle['detalle_cantidad']; ?></td>
                    <td><?= $detalle['detalle_precio']; ?></td>
                    <?php $total=$total + $detalle ['detalle_precio'] * $detalle['detalle_cantidad']?>

                </tr>
            <?php } ?>

            <td>Total Compra:$<?php echo $total; ?></td>

        </tbody>
    </table>

</div>
</div>
