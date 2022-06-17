<?php
session_start(['name' => 'DISTRI']);
require_once "../helpers/herlpers.php";
require_once "../core/conexion.php";
require_once "../Models/Ruta.php";
class RutasControllers
{
    public $helpers;
    public $conexion;
    public $modelo;
    public function __construct()
    {
        $this->helpers =  new helpers();
        $this->conexion =  new conexion();
        $this->modelo =  new Ruta();
    }

    //Funcion para Agregar Usuario
    public function Listar_Rutas()
    {
        $listar = $this->modelo->listrutas();
        $resultado = $listar->fetchAll();
        $json = array();
        foreach ($resultado as $row) {
            $json[] = array(
                'id' => $row['ruta_id'],
                'nombre_ruta' => $row['nombre_ruta'],
                'nombre' => $row['nombre'],
                'estado_ruta' => $row['estado_ruta'],
                'fecha_creacion' => $row['fecha_creacion'],
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
}