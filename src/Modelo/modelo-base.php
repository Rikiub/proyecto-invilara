<?php

require_once "src/modelo/base-datos.php";

/** Encargado de manejar la base de datos y proporcionar datos al controlador.
 * 
 * - Contiene metodos para manejar CRUD's de base de datos sin necesidad de escribir consultas SQL.
 * - Al instanciarse, debe especificarse el nombre de la tabla a manipular en la base de datos.
 * 
 * `parent::__construct("nombre_tabla")`
 */
class ModeloBase
{
    protected \PDO $pdo;
    private string $tabla;

    protected function __construct($tabla)
    {
        $this->pdo = BaseDatos::obtenerConexion();
        $this->tabla = $tabla;
    }

    /** Inserta un dato dentro de la tabla.
     * Debe proporcionarse un array map como argumento para los datos.
     * 
     * Ejemplo:
     * `$modelo->insertar(["cedula" => "12400700, "contraseña" => "12345"])`
     */
    protected function sqlInsertar(array $datos): void
    {
        $campos = implode(', ', array_keys($datos));
        $valores = implode(', ', array_map(function ($valor) {
            return "'$valor'";
        }, array_values($datos)));

        $query = "INSERT INTO {$this->tabla} ($campos) VALUES ($valores)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
    }

    /** Extrae todos los datos de la tabla. */
    protected function sqlConsultar(): array
    {
        $query = "SELECT * FROM {$this->tabla}";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /** Actualizar un dato de la tabla.
     * 
     * - Si la columna y el valor NO ESTAN en la tabla, lanzara una excepción.
     * 
     * ADVERTENCIA: No funciona correctamente, no usar hasta arreglarse.
     */
    protected function sqlActualizar(string $columna, string $valor, array $datos): void
    {
        if (!$this->sqlObtenerFila($columna, $valor)) {
            throw new \Exception("No se ha podido actualizar. Columna $columna no existe o valor $valor no coincide en la base de datos.");
        }

        $campos_actualizados = [];
        foreach ($datos as $campo => $valor) {
            $campos_actualizados[] = "$campo = '$valor'";
        }
        $campos_actualizados = implode(', ', $campos_actualizados);

        $query = "UPDATE {$this->tabla} SET $campos_actualizados WHERE $columna = '$valor'";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
    }

    /** Elimina un dato segun la columna y valor especificado y los buscara en la tabla.
     * 
     * - Si la columna y el valor NO ESTAN en la tabla, lanzara una excepción.
     */
    protected function sqlEliminar(string $columna, string $valor): void
    {
        if (!$this->sqlObtenerFila($columna, $valor)) {
            throw new \Exception("No se ha podido eliminar. Columna $columna no existe o valor $valor no coincide en la base de datos.");
        }

        $sql = "DELETE FROM {$this->tabla} WHERE {$columna} = '{$valor}'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
    }

    /** Obtener una fila especifica en la tabla segun su columa y valor. 
     * 
     * Si no se encuentran los datos en la tabla, el `array` estara vacio.`
     */
    protected function sqlObtenerFila(string $columna, string $valor): array
    {
        $query = "SELECT * FROM {$this->tabla} WHERE {$columna} = '{$valor}'";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}