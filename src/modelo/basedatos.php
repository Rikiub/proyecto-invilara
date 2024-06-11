<?php

require_once "src/config.php";

/** Conexión y ayudante de base de datos.
 * Para obtener una instancia utilice:
 * 
 * > `BaseDatos::obtenerConexion`
 */
class BaseDatos
{
    private static PDO|null $pdo = null;

    public static function obtenerConexion(): PDO
    {
        # Si no ha sido inicializado, creara una nueva instancia y la almacenara para su posterior uso.
        if (!self::$pdo) {
            $dsn = "mysql:" . "host=" . DB_HOST . ";" . "dbname=" . DB_NAME . ";";
            self::$pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return self::$pdo;
    }

    public static function cerrarConexion()
    {
        self::$pdo = null;
    }
}
