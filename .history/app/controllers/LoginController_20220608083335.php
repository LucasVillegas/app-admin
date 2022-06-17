<?php
require_once "../core/conexion.php";
require_once "../Models/Login.php";
require_once "../helpers/herlpers.php";
class LoginController
{
    public $helpers;
    public $conexion;
    public $Login;

    public function __construct()
    {
        $this->helpers =  new helpers();
        $this->conexion =  new conexion();
        $this->Login =  new Login();
    }

    public function iniciar_sesion()
    {
        $usuario = $this->helpers->limpiar_cadena($_POST['usuario']);
        $clave = $this->helpers->limpiar_cadena($_POST['clave']);
        $clave = $this->helpers->encryption($clave); // para leer la contraseña

        $datoslogin = [
            "Usuario" => $usuario,
            "Clave" => $clave
        ];
        $datosusuario = $this->modelo->iniciar_sesion_modelo($datoslogin);

        if ($datosusuario->rowCount() == 1) {
            $fila = $datosusuario->fetch();
            if ($datosusuario->rowCount() >= 1) {
                if ($fila['tipo_usuario'] == "Administrador") {
                    $sql = $this->modelo->ejecutar_consulta_simple("SELECT * FROM usuarios INNER JOIN personas ON usuarios.persona_id= personas.id WHERE usuarios.id='" . $fila['id'] . "' AND tipo_usuario='Administrador'");
                } elseif ($fila['tipo_usuario'] == "Vendedor") {
                    $sql = $this->modelo->ejecutar_consulta_simple("SELECT * FROM usuarios INNER JOIN personas ON usuarios.persona_id= personas.id WHERE usuarios.id='" . $fila['id'] . "' AND tipo_usuario='Vendedor'");
                }

                if ($sql->rowCount() == 1) {
                    session_start(['name' => 'DISTRI']); // nombre a la sesion
                    $usuarioDatos = $sql->fetch();

                    if ($fila['tipo_usuario'] == "Administrador") {
                        $_SESSION['nombre_dis'] = $usuarioDatos['nombre'];
                    } elseif ($fila['tipo_usuario'] == "Vendedor") {
                        $_SESSION['nombre_dis'] = $usuarioDatos['nombre'];
                    }

                    $_SESSION['usuario_dis'] = $fila['usuario'];
                    $_SESSION['idusuario_dis'] = $fila['id'];
                    $_SESSION['tipo_dis'] = $fila['tipo_usuario'];
                    $_SESSION['token_dis'] = md5(uniqid(mt_rand(), true)); // funciones de php, uniquid -> crear numero unico
                    $_SESSION['carrito'] = array();
                    $_SESSION['cuadre'] = array();

                    if ($fila['tipo_usuario'] == "Administrador") {
                        echo 1;
                    } elseif ($fila['tipo_usuario'] == "Vendedor") {
                        echo 2;
                    }
                } else {
                    echo 0;
                }
            } else {
                echo 0;
            }
        } else {
            echo 0;
        }
    }
}
/* require_once "../Models/Login.php";
require_once "../helpers/herlpers.php";
$modelo = new Login();
$helpers = new helpers();
switch ($_GET["op"]) {

    case 'iniciar_secion':
        $usuario = $helpers->limpiar_cadena($_POST['usuario']);
        $clave = $helpers->limpiar_cadena($_POST['clave']);
        $clave = $helpers->encryption($clave); // para leer la contraseña

        $datoslogin = [
            "Usuario" => $usuario,
            "Clave" => $clave
        ];

        $datosusuario = $modelo->iniciar_sesion_modelo($datoslogin);

        if ($datosusuario->rowCount() == 1) {
            $fila = $datosusuario->fetch();
            if ($datosusuario->rowCount() >= 1) {
                if ($fila['tipo_usuario'] == "Administrador") {
                    $sql = $modelo->ejecutar_consulta_simple("SELECT * FROM usuarios INNER JOIN personas ON usuarios.persona_id= personas.id WHERE usuarios.id='" . $fila['id'] . "' AND tipo_usuario='Administrador'");
                } elseif ($fila['tipo_usuario'] == "Vendedor") {
                    $sql = $modelo->ejecutar_consulta_simple("SELECT * FROM usuarios INNER JOIN personas ON usuarios.persona_id= personas.id WHERE usuarios.id='" . $fila['id'] . "' AND tipo_usuario='Vendedor'");
                }

                if ($sql->rowCount() == 1) {
                    session_start(['name' => 'DISTRI']); // nombre a la sesion
                    $usuarioDatos = $sql->fetch();

                    if ($fila['tipo_usuario'] == "Administrador") {
                        $_SESSION['nombre_dis'] = $usuarioDatos['nombre'];
                    } elseif ($fila['tipo_usuario'] == "Vendedor") {
                        $_SESSION['nombre_dis'] = $usuarioDatos['nombre'];
                    }

                    $_SESSION['usuario_dis'] = $fila['usuario'];
                    $_SESSION['idusuario_dis'] = $fila['id'];
                    $_SESSION['tipo_dis'] = $fila['tipo_usuario'];
                    $_SESSION['token_dis'] = md5(uniqid(mt_rand(), true)); // funciones de php, uniquid -> crear numero unico
                    $_SESSION['carrito'] = array();
                    $_SESSION['cuadre'] = array();

                    if ($fila['tipo_usuario'] == "Administrador") {
                        echo 1;
                    } elseif ($fila['tipo_usuario'] == "Vendedor") {
                        echo 2;
                    }
                } else {
                    echo 0;
                }
            } else {
                echo 0;
            }
        } else {
            echo 0;
        }
        break;

    default:
        # code...
        break;
} */