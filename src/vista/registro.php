<?php include "src/vista/componentes/navbar.php"; ?>

<article class="card mx-auto m-5" style="width: 25rem;">
    <div class="card-body">
        <h1 class="text-center py-4">Registro</h1>

        <form class="px-5" method="POST">
            <?php if (isset($error)): ?>
                <div class="py-2 text-danger text-center">
                    <p1><?php echo $error; ?></p1>
                </div>
            <?php endif ?>

            <div class="form-group">
                <label class="form-label" for="cedula">Cedula</label>
                <input class="form-control" type="number" name="cedula" id="cedula" required />
            </div>

            <br>

            <div class="form-group">
                <label class="form-label" for="contrasena">Contraseña</label>
                <input class="form-control" type="password" name="contraseña" id="contraseña" required />
            </div>

            <input class="btn btn-primary my-4" type="submit" value="Enviar" />
        </form>
    </div>
</article>