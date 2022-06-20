<?php
require_once "../core/conexion.php";

class Unidad extends conexion
{

    public function addunidad($datos)
    {
        $sql = conexion::conectar()->prepare("INSERT INTO unidades(nombre_unidad,descripcion_unidad,estado_unidad,fecha_creacion)
        VALUES(:nombre_unidad,:descripcion_unidad,:estado_unidad,:fecha_creacion)");

        $sql->bindParam(":nombre_unidad", $datos['nombre_unidad']);
        $sql->bindParam(":descripcion_unidad", $datos['descripcion_unidad']);
        $sql->bindParam(":estado_unidad", $datos['estado_unidad']);
        $sql->bindParam(":fecha_creacion", $datos['fecha_creacion']);
        $sql->execute();
        return $sql;
    }

    public function listunidades()
    {
        $sql = conexion::conectar()->prepare("SELECT * FROM unidades");
        $sql->execute();
        return $sql;
    }

    public function prepareunidad($datos)
    {
        $sql = conexion::conectar()->prepare("SELECT * FROM unidades WHERE id=:Id");
        $sql->bindParam(":Id", $datos['Id']);
        $sql->execute();
        return $sql;
    }

    public function updateunidad($datos)
    {
        $sql = conexion::conectar()->prepare("UPDATE unidades SET nombre_unidad=:Nombre,descripcion_unidad=:Descripcion WHERE id=:Id");
        $sql->bindParam(":Nombre", $datos['Nombre']);
        $sql->bindParam(":Descripcion", $datos['Descripcion']);
        $sql->bindParam(":Id", $datos['Id']);
        $sql->execute();
        return $sql;
    }


    public function block($datos)
    {
        $sql = conexion::conectar()->prepare("UPDATE unidades SET estado_unidad=0 WHERE id=:Id");
        $sql->bindParam(":Id", $datos['Id']);
        $sql->execute();
        return $sql;
    }

    public function active($datos)
    {
        $sql = conexion::conectar()->prepare("UPDATE unidades SET estado_unidad=1 WHERE id=:Id");
        $sql->bindParam(":Id", $datos['Id']);
        $sql->execute();
        return $sql;
    }

    public function delete($datos)
    {
        $sql = conexion::conectar()->prepare("DELETE FROM unidades WHERE id=:Id");
        $sql->bindParam(":Id", $datos['Id']);
        $sql->execute();
        return $sql;
    }
}