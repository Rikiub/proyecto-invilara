<?php require_once "vista/componentes/encabezado.php"; ?>
<?php require_once "vista/componentes/barra.php"; ?>

<main class="container" id="crud">
    <h1>Parroquias</h1>

    <button class="btn btn-outline-primary my-3" value="insertar">Registrar</button>

    <table class="table table-hover table-responsive">
        <thead>
            <tr>
                <th>ID</th>
                <th>Parroquia</th>
                <th>Municipio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody class="table-group-divider">
            <?php foreach ($datos as $d): ?>
                <tr>
                    <td><?php echo $d["id"] ?></td>
                    <td><?php echo $d["nombre"] ?></td>
                    <td><?php echo $d["nombre_municipio"] ?></td>

                    <td>
                        <button class="btn btn-outline-warning" value="modificar">Modificar</button>
                        <button class="btn btn-outline-danger" value="eliminar">Eliminar</button>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>



<!-- MODAL EDITOR -->
<div class="modal modal-lg fade" id="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h5 class="modal-title">Edición</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="formulario" class="modal-body">
                <div class="row">
                    <label class="form-label col">ID
                        <input class="form-control" type="text" name="id">
                    </label>
                </div>

                <div class="row">
                    <label class="form-label col">Parroquia
                        <input class="form-control" type="text" name="nombre" required />
                    </label>

                    <label class="form-label col">Municipio
                        <select class="form-select" name="nombre_municipio">
                            <option value="Andres Eloy Blanco">Andres Eloy Blanco</option>
                            <option value="Crespo">Crespo</option>
                            <option value="Iribarren">Iribarren</option>
                            <option value="Jimenez">Jimenez</option>
                            <option value="Morán">Moràn</option>
                            <option value="Palavecino">Palavecino</option>
                            <option value="Simon Planas">Simon Planas</option>
                            <option value="Torres">Torres</option>
                            <option value="Urdaneta">Urdaneta</option>
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