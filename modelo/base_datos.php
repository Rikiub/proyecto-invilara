<?php

class BaseDatos
{
    private $host = "localhost";
    private $dbname = "invilara";
    private $usuario = "root";
    private $contrasena = "";

    public function conexion()
    {
        $dsn = "mysql" . ":" . "host=" . $this->host . ";" . "dbname=" . $this->dbname . ";";
        $pdo = new PDO($dsn, $this->usuario, $this->contrasena);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}

?>