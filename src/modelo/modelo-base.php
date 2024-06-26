<?php

require_once "src/modelo/base-datos.php";

/** Encargado de manejar la base de datos y proporcionar datos al controlador.
 * Debe heredarse en todos los modelos con `extends` y usar su atributo `$this->pdo` para ejecutar consultas SQL.
 */
class ModeloBase
{
    protected \PDO $pdo;

    public function __construct()
    {
        $this->pdo = BaseDatos::obtenerConexion();
    }
}