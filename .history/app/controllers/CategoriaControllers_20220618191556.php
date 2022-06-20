<?php
session_start(['name' => 'DISTRI']);
require_once "../helpers/herlpers.php";
require_once "../core/conexion.php";
require_once "../Models/ClientesModels.php";
class CategoriaControllers
{
    public $helpers;
    public $conexion;
    public $modelo;
    public function __construct()
    {
        $this->helpers =  new helpers();
        $this->conexion =  new conexion();
        $this->modelo =  new Clientes();
    }
}