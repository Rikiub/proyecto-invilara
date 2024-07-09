<?php include "vista/componentes/encabezado.php"; ?>
<?php include "vista/componentes/barra.php"; ?>

<article class="container card w-25">
    <div class="card-body">
        <h3 class=" text-center py-4">Inicio de sesion</h3>

        <form method="post">
            <?php if (isset($error)): ?>
                <div class="py-2 text-danger text-center">
                    <p1><?php echo $error; ?></p1>
                </div>
            <?php endif ?>

            <div class="row">
                <label class="form-label">Cedula
                    <input class="form-control" type="number" name="cedula" required>
                </label>
            </div>

            <div class="row">
                <label class="form-label">Contraseña
                    <input class="form-control" type="password" name="contrasena" required />
                </label>
            </div>

            <hr>

            <div class="row">
                <button class="btn btn-primary" type="submit">Iniciar sesión</button>
            </div>
        </form>
    </div>
</article>