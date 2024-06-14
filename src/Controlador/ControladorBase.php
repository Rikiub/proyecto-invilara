<?php

namespace Src\Controlador;

/** Encargado de cargar y enviar datos del modelo a la vista. */
class ControladorBase
{
    // Carpeta en donde se ubican las vistas.
    const DIR_VISTA = "src/Vista/";

    /** Carga una vista y sus datos.
     * 
     * Debe proporcionar el nombre de una vista EXISTENTE + Un array de variables. Por ejemplo, al usar en el controlador:
     * 
     * `$this->vista("/inicio-sesion", ["mi_dato" => "mi_valor"])`
     * 
     * Puede usar las variables en la vista de esta forma: `<?php echo $mi_dato; ?>`
     */
    protected function vista(string $vista, array $datos = [])
    {
        $vista = self::DIR_VISTA . "$vista.php";

        if (!is_file($vista)) {
            throw new \Exception("El archivo de vista $vista no existe.");
        }

        extract($datos);
        unset($datos);

        require_once self::DIR_VISTA . "componentes/header.php";
        require_once $vista;
    }
}
