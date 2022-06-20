<?php
session_start(['name' => 'DISTRI']);
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
        $categoria = $this->helpers->limpiar_cadena($_POST['categoria']);
        $consulta = $this->conexion->ejecutar_consulta_simple("SELECT nombre_categoria FROM categorias WHERE nombre_categoria='$categoria'");
        if ($consulta->rowCount() >= 1) {
            echo json_encode(2);
        } else {
        }
        $sql = $this->conexion->ejecutar_consulta_simple("INSERT INTO categorias(nombre_categoria,fecha_categoria,estado_categoria) VALUES('$categoria','NOW()',1)");
        //$guardar = $consulta->fetchAll();
        $respuesta = 0;
        if ($sql->rowCount() >= 1) {
            $respuesta++;
        }
        echo json_encode($respuesta);
    }
}