<?php
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
        $fecha = date("Y-m-d");
        $consulta = $this->conexion->ejecutar_consulta_simple("SELECT nombre_categoria FROM categorias WHERE nombre_categoria='$categoria'");
        if ($consulta->rowCount() >= 1) {
            echo json_encode(0);
        } else {
            $sql = $this->conexion->ejecutar_consulta_simple("INSERT INTO categorias(nombre_categoria,fecha_categoria,estado_categoria) VALUES('$categoria','$fecha',1)");
            $respuesta = 0;
            if ($sql->rowCount() >= 1) {
                $respuesta++;
            }
            echo json_encode($respuesta);
        }
    }

    public function lisar_categoria()
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








        $sql = $this->conexion->ejecutar_consulta_simple("SELECT * FROM categorias");
        $resultado = $sql->fetchAll();
        $json = array();
        foreach ($resultado as $row) {
            $json[] = array(
                'id' => $row['id'],
                'nombre_categoria' => $row['nombre_categoria'],
                'fecha_categoria' => $row['fecha_categoria'],
                'estado_categoria' => $row['estado_categoria'],
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
}