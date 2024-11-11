<?php require_once "vista/componentes/encabezado.php"; ?>
<?php require_once "vista/componentes/barra.php"; ?>

<main class="container" id="crud">
    <h1>Municipios</h1>

    <div class="d-flex justify-content-between">
        <button class="btn btn-primary my-3" id="boton-insertar" value="insertar">Registrar</button>
        <button class="btn btn-danger my-3" id="boton-eliminar" value="eliminar">Eliminar</button>

        <form method="POST">
            <button class="btn btn-danger my-3 me-3" name="accion" value="reportar" type="submit">Generar
                Reporte</button>
        </form>
    </div>

    <div class="my-3">
        <table class="table table-hover" id="tabla-contenedor">
            <thead></thead>
            <tbody class="table-group-divider"></tbody>
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
                    <label class="form-label col fw-semibold">Nombre
                        <input class="form-control" type="text" name="nombre" pattern="[A-Za-zÀ-ý ]+"
                            title="Solo se aceptan letras" required />
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

<script src="recursos/js/municipio.js"></script>