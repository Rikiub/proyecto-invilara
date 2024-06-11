<?php include "src/vista/componentes/navbar.php" ?>

<h1>Bienvenido al panel de control</h1>

<h2>Usuarios en el sistema</h2>

<table class="table">
    <tr>
        <th>Cedula</th>
        <th>Contraseña</th>
    </tr>

    <tr>
        <?php foreach ($usuarios as $user): ?>
            <td> <?php echo $user; ?> </td>
        <?php endforeach; ?>
    </tr>
</table>