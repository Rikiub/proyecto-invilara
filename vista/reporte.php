<?php require_once "vista/componentes/encabezado.php"; ?>
<?php require_once "vista/componentes/barra.php"; ?>

<main class="container">
    <article class="card p-5 w-75 m-auto">
        <hgroup class="text-center mb-3">
            <h2>Reporte de solicitudes</h2>
            <p class="text-muted">Seleccione los datos que quiera filtrar</p>
        </hgroup>

        <form method="post">
            <div class="row">
                <label class="form-label col fw-semibold">Nº Control
                    <input class="form-control" type="text" name="id" placeholder="Todos" />
                </label>

                <label class="form-label col fw-semibold">Estado
                    <select class="form-select" name="estado">
                        <option value="" selected>Todos</option>

                        <hr>

                        <?php foreach ($estados as $d): ?>
                            <option value="<?php echo $d["id"] ?>">
                                <?php echo $d["nombre"] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </label>

                <label class="form-label col fw-semibold">Gerencia
                    <select class="form-select" name="gerencia">
                        <option value="" selected>Todos</option>

                        <hr>

                        <?php foreach ($gerencias as $d): ?>
                            <option value="<?php echo $d["id"] ?>">
                                <?php echo $d["nombre"] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </label>
            </div>

            <div class="row">
                <label class="form-label col fw-semibold">Cedula solicitante
                    <input class="form-control" name="cedula_solicitante" type="text" placeholder="Todos">
                </label>

                <label class="form-label col fw-semibold">Institución
                    <select class="form-select" name="institucion">
                        <option value="" selected>Todos</option>

                        <hr>

                        <?php foreach ($instituciones as $d): ?>
                            <option value="<?php echo $d["id"] ?>">
                                <?php echo $d["nombre"] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </label>

                <label class="form-label col fw-semibold">Comunidad
                    <select class="form-select" name="comunidad">
                        <option value="" selected>Todos</option>

                        <hr>

                        <?php foreach ($comunidades as $d): ?>
                            <option value="<?php echo $d["id"] ?>">
                                <?php echo $d["nombre"] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </label>
            </div>

            <div class="row">
                <label class="form-label col fw-semibold">Fecha inicial
                    <input class="form-control" type="date" name="fecha_inicio" />
                </label>

                <label class="form-label col fw-semibold">Fecha final
                    <input class="form-control" type="date" name="fecha_fin" />
                </label>
            </div>

            <div class="modal-footer my-4">
                <button class="btn btn-warning px-5 py-2" type="submit">Generar reporte</button>
            </div>
        </form>
    </article>
</main>