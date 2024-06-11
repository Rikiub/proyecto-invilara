<?php include "src/vista/componentes/navbar.php" ?>

<h1>Usuarios</h1>

<table class="table">
    <tr>
        <th>Cedula</th>
        <th>Contraseña</th>
    </tr>

    <?php foreach ($datos["usuarios"] as $user): ?>
        <tr>
            <td> <?php echo $user["cedula"]; ?> </td>
            <td> <?php echo $user["contraseña"]; ?> </td>
            <td>
                <form method="get">
                    <button class="btn btn-primary" name="id" value="<?php echo $user["cedula"] ?>">Modificar</button>
                </form>

                <form method="get">
                    <button class="btn btn-danger" name="id" value="<?php echo $user["cedula"] ?>">Eliminar</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>