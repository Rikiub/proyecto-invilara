<?php

namespace Src\Controlador;

use Src\Config;

/** Controlador Base
 * Se encarga de cargar y enviar datos a la vista.
 */
class ControladorBase
{
    protected function render($vista, $datos = [])
    {
        require_once Config::DIR_VISTA . "componentes/header.php";

        extract($datos);

        require_once Config::DIR_VISTA . "$vista.php";
    }
}
