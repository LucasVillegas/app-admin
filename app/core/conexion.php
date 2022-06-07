<?php
include_once "configApp.php";

class conexion
{
    public function conectar()
    {
        $pdo  = new PDO(SGBD, user, pass);
        return $pdo;
    }

    public function ejecutar_consulta_simple($consulta)
    {
        $respuesta = $this->conectar()->prepare($consulta); // instanciamos la funcion conectar con el nombre de la funcion o self, tambien se prepara la consulta que enviamos por parametro
        $respuesta->execute();
        return $respuesta;
    }

    public function agregar_cuenta($datos)
    {
        $sql = $this->conectar()->prepare("INSERT INTO usuarios(persona_id,usuario,clave,correo,tipo_usuario,fecha_creacion) 
        VALUES (:persona_id,:usuario,:clave,:correo,:tipo_usuario,:fecha_creacion)");

        $sql->bindParam(":persona_id", $datos['persona_id']);
        $sql->bindParam(":usuario", $datos['usuario']);
        $sql->bindParam(":clave", $datos['clave']);
        $sql->bindParam(":correo", $datos['correo']);
        $sql->bindParam(":tipo_usuario", $datos['tipo_usuario']);
        $sql->bindParam(":fecha_creacion", $datos['fecha_creacion']);
        $sql->execute();
        return $sql;
    }

    public function datos_usuario($codigo, $tipo)
    {
        $sql = $this->conectar()->prepare("SELECT * FROM usuarios WHERE codigo=:Codigo AND tipo_usuario=:Tipo");
        $sql->bindParam(":Codigo", $codigo);
        $sql->bindParam(":Tipo", $tipo);
        $sql->execute();
        return $sql;
    }

    public function actualizar_usuario($datos)
    {
        $sql = $this->conectar()->prepare(" UPDATE usuarios SET usuario=:Usuario,clave=:Pasword,correo=:Email,foto=:Foto WHERE idusuarios=:Id");
        $sql->bindParam(":Usuario", $datos['usuario']);
        $sql->bindParam(":Pasword", $datos['clave']);
        $sql->bindParam(":Email", $datos['correo']);
        $sql->bindParam(":Foto", $datos['foto']);
        $sql->bindParam(":Id", $datos['idusuarios']);
        $sql->execute();
        return $sql;
    }


    public function agregar_persona($datos)
    {
        $sql = $this->conectar()->prepare("INSERT INTO personas (identificacion,nombre,apellido,telefono,estado_persona,fecha_creacion)
        VALUES (:identificacion,:nombre,:apellido,:telefono,:estado_persona,:fecha_creacion)");
        $sql->bindParam(":identificacion", $datos['identificacion']);
        $sql->bindParam(":nombre", $datos['nombre']);
        $sql->bindParam(":apellido", $datos['apellido']);
        $sql->bindParam(":telefono", $datos['telefono']);
        $sql->bindParam(":estado_persona", $datos['estado_persona']);
        $sql->bindParam(":fecha_creacion", $datos['fecha_creacion']);
        $sql->execute();
        return $sql;
    }

    public function actualizar_persona($datos)
    {
        $sql = $this->conectar()->prepare("UPDATE personas SET  identificacion=:Identificacion,nombre=:Nombre,apellido=:Apellido,telefono=:Telefono WHERE id=:Id");
        $sql->bindParam(":Identificacion", $datos['Identificacion']);
        $sql->bindParam(":Nombre", $datos['Nombre']);
        $sql->bindParam(":Apellido", $datos['Apellido']);
        $sql->bindParam(":Telefono", $datos['Telefono']);
        $sql->bindParam(":Id", $datos['Id']);
        $sql->execute();
        return $sql;
    }
}