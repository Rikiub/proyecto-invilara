<?php include "src/vista/componentes/navbar.php" ?>

<h1>Usuarios</h1>

<table class="table">
    <tr>
        <th>Cedula</th>
    </tr>

    <?php foreach ($datos["usuarios"] as $user): ?>
        <tr name="fila-usuario">
            <td name="cedula"> <?php echo $user["cedula"]; ?> </td>
            <td>
                <button class="btn btn-primary" name="btn-modificar">Modificar</button>
                <button class="btn btn-danger" name="btn-eliminar">Eliminar</button>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<script src="/src/vista/usuario.js"></script>