<?php include "src/vista/componentes/navbar.php"; ?>

<article class="card mx-auto m-5" style="width: 25rem;">
    <div class="card-body">
        <h1 class="text-center py-4">Registro</h1>

        <form class="px-5" method="POST">
            <div class="form-group">
                <label class="form-label" for="cedula">Cedula</label>
                <input class="form-control" type="text" name="cedula" id="cedula" />
            </div>

            <br>

            <div class="form-group">
                <label class="form-label" for="contrasena">Contraseña</label>
                <input class="form-control" type="text" name="contrasena" id="contrasena" />
            </div>

            <input class="btn btn-primary my-4" type="submit" value="Enviar" />
        </form>
    </div>
</article>