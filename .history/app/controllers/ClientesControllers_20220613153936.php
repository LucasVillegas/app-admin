<?php
session_start(['name' => 'DISTRI']);
require_once "../helpers/herlpers.php";
require_once "../core/conexion.php";
require_once "../Models/ClientesModels.php";
class ClientesControllers
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

    //Funcion para Agregar Usuario
    public function agregar_cliente()
    {
        $ruta = $this->helpers->limpiar_cadena($_POST['ruta']);
        $codigo = $this->helpers->limpiar_cadena($_POST['codigo']);
        $identificacion = $this->helpers->limpiar_cadena($_POST['identificacion']);
        $nombre_cliente = $this->helpers->limpiar_cadena($_POST['nombre_cliente']);
        $nombre_tienda = $this->helpers->limpiar_cadena($_POST['nombre_tienda']);
        $direccion = $this->helpers->limpiar_cadena($_POST['direccion']);
        $telefono = $this->helpers->limpiar_cadena($_POST['telefono']);
        $consulta = $this->conexion->ejecutar_consulta_simple("SELECT nit FROM clientes WHERE nit='$identificacion'");
        if ($consulta->rowCount() >= 1) {
            echo json_encode(2);
        } else {
            $datos = [
                "codigo_cliente" => $codigo,
                "ruta_id" => $ruta,
                "nit" => $identificacion,
                "nombre_cliente" => $nombre_cliente,
                "nombre_tienda" => $nombre_tienda,
                "direccion_cliente" => $direccion,
                "telefono_cliente" =>  $telefono,
                "estado_cliente" => 1,
                "fecha_creacion" => date("Y-m-d"),
            ];
            $guardar = $this->modelo->addcliente($datos);
            $respuesta = 0;
            if ($guardar->rowCount() >= 1) {
                $respuesta++;
            }
            echo json_encode($respuesta);
        }
    }


    public function listar_rutas()
    {
        $vendedor_id = $_SESSION['vendedor_id_dis'];
        $datos = [
            'Id' => $vendedor_id
        ];
        $listar = $this->modelo->listrutas($datos);
        $resultado = $listar->fetchAll();
        $json = array();
        foreach ($resultado as $row) {
            $json[] = array(
                'id' => $row['ruta_id'],
                'nombre_ruta' => $row['nombre_ruta'],
                'estado_ruta' => $row['estado_ruta'],
                'fecha_creacion' => $row['fecha_creacion'],
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }

    public function generar_codigo()
    {
        $sql = $this->conexion->ejecutar_consulta_simple("SELECT MAX(id) as num FROM clientes");
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        $numero = implode("','", $result);

        if ($numero < 10) {
            $codigo = '000' . (empty($result['num']) ? 1 : $result['num'] += 1);
        } elseif ($numero < 100) {
            $codigo = '000' . (empty($result['num']) ? 1 : $result['num'] += 1);
        } else {
            $codigo = (empty($result['num']) ? 1 : $result['num'] += 1);
        }
        echo json_encode($codigo);
    }

    public function listar_clientes()
    {
        if ($this->helpers->limpiar_cadena(isset($_POST['dato'])) && $this->helpers->limpiar_cadena(!empty($_POST['dato']))) {
            $search = $this->helpers->limpiar_cadena($_POST['dato']);
            $sql = $this->conexion->ejecutar_consulta_simple("SELECT *,clientes.id AS cliente_id FROM clientes
        INNER JOIN rutas ON rutas.id=clientes.ruta_id
        INNER JOIN vendedores ON vendedores.id=rutas.vendedor_id
        WHERE clientes.nombre_tienda LIKE '%$search%' 
        OR clientes.nombre_cliente LIKE '%$search'");
            $resultado = $sql->fetchAll();
            $json = array();
            foreach ($resultado as $row) {
                $json[] = array(
                    'cliente_id' => $row['cliente_id'],
                    'nit' => $row['nit'],
                    'codigo_cliente' => $row['codigo_cliente'],
                    'nombre_cliente' => $row['nombre_cliente'],
                    'nombre_tienda' => $row['nombre_tienda'],
                    'direccion_cliente' => $row['direccion_cliente'],
                    'telefono_cliente' => $row['telefono_cliente'],
                    'estado_cliente' => $row['estado_cliente'],
                    'nombre_ruta' => $row['nombre_ruta'],
                );
            }
            $jsonstring = json_encode($json);
            echo $jsonstring;
        } else {
            $sql = $this->conexion->ejecutar_consulta_simple("SELECT *,clientes.id AS cliente_id FROM clientes
        INNER JOIN rutas ON rutas.id=clientes.ruta_id
        INNER JOIN vendedores ON vendedores.id=rutas.vendedor_id
         LIMIT 15");
            $resultado = $sql->fetchAll();
            $json = array();
            foreach ($resultado as $row) {
                $json[] = array(
                    'cliente_id' => $row['cliente_id'],
                    'nit' => $row['nit'],
                    'codigo_cliente' => $row['codigo_cliente'],
                    'nombre_cliente' => $row['nombre_cliente'],
                    'nombre_tienda' => $row['nombre_tienda'],
                    'direccion_cliente' => $row['direccion_cliente'],
                    'telefono_cliente' => $row['telefono_cliente'],
                    'estado_cliente' => $row['estado_cliente'],
                    'nombre_ruta' => $row['nombre_ruta'],
                );
            }
            $jsonstring = json_encode($json);
            echo $jsonstring;
        }
    }

    public function detalle_cliente()
    {
        $id = $this->helpers->limpiar_cadena($_POST["id"]);
        $sql = $this->conexion->ejecutar_consulta_simple("SELECT * FROM clientes WHERE clientes.id='$id'");
        $resultado = $sql->fetchAll();
        $json = array();
        foreach ($resultado as $row) {
            $json[] = array(
                'id' => $row['id'],
                'nit' => $row['nit'],
                'codigo_cliente' => $row['codigo_cliente'],
                'nombre_cliente' => $row['nombre_cliente'],
                'nombre_tienda' => $row['nombre_tienda'],
                'direccion_cliente' => $row['direccion_cliente'],
                'telefono_cliente' => $row['telefono_cliente'],
                'estado_cliente' => $row['estado_cliente']
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }

    public function prepare_cliente()
    {
        $id = $this->helpers->limpiar_cadena($_POST["dato"]);
        $sql = $this->conexion->ejecutar_consulta_simple("SELECT *,c.id AS cliente_id FROM clientes c INNER JOIN rutas r ON c.ruta_id=r.id WHERE c.id='$id'");
        $resultado = $sql->fetchAll();
        $json = array();
        foreach ($resultado as $row) {
            $json[] = array(
                'cliente_id' => $row['cliente_id'],
                'ruta_id' => $row['ruta_id'],
                'nit' => $row['nit'],
                'codigo_cliente' => $row['codigo_cliente'],
                'nombre_cliente' => $row['nombre_cliente'],
                'nombre_tienda' => $row['nombre_tienda'],
                'direccion_cliente' => $row['direccion_cliente'],
                'telefono_cliente' => $row['telefono_cliente'],
                'estado_cliente' => $row['estado_cliente']
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }

    public function update_Datos()
    {
        $id = $this->helpers->limpiar_cadena($_POST['idc']);
        $ruta = $this->helpers->limpiar_cadena($_POST['ruta']);
        //$codigo = $this->helpers->limpiar_cadena($_POST['codigo']);
        $identificacion = $this->helpers->limpiar_cadena($_POST['identificacion']);
        $nombre_cliente = $this->helpers->limpiar_cadena($_POST['nombre_cliente']);
        $nombre_tienda = $this->helpers->limpiar_cadena($_POST['nombre_tienda']);
        $direccion = $this->helpers->limpiar_cadena($_POST['direccion']);
        $telefono = $this->helpers->limpiar_cadena($_POST['telefono']);

        $datos = [
            "Ruta" => $ruta,
            "Nit" => $identificacion,
            "Nombre_Cliente" => $nombre_cliente,
            "Nombre_Tienda" => $nombre_tienda,
            "Direccion_Cliente" => $direccion,
            "Telefono_Cliente" =>  $telefono,
            'Id' => $id,
        ];
        $sql = $this->modelo->update_cliente($datos);
        $respuesta = 0;
        if ($sql->rowCount() >= 1) {
            $respuesta++;
        }
        echo json_encode($respuesta);
    }

    public function Cantidad_General_Clientes()
    {
        $vendedor_id = $_SESSION['vendedor_id_dis'];
        $sql = $this->conexion->ejecutar_consulta_simple("SELECT COUNT(*) AS cantidad FROM clientes c 
        INNER JOIN rutas r ON c.ruta_id=r.id  INNER JOIN vendedores v ON r.vendedor_id=v.id
        WHERE v.id='$vendedor_id'");
        $resultado = $sql->fetchAll();
        $total = 0;
        foreach ($resultado as $row) {
            $total = $row['cantidad'];
        }
        echo $total;
    }

    public function Codigo()
    {
        $sql = $this->conexion->ejecutar_consulta_simple("SELECT MAX(id) as num FROM clientes");
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        $numero = implode("','", $result);

        if ($numero < 10) {
            $codigo = '000' . (empty($result['num']) ? 1 : $result['num'] += 1);
        } elseif ($numero < 100) {
            $codigo = '000' . (empty($result['num']) ? 1 : $result['num'] += 1);
        } else {
            $codigo = (empty($result['num']) ? 1 : $result['num'] += 1);
        }
        echo json_encode($codigo);
    }
}