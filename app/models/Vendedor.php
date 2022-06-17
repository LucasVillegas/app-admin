<?php
require_once "../core/conexion.php";

class Vendedor  extends conexion
{

    public function addseller($datos)
    {
        $sql = conexion::conectar()->prepare("INSERT INTO vendedores(persona_id,salario_vendedor,total_venta,fecha_venta)
        VALUES(:persona_id,:salario_vendedor,:total_venta,:fecha_venta)");
        $sql->bindParam(":persona_id", $datos['persona_id']);
        $sql->bindParam(":salario_vendedor", $datos['salario_vendedor']);
        $sql->bindParam(":total_venta", $datos['total_venta']);
        $sql->bindParam(":fecha_venta", $datos['fecha_venta']);
        $sql->execute();
        return $sql;
    }

    public function list_seller()
    {
        $sql = conexion::conectar()->prepare("SELECT *,p.id AS persona_id,u.id AS users_id FROM personas p INNER JOIN usuarios u ON u.persona_id=p.id WHERE u.tipo_usuario='Vendedor'");
        $sql->execute();
        return $sql;
    }

    public function prepare_seller($datos)
    {
        $sql = conexion::conectar()->prepare("SELECT * FROM personas WHERE id=:Id"/* "SELECT *, p.id AS id_persona FROM personas p INNER JOIN usuarios u ON u.persona_id=p.id WHERE p.id=:Id" */);
        $sql->bindParam(":Id", $datos['Id']);
        $sql->execute();
        return $sql;
    }

    public function updatepeople($datos)
    {
        $sql = conexion::conectar()->prepare("UPDATE persona SET tipo_documento_id=:Tipo_Documento,nombres=:Nombres,apellidos=:Apellidos,
        telefono=:Telefono,estado_persona=:Estado_Persona WHERE persona_id=:Id");
        $sql->bindParam(":Tipo_Documento", $datos['Tipo_Documento']);
        $sql->bindParam(":Nombres", $datos['Nombres']);
        $sql->bindParam(":Apellidos", $datos['Apellidos']);
        $sql->bindParam(":Telefono", $datos['Telefono']);
        $sql->bindParam(":Estado_Persona", $datos['Estado_Persona']);
        $sql->bindParam(":Id", $datos['Id']);
        $sql->execute();
        return $sql;
    }

    public function prepare_users($datos)
    {
        $sql = conexion::conectar()->prepare("SELECT *,u.id AS users_id FROM usuarios u INNER JOIN personas p ON u.persona_id=p.id WHERE p.id=:Id");
        $sql->bindParam(":Id", $datos['Id']);
        $sql->execute();
        return $sql;
    }

    public function update_users($datos)
    {
        $sql = conexion::conectar()->prepare("UPDATE usuarios SET usuario=:Usuario, clave=:Pasword, correo=:Email WHERE id=:Id");
        $sql->bindParam(":Usuario", $datos['Usuario']);
        $sql->bindParam(":Pasword", $datos['Pasword']);
        $sql->bindParam(":Email", $datos['Email']);
        $sql->bindParam(":Id", $datos['Id']);
        $sql->execute();
        return $sql;
    }

    public function block($datos)
    {
        $sql = conexion::conectar()->prepare("UPDATE personas SET estado_persona=0 WHERE id=:Id");
        $sql->bindParam(":Id", $datos['Id']);
        $sql->execute();
        return $sql;
    }

    public function active($datos)
    {
        $sql = conexion::conectar()->prepare("UPDATE personas SET estado_persona=1 WHERE id=:Id");
        $sql->bindParam(":Id", $datos['Id']);
        $sql->execute();
        return $sql;
    }

    public function delete($datos)
    {
        $sql = conexion::conectar()->prepare("DELETE FROM personas WHERE id=:Id");
        $sql->bindParam(":Id", $datos['Id']);
        $sql->execute();
        return $sql;
    }

    public function listseller_sales()
    {
        $sql = conexion::conectar()->prepare("SELECT *, vendedores.id AS id_vendedor, usuarios.id AS id_user, personas.id AS persona_id FROM personas 
        INNER JOIN vendedores ON personas.id=vendedores.persona_id INNER JOIN usuarios ON usuarios.persona_id=personas.id");
        $sql->execute();
        return $sql;
    }
}