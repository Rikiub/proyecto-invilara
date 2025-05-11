<?php require_once "vista/componentes/encabezado.php"; ?>
<?php require_once "vista/componentes/barra.php"; ?>

<main>
    <div>
        <figure id="carousel" class="carousel slide w-50 mx-auto">
            <div class="carousel-inner ratio ratio-16x9">
                <div class="carousel-item active">
                    <img src="recursos/img/fondo.jpg" class="d-block w-100" alt="Entrada">
                </div>

                <div class="carousel-item">
                    <img src="recursos/img/fondo2.jpg" class="d-block w-100" alt="Salida">
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </figure>

        <div class="text-center py-5">
            <h3>INVILARA: Atención al ciudadano</h3>

            <br>

            <button class="btn btn-info rounded-pill fw-bolder px-4" data-bs-toggle="modal"
                data-bs-target="#modal">Acerca de</button>
        </div>
    </div>
</main>

<div class="modal modal-md fade" id="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h5 id="modal-title" class="modal-title">Creditos | Desarrolladores</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="row gap-2">
                    <div class="col card p-2 text-center rounded-pill">Jesús Viloria</div>
                    <div class="col card p-2 text-center rounded-pill">Freider Guedez</div>
                    <div class="col card p-2 text-center rounded-pill">Gabriel Mujica</div>
                </div>
            </div>

            <div class="modal-footer">
                <div class="me-auto text-muted">
                    <span>— SIGSAC</span>
                    <br>
                    <span>© 2025 INVILARA. Todos los derechos reservados</span>
                </div>
            </div>
        </div>
    </div>
</div>