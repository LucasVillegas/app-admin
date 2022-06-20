<?php
session_start(['name' => 'DISTRI']);
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

    public function agregar_categoria()
    {
        $categoria = $this->helpers->limpiar_cadena($_POST['categoria']);
        $consulta = $this->conexion->ejecutar_consulta_simple("SELECT nit FROM clientes WHERE nit='$identificacion'");
    }
}