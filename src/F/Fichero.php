<?php
namespace App\F;


class Fichero
{
    use \App\Utilidades\Cadenas;

    public function __construct()
    {
        $l = $this->longitud("hola");
    }
}