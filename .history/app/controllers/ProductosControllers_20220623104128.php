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

    public function agregar_producto()
    {
        $descripcion = $this->helpers->limpiar_cadena($_POST['descripcion']);
        $unidad = $this->helpers->limpiar_cadena($_POST['unidad']);
        $nuevoPrecioCompra = $this->helpers->limpiar_cadena($_POST['nuevoPrecioCompra']);
        $nuevoPrecioPorcentaje = $this->helpers->limpiar_cadena($_POST['nuevoPrecioPorcentaje']);
        $preciototal = $this->helpers->limpiar_cadena($_POST['preciototal']);
        $porcentaje = $this->helpers->limpiar_cadena($_POST['porcentaje']);
        $codigo = $this->helpers->limpiar_cadena($_POST['codigo']);
        $cantidad = $this->helpers->limpiar_cadena($_POST['cantidad']);
        $sql = $conexion->ejecutar_consulta_simple("SELECT nombre_producto FROM productos WHERE nombre_producto='$descripcion'");


        $datos = [
            "codigo_producto" => $codigo,
            "nombre_producto" => $descripcion,
            "unidad_id" => $unidad,
            "cantidad" => $cantidad,
            "precio_compra" => $nuevoPrecioCompra,
            "porcentaje" => $porcentaje,
            "precio_porcentaje" => $nuevoPrecioPorcentaje,
            "precio" => $preciototal,
            "estado_producto" => 1,
            "fecha_creacion" => date("Y-m-d"),
        ];
        $guardar = $this->modelo->addproducto($datos);
        $respuesta = 0;
        if ($guardar->rowCount() >= 1) {
            $respuesta++;
        }
        echo json_encode($respuesta);
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

    public function generar_codigo()
    {
        $sql = $this->conexion->ejecutar_consulta_simple("SELECT MAX(id) as num FROM productos");
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        //$mensaje = 'DIS';
        $numero = implode("','", $result);
        if ($numero < 10) {
            $codigo = '00' . (empty($result['num']) ? 1 : $result['num'] += 1);
        } elseif ($numero < 100) {
            $codigo = '00' . (empty($result['num']) ? 1 : $result['num'] += 1);
        } else {
            $codigo = (empty($result['num']) ? 1 : $result['num'] += 1);
        }
        echo json_encode($codigo);
    }

    public function preparar_producto()
    {
        $id = $this->helpers->limpiar_cadena($_POST['dato']);
        $datoslist = [
            'Id' => $id
        ];
        $listar = $this->modelo->prepareproducto($datoslist);
        $resultado = $listar->fetchAll();
        $json = array();
        foreach ($resultado as $row) {
            $json[] = array(
                'producto_id' => $row['producto_id'],
                'codigo_producto' => $row['codigo_producto'],
                'nombre_producto' => $row['nombre_producto'],
                'cantidad' => $row['cantidad'],
                'precio_compra' => $row['precio_compra'],
                'porcentaje' => $row['porcentaje'],
                'precio_porcentaje' => $row['precio_porcentaje'],
                'precio' => $row['precio'],
                'estado_producto' => $row['estado_producto'],
                'unidad_id' => $row['unidad_id'],
                'nombre_unidad' => $row['nombre_unidad'],
                'fecha_creacion' => $row['fecha_creacion'],
                'categoria_id' => $row['categoria_id'],
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }

    public function block()
    {
        $id = $this->helpers->limpiar_cadena($_POST['id']);
        $datoseli = [
            'Id' => $id,
        ];
        $eliminar = $this->modelo->block($datoseli);
        $cont = 0;
        if ($eliminar->rowCount() >= 1) {
            $cont++;
        }
        echo json_encode($cont);
    }

    public function active()
    {
        $id = $this->helpers->limpiar_cadena($_POST['id']);
        $datoseli = [
            'Id' => $id,
        ];
        $eliminar = $this->modelo->active($datoseli);
        $cont = 0;
        if ($eliminar->rowCount() >= 1) {
            $cont++;
        }
        echo json_encode($cont);
    }

    public function delete()
    {
        $id = $this->helpers->limpiar_cadena($_POST['id']);
        $datoseli = [
            'Id' => $id,
        ];
        $eliminar = $this->modelo->delete($datoseli);
        $cont = 0;
        if ($eliminar->rowCount() >= 1) {
            $cont++;
        }
        echo json_encode($cont);
    }
}