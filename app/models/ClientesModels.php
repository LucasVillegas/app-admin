<?php
require_once "../core/conexion.php";

class Clientes  extends conexion
{
    public function addcliente($datos)
    {
        $sql = conexion::conectar()->prepare("INSERT INTO clientes(codigo_cliente,ruta_id,nit,nombre_cliente,nombre_tienda,direccion_cliente,telefono_cliente,estado_cliente,fecha_creacion)
        VALUES(:codigo_cliente,:ruta_id,:nit,:nombre_cliente,:nombre_tienda,:direccion_cliente,:telefono_cliente,:estado_cliente,:fecha_creacion)");

        $sql->bindParam(":codigo_cliente", $datos['codigo_cliente']);
        $sql->bindParam(":ruta_id", $datos['ruta_id']);
        $sql->bindParam(":nit", $datos['nit']);
        $sql->bindParam(":nombre_cliente", $datos['nombre_cliente']);
        $sql->bindParam(":nombre_tienda", $datos['nombre_tienda']);
        $sql->bindParam(":direccion_cliente", $datos['direccion_cliente']);
        $sql->bindParam(":telefono_cliente", $datos['telefono_cliente']);
        $sql->bindParam(":estado_cliente", $datos['estado_cliente']);
        $sql->bindParam(":fecha_creacion", $datos['fecha_creacion']);
        $sql->execute();
        return $sql;
    }

    public function listclientes($datos)
    {
        $sql = conexion::conectar()->prepare("SELECT *,clientes.id AS cliente_id FROM clientes
        INNER JOIN rutas ON clientes.ruta_id=rutas.id 
        INNER JOIN vendedores ON rutas.vendedor_id=vendedores.id
        WHERE vendedores.id=:Id LIMIT 10");
        $sql->bindParam(":Id", $datos['Id']);
        $sql->execute();
        return $sql;
    }

    public function listrutas($datos)
    {
        $sql = conexion::conectar()->prepare("SELECT *, r.id AS ruta_id  FROM rutas r INNER JOIN vendedores v ON r.vendedor_id=v.id 
        INNER JOIN personas p ON v.persona_id=p.id WHERE v.id=:Id");
        $sql->bindParam(":Id", $datos['Id']);
        $sql->execute();
        return $sql;
    }

    public function update_cliente($datos)
    {
        $sql = conexion::conectar()->prepare("UPDATE clientes SET ruta_id=:Ruta,nit=:Nit,nombre_cliente=:Nombre_Cliente,nombre_tienda=:Nombre_Tienda,
        direccion_cliente=:Direccion_Cliente,telefono_cliente=:Telefono_Cliente WHERE id=:Id");
        $sql->bindParam(":Ruta", $datos['Ruta']);
        $sql->bindParam(":Nit", $datos['Nit']);
        $sql->bindParam(":Nombre_Cliente", $datos['Nombre_Cliente']);
        $sql->bindParam(":Nombre_Tienda", $datos['Nombre_Tienda']);
        $sql->bindParam(":Direccion_Cliente", $datos['Direccion_Cliente']);
        $sql->bindParam(":Telefono_Cliente", $datos['Telefono_Cliente']);
        $sql->bindParam(":Id", $datos['Id']);
        $sql->execute();
        return $sql;
    }

    public function blockcliente($datos)
    {
        $sql = conexion::conectar()->prepare("UPDATE clientes SET estado_cliente=0 WHERE id=:Id");
        $sql->bindParam(":Id", $datos['Id']);
        $sql->execute();
        return $sql;
    }

    public function activecliente($datos)
    {
        $sql = conexion::conectar()->prepare("UPDATE clientes SET estado_cliente=1 WHERE id=:Id");
        $sql->bindParam(":Id", $datos['Id']);
        $sql->execute();
        return $sql;
    }

    public function deletecliente($datos)
    {
        $sql = conexion::conectar()->prepare("DELETE FROM clientes WHERE id=:Id");
        $sql->bindParam(":Id", $datos['Id']);
        $sql->execute();
        return $sql;
    }
}