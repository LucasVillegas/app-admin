<?php
require_once "../helpers/herlpers.php";
require_once "../core/conexion.php";
class CategoriaControllers
{
    public $helpers;
    public $conexion;
    public function __construct()
    {
        $this->helpers =  new helpers();
        $this->conexion =  new conexion();
    }

    public function agregar_categoria()
    {
        //Datos tabala Usuarios
        $ruta_carpeta         = "../../public/img/categorias/";
        //$ruta_carpeta1         = "C:/laragon/www/app-movil/public/img/categorias/";
        $r                    = rand(0, 1000);
        $fecha                = date("his");
        $ruta_guardar_archivo = $ruta_carpeta . basename($_FILES['file']['name']);
        //$ruta_guardar_archivo1 = $ruta_carpeta1 . basename($_FILES['file']['name']);
        $nombre_archivo       = basename($_FILES['file']['name']);
        if (move_uploaded_file($_FILES['file']['tmp_name'], $ruta_guardar_archivo)) {
            $categoria = $this->helpers->limpiar_cadena($_POST['categoria']);
            $fecha = date("Y-m-d");
            $consulta = $this->conexion->ejecutar_consulta_simple("SELECT nombre_categoria FROM categorias WHERE nombre_categoria='$categoria'");
            if ($consulta->rowCount() >= 1) {
                echo json_encode(0);
            } else {

                $sql = $this->conexion->ejecutar_consulta_simple("INSERT INTO categorias(nombre_categoria,foto_categoria,fecha_categoria,estado_categoria) VALUES('$categoria','$nombre_archivo','$fecha',1)");
                $respuesta = 0;
                if ($sql->rowCount() >= 1) {
                    /* if (move_uploaded_file($_FILES['file']['tmp_name'], $ruta_guardar_archivo1)) {
                        $respuesta++;
                    } */
                    $respuesta++;
                }
                echo json_encode($respuesta);
            }
        } else {
            $categoria = $this->helpers->limpiar_cadena($_POST['categoria']);
            $fecha = date("Y-m-d");
            $consulta = $this->conexion->ejecutar_consulta_simple("SELECT nombre_categoria FROM categorias WHERE nombre_categoria='$categoria'");
            if ($consulta->rowCount() >= 1) {
                echo json_encode(0);
            } else {
                $sql = $this->conexion->ejecutar_consulta_simple("INSERT INTO categorias(nombre_categoria,foto_categoria,fecha_categoria,estado_categoria) VALUES('$categoria','categoria.png','$fecha',1)");
                $respuesta = 0;
                if ($sql->rowCount() >= 1) {
                    $respuesta++;
                }
                echo json_encode($respuesta);
            }
        }
    }

    public function lisar_categoria()
    {
        if ($this->helpers->limpiar_cadena(isset($_POST['dato'])) && $this->helpers->limpiar_cadena(!empty($_POST['dato']))) {
            $search = $this->helpers->limpiar_cadena($_POST['dato']);
            $sql = $this->conexion->ejecutar_consulta_simple("SELECT * FROM categorias WHERE nombre_categoria LIKE '%$search%' ");
            $resultado = $sql->fetchAll();
            $json = array();
            foreach ($resultado as $row) {
                $json[] = array(
                    'id' => $row['id'],
                    'nombre_categoria' => $row['nombre_categoria'],
                    'fecha_categoria' => $row['fecha_categoria'],
                    'estado_categoria' => $row['estado_categoria'],
                    'foto_categoria' => $row['foto_categoria'],
                );
            }
            $jsonstring = json_encode($json);
            echo $jsonstring;
        } else {
            $sql = $this->conexion->ejecutar_consulta_simple("SELECT * FROM categorias");
            $resultado = $sql->fetchAll();
            $json = array();
            foreach ($resultado as $row) {
                $json[] = array(
                    'id' => $row['id'],
                    'nombre_categoria' => $row['nombre_categoria'],
                    'fecha_categoria' => $row['fecha_categoria'],
                    'estado_categoria' => $row['estado_categoria'],
                    'foto_categoria' => $row['foto_categoria'],
                );
            }
            $jsonstring = json_encode($json);
            echo $jsonstring;
        }
    }

    public function listar_categoria()
    {
        $sql = $this->conexion->ejecutar_consulta_simple("SELECT * FROM categorias");
        $resultado = $sql->fetchAll();
        $json = array();
        foreach ($resultado as $row) {
            $json[] = array(
                'id' => $row['id'],
                'nombre_categoria' => $row['nombre_categoria'],
                'fecha_categoria' => $row['fecha_categoria'],
                'estado_categoria' => $row['estado_categoria'],
                'foto_categoria' => $row['foto_categoria'],
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }

    public function preparar_categoria()
    {
        $id = $this->helpers->limpiar_cadena($_POST['dato']);
        $sql = $this->conexion->ejecutar_consulta_simple("SELECT * FROM categorias WHERE id ='$id'");
        $resultado = $sql->fetchAll();
        $json = array();
        foreach ($resultado as $row) {
            $json[] = array(
                'id' => $row['id'],
                'nombre_categoria' => $row['nombre_categoria'],
                'fecha_categoria' => $row['fecha_categoria'],
                'estado_categoria' => $row['estado_categoria'],
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }

    public function actualizar_categoria()
    {

        //Datos tabala Usuarios
        $ruta_carpeta         = "../../public/img/categorias/";
        //$ruta_carpeta         = "C:/laragon/www/fotos-productos/";
        $r                    = rand(0, 1000);
        $fecha                = date("his");
        $ruta_guardar_archivo = $ruta_carpeta . basename($_FILES['file']['name']);
        $nombre_archivo       = basename($_FILES['file']['name']);
        if (move_uploaded_file($_FILES['file']['tmp_name'], $ruta_guardar_archivo)) {
            $id = $this->helpers->limpiar_cadena($_POST['id']);
            $categoria = $this->helpers->limpiar_cadena($_POST['categoria']);
            $sql = $this->conexion->ejecutar_consulta_simple("UPDATE categorias SET nombre_categoria='$categoria',foto_categoria='$nombre_archivo' WHERE id='$id'");
            $respuesta = 0;
            if ($sql->rowCount() >= 1) {
                $respuesta++;
            }
            echo json_encode($respuesta);
        }
    }

    public function elimiar_categoria()
    {
        $id = $this->helpers->limpiar_cadena($_POST['id']);
        $foto = $this->conexion->ejecutar_consulta_simple("SELECT foto_categoria FROM categorias WHERE id='$id'");

        if ($foto->rowCount() == 1) {
            $fila = $foto->fetch();
            $foto_categoria = $fila['foto_categoria'];
            $path = unlink("../../public/document/" . $foto_categoria);
        } else {
            # code...
        }


        $sql = $this->conexion->ejecutar_consulta_simple("DELETE FROM categorias WHERE id='$id'");
        $cont = 0;
        if ($sql->rowCount() >= 1) {
            $cont++;
        }
        echo json_encode($cont);
    }
}