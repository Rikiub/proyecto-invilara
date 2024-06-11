<?php

class Solicitud
{
    protected $nombre;
    protected $telefono;
    protected $comunidad;

    // Setters
    public function set_nombre($valor)
    {
        $this->nombre = $valor;
    }
    public function set_telefono($valor)
    {
        $this->telefono = $valor;
    }
}
