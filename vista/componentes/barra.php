<!--
Vean la etiqueta <a> y noten el atributo el "href".
A la hora de agregar nuevas paginas, asignen la dirección de su controlador con "?pagina=<nombre_controlador>"
-->

<nav data-bs-theme="dark" class="navbar fixed-top inv-gradient">
    <div class="container-fluid mx-2">
        <?php if (isset($barra_simple)): ?>
            <div></div>
        <?php else: ?>
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

                        <a class="list-group-item list-group-item-action" href="?pagina=inicio_sesion">
                            Cerrar sesión
                        </a>
                    </article>

                    <hr>

                    <article class="list-group">
                        <a class="list-group-item list-group-item-action" href="?pagina=parroquia">
                            Parroquias
                        </a>

                        <a class="list-group-item list-group-item-action" href="?pagina=ciudadano">
                            Ciudadanos
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
                    </article>

                    <hr>

                    <article class="list-group">
                        <button data-bs-toggle="collapse" data-bs-target="#solicitudes"
                            class="list-group-item list-group-item-action active text-center fs-5">
                            Solicitudes
                        </button>

                        <section class="collapse" id="solicitudes">
                            <div class="list-group list-group-flush">
                                <a class="list-group-item list-group-item-action" href="?pagina=solicitud_1x10">
                                    1x10
                                </a>

                                <a class="list-group-item list-group-item-action" href="?pagina=solicitud_general">
                                    Generales
                                </a>

                                <a class="list-group-item list-group-item-action" href="?pagina=solicitud_institucional">
                                    Institucionales
                                </a>
                            </div>
                        </section>
                    </article>
                </div>
            </aside>
        <?php endif ?>

        <label class="navbar-brand">
            INVILARA
            <img src="recursos/img/invilara-logo.png" alt="Logo" class="mx-2" width="30px">
        </label>
    </div>
</nav>

<div style="margin: 100px;"></div>