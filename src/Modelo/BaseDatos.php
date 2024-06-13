<?php

namespace Src\Modelo;

use Src\Config;

/** Conexión a base de datos.
 * Es empleado por el `ModeloBase` y no deberia utilizarse directamente.
 */
class BaseDatos
{
    private static \PDO|null $pdo = null;

    public static function obtenerConexion(): \PDO
    {
        # Si no ha sido inicializado, creara una nueva instancia y la almacenara para su posterior uso.
        if (!self::$pdo) {
            $dsn = "mysql:" . "host=" . Config::BD_HOST . ";" . "dbname=" . Config::BD_NAME . ";";
            self::$pdo = new \PDO($dsn, Config::BD_USERNAME, Config::BD_PASSWORD);
            self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }

        return self::$pdo;
    }

    public static function cerrarConexion()
    {
        self::$pdo = null;
    }
}
