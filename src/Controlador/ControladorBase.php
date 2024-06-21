<?php

/** Encargado de cargar y enviar datos del modelo a la vista. */
class ControladorBase
{
    /** Carga una vista y sus datos.
     * 
     * Debe proporcionar el nombre de una vista EXISTENTE + Un array de sus variables. Por ejemplo, al usar en el controlador:
     * 
     * `$this->vista("/inicio-sesion", ["mi_dato" => "mi_valor"])`
     * 
     * Puede usar las variables en la vista de esta forma: `<?php echo $mi_dato; ?>`
     */
    protected function vista(string $vista, array $datos = [])
    {
        $vista = "src/Vista/" . "$vista.php";

        if (!is_file($vista)) {
            throw new \Exception("El archivo de vista $vista no existe.");
        }

        extract($datos);
        unset($datos);

        require_once "src/Vista/" . "componentes/header.php";
        require_once $vista;
    }
}
