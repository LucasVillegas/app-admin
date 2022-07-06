<?php
require_once "../helpers/herlpers.php";
require_once "../core/conexion.php";
date_default_timezone_set("America/Bogota");
class VentasControllers
{
    public $helpers;
    public $conexion;
    public $modelo;
    public function __construct()
    {
        $this->helpers =  new helpers();
        $this->conexion =  new conexion();
        //$this->modelo =  new Clientes();
    }

    public function listar_venta()
    {
        if ($this->helpers->limpiar_cadena(isset($_POST['dato'])) && $this->helpers->limpiar_cadena(!empty($_POST['dato']))) {
            $dato = $this->helpers->limpiar_cadena($_POST['dato']);
            $sql = $this->conexion->ejecutar_consulta_simple("SELECT ventas.id,ventas.estado_venta, clientes.nombre_cliente,clientes.nombre_tienda,ventas.fecha_normal,ventas.total_venta FROM ventas
            INNER JOIN clientes ON ventas.cliente_id = clientes.id INNER JOIN usuarios ON usuarios.id = ventas.usuario_id 
            WHERE clientes.nombre_cliente LIKE '%$dato%' OR clientes.nombre_tienda LIKE '%$dato%' OR ventas.id LIKE '%$dato%'  ORDER BY  ventas.id DESC");
            $resultado = $sql->fetchAll();
            $json = array();
            foreach ($resultado as $row) {
                $json[] = array(
                    'id' => $row['id'],
                    'estado_venta' => $row['estado_venta'],
                    'nombre_cliente' => $row['nombre_cliente'],
                    'nombre_tienda' => $row['nombre_tienda'],
                    'fecha_normal' => $row['fecha_normal'],
                    'total_venta' => $row['total_venta'],
                );
            }
            $jsonstring = json_encode($json);
            echo $jsonstring;
        } else {
            $sql = $this->conexion->ejecutar_consulta_simple("SELECT ventas.id,ventas.estado_venta, clientes.nombre_cliente,clientes.nombre_tienda,ventas.fecha_normal,ventas.total_venta FROM ventas
            INNER JOIN clientes ON ventas.cliente_id = clientes.id INNER JOIN usuarios ON usuarios.id = ventas.usuario_id  ORDER BY  ventas.id DESC LIMIT 15");
            $resultado = $sql->fetchAll();
            $json = array();
            foreach ($resultado as $row) {
                $json[] = array(
                    'id' => $row['id'],
                    'estado_venta' => $row['estado_venta'],
                    'nombre_cliente' => $row['nombre_cliente'],
                    'nombre_tienda' => $row['nombre_tienda'],
                    'fecha_normal' => $row['fecha_normal'],
                    'total_venta' => $row['total_venta'],
                );
            }
            $jsonstring = json_encode($json);
            echo $jsonstring;
        }
    }

    public function Listar_ventas_anexos()
    {
        $id = $this->helpers->limpiar_cadena($_POST['dato']);
        $sql = $this->conexion->ejecutar_consulta_simple("SELECT p.id,p.codigo_producto,p.precio,p.nombre_producto,u.nombre_unidad,p.precio_compra,dv.cantidad_venta,v.observaciones
        FROM ventas v
        INNER JOIN detalle_ventas dv ON v.id=dv.id_detalle_venta
        INNER JOIN clientes c ON v.cliente_id=c.id
        INNER JOIN productos p ON dv.productos=p.id
        INNER JOIN unidades u ON p.unidad_id=u.id
        WHERE v.id='$id'");
        $resultado = $sql->fetchAll();
        $json = array();
        foreach ($resultado as $row) {
            $json[] = array(
                'id' => $row['id'],
                'codigo_producto' => $row['codigo_producto'],
                'nombre_producto' => $row['nombre_producto'],
                'nombre_unidad' => $row['nombre_unidad'],
                'cantidad' => $row['cantidad_venta'],
                'precio' => $row['precio'],
                'precio_compra' => $row['precio_compra'],
                'observaciones' => $row['observaciones'],
            );
        }

        $jsonstring = json_encode($json);
        echo $jsonstring;
    }


    public function listar_detalle_venta()
    {
        $id =  $this->helpers->limpiar_cadena($_POST['id']);
        $sql2 = $this->conexion->ejecutar_consulta_simple("SELECT p.nombre_producto AS nombre,p.codigo_producto, d.cantidad_venta,d.precio_venta,d.sub_total,u.descripcion_unidad,v.total_venta,v.observaciones
        FROM detalle_ventas AS d INNER JOIN productos AS p ON d.productos=p.id
        INNER JOIN unidades u ON p.unidad_id=u.id INNER JOIN ventas v ON d.id_detalle_venta=v.id WHERE d.id_detalle_venta='$id'");
        $resultado2 = $sql2->fetchAll();
        $json = array();
        foreach ($resultado2 as $row) {
            $json["detalle"][] = array(
                'nombre' => $row['nombre'],
                'codigo_producto' => $row['codigo_producto'],
                'cantidad_venta' => $row['cantidad_venta'],
                'precio_venta' => $row['precio_venta'],
                'sub_total' => $row['sub_total'],
                'descripcion_unidad' => $row['descripcion_unidad'],
                'total_venta' => $row['total_venta'],
                'observaciones' => $row['observaciones'],
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }

    public function listar_detalle_venta_cabecera()
    {
        $id = $this->helpers->limpiar_cadena($_POST['id']);
        $sql = $this->conexion->ejecutar_consulta_simple("SELECT ventas.id,ventas.total_venta,ventas.fecha_venta,ventas.estado_venta,ventas.observaciones,clientes.nombre_cliente,clientes.nombre_tienda from ventas
            INNER JOIN clientes ON ventas.cliente_id = clientes.id WHERE ventas.id='$id'");
        $resultado = $sql->fetchAll();
        $json = array();
        foreach ($resultado as $row) {
            $json["venta"][] = array(
                'id' => $row['id'],
                'total_venta' => $row['total_venta'],
                'fecha_entrega' => $row['fecha_venta'],
                'estado_venta' => $row['estado_venta'],
                'observaciones' => $row['observaciones'],
                'nombre_cliente' => $row['nombre_cliente'],
                'nombre_tienda' => $row['nombre_tienda'],
            );
        }

        $jsonstring = json_encode($json);
        echo $jsonstring;
    }


    public function Elimiar_Factura()
    {
        $id = $helpers->limpiar_cadena($_POST['id']);
        $sql = $conexion->ejecutar_consulta_simple("DELETE a1, a2 FROM ventas AS a1 INNER JOIN detalle_ventas AS a2
            WHERE a1.id=a2.id_detalle_venta AND a1.id  LIKE '$id'");
        $cont = 0;
        if ($sql->rowCount() >= 1) {
            $cont++;
        }
        echo json_encode($cont);
    }
}