<!--
Aca haran las redirecciones. No muevan la estructura, solo vean la etiqueta <a> y vean el "href".
Asignen la dirección de su controlador con "?pagina=<nombre_controlador>"
-->

<nav class="navbar navbar-dark navbar-gradient mb-5 container-fluid">
    <div class="container-fluid">
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu-navbar" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>

        <label class="navbar-brand">
            INVILARA
            <img src="recursos/img/invilara-logo.png" width="30px">
        </label>

        <div class="collapse navbar-collapse" id="menu-navbar">
            <ul class="navbar-nav">
                <!-- Dropdown -->
                <li><a class="nav-link" href="?pagina=registro_solicitante">Gestionar Solicitante</a></li>
                <li><a class="nav-link " href="?pagina=#">Gestionar Solicitudes</a></li>
                <li><a class="nav-link" href="?pagina=#">Gestionar 1x10</a></li>
                <li>
                    <a class="nav-link" href="?pagina=registro_institucional">Gestionar solicitudes Institucionales</a>
                </li>
                <li><a class="nav-link" href="?pagina=#">Gestionar Institucionales (Directores)</a></li>
                <li><a class="nav-link" href="?pagina=usuarios">Usuarios</a></li>
            </ul>
        </div>
    </div>
</nav>