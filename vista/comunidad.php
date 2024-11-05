<?php require_once "vista/componentes/encabezado.php"; ?>
<?php require_once "vista/componentes/barra.php"; ?>

<main class="container" id="crud">
    <h1>Comunidades</h1>

    <button class="btn btn-primary my-3" value="insertar">Registrar</button>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>RIF</th>
                    <th>Representante</th>
                    <th>Dirección</th>
                    <th>Parroquia</th>
                    <th>Ambito</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody class="table-group-divider">
                <?php foreach ($datos as $d): ?>
                    <tr>
                        <td class="d-none"><?php echo $d["id"] ?></td>
                        <td><?php echo $d["nombre"] ?></td>
                        <td><?php echo $d["tipo"] ?></td>
                        <td><?php echo $d["rif"] ?></td>
                        <td><?php echo $d["representante"] ?></td>
                        <td><?php echo $d["direccion"] ?></td>
                        <td><?php echo $d["nombre_parroquia"] ?></td>
                        <td><?php echo $d["ambito"] ?></td>

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
                <input type="hidden" name="id" />

                <div class="row">
                    <label class="form-label col fw-semibold">Nombre
                        <input class="form-control" type="text" name="nombre" minlength="3" maxlength="50"
                            pattern="[A-Za-zÀ-ý ]+" required />
                    </label>
                </div>

                <div class="row">
                    <label class="form-label col fw-semibold">Tipo
                        <select class="form-select" name="tipo" required>
                            <option disabled selected hidden>Seleccione una opcion</option>
                            <option>Organización comunal</option>
                            <option>UBCH</option>
                        </select>
                    </label>

                    <label class="form-label col fw-semibold">RIF
                        <input class="form-control" type="text" name="rif" pattern="[CGJV]{1}-[0-9]{7,8}-[0-9]{1}"
                            placeholder="CGJV-12345678-9" title="Formato: V-12345678-9" required>
                    </label>
                </div>

                <div class="row">
                    <label class="form-label col fw-semibold">Representante
                        <input class="form-control" type="text" name="representante" minlength="3" maxlength="30"
                            required>
                    </label>

                    <label class="form-label col fw-semibold">Dirección
                        <input class="form-control" type="text" name="direccion" minlength="5" maxlength="250"
                            required />
                    </label>

                    <label class="form-label col fw-semibold">Parroquia
                        <select class="form-select" name="id_parroquia" required>
                            <?php foreach ($parroquias as $d): ?>
                                <option value=<?php echo $d["id"] ?>>
                                    <?php echo $d["nombre"] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </label>
                </div>

                <div class="row">
                    <label class="form-label col fw-semibold">Ambito
                        <input class="form-control" type="text" name="ambito" minlength="3" maxlength="100" required>
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