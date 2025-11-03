<?php
namespace F;
require 'Cadenas.php';

class Fichero
{
    use \Utilidades\Cadenas;

    public function __construct()
    {
        $l = $this->longitud("hola");
    }
}