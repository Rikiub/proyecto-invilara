<?php

class Usuario
{
    private $cedula;
    private $contraseña;

    public function __construct($cedula, $contraseña)
    {
        $this->cedula = $cedula;
        $this->contraseña = $contraseña;
    }

    // Getter
    public function get_cedula($valor)
    {
        return $this->cedula;
    }
    public function get_contraseña($valor)
    {
        return $this->contraseña;
    }
}