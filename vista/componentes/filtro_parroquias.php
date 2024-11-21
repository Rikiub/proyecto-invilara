<div class="row">
    <label class="form-label col fw-semibold">Municipio
        <select class="form-select input-group-text" id="municipio_select">
            <?php foreach ($municipios as $d): ?>
                <option value=<?php echo $d["id"] ?>>
                    <?php echo $d["nombre"] ?>
                </option>
            <?php endforeach ?>
        </select>
    </label>

    <label class="form-label col fw-semibold">Parroquia
        <select class="form-select" id="parroquia_select" name="id_parroquia"></select>
    </label>

    <script type="module" src="recursos/js/filtro_parroquias.js"></script>
</div>