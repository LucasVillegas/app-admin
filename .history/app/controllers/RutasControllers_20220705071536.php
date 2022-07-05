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

    public function Agregar_Ruta()
    {
        $ruta = $this->helpers->limpiar_cadena($_POST['nombre_ruta']);
        $vendedor_id = $this->helpers->limpiar_cadena($_POST['vendedor']);
        $sql = $this->conexion->ejecutar_consulta_simple("SELECT nombre_ruta FROM rutas WHERE nombre_ruta='$ruta'");
        if ($sql->rowcount() >= 1) {
            echo json_encode(2);
        } else {
            $datos = [
                "nombre_ruta" => $ruta,
                "vendedor_id" => $vendedor_id,
                "estado_ruta" => 1,
                "fecha_creacion" => date("Y-m-d"),
            ];
            $guardar = $this->modelo->addrutas($datos);
            $respuesta = 0;
            if ($guardar->rowCount() >= 1) {
                $respuesta++;
            }
            echo json_encode($respuesta);
        }
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
            INNER JOIN personas p ON v.persona_id=p.id WHERE r.nombre_ruta LIKE '%$search%' OR p.nombre LIKE '%$search%'");
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

    public function Actualizar_Ruta()
    {
        $id = $this->helpers->limpiar_cadena($_POST['id']);
        $ruta = $this->helpers->limpiar_cadena($_POST['nombre_ruta']);
        $vendedor_id = $this->helpers->limpiar_cadena($_POST['vendedor']);
        $datos = [
            "Nombre" => $ruta,
            "Vendedor" => $vendedor_id,
            "Id" => $id,
        ];
        $guardar = $this->modelo->updaterutas($datos);
        $respuesta = 0;
        if ($guardar->rowCount() >= 1) {
            $respuesta++;
        }
        echo json_encode($respuesta);
    }

    public function Listar_vendedores()
    {
        $listar = $this->modelo->listseller_sales();
        $resultado = $listar->fetchAll();
        $json = array();
        foreach ($resultado as $row) {
            $json[] = array(
                'id_vendedor' => $row['id_vendedor'],
                'id_user' => $row['id_user'],
                'identificacion' => $row['identificacion'],
                'nombre' => $row['nombre'],
                'apellido' => $row['apellido'],
                'telefono' => $row['telefono'],
                'estado_persona' => $row['estado_persona']
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }

    public function Preparar_Ruta()
    {
        $id = $this->helpers->limpiar_cadena($_POST['dato']);
        $datoslist = [
            'Id' => $id
        ];
        $listar = $this->modelo->preparedrutas($datoslist);
        $resultado = $listar->fetchAll();
        $json = array();
        foreach ($resultado as $row) {
            $json[] = array(
                'id' => $row['ruta_id'],
                'nombre_ruta' => $row['nombre_ruta'],
                'vendedor_id' => $row['vendedor_id'],
                'estado_ruta' => $row['estado_ruta'],
                'fecha_creacion' => $row['fecha_creacion'],
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }

    public function Bloquear_Ruta()
    {
        $id = $this->helpers->limpiar_cadena($_POST['id']);
        $datoseli = [
            'Id' => $id,
        ];
        $eliminar = $this->modelo->blockruta($datoseli);
        $cont = 0;
        if ($eliminar->rowCount() >= 1) {
            $cont++;
        }
        echo json_encode($cont);
    }

    public function Activar_Ruta()
    {
        $id = $this->helpers->limpiar_cadena($_POST['id']);
        $datoseli = [
            'Id' => $id,
        ];
        $eliminar = $this->modelo->activeruta($datoseli);
        $cont = 0;
        if ($eliminar->rowCount() >= 1) {
            $cont++;
        }
        echo json_encode($cont);
    }

    public function Delete_Ruta()
    {
        $id = $this->helpers->limpiar_cadena($_POST['id']);
        $datoseli = [
            'Id' => $id,
        ];
        $eliminar = $this->modelo->deleteruta($datoseli);
        $cont = 0;
        if ($eliminar->rowCount() >= 1) {
            $cont++;
        }
        echo json_encode($cont);
    }

    // Funciones Dias Rutas
    public function Agregar_dia_ruta()
    {
        $dia = $this->helpers->limpiar_cadena($_POST['dia']);
        $ruta_id = $this->helpers->limpiar_cadena($_POST['ruta']);
        $sql = $this->conexion->ejecutar_consulta_simple("SELECT ruta_id, dia FROM dia WHERE ruta_id='$ruta_id' AND dia='$dia'");
        if ($sql->rowcount() >= 1) {
            echo json_encode(2);
        }
        $datos = [
            "dia" => $dia,
            "ruta_id" => $ruta_id,
            "estado_dia" => 1,
        ];
        $guardar = $this->modelo->adddiasrutas($datos);
        $respuesta = 0;
        if ($guardar->rowCount() >= 1) {
            $respuesta++;
        }
        echo json_encode($respuesta);
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

    public function Preparar_dia_ruta()
    {
        $id = $this->helpers->limpiar_cadena($_POST['id']);
        $datoslist = [
            'Id' => $id
        ];
        $listar = $this->modelo->preparediaruta($datoslist);
        $resultado = $listar->fetchAll();
        $json = array();
        foreach ($resultado as $row) {
            $json["data"][] = array(
                'dia_id' => $row['dia_id'],
                'dia' => $row['dia'],
                'ruta_id' => $row['ruta_id'],
                'estado_dia' => $row['estado_dia'],
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }

    public function Actualizar_dia_ruta()
    {
        $id = $this->helpers->limpiar_cadena($_POST['id']);
        $dia = $this->helpers->limpiar_cadena($_POST['dia']);
        $ruta_id = $this->helpers->limpiar_cadena($_POST['ruta']);
        $datos = [
            "Dia" => $dia,
            "Ruta" => $ruta_id,
            "Id" => $id,
        ];
        $guardar = $this->modelo->updatedia($datos);
        $respuesta = 0;
        if ($guardar->rowCount() >= 1) {
            $respuesta++;
        }
        echo json_encode($respuesta);
    }

    public function Elimiar_dia_ruta()
    {
        $id = $this->helpers->limpiar_cadena($_POST['id']);
        $datoseli = [
            'Id' => $id,
        ];
        $eliminar = $this->modelo->deletediaruta($datoseli);
        $cont = 0;
        if ($eliminar->rowCount() >= 1) {
            $cont++;
        }
        echo json_encode($cont);
    }

    public function Cantidad_General_Rutas()
    {
        $sql = $this->conexion->ejecutar_consulta_simple("SELECT COUNT(*) AS cantidad FROM rutas");
        $resultado = $sql->fetchAll();
        $total = 0;
        foreach ($resultado as $row) {
            $total = $row['cantidad'];
        }
        echo $total;
    }
}