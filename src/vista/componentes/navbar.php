<aside class="bg-light p-1 mb-5">
    <div class="mx-3">
        <button class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#barra">
            <h3 class="bi bi-list"></h3>
        </button>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="barra">
            <div class="offcanvas-header">
                <h1 class="offcanvas-title">Menú</h1>
                <button class="btn-close" data-bs-dismiss="offcanvas"></button>
            </div>

            <div class="offcanvas-body accordion">
                <div class="accordion-item accordion-no-icon">
                    <a href="?ruta=/inicio-sesion" class="text-decoration-none">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed">
                                Inicio
                            </button>
                        </h2>
                    </a>
                </div>

                <div class="accordion-item accordion-no-icon">
                    <h2 class="accordion-header">
                        <a href="?ruta=/usuarios" class="text-decoration-none">
                            <button class="accordion-button collapsed">
                                Usuarios
                            </button>
                        </a>
                    </h2>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" data-bs-toggle="collapse"
                            data-bs-target="#barra-solicitudes">
                            Solicitudes
                        </button>
                    </h2>

                    <div id="barra-solicitudes" class="accordion-collapse collapse">
                        <ul class="list-group">
                            <li class="list-group-item hover-effect">
                                <a href="?ruta=/solicitudes/general" class="text-decoration-none">
                                    Registro general
                                </a>
                            </li>

                            <li class="list-group-item hover-effect">
                                <a href="?ruta=/solicitudes/1x10" class="text-decoration-none">
                                    Registro 1x10
                                </a>
                            </li>

                            <li class="list-group-item hover-effect">
                                <a href="?ruta=/solicitudes/institucional" class="text-decoration-none">
                                    Registro institucional
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</aside>