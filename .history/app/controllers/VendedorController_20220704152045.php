<?php

require_once "../helpers/herlpers.php";
require_once "../core/conexion.php";
require_once "../Models/Vendedor.php";
class VendedorController
{
    public $helpers;
    public $conexion;
    public $vendedor;

    public function __construct()
    {
        $this->helpers =  new helpers();
        $this->conexion =  new conexion();
        $this->vendedor =  new Vendedor();
    }

    public function agregar_vendedor()
    {
        $identificacion = $this->helpers->limpiar_cadena($_POST['identificacion']);
        $nombre = $this->helpers->limpiar_cadena($_POST['nombre']);
        $apellidos = $this->helpers->limpiar_cadena($_POST['apellido']);
        $telefono = $this->helpers->limpiar_cadena($_POST['telefono']);
        $usuario = $this->helpers->limpiar_cadena($_POST['usuario']);
        $correo = $this->helpers->limpiar_cadena($_POST['correo']);
        $clave1 = $this->helpers->limpiar_cadena($_POST['password']);
        $clave = $this->helpers->encryption($clave1);

        $sql = $this->conexion->ejecutar_consulta_simple("SELECT identificacion FROM personas WHERE identificacion='$identificacion'");
        if ($sql->rowcount() >= 1) {
            echo json_encode(0);
        } else {
            if ($correo !== "") {
                $consulta2 = $this->conexion->ejecutar_consulta_simple("SELECT correo FROM usuarios WHERE correo='$correo'");
                $co = $consulta2->rowcount();
            } else {
                $co = 0;
            }
            if ($co >= 1) {
                echo json_encode(2);
            } else {
                $consulta3 = $this->conexion->ejecutar_consulta_simple("SELECT usuario FROM usuarios WHERE usuario='$usuario'");
                if ($consulta3->rowcount() >= 1) {
                    echo json_encode(3);
                } else {
                    $datos = [
                        "identificacion" => $identificacion,
                        "nombre" => $nombre,
                        "apellido" => $apellidos,
                        "telefono" => $telefono,
                        "estado_persona" => 1,
                        "fecha_creacion" => date("Y-m-d"),
                    ];
                    $guardar = $this->conexion->agregar_persona($datos);
                    if ($guardar->rowCount() >= 1) {
                        $sql = $this->vendedor->ejecutar_consulta_simple("SELECT MAX(id) AS num FROM personas");
                        $resultado = $sql->fetchAll();
                        foreach ($resultado as $row) {
                            $persona_id = $row['num'];
                        }
                        $datosadmin = [
                            "persona_id" => $persona_id,
                            "usuario" => $usuario,
                            "clave" => $clave,
                            "correo" => $correo,
                            "tipo_usuario" => "Vendedor",
                            "fecha_creacion" => date("Y-m-d"),
                        ];
                        $cuenta = $this->conexion->agregar_cuenta($datosadmin);
                        $respuesta = 0;
                        if ($cuenta->rowCount() >= 1) {
                            $respuesta++;
                        }
                    }
                    echo json_encode($respuesta);
                }
            }
        }
    }

    public function listar_vendedor()
    {
        if ($this->helpers->limpiar_cadena(isset($_POST['dato'])) && $this->helpers->limpiar_cadena(!empty($_POST['dato']))) {
            $search = $this->helpers->limpiar_cadena($_POST['dato']);
            $sql = $this->conexion->ejecutar_consulta_simple("SELECT *,p.id AS persona_id,u.id AS users_id FROM personas p 
            INNER JOIN usuarios u ON u.persona_id=p.id WHERE u.tipo_usuario='Vendedor' AND p.nombre LIKE '%$search%' ");
            $resultado = $sql->fetchAll();
            $json = array();
            foreach ($resultado as $row) {
                $json[] = array(
                    'persona_id' => $row['persona_id'],
                    'identificacion' => $row['identificacion'],
                    'nombre' => $row['nombre'],
                    'apellido' => $row['apellido'],
                    'telefono' => $row['telefono'],
                    'estado_persona' => $row['estado_persona'],
                    'usuario' => $row['usuario'],
                    'correo' => $row['correo'],
                    'tipo_usuario' => $row['tipo_usuario'],
                );
            }
            $jsonstring = json_encode($json);
            echo $jsonstring;
        } else {
            $sql = $this->conexion->ejecutar_consulta_simple("SELECT *,p.id AS persona_id,u.id AS users_id FROM personas p 
            INNER JOIN usuarios u ON u.persona_id=p.id WHERE u.tipo_usuario='Vendedor' LIMIT 15");
            $resultado = $sql->fetchAll();
            $json = array();
            foreach ($resultado as $row) {
                $json[] = array(
                    'persona_id' => $row['persona_id'],
                    'identificacion' => $row['identificacion'],
                    'nombre' => $row['nombre'],
                    'apellido' => $row['apellido'],
                    'telefono' => $row['telefono'],
                    'estado_persona' => $row['estado_persona'],
                    'usuario' => $row['usuario'],
                    'correo' => $row['correo'],
                    'tipo_usuario' => $row['tipo_usuario'],
                );
            }
            $jsonstring = json_encode($json);
            echo $jsonstring;
        }
    }

    public function preparar_persona()
    {
        $id = $this->helpers->limpiar_cadena($_POST['dato']);
        $datoslist = [
            'Id' => $id
        ];
        $listar = $this->vendedor->prepare_seller($datoslist);
        $resultado = $listar->fetchAll();
        $json = array();
        foreach ($resultado as $row) {
            $json[] = array(
                'id' => $row['id'],
                'identificacion' => $row['identificacion'],
                'nombre' => $row['nombre'],
                'apellido' => $row['apellido'],
                'telefono' => $row['telefono'],
                'estado_persona' => $row['estado_persona'],
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }

    public function actualizar_datos_vendedor()
    {
        $id = $this->helpers->limpiar_cadena($_POST['id']);
        $identificacion = $this->helpers->limpiar_cadena($_POST['identificacion']);
        $nombre = $this->helpers->limpiar_cadena($_POST['nombres']);
        $apellidos = $this->helpers->limpiar_cadena($_POST['apellidos']);
        $telefono = $this->helpers->limpiar_cadena($_POST['telefono']);
        $datos = [
            "Identificacion" => $identificacion,
            "Nombre" => $nombre,
            "Apellido" =>  $apellidos,
            "Telefono" =>  $telefono,
            "Id" => $id,
        ];
        $guardar = $this->conexion->actualizar_persona($datos);
        $respuesta = 0;
        if ($guardar->rowCount() >= 1) {
            $respuesta++;
        }
        echo json_encode($respuesta);
    }


    public function prepare_user_vendedor()
    {
        $id = $this->helpers->limpiar_cadena($_POST['dato']);
        $data = [
            'Id' => $id
        ];
        $listar = $this->vendedor->prepare_users($data);
        $resultado = $listar->fetchAll();
        $json = array();
        foreach ($resultado as $row) {
            $json[] = array(
                'users_id' => $row['users_id'],
                'nombre' => $row['nombre'],
                'usuario' => $row['usuario'],
                'clave' => $row['clave'],
                'correo' => $row['correo'],
                'tipo_usuario' => $row['tipo_usuario'],
                'estado_persona' => $row['estado_persona']
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }


    public function actualizar_usuario_vendedor()
    {
        $id = $this->helpers->limpiar_cadena($_POST['id']);
        $usuario = $this->helpers->limpiar_cadena($_POST['usuario']);
        $correo = $this->helpers->limpiar_cadena($_POST['correo']);
        $clave1 = $this->helpers->limpiar_cadena($_POST['password']);
        $clave = $this->helpers->encryption($clave1);

        $sql1 = $this->conexion->ejecutar_consulta_simple("SELECT * FROM usuarios WHERE id='$id'");
        $Datoscuenta = $sql1->fetch();

        if ($clave1 != $Datoscuenta['clave']) {
            $clave = $this->helpers->encryption($clave1);
        } else {
            $clave = $Datoscuenta['clave'];
        }

        $datosCu = [
            "Usuario" => $usuario,
            "Pasword" => $clave,
            "Email" => $correo,
            "Id" => $id
        ];
        $guardar = $this->vendedor->update_users($datosCu);
        $respuesta = 0;
        if ($guardar->rowCount() >= 1) {
            $respuesta++;
        }
        echo json_encode($respuesta);
    }

    public function block()
    {
        $id = $this->helpers->limpiar_cadena($_POST['id']);
        $datoseli = [
            'Id' => $id,
        ];
        $eliminar = $this->vendedor->block($datoseli);
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
        $eliminar = $this->vendedor->active($datoseli);
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
        $venta = $this->conexion->ejecutar_consulta_simple("SELECT usuario_id FROM ventas WHERE usuario_id='$id'");
        if ($venta->rowcount() >= 1) {
            echo json_encode(0);
        } else {
            $eliminar = $this->vendedor->delete($datoseli);
            $cont = 0;
            if ($eliminar->rowCount() >= 1) {
                $cont++;
            }
            echo json_encode($cont);
        }
    }

    public function cantidad_de_vendedores()
    {
        $sql = $this->conexion->ejecutar_consulta_simple("SELECT COUNT(*) AS cantidad FROM vendedores");
        $resultado = $sql->fetchAll();
        $total = 0;
        foreach ($resultado as $row) {
            $total = $row['cantidad'];
        }
        echo $total;
    }
}