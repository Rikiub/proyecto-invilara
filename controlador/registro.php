<?php

require_once "modelo/usuarios.php";

$modelo = new Usuario();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula = $_POST["cedula"];
    $contraseña = $_POST["contrasena"];

    if ($modelo->obtenerUno($cedula)) {
        $res["mensaje"] = "El usuario ya existe";
    } elseif (!$contraseña) {
        $res["mensaje"] = "Debe proporcionar una contraseña.";
    }

    if (isset($res["mensaje"])) {
        $error = $res["mensaje"];
    } else {
        $modelo->insertar($cedula, $contraseña);

        header("Location: ?pagina=principal");
        exit;
    }
}

require_once "vista/registro.php";

?>