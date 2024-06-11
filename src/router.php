<?php

class Router
{
    protected $rutas = [];

    public function agregarRuta(string $uri, array|callable $accion)
    {
        $this->rutas[$uri] = $accion;
    }

    public function redirigir(string $uri, string $destino)
    {
        $this->validar_ruta($destino);
        $this->rutas[$uri] = $this->rutas[$destino];
    }

    public function despachar()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        $this->validar_ruta($uri);
        $callback = $this->rutas[$uri];

        if (is_array($callback)) {
            $controlador = reset($callback);
            $accion = next($callback);

            $controlador = new $controlador();
            $controlador->$accion();
        } elseif (is_callable($callback)) {
            call_user_func($callback);
        } else {
            throw new Exception("Argumentos invalidos.");
        }
    }

    protected function validar_ruta($uri)
    {
        if (!array_key_exists($uri, $this->rutas)) {
            http_response_code(404);
            echo "Ruta no encontrada en: $uri";
            exit;
        }
    }
}
