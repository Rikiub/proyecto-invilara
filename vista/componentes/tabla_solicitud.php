<h1 class="mb-5">Reporte de solicitudes</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nº Control</th>

            <th>Cedula solicitante</th>
            <th>Institución</th>

            <th>Comunidad</th>
            <th>Municipio</th>
            <th>Parroquia</th>

            <th>Gerencia</th>

            <th>Fecha</th>
            <th>Estado</th>
            <th>Problematica</th>
        </tr>
    </thead>

    <tbody class="table-group-divider">
        <?php foreach ($datos as $d): ?>
            <tr>
                <td><?php echo $d["id"]; ?></td>

                <td><?php echo $d["cedula_solicitante"]; ?></td>
                <td><?php echo $d["nombre_institucion"]; ?></td>

                <td><?php echo $d["nombre_comunidad"]; ?></td>
                <td><?php echo $d["nombre_municipio"]; ?></td>
                <td><?php echo $d["nombre_parroquia"]; ?></td>

                <?php if ($d["nombre_gerencia"]): ?>
                    <td><?php echo $d["nombre_gerencia"]; ?></td>
                <?php else: ?>
                    <td class="fw-medium">NO ASIGNADO</td>
                <?php endif ?>

                <td><?php echo date("d/m/Y", strtotime($d["fecha"])); ?></td>
                <td><?php echo $d["nombre_estado"]; ?></td>
                <td><?php echo $d["problematica"]; ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>