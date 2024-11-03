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

                <th>Remitente</th>
                <th>Comunidad</th>
                <th>Municipio</th>
                <th>Parroquia</th>

                <?php if ($tipo_vista != "programado"): ?>
                    <th>Gerencia</th>
                <?php endif ?>

                <th>Fecha</th>
                <th>Estatus</th>
                <th>Problematica</th>

                <?php if (!isset($ocultar_acciones)): ?>
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

                    <td><?php echo $d["nombre_remitente"]; ?></td>
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
                    <td><?php echo $d["estado"]; ?></td>
                    <td><?php echo $d["problematica"]; ?></td>

                    <td>
                        <div class="btn-group-vertical">
                            <?php if (isset($ocultar_acciones)): ?>
                                <!-- Vacio -->
                            <?php elseif ($tipo_vista == "programado"): ?>
                                <button class="btn btn-warning" value="modificar">Modificar</button>
                                <button class="btn btn-danger" value="eliminar" data-bs-toggle="modal"
                                    data-bs-target="#modal-eliminacion">Eliminar</button>
                            <?php elseif ($tipo_vista == "ejecucion"): ?>
                                <button class="btn btn-warning" value="modificar">Asignar</button>
                                <button class="btn btn-danger" value="eliminar" data-bs-toggle="modal"
                                    data-bs-target="#modal-eliminacion">Eliminar</button>
                            <?php else: ?>
                                <button class="btn btn-warning" value="modificar">Modificar</button>
                                <button class="btn btn-danger" value="eliminar" data-bs-toggle="modal"
                                    data-bs-target="#modal-eliminacion">Eliminar</button>
                            <?php endif ?>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>