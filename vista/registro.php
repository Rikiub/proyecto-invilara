<?php include "vista/componentes/encabezado.php"; ?>

<article class="card mx-auto m-5" style="width: 25rem;">
    <div class="card-body">
        <h1 class="text-center py-4">Registro</h1>

        <form class="px-5 row" method="post">
            <?php if (isset($error)): ?>
                <div class="py-2 text-danger text-center">
                    <p1><?php echo $error; ?></p1>
                </div>
            <?php endif ?>

            <label class="form-label">
                Cedula
                <input class="form-control" type="number" name="cedula" required />
            </label>

            <label class="form-label">
                Contraseña
                <input class="form-control" type="password" name="contrasena" required />
            </label>


            <input class="btn btn-primary my-4" type="submit" value="Enviar" />
        </form>
    </div>
</article>