<?php

require_once "src/config.php";

/** Conexión a base de datos.
 */
class BaseDatos
{
    private static PDO|null $pdo = null;

    public static function obtenerConexion(): PDO
    {
        # Si no ha sido inicializado, creara una nueva instancia y la almacenara para su posterior uso.
        if (!self::$pdo) {
            $dsn = "mysql:" . "host=" . Config::DB_HOST . ";" . "dbname=" . Config::DB_NAME . ";";
            self::$pdo = new PDO($dsn, Config::DB_USERNAME, Config::DB_PASSWORD);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return self::$pdo;
    }

    public static function cerrarConexion()
    {
        self::$pdo = null;
    }
}
