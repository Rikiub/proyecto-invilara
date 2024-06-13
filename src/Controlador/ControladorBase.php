<?php

namespace Src\Controlador;

/** Controlador Base
 * Se encarga de cargar y enviar datos a la vista.
 */
class ControladorBase
{
    // Carpeta en donde se guardan las vistas.
    const DIR_VISTA = "src/Vista/";

    protected function render($vista, $datos = [])
    {
        extract($datos);
        unset($datos);

        require_once self::DIR_VISTA . "componentes/header.php";
        require_once self::DIR_VISTA . "$vista.php";
    }
}
