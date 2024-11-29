<style>
    header {
        background-color: #be044d;
        color: white;
        border-radius: 5px;

        text-align: center;

        font-size: 24px;
        padding: 10px;
        margin-bottom: 25px;
    }

    h2 {
        text-align: center;
    }

    td,
    th {
        padding: 5px;
    }

    footer {
        background-color: #ff5c42;
        color: white;

        position: fixed;
        bottom: 0;
        width: 100%;

        padding: 5px;
        border-radius: 5px;
        text-align: center;
    }
</style>

<header>
    REPORTE GENERADO POR: SIGSAC
</header>

<h2 class="mb-5">Reporte de solicitudes</h2>

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
            <th>Tipo de solicitud</th>
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
                <td>
                    <?php switch ($d["tipo_solicitud"]) {
                        case 1:
                            echo "General";
                            break;
                        case 2:
                            echo "1x10";
                            break;
                        case 3:
                            echo "Institucional";
                            break;
                    } ?>
                </td>
                <td><?php echo $d["problematica"]; ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<footer>
    Reservado todos los derechos
</footer>