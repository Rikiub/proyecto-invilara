<?php

/** Controlador principal.
 * No puede ser instanciado independientemente.
 * Debe ser heredado por una clase con `extends`.
 */
abstract class Controlador
{
    protected function render($vista, $datos = [])
    {
        require_once "src/vista/componentes/base.php";

        extract($datos);

        require_once "src/vista/$vista.php";
    }
}
