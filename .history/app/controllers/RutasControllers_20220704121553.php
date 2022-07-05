<?php
//session_start(['name' => 'DISTRI']);
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

    //Funcion Para Listar Rutas Clientes
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

    //Funcion Para Listar Rutas 
    public function Lista_Rutas()
    {
        if ($this->helpers->limpiar_cadena(isset($_POST['dato'])) && $this->helpers->limpiar_cadena(!empty($_POST['dato']))) {
            $search = $this->helpers->limpiar_cadena($_POST['dato']);
            $sql = $this->conexion->ejecutar_consulta_simple("SELECT *, r.id AS ruta_id  FROM rutas r INNER JOIN vendedores v ON r.vendedor_id=v.id 
            INNER JOIN personas p ON v.persona_id=p.id WHERE nombre_unidad LIKE '%$search%' ");
            $resultado = $sql->fetchAll();
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
        } else {
            $sql = $this->conexion->ejecutar_consulta_simple("SELECT *, r.id AS ruta_id  FROM rutas r INNER JOIN vendedores v ON r.vendedor_id=v.id 
            INNER JOIN personas p ON v.persona_id=p.id LIMIT 15");
            $resultado = $sql->fetchAll();
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
}