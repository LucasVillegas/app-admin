<?php
require_once "../helpers/herlpers.php";
require_once "../core/conexion.php";
require_once "../models/Unidad.php"
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
        $nombre_unidad = $this->helpers->limpiar_cadena($_POST['nombre_unidad']);
        $descripcion = $this->helpers->limpiar_cadena($_POST['descripcion']);

    }
}