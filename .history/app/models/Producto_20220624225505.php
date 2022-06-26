<?php
require_once "../core/conexion.php";

class Producto extends conexion
{

    public function addproducto($datos)
    {
        $sql = conexion::conectar()->prepare("INSERT INTO productos (codigo_producto,nombre_producto,unidad_id,categoria_id,cantidad,precio_compra,porcentaje,
        precio_porcentaje,precio,estado_producto,foto_producto,fecha_creacion)
        VALUES(:codigo_producto,:nombre_producto,:unidad_id,:categoria_id,:cantidad,:precio_compra,:porcentaje,:precio_porcentaje,:precio,:estado_producto,:foto_producto,:fecha_creacion)");
        $sql->bindParam(":codigo_producto", $datos['codigo_producto']);
        $sql->bindParam(":nombre_producto", $datos['nombre_producto']);
        $sql->bindParam(":unidad_id", $datos['unidad_id']);
        $sql->bindParam(":categoria_id", $datos['categoria_id']);
        $sql->bindParam(":cantidad", $datos['cantidad']);
        $sql->bindParam(":precio_compra", $datos['precio_compra']);
        $sql->bindParam(":porcentaje", $datos['porcentaje']);
        $sql->bindParam(":precio_porcentaje", $datos['precio_porcentaje']);
        $sql->bindParam(":precio", $datos['precio']);
        $sql->bindParam(":estado_producto", $datos['estado_producto']);
        $sql->bindParam(":foto_producto", $datos['foto_producto']);
        $sql->bindParam(":fecha_creacion", $datos['fecha_creacion']);
        $sql->execute();
        return $sql;
    }

    public function listproductos()
    {
        $sql = conexion::conectar()->prepare("SELECT *, productos.id AS producto_id FROM productos INNER JOIN unidades ON productos.unidad_id=unidades.id");
        $sql->execute();
        return $sql;
    }

    public function prepareproducto($datos)
    {
        $sql = conexion::conectar()->prepare("SELECT *, productos.id AS producto_id, categorias.id AS categoria_id
        FROM productos  INNER JOIN unidades ON productos.unidad_id=unidades.id
        INNER JOIN categorias ON productos.categoria_id=categorias.id
        WHERE productos.id=:Id");
        $sql->bindParam(":Id", $datos['Id']);
        $sql->execute();
        return $sql;
    }

    public function updateproducto($datos)
    {
        $sql = conexion::conectar()->prepare("UPDATE productos SET nombre_producto=:Nombre,unidad_id=:Unidad,categoria_id=:Categoria,precio_compra=:Precio_Compra,porcentaje=:Porcentaje,
        precio_porcentaje=:Precio_Porcentaje,precio=:Precio,foto_producto=:Foto WHERE id=:Id");
        $sql->bindParam(":Nombre", $datos['Nombre']);
        $sql->bindParam(":Unidad", $datos['Unidad']);
        $sql->bindParam(":Categoria", $datos['Categoria']);
        $sql->bindParam(":Precio_Compra", $datos['Precio_Compra']);
        $sql->bindParam(":Porcentaje", $datos['Porcentaje']);
        $sql->bindParam(":Precio_Porcentaje", $datos['Precio_Porcentaje']);
        $sql->bindParam(":Precio", $datos['Precio']);
        $sql->bindParam(":Id", $datos['Id']);
        $sql->execute();
        return $sql;
    }


    public function block($datos)
    {
        $sql = conexion::conectar()->prepare("UPDATE productos SET estado_producto=0 WHERE id=:Id");
        $sql->bindParam(":Id", $datos['Id']);
        $sql->execute();
        return $sql;
    }

    public function active($datos)
    {
        $sql = conexion::conectar()->prepare("UPDATE productos SET estado_producto=1 WHERE id=:Id");
        $sql->bindParam(":Id", $datos['Id']);
        $sql->execute();
        return $sql;
    }

    public function delete($datos)
    {
        $sql = conexion::conectar()->prepare("DELETE FROM productos WHERE id=:Id");
        $sql->bindParam(":Id", $datos['Id']);
        $sql->execute();
        return $sql;
    }
}