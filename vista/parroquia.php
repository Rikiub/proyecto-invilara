<?php require_once "vista/componentes/encabezado.php"; ?>
<?php require_once "vista/componentes/barra.php"; ?>

<main class="container" id="crud">
    <h1>Parroquias</h1>

    <button class="btn btn-primary my-3" value="insertar">Registrar</button>

    <div class="table-responsive" id="tabla-contenedor">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Parroquia</th>
                    <th>Municipio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody class="table-group-divider">
                <?php foreach ($datos as $d): ?>
                    <tr>
                        <td class="d-none" data-id><?php echo $d["id"] ?></td>
                        <td><?php echo $d["nombre"] ?></td>
                        <td><?php echo $d["nombre_municipio"] ?></td>

                        <td>
                            <div class="btn-group-vertical">
                                <button class="btn btn-warning" value="modificar">Modificar</button>
                                <button class="btn btn-danger" value="eliminar" data-bs-toggle="modal"
                                    data-bs-target="#modal-eliminacion">Eliminar</button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</main>

<?php require_once "vista/componentes/modal_eliminar.php"; ?>

<!-- MODAL EDITOR -->
<div class="modal modal-lg fade" id="modal-edicion" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h5 class="modal-title">Edición</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="form-edicion" class="modal-body">
                <input data-id type="hidden" name="id">

                <div class="row">
                    <label class="form-label col fw-semibold">Parroquia
                        <input class="form-control" type="text" name="nombre" pattern="[A-Za-zÀ-ý ]+"
                            title="Solo se aceptan letras" required />
                    </label>

                    <label class="form-label col fw-semibold">Municipio
                        <select class="form-select" name="id_municipio" required>
                            <?php foreach ($municipios as $d): ?>
                                <option value=<?php echo $d["id"] ?>>
                                    <?php echo $d["nombre"] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </label>
                </div>

                <div class="modal-footer my-4">
                    <input type="hidden" name="accion">
                    <button class="btn btn-primary px-5 py-2" type="submit">Procesar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="recursos/js/crud.js"></script>