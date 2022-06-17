<?php
require_once "../core/conexion.php";

class Ruta extends conexion
{

    public function addrutas($datos)
    {
        $sql = conexion::conectar()->prepare("INSERT INTO rutas(nombre_ruta,vendedor_id,estado_ruta,fecha_creacion)
        VALUES(:nombre_ruta,:vendedor_id,:estado_ruta,:fecha_creacion)");

        $sql->bindParam(":nombre_ruta", $datos['nombre_ruta']);
        $sql->bindParam(":vendedor_id", $datos['vendedor_id']);
        $sql->bindParam(":estado_ruta", $datos['estado_ruta']);
        $sql->bindParam(":fecha_creacion", $datos['fecha_creacion']);
        $sql->execute();
        return $sql;
    }

    public function listrutas()
    {
        $sql = conexion::conectar()->prepare("SELECT *, r.id AS ruta_id  FROM rutas r INNER JOIN vendedores v ON r.vendedor_id=v.id INNER JOIN personas p ON v.persona_id=p.id");
        $sql->execute();
        return $sql;
    }

    public function preparedrutas($datos)
    {
        $sql = conexion::conectar()->prepare("SELECT *, r.id AS ruta_id FROM rutas r INNER JOIN vendedores v ON r.vendedor_id=v.id INNER JOIN personas p ON v.persona_id=p.id WHERE r.id=:Id");
        $sql->bindParam(":Id", $datos['Id']);
        $sql->execute();
        return $sql;
    }

    public function updaterutas($datos)
    {
        $sql = conexion::conectar()->prepare("UPDATE rutas SET nombre_ruta=:Nombre,vendedor_id=:Vendedor WHERE id=:Id");
        $sql->bindParam(":Nombre", $datos['Nombre']);
        $sql->bindParam(":Vendedor", $datos['Vendedor']);
        $sql->bindParam(":Id", $datos['Id']);
        $sql->execute();
        return $sql;
    }

    public function blockruta($datos)
    {
        $sql = conexion::conectar()->prepare("UPDATE rutas SET estado_ruta=0 WHERE id=:Id");
        $sql->bindParam(":Id", $datos['Id']);
        $sql->execute();
        return $sql;
    }

    public function activeruta($datos)
    {
        $sql = conexion::conectar()->prepare("UPDATE rutas SET estado_ruta=1 WHERE id=:Id");
        $sql->bindParam(":Id", $datos['Id']);
        $sql->execute();
        return $sql;
    }

    public function deleteruta($datos)
    {
        $sql = conexion::conectar()->prepare("DELETE FROM rutas WHERE id=:Id");
        $sql->bindParam(":Id", $datos['Id']);
        $sql->execute();
        return $sql;
    }

    // Funciones para Gestionar Dias Rutas

    public function adddiasrutas($datos)
    {
        $sql = conexion::conectar()->prepare("INSERT INTO dia (dia,ruta_id,estado_dia) VALUES(:dia,:ruta_id,:estado_dia)");
        $sql->bindParam(":dia", $datos['dia']);
        $sql->bindParam(":ruta_id", $datos['ruta_id']);
        $sql->bindParam(":estado_dia", $datos['estado_dia']);
        $sql->execute();
        return $sql;
    }

    public function listdia()
    {
        $sql = conexion::conectar()->prepare("SELECT *, d.id AS dia_id FROM dia d
        INNER JOIN rutas r ON d.ruta_id=r.id
        INNER JOIN vendedores v ON v.id=r.vendedor_id
        INNER JOIN personas p ON v.persona_id=p.id");
        $sql->execute();
        return $sql;
    }

    public function preparediaruta($datos)
    {
        $sql = conexion::conectar()->prepare("SELECT *, d.id AS dia_id FROM dia d 
        INNER JOIN rutas r ON d.ruta_id=r.id 
        INNER JOIN vendedores v ON v.id=r.vendedor_id 
        INNER JOIN personas p ON v.persona_id=p.id WHERE d.id=:Id");
        $sql->bindParam(":Id", $datos['Id']);
        $sql->execute();
        return $sql;
    }

    public function updatedia($datos)
    {
        $sql = conexion::conectar()->prepare("UPDATE dia SET dia=:Dia,ruta_id=:Ruta WHERE id=:Id");
        $sql->bindParam(":Dia", $datos['Dia']);
        $sql->bindParam(":Ruta", $datos['Ruta']);
        $sql->bindParam(":Id", $datos['Id']);
        $sql->execute();
        return $sql;
    }

    public function deletediaruta($datos)
    {
        $sql = conexion::conectar()->prepare("DELETE FROM dia WHERE id=:Id");
        $sql->bindParam(":Id", $datos['Id']);
        $sql->execute();
        return $sql;
    }
}