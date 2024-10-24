<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nº Control</th>

                <?php if ($tipo_solicitud == "1" || $tipo_solicitud == "2"): ?>
                    <th>Cedula solicitante</th>
                <?php elseif ($tipo_solicitud == "3"): ?>
                    <th>Institución</th>
                <?php endif ?>

                <th>Comunidad</th>
                <th>Municipio</th>
                <th>Parroquia</th>
                <th>Gerencia</th>
                <th>Fecha</th>
                <th>Estatus</th>
                <th>Remitente</th>
                <th>Observación</th>
                <th>Problematica</th>

                <?php if (!isset($reporte)): ?>
                    <th>Acciones</th>
                <?php endif ?>
            </tr>
        </thead>

        <tbody class="table-group-divider">
            <?php foreach ($datos as $d): ?>
                <tr>
                    <td><?php echo $d["id"]; ?></td>

                    <?php if ($tipo_solicitud == "1" || $tipo_solicitud == "2"): ?>
                        <td><?php echo $d["cedula_solicitante"]; ?></td>
                    <?php elseif ($tipo_solicitud == "3"): ?>
                        <td><?php echo $d["nombre_institucion"]; ?></td>
                    <?php endif ?>

                    <td><?php echo $d["nombre_comunidad"]; ?></td>
                    <td><?php echo $d["nombre_municipio"]; ?></td>
                    <td><?php echo $d["nombre_parroquia"]; ?></td>
                    <td><?php echo $d["nombre_gerencia"]; ?></td>
                    <td><?php echo date("d/m/Y", strtotime($d["fecha"])); ?></td>
                    <td><?php echo $d["estatus"]; ?></td>
                    <td><?php echo $d["remitente"]; ?></td>
                    <td><?php echo $d["observacion"]; ?></td>
                    <td><?php echo $d["problematica"]; ?></td>

                    <?php if (!isset($reporte)): ?>
                        <td class="d-grid d-md-block gap-2">
                            <button class="btn btn-outline-warning" value="modificar">Modificar</button>
                            <button class="btn btn-outline-danger" value="eliminar" data-bs-toggle="modal"
                                data-bs-target="#modal-eliminacion">Eliminar</button>
                        </td>
                    <?php endif ?>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>