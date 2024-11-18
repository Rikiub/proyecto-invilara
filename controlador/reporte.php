<?php

require_once "librerias/dompdf/autoload.inc.php";
use Dompdf\Dompdf;

require_once "modelo/solicitud.php";
$modelo = new Solicitud();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Iniciar creacion
    $dompdf = new Dompdf();

    $datos = $modelo->consultarFiltrado(
        $_POST["id"],
        $_POST['gerencia'],
        $_POST['cedula_solicitante'],
        $_POST['institucion'],
        $_POST['comunidad'],
        $_POST['fecha_inicio'],
        $_POST["fecha_fin"],
        null
    );

    // Generar HTML
    ob_start();
    require_once "vista/componentes/encabezado_dompdf.php";
    require_once "vista/componentes/tabla_solicitud.php";
    $html = ob_get_clean();

    // Generar PDF
    $dompdf->loadHtml($html);
    $dompdf->setPaper("A4", "landscape");
    $dompdf->render();
    $dompdf->stream("reporte_invilara.pdf", array("Attachment" => 0));
} else {
    // Datos
    require_once "modelo/gerencia.php";
    $m = new Gerencia();

    $gerencias = $m->consultar();

    require_once "modelo/institucion.php";
    $m = new Institucion();

    $instituciones = $m->consultar();

    require_once "modelo/solicitante.php";
    $m = new Solicitante();

    $solicitantes = $m->consultar();

    require_once "modelo/comunidad.php";
    $m = new Comunidad();

    $comunidades = $m->consultar();

    require_once "modelo/parroquia.php";
    $m = new Parroquia();

    $parroquias = $m->consultar();

    // Datos principales
    $datos = $modelo->consultar();
    $estados = $modelo->consultarEstados();

    require_once "vista/reporte.php";
}

?>