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
        //$ruta_carpeta         = "../../public/img/productos/";
        $ruta_carpeta         = "C:\laragon\www\fotos-productos";

        $r                    = rand(0, 1000);
        $fecha                = date("his");
        $ruta_guardar_archivo = $ruta_carpeta . basename($_FILES['file']['name']);
        $nombre_archivo       = basename($_FILES['file']['name']);




        $categoria = $this->helpers->limpiar_cadena($_POST['categoria']);
        $fecha = date("Y-m-d");
        $consulta = $this->conexion->ejecutar_consulta_simple("SELECT nombre_categoria FROM categorias WHERE nombre_categoria='$categoria'");
        if ($consulta->rowCount() >= 1) {
            echo json_encode(0);
        } else {
            $sql = $this->conexion->ejecutar_consulta_simple("INSERT INTO categorias(nombre_categoria,fecha_categoria,estado_categoria) VALUES('$categoria','$fecha',1)");
            $respuesta = 0;
            if ($sql->rowCount() >= 1) {
                $respuesta++;
            }
            echo json_encode($respuesta);
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
        $id = $this->helpers->limpiar_cadena($_POST['id']);
        $categoria = $this->helpers->limpiar_cadena($_POST['categoria']);
        $sql = $this->conexion->ejecutar_consulta_simple("UPDATE categorias SET nombre_categoria='$categoria' WHERE id='$id'");
        $respuesta = 0;
        if ($sql->rowCount() >= 1) {
            $respuesta++;
        }
        echo json_encode($respuesta);
    }

    public function elimiar_categoria()
    {
        $id = $this->helpers->limpiar_cadena($_POST['id']);
        $sql = $this->conexion->ejecutar_consulta_simple("DELETE FROM categorias WHERE id='$id'");
        $cont = 0;
        if ($sql->rowCount() >= 1) {
            $cont++;
        }
        echo json_encode($cont);
    }
}