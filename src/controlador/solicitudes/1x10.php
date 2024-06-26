<?php

require_once "src/modelo/registro_1x10.php";

$modelo = new Registro1x10();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

}

// Cargar vista
$datos = $modelo->obtenerTodos();
require_once "src/vista/solicitudes/1x10.php";