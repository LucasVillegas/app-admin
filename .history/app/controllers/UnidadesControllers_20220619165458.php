<?php
require_once "../helpers/herlpers.php";
require_once "../core/conexion.php";
class CategoriaControllers
{
    public $helpers;
    public $conexion;
    public function __construct()
    {
        $this->helpers =  new helpers();
        $this->conexion =  new conexion();
    }

    public function agregar_unidad()
    {
        # code...
    }
}