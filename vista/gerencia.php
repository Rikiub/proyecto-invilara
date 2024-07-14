<?php require_once "vista/componentes/encabezado.php"; ?>
<?php require_once "vista/componentes/barra.php"; ?>

<main class="container" id="crud">
    <h1>Gestión de Gerencias</h1>
    <hr>
    <button class="btn btn-primary my-3" value="insertar">Registrar</button>
    <hr>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nombre de la Gerencia</th>
                    <th>Nombre del Gerente</th>
                    <th>Dirección de la Gerencia</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach ($datos as $d): ?>
                    <tr>
                        <td class="d-none"><?php echo $d["id"] ?></td>
                        <td><?php echo $d["nombre"] ?></td>
                        <td><?php echo $d["nombre_gerente"] ?></td>
                        <td><?php echo $d["direccion"] ?></td>

                        <td class="d-grid d-md-block gap-2">
                            <button class="btn btn-warning" value="modificar">Modificar</button>
                            <button class="btn btn-danger" value="eliminar" data-bs-toggle="modal"
                                data-bs-target="#modal-eliminacion">Eliminar</button>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</main>

<?php require_once "vista/componentes/modal_eliminar.php"; ?>
<div class="modal modal-lg fade" id="modal-edicion" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h5 class="modal-title">Edición</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="form-edicion" class="modal-body">
                <input type="hidden" name="id">

                <div class="row">
                    <label class="form-label col">Nombre de la Gerencia:
                        <input class="form-control" type="text" name="nombre" placeholder="Por ejemplo, Hidrolara"
                            minlength="5" maxlength="70" required />
                    </label>

                    <label class="form-label col">Nombre y apellido del Gerente:
                        <input class="form-control" type="text" name="nombre_gerente" id="nombre_gerente"
                            pattern="[A-Za-z\s]+" placeholder="Agregar solo letras, Ejemplo: Juan Herrera" minlength="5"
                            maxlength="70" required />
                    </label>
                </div>

                <div class="row">
                    <label class="form-label col">Dirección de la Gerencia:
                        <input class="form-control" type="text" name="direccion"
                            placeholder="Ejemplo, Calle 13 con carrera 22" minlength="5" maxlength="90" required />
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