<?php require_once "vista/componentes/encabezado.php"; ?>
<?php require_once "vista/componentes/barra.php"; ?>

<main class="container">
    <article class="card p-5">
        <h1>Reporte</h1>

        <form method="post">
            <div class="row">
                <label class="form-label col fw-semibold">Nº Control
                    <input class="form-control" type="text" name="id" />
                </label>

                <label class="form-label col fw-semibold">Gerencia
                    <input class="form-control" name="id_gerencia" type="text">
                </label>
            </div>

            <div class="row">
                <label class="form-label col fw-semibold">Cedula solicitante
                    <input class="form-control" name="cedula_solicitante" type="text">
                </label>

                <label class="form-label col fw-semibold">Institución
                    <input class="form-control" name="id_institucion" type="text">
                </label>

                <label class="form-label col fw-semibold">Comunidad
                    <input class="form-control" name="id_comunidad" type="text">
                </label>
            </div>

            <div class="row">
                <label class="form-label col fw-semibold">Fecha
                    <input class="form-control" type="date" name="fecha" />
                </label>

                <label class="form-label col fw-semibold">Estado
                    <select class="form-select" name="estado">
                        <?php foreach ($estados as $d): ?>
                            <option value="<?php echo $d["id"] ?>">
                                <?php echo $d["nombre"] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </label>
            </div>

            <div class="modal-footer my-4">
                <button class="btn btn-warning px-5 py-2" type="submit">Generar reporte</button>
            </div>
        </form>
    </article>
</main>