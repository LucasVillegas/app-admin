<?php
require_once "../helpers/herlpers.php";
require_once "../core/conexion.php";
require_once "../models/Unidad.php";

class UnidadesControllers
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
        $sql = $this->conexion->ejecutar_consulta_simple("SELECT nombre_unidad FROM unidades WHERE nombre_unidad='$nombre_unidad'");
        if ($sql->rowcount() >= 1) {
            echo json_encode(0);
        } else {
            $datos = [
                "nombre_unidad" => $nombre_unidad,
                "descripcion_unidad" => $descripcion,
                "estado_unidad" => 1,
                "fecha_creacion" => date("Y-m-d"),
            ];
            $guardar = $this->modelo->addunidad($datos);
            $respuesta = 0;
            if ($guardar->rowCount() >= 1) {
                $respuesta++;
            }
            echo json_encode($respuesta);
        }
    }

    public function listar_unidad()
    {
        $listar = $this->modelo->listunidades();
        $resultado = $listar->fetchAll();
        $json = array();
        foreach ($resultado as $row) {
            $json[] = array(
                'id' => $row['id'],
                'nombre_unidad' => $row['nombre_unidad'],
                'descripcion_unidad' => $row['descripcion_unidad'],
                'estado_unidad' => $row['estado_unidad'],
                'fecha_creacion' => $row['fecha_creacion'],
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }

    public function preparar_unidad()
    {
        # code...
    }
}