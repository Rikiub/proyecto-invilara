<?php

/** Controlador Base
 * Se encarga de cargar y enviar datos a la vista.
 */
class Controlador
{
    protected function render($vista, $datos = [])
    {
        require_once "src/vista/componentes/base.php";

        extract($datos);

        require_once "src/vista/$vista.php";
    }
}
