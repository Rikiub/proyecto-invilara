<!-- MODAL ELIMINACIÓN -->
<div class="modal modal-sm fade" id="modal-eliminacion" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <p class="text-danger">Esta acción es irreversible.</p>
            </div>

            <form class="modal-footer justify-content-center" id="form-eliminacion">
                <button class="btn btn-danger px-5" type="submit" data-bs-dismiss="modal">Si</button>
                <button class="btn btn-secondary px-5" type="button" data-bs-dismiss="modal">No</button>

                <input name="accion" value="eliminar" type="hidden">
                <input name="id" type="hidden">
            </form>
        </div>
    </div>
</div>