<div class="table-responsive" id="tabla-contenedor">
    <table class="table table-hover" id="tabla-principal">
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

                <?php if ($tipo_vista != "programado"): ?>
                    <th>Gerencia</th>
                <?php endif ?>

                <th>Fecha</th>
                <th>Estatus</th>
                <th>Problematica</th>
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

                    <?php if ($tipo_vista != "programado"): ?>
                        <?php if ($d["nombre_gerencia"]): ?>
                            <td><?php echo $d["nombre_gerencia"]; ?></td>
                        <?php else: ?>
                            <td class="text-danger fw-medium">NO ASIGNADO</td>
                        <?php endif ?>
                    <?php endif ?>

                    <td><?php echo date("d/m/Y", strtotime($d["fecha"])); ?></td>
                    <td><?php echo $d["nombre_estado"]; ?></td>
                    <td><?php echo $d["problematica"]; ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>