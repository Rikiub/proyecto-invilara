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
            $dsn = "mysql:host=.DB_HOST.;dbname=.DB_NAME.;";
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

class DatosSQL
{
    private PDO $pdo;
    private string $tabla;

    public function __construct($tabla)
    {
        $this->pdo = BaseDatos::obtenerConexion();
        $this->tabla = $tabla;
    }

    public function consultar($condicion = ""): array
    {
        $query = "SELECT * FROM {$this->tabla}";
        if ($condicion) {
            $query .= " WHERE $condicion";
        }
        $result = $this->pdo->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertar($datos)
    {
        $columnas = implode(', ', array_keys($datos));
        $valores = implode(', ', array_map(function ($valor) {
            return "'$valor'";
        }, array_values($datos)));

        $query = "INSERT INTO {$this->tabla} ($columnas) VALUES ($valores)";
        $this->pdo->exec($query);
    }
}