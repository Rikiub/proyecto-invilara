<?php

require_once "src/modelo/basedatos.php";

/** Modelo Base
 *  Se encarga de darle forma a los datos y proporcionarlos al controlador.
 */
class Modelo
{
    private PDO $pdo;
    private string $tabla;

    protected function __construct($tabla)
    {
        $this->pdo = BaseDatos::obtenerConexion();
        $this->tabla = $tabla;
    }

    protected function consultar($condicion = ""): array
    {
        $query = "SELECT * FROM {$this->tabla}";
        if ($condicion) {
            $query .= " WHERE $condicion";
        }
        $result = $this->pdo->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function insertar(array $datos)
    {
        $campos = implode(', ', array_keys($datos));
        $valores = implode(', ', array_map(function ($valor) {
            return "'$valor'";
        }, array_values($datos)));

        $query = "INSERT INTO {$this->tabla} ($campos) VALUES ($valores)";
        $this->pdo->exec($query);
    }

    protected function filaExiste(string $columna, string $valor): bool
    {
        $query = "SELECT {$columna} FROM {$this->tabla} WHERE {$columna} = :valor";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([":valor" => $valor]);

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}