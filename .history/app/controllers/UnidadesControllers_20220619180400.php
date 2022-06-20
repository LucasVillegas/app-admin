<?php
require_once "../helpers/herlpers.php";
require_once "../core/conexion.php";
require_once "../models/Unidad.php";

class CategoriaControllers
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

    public function agregar_unidad()
    {
        $nombre_unidad = $this->helpers->limpiar_cadena($_POST['nombre_unidad']);
        $descripcion = $this->helpers->limpiar_cadena($_POST['descripcion']);
        $datos = [
            "nombre_unidad" => $nombre_unidad,
            "descripcion_unidad" => $descripcion,
            "estado_unidad" => 1,
            "fecha_creacion" => date("Y-m-d"),
        ];
        $guardar = $modelo->addunidad($datos);
        $respuesta = 0;
        if ($guardar->rowCount() >= 1) {
            $respuesta++;
        }
        echo json_encode($respuesta);
    }
}