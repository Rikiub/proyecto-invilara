<!--
Vean la etiqueta <a> y noten el atributo el "href".
A la hora de agregar nuevas paginas, asignen la dirección de su controlador con "?pagina=<nombre_controlador>"
-->

<nav data-bs-theme="dark" class="navbar fixed-top inv-gradient">
    <div class="container-fluid mx-2">
        <?php if ($rol == "usuario"): ?>
            <button class="navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#barra-lateral">
                <span class="navbar-toggler-icon"></span>
            </button>

            <aside class="offcanvas offcanvas-start inv-gradient" tabindex="-1" id="barra-lateral">
                <header class="offcanvas-header">
                    <h5 class="offcanvas-title">Menu</h5>
                    <button class="btn-close" data-bs-dismiss="offcanvas"></button>
                </header>

                <div data-bs-theme="light" class="offcanvas-body">
                    <article class="list-group">
                        <a class="list-group-item list-group-item-action" href="?pagina=principal">
                            Inicio
                        </a>

                        <a class="list-group-item list-group-item-action" href="?pagina=salir">
                            Cerrar sesión
                        </a>
                    </article>

                    <hr>

                    <article class="list-group">
                        <a class="list-group-item list-group-item-action" href="?pagina=municipio">
                            Municipios
                        </a>

                        <a class="list-group-item list-group-item-action" href="?pagina=parroquia">
                            Parroquias
                        </a>

                        <a class="list-group-item list-group-item-action" href="?pagina=solicitante">
                            Solicitantes
                        </a>

                        <a class="list-group-item list-group-item-action" href="?pagina=comunidad">
                            Comunidades
                        </a>

                        <a class="list-group-item list-group-item-action" href="?pagina=institucion">
                            Instituciones
                        </a>

                        <a class="list-group-item list-group-item-action" href="?pagina=gerencia">
                            Gerencias
                        </a>

                        <a class="list-group-item list-group-item-action" href="?pagina=gerente">
                            Gerentes
                        </a>

                        <a class="list-group-item list-group-item-action" href="?pagina=director">
                            Directores
                        </a>
                    </article>

                    <hr>

                    <article class="list-group">
                        <button data-bs-toggle="collapse" data-bs-target="#solicitudes"
                            class="list-group-item list-group-item-action active text-center fs-5">
                            Solicitudes
                        </button>

                        <section class="collapse" id="solicitudes">
                            <div class="list-group list-group-flush">
                                <a class="list-group-item list-group-item-action" href="?pagina=solicitud">
                                    Generales
                                </a>
                            </div>
                        </section>
                    </article>
                </div>
            </aside>
        <?php else: ?>
            <a class="btn btn-primary" href="?pagina=inicio_sesion">Iniciar Sesión</a>
        <?php endif ?>

        <div class="navbar-brand">
            INVILARA
            <img src="recursos/img/invilara-logo.png" alt="Logo" class="mx-2" width="30px">
        </div>
    </div>
</nav>

<div style="margin: 100px;"></div>