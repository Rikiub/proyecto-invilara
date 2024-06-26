<?php include "src/vista/componentes/header.php"; ?>
<?php include "src/vista/componentes/navbar.php"; ?>

<div class="container">
    <h1>Usuarios</h1>

    <a href="?ruta=registro" class="btn btn-primary px-3 py-2 my-3">Crear</a>

    <table class="table">
        <thead>
            <tr>
                <th>Cedula</th>
                <th>Contraseña</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($usuarios as $user): ?>
                <tr>
                    <td> <?php echo $user["cedula"]; ?> </td>
                    <td> <?php echo $user["contraseña"]; ?> </td>
                    <td class="d-flex">
                        <form method="post">
                            <input type="hidden" name="id" value="<?php echo $user["cedula"] ?>">
                            <button name="accion" value="modificar" class="btn btn-primary">Modificar</button>
                        </form>

                        <form method="post">
                            <input type="hidden" name="id" value="<?php echo $user["cedula"] ?>">
                            <button name="accion" value="eliminar" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>