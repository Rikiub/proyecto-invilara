<?php require_once "vista/componentes/encabezado.php"; ?>
<?php require_once "vista/componentes/barra.php"; ?>

<main class="container">
    <h1>Gerencias</h1>

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

<div class="modal modal-lg fade" id="modal-edicion" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h5 id="modal-title" class="modal-title">Edición</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="form-edicion" class="modal-body">
                <input type="hidden" name="id">

                <div class="row">
                    <label class="form-label col fw-semibold">Nombre
                        <input class="form-control" type="text" name="nombre" minlength="3" maxlength="50"
                            pattern="[A-Za-zÀ-ý ]+" required />
                    </label>

                    <label class="form-label col fw-semibold">Cedula del gerente
                        <select class="form-select" name="cedula_gerente" required>
                            <?php foreach ($gerentes as $d): ?>
                                <option value=<?php echo $d["cedula"] ?>>
                                    <?php echo $d["cedula"] ." - ". $d["nombre"] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </label>
                </div>

                <div class="row">
                    <label class="form-label col fw-semibold">Dirección
                        <input class="form-control" type="text" name="direccion" minlength="5" maxlength="90"
                            required />
                    </label>
                </div>

                <div class="modal-footer my-4">
                    <button class="btn btn-primary px-5 py-2" type="submit">Procesar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="module" src="recursos/js/gerencia.js"></script>