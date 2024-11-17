<nav class="navbar fixed-top inv-gradient">
    <div class="container-fluid mx-2">
        <?php if ($rol == "1" || $rol == "2"): ?>
            <button class="navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#barra-lateral">
                <span class="navbar-toggler-icon"></span>
            </button>

            <aside class="offcanvas offcanvas-start inv-gradient" tabindex="-1" id="barra-lateral">
                <header class="offcanvas-header">
                    <h5 class="offcanvas-title">Menu</h5>
                    <button class="btn-close" data-bs-dismiss="offcanvas"></button>
                </header>

                <div class="offcanvas-body">
                    <article class="list-group">
                        <a class="list-group-item list-group-item-action bg-body-tertiary" href="?pagina=principal">
                            Inicio
                        </a>

                        <a class="list-group-item list-group-item-action bg-body-tertiary" href="?pagina=salir">
                            Cerrar sesión
                        </a>
                    </article>

                    <?php if ($rol == "2"): ?>
                        <hr>

                        <article class="list-group">
                            <a class="list-group-item list-group-item-action bg-body-tertiary" href="?pagina=usuario">
                                Administrar usuarios
                            </a>
                        </article>
                    <?php endif ?>

                    <hr>

                    <article class="list-group">
                        <a class="list-group-item list-group-item-action bg-body-tertiary" href="?pagina=municipio">
                            Municipios
                        </a>

                        <a class="list-group-item list-group-item-action bg-body-tertiary" href="?pagina=parroquia">
                            Parroquias
                        </a>

                        <a class="list-group-item list-group-item-action bg-body-tertiary" href="?pagina=solicitante">
                            Solicitantes
                        </a>

                        <a class="list-group-item list-group-item-action bg-body-tertiary" href="?pagina=comunidad">
                            Comunidades
                        </a>

                        <a class="list-group-item list-group-item-action bg-body-tertiary" href="?pagina=institucion">
                            Instituciones
                        </a>

                        <a class="list-group-item list-group-item-action bg-body-tertiary" href="?pagina=gerencia">
                            Gerencias
                        </a>

                        <a class="list-group-item list-group-item-action bg-body-tertiary" href="?pagina=gerente">
                            Gerentes
                        </a>

                        <a class="list-group-item list-group-item-action bg-body-tertiary" href="?pagina=director">
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
                                <a class="list-group-item list-group-item-action bg-body-tertiary"
                                    href="?pagina=solicitud&vista=programado">
                                    Solicitudes Programadas
                                </a>

                                <a class="list-group-item list-group-item-action bg-body-tertiary"
                                    href="?pagina=solicitud&vista=ejecucion">
                                    Solicitudes Asignadas
                                </a>

                                <a class="list-group-item list-group-item-action bg-body-tertiary"
                                    href="?pagina=solicitud&vista=cerrado">
                                    Solicitudes Cerradas
                                </a>

                                <a class="list-group-item list-group-item-action bg-body-tertiary"
                                    href="?pagina=solicitud&vista=reporte">
                                    Reporte
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