<?php

namespace Src\Modelo;

/** Modelo Base
 * Se encarga de darle forma a los datos y proporcionarlos al controlador.
 * Contiene metodos para manejar un CRUD de una base de datos sin necesidad de escribir consultas SQL.
 */
class ModeloBase
{
    private \PDO $pdo;
    private string $tabla;

    protected function __construct($tabla)
    {
        $this->pdo = BaseDatos::obtenerConexion();
        $this->tabla = $tabla;
    }

    protected function consultar(): array
    {
        $query = "SELECT * FROM {$this->tabla}";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    protected function insertar(array $datos): void
    {
        $campos = implode(', ', array_keys($datos));
        $valores = implode(', ', array_map(function ($valor) {
            return "'$valor'";
        }, array_values($datos)));

        $query = "INSERT INTO {$this->tabla} ($campos) VALUES ($valores)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
    }

    protected function eliminar(string $columna, string $valor): bool
    {
        if ($this->obtenerFila($columna, $valor)) {
            $sql = "DELETE FROM {$this->tabla} WHERE {$columna} = ?";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([$valor]);
        } else {
            return false;
        }
    }

    protected function obtenerFila(string $columna, string $valor): array
    {
        $query = "SELECT * FROM {$this->tabla} WHERE {$columna} = ?";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$valor]);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}