


<div class="container">
<h1 class="text-center mt-4">Listado de consultas</h1>
    <table id="mytable" class="mt-5 table table-bordered table-striped table-hover">
        <thead>
            <th>Número de consulta</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Asunto</th>
            <th>Consulta</th>

        </thead>
        <tbody>
        <?php foreach ($mensajes as $mensaje) { ?>

        <tr>
        <td><?php echo $mensaje['id_mensaje']; ?></td>
        <td><?php echo $mensaje['nombre']; ?></td>
        <td><?php echo $mensaje['mail']; ?></td>
        <td><?php echo $mensaje['asunto']; ?></td>
        <td><?php echo $mensaje['consulta']; ?></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>