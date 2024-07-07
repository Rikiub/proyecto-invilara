<?php require_once "vista/componentes/encabezado.php"; ?>
<?php require_once "vista/componentes/barra.php"; ?>

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

<h3 class="text-center py-5">INVILARA: Atención al ciudadano</h3>