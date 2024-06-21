<?php include "src/vista/componentes/header.php"; ?>
<?php include "src/vista/componentes/navbar.php"; ?>

<h1>Usuarios</h1>

<table class="table">
    <thead>
        <tr>
            <th>Cedula</th>
            <th>Contraseña</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($usuarios as $user): ?>
            <tr name="fila-usuario">
                <td name="cedula"> <?php echo $user["cedula"]; ?> </td>
                <td name="cedula"> <?php echo $user["contraseña"]; ?> </td>
                <td>
                    <button class="btn btn-primary" name="btn-modificar">Modificar</button>
                    <button class="btn btn-danger" name="btn-eliminar">Eliminar</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script src="src/vista/usuarios.js"></script>