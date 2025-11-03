<?php

require 'Cadenas.php';

class Fichero
{
    use Cadenas;

    public function __construct()
    {
        $l = $this->longitud("hola");
    }
}