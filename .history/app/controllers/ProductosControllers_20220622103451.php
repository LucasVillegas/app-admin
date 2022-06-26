<?php
require_once "../helpers/herlpers.php";
require_once "../core/conexion.php";
require_once "../models/Producto.php";

class ProductosControllers
{
    public $helpers;
    public $conexion;
    public $modelo;
    public function __construct()
    {
        $this->helpers =  new helpers();
        $this->conexion =  new conexion();
        $this->modelo = new Producto();
    }

    public function listar_productos()
    {
        $listar = $this->modelo->listproductos();
        $resultado = $listar->fetchAll();
        $json = array();
        foreach ($resultado as $row) {
            $json[] = array(
                'producto_id' => $row['producto_id'],
                'codigo_producto' => $row['codigo_producto'],
                'nombre_producto' => $row['nombre_producto'],
                'cantidad' => $row['cantidad'],
                'precio_compra' => number_format($row['precio_compra']),
                'porcentaje' => $row['porcentaje'],
                'precio_porcentaje' => number_format($row['precio_porcentaje']),
                'precio' => number_format($row['precio']),
                'estado_producto' => $row['estado_producto'],
                'unidad_id' => $row['unidad_id'],
                'nombre_unidad' => $row['nombre_unidad'],
                'fecha_creacion' => $row['fecha_creacion'],
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }

    /* public function FunctionName(Type $var = null)
    {
        # code...
    } */
}