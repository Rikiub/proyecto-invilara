<?php require_once "vista/componentes/encabezado.php"; ?>
<?php require_once "vista/componentes/barra.php"; ?>

<main class="container" id="crud">
    <h1>Usuarios</h1>

    <div class="d-flex justify-content-between">
        <button class="btn btn-primary my-3" value="insertar">Registrar</button>
    </div>

    <div class="table-responsive" id="tabla-contenedor">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Cedula</th>
                    <th>Contraseña</th>
                    <th>Rol</th>

                    <?php if (!isset($reporte)): ?>
                        <th id="botones-accion">Acciones</th>
                    <?php endif ?>
                </tr>
            </thead>

            <tbody class="table-group-divider">
                <?php foreach ($datos as $d): ?>
                    <tr>
                        <td> <?php echo $d["cedula"]; ?> </td>
                        <td> <?php echo $d["contrasena"]; ?> </td>
                        <td> <?php echo $d["rol"]; ?> </td>

                        <?php if (!isset($reporte)): ?>
                            <td id="botones-accion">
                                <div class="btn-group-vertical">
                                    <button class="btn btn-warning" value="modificar">Modificar</button>
                                    <button class="btn btn-danger" value="eliminar" data-bs-toggle="modal"
                                        data-bs-target="#modal-eliminacion">Eliminar</button>
                                </div>
                            </td>
                        <?php endif ?>
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
                <h5 id="modal-title" class="modal-title">Edición</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="form-edicion" class="modal-body">
                <div class="row">
                    <label class="form-label col fw-semibold">
                        Cedula
                        <input data-id class="form-control" type="text" pattern="\d*" inputmode="numeric" minlength="7"
                            maxlength="8" name="cedula" required />
                    </label>
                </div>

                <div class="row">
                    <label class="form-label col fw-semibold">
                        Contraseña
                        <input class="form-control" type="password" name="contrasena" minlength="3" maxlength="50"
                            required />
                    </label>
                </div>

                <div class="row">
                    <label class="form-label col fw-semibold">Rol
                        <select class="form-select" name="rol" required>
                            <option value="1">Usuario</option>
                            <option value="2">Administrador</option>
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