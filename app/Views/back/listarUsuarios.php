

<div class="container vh-100">
<h1 class="text-center mt-5">Listado de Usuarios</h1>

    <table id="mytable" class="mt-5 table table-bordered table-striped table-hover">
        <thead>
            <th>N° de usuario</th>
            <th>Apellido</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Perfil</th>

        </thead>
        <tbody>
            <?php foreach ($usuarios as $row){ ?>
            <tr>
                <td> <?php echo $row['id_usuario'];?></td>
                <td> <?php echo $row['usuario_apellido'];?></td>
                <td> <?php echo $row['usuario_nombre'];?></td>
                <td><?php echo $row['usuario_mail'];?></td>
                <?php
                if ($row['perfil_id']==1)
                {?>
                    <td>Administrador</td>
                    <?php } else {
                    ?>
                    <td>Cliente</td>
                    <?php } ?>
                </tr>
                <?php } ?>
        </tbody>
    </table>
</div>