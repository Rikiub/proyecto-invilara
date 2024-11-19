<?php require_once "vista/componentes/encabezado.php"; ?>
<?php require_once "vista/componentes/barra.php"; ?>

<main class="container">
    <h1>Comunidades</h1>

    <div class="d-flex justify-content-between" id="crud-botones">
        <div class="btn-group" role="group">
            <button id="boton-insertar" value="insertar" class="btn btn-success my-3">Registrar</button>
            <button id="boton-modificar" value="modificar" class="btn btn-warning my-3 desactivable">Modificar</button>
            <button id="boton-eliminar" value="eliminar" class="btn btn-danger my-3 desactivable">Eliminar</button>
        </div>
    </div>

    <table class="table table-hover" id="tabla-contenedor">
        <thead></thead>
        <tbody class="table-group-divider"></tbody>
    </table>
</main>

<?php require_once "vista/componentes/modal_eliminar.php"; ?>

<!-- MODAL EDITOR -->
<div class="modal modal-lg fade" id="modal-edicion" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h5 id="modal-title" id="modal-title" class="modal-title">Edición</h5>
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
                            <option>Consejo Comunal</option>
                            <option>Comuna</option>
                            <option>UBCH</option>
                        </select>
                    </label>

                    <label class="form-label col fw-semibold">RIF
                        <div class="input-group">
                            <select class="input-group-text" name="tipo_rif" required>
                                <option>C</option>
                                <option>V</option>
                                <option>E</option>
                            </select>

                            <input id="rif" class="form-control" type="text" name="rif" minlength="10" maxlength="10"
                                pattern="[0-9]{7,8}-[0-9]{1}" title="Formato: C-12345678-9" required>
                        </div>
                    </label>
                </div>

                <div class="row">
                    <label class="form-label col fw-semibold">Representante
                        <input class="form-control" type="text" name="representante" minlength="3" maxlength="30"
                            required>
                    </label>

                    <label class="form-label col fw-semibold">Teléfono
                        <div class="input-group">
                            <select id="telefono_codigo" class="input-group-text">
                                <option value="0412">0412</option>
                                <option value="0414">0414</option>
                                <option value="0416">0416</option>
                                <option value="0424">0424</option>
                                <option value="0426">0426</option>
                            </select>

                            <input id="telefono" name="telefono" class="form-control" type="tel" minlength="12"
                                maxlength="12" title="Debe ser un número válido" required />
                        </div>
                    </label>
                </div>

                <div class="row">
                    <label class="form-label col fw-semibold">Correo
                        <input class="form-control" type="email" name="correo" minlength="3" maxlength="70" required>
                    </label>

                    <label class="form-label col fw-semibold">Dirección
                        <input class="form-control" type="text" name="direccion" minlength="5" maxlength="100"
                            required />
                    </label>
                </div>

                <div class="row">
                    <label class="form-label col fw-semibold">Municipio
                        <select class="form-select input-group-text" id="municipio_select" required>
                            <?php foreach ($municipios as $d): ?>
                                <option value=<?php echo $d["id"] ?>>
                                    <?php echo $d["nombre"] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </label>

                    <label class="form-label col fw-semibold">Parroquia
                        <select class="form-select" id="parroquia_select" name="id_parroquia" required></select>
                    </label>
                </div>

                <div class="row">
                    <label class="form-label col fw-semibold">Ambito
                        <input class="form-control" type="text" name="ambito" minlength="3" maxlength="50" required>
                    </label>
                </div>

                <div class="modal-footer my-4">
                    <button class="btn btn-primary px-5 py-2" type="submit">Procesar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="module" src="recursos/js/comunidad.js"></script>