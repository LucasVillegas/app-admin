<?php

require_once "../core/conexion.php";

class Login extends conexion
{
    public function iniciar_sesion_modelo($datos)
    {
        $sql = conexion::conectar()->prepare("SELECT * FROM usuarios WHERE usuario =:Usuario AND clave=:Clave ");
        $sql->bindParam(':Usuario', $datos['Usuario']);
        $sql->bindParam(':Clave', $datos['Clave']);
        $sql->execute();
        return $sql;
    }
}