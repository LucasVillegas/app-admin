<?php

class helpers
{
    // Limpiar Cadenas contra inyecion sql
    public function limpiar_cadena($cadena)
    {
        $cadena = trim($cadena); // trim elimina los espacios emblanco al final o comienzo de una cadena
        $cadena = stripslashes($cadena); // quita barra invertidas de un strign
        $cadena = str_ireplace("<script>", "", $cadena); // remplaza valores no permitidos en los formularios
        $cadena = str_ireplace("</script>", "", $cadena);
        $cadena = str_ireplace("<script src", "", $cadena);
        $cadena = str_ireplace("<script type=", "", $cadena);
        $cadena = str_ireplace("SELECT * FROM", "", $cadena);
        $cadena = str_ireplace("DELETE FROM", "", $cadena);
        $cadena = str_ireplace("INSERT INTO", "", $cadena);
        $cadena = str_ireplace("--", "", $cadena);
        $cadena = str_ireplace("^", "", $cadena);
        $cadena = str_ireplace("[", "", $cadena);
        $cadena = str_ireplace("]", "", $cadena);
        $cadena = str_ireplace("==", "", $cadena);
        $cadena = str_ireplace(";", "", $cadena);
        return $cadena;
    }

    // funciones encritar y desencirptar contraseñas
    public static function encryption($string)
    {
        $output = FALSE;
        $key = hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRET_IV), 0, 16);
        $output = openssl_encrypt($string, METHOD, $key, 0, $iv); // encripta las contraseñas
        $output = base64_encode($output);
        return $output;
    }

    public static function decryption($string)
    {
        $key = hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRET_IV), 0, 16);           // Desencriptan la contraseña
        $output = openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
        return $output;
    }

    public function generar_codigo_aleatorio($letra, $tamaño, $num)
    { // generar codigos para nuestras cuentas
        for ($i = 1; $i <= $tamaño; $i++) {
            $numero = rand();
            $letra = $numero = rand();
        }
        return $letra . $num;
    }

    public function fechanormal($fecha)
    {
        /* $fecha = new DateTime($fecha);
        $fecha_m_d_y = $fecha->format('d/m/Y H:i:s'); */
        $nfecha = date('d/m/Y H:i:s', strtotime($fecha));
        return $nfecha;
    }

    public function redireccionar_usuario_controlador($tipo)
    {
        if ($tipo == "Administrador") {
            $redireccion = '<script> window.location.href="' . SERVERURL . 'home/" </script>';
        } elseif ($tipo == "Vendedor") {
            $redireccion = '<script> window.location.href="' . SERVERURL . 'oficina/" </script>';
        }
        return $redireccion;
    }

    public function forzar_cierre_sesion_controlador()
    { // para cuando quieren acceder sin iniciar sesion
        session_unset();
        session_destroy();
        $redireccion = '<script> window.location.href="' . SERVERURL . '" </script>';
        return $redireccion;
    }

    public function cerrara_sesion_controlador()
    { /* // para cerrar la sesion del sistema
        $token = conexion::decryption($_GET['Token']); // lo recibe desde ajax por la url y lo desencriptamos
        $hora = date("h:i:s a");
        $datos = [
            "Usuario" => $_SESSION['usuario_sirpa'],
            "Token_S" => $_SESSION['token_sirpa'],
            "Token" => $token,
            "Codigo" => $_SESSION['codigo_bitacora_sirpa'],
            "Hora" => $hora
        ];
        return loginModelo::cerrar_sesion_modelo($datos); */
        session_unset();
        session_destroy();
        $_SESSION['usuario_ips'] = null;
        $_SESSION['idusuario_ips'] = null;
        $_SESSION['tipo_ips'] = null;
        $respuesta = '<script>window.location.href ="' . SERVERURL . '" ?></script>';
echo $respuesta;
}
}