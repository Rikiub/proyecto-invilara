<?php require_once "vista/componentes/encabezado.php"; ?>
<?php require_once "vista/componentes/barra.php"; ?>

<main class="container">
    <h1>Municipios</h1>

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
                <input data-id type="hidden" name="id">

                <div class="row">
                    <label class="form-label col fw-semibold">Nombre
                        <input class="form-control" type="text" name="nombre" pattern="[A-Za-zÀ-ý ]+"
                            title="Solo se aceptan letras" required />
                    </label>
                </div>

                <div class="modal-footer my-4">
                    <button class="btn btn-primary px-5 py-2" type="submit">Procesar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="module" src="recursos/js/municipio.js"></script>