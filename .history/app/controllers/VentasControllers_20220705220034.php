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

    public function Listar_dias_ruta()
    {
        if ($this->helpers->limpiar_cadena(isset($_POST['dato'])) && $this->helpers->limpiar_cadena(!empty($_POST['dato']))) {
            $search = $this->helpers->limpiar_cadena($_POST['dato']);
            $sql = $this->conexion->ejecutar_consulta_simple("SELECT *, d.id AS dia_id FROM dia d
            INNER JOIN rutas r ON d.ruta_id=r.id
            INNER JOIN vendedores v ON v.id=r.vendedor_id
            INNER JOIN personas p ON v.persona_id=p.id WHERE d.dia LIKE '%$search%' OR p.nombre LIKE '%$search%' OR R.nombre_ruta LIKE '%$search%' ");
            $resultado = $sql->fetchAll();
            $json = array();
            foreach ($resultado as $row) {
                $json[] = array(
                    'dia_id' => $row['dia_id'],
                    'dia' => $row['dia'],
                    'nombre' => $row['nombre'],
                    'nombre_ruta' => $row['nombre_ruta'],
                    'estado_dia' => $row['estado_dia'],
                );
            }
            $jsonstring = json_encode($json);
            echo $jsonstring;
        } else {
            $sql = $this->conexion->ejecutar_consulta_simple("SELECT *, d.id AS dia_id FROM dia d
            INNER JOIN rutas r ON d.ruta_id=r.id
            INNER JOIN vendedores v ON v.id=r.vendedor_id
            INNER JOIN personas p ON v.persona_id=p.id LIMIT 15");
            $resultado = $sql->fetchAll();
            $json = array();
            foreach ($resultado as $row) {
                $json[] = array(
                    'dia_id' => $row['dia_id'],
                    'dia' => $row['dia'],
                    'nombre' => $row['nombre'],
                    'nombre_ruta' => $row['nombre_ruta'],
                    'estado_dia' => $row['estado_dia'],
                );
            }
            $jsonstring = json_encode($json);
            echo $jsonstring;
        }
    }
}