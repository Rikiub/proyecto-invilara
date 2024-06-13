<?php

namespace Src;

class Router
{
    protected $rutas = [];

    public function agregarRuta(string $uri, $controlador, string $accion)
    {
        $this->rutas[$uri] = [
            "controlador" => $controlador,
            "accion" => $accion,
        ];
    }

    public function despachar()
    {
        // Obtener la URL actual.
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if (array_key_exists($uri, $this->rutas)) {
            // Procesar si la ruta existe.
            $ruta = $this->rutas[$uri];

            $controlador = $ruta["controlador"];
            $accion = $ruta["accion"];

            $controlador = new $controlador();
            $controlador->$accion();
        } else {
            // Error si la ruta no existe.
            http_response_code(404);
            echo "Ruta no encontrada en: $uri";
            exit;
        }
    }
}
