<?php
require_once "../helpers/herlpers.php";
require_once "../core/conexion.php";
require_once "../models/Unidad.php";

class ProductosControllers
{
    public $helpers;
    public $conexion;
    public $modelo;
    public function __construct()
    {
        $this->helpers =  new helpers();
        $this->conexion =  new conexion();
        $this->modelo = new Unidad();
    }

public function listar?productos()
{
    # code...
}

}