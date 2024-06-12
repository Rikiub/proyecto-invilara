<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">INVILARA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <?php if (isset($_SESSION["usuario"])): ?>
                        <a class="nav-item nav-link active" href="/login?cerrar=true">Cerrar sesión</a>
                    <?php else: ?>
                        <a class="nav-item nav-link active" href="/login">Iniciar sesión</a>
                    <?php endif ?>
                </li>
            </ul>
        </div>
    </div>
</nav>