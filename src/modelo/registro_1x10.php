<?php

require_once "src/modelo/modelo-base.php";

class Registro1x10 extends ModeloBase
{
    private $tabla = "registro_1x10";

    public function obtenerTodos()
    {
        $sql = "SELECT * FROM {$this->tabla}";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertar()
    {

    }

    public function actualizar()
    {

    }

    public function eliminar()
    {

    }
}