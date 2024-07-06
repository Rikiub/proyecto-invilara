<!--
Aca haran las redirecciones. No muevan la estructura, solo vean la etiqueta <a> y vean el "href".
Asignen la dirección de su controlador con "?pagina=<nombre_controlador>"
-->

<nav data-bs-theme="dark" class="navbar mb-5 inv-gradient">
    <div class="container-fluid mx-2">
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu-navbar" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>

        <label class="navbar-brand">
            INVILARA
            <img src="recursos/img/invilara-logo.png" alt="Logo" class="mx-2" width="30px">
        </label>

        <div class="collapse navbar-collapse fw-bold" id="menu-navbar">
            <div class="navbar-nav my-3">
                <a class="nav-link" href="?pagina=inicio_sesion">Cerrar sesión</a>
                <a class="nav-link" href="?pagina=principal">Volver a principal</a>

                <hr class="border border-white">

                <a class="nav-link" href="?pagina=ciudadano">Gestionar Ciudadanos</a>
				<a class="nav-link" href="?pagina=gerencia">Gestionar Gerencias</a>

                <hr class="border border-white">

				<a class="nav-link" href="?pagina=#">Gestionar Solicitudes 1x10</a>
                <a class="nav-link" href="?pagina=#">Gestionar Solicitudes Generales</a>

                <a class="nav-link" href="?pagina=registro_institucional">Gestionar Solicitudes Institucionales</a>

                <hr class="border border-white">

                <a class="nav-link" href="?pagina=usuarios">Gestionar Usuarios</a>
            </div>
        </div>
    </div>
</nav>