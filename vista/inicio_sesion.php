<?php include "vista/componentes/encabezado.php"; ?>

<article class="card mx-auto m-5" style="width: 25rem;">
    <div class="card-body px-5">
        <h1 class="text-center py-4">Inicio de sesion</h1>

        <form method="POST" id="form-inicio">
            <?php if (isset($error)): ?>
                <div class="py-2 text-danger text-center">
                    <p1><?php echo $error; ?></p1>
                </div>
            <?php endif ?>

            <div class="form-group">
                <label class="form-label" for="cedula">Cedula</label>
                <input class="form-control" type="number" name="cedula" id="cedula" required>
            </div>

            <br>

            <div class="form-group">
                <label class="form-label" for="contraseña">Contraseña</label>
                <input class="form-control" type="password" name="contraseña" id="contraseña" required />
            </div>
        </form>

        <div class="my-4 d-flex justify-content-between">
            <button class="btn btn-secondary" type="submit" form="form-inicio">Iniciar Sesion</button>
            <a class="btn btn-secondary" type="button" href="?pagina=registro">Registrarse</a>
        </div>
    </div>
</article>