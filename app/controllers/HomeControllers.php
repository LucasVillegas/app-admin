<?php
require_once "../helpers/herlpers.php";
require_once "../core/conexion.php";
date_default_timezone_set("America/Bogota");

class HomeControllers
{

    public $helpers;
    public $conexion;
    public $modelo;
    public function __construct()
    {
        $this->helpers =  new helpers();
        $this->conexion =  new conexion();
        $this->modelo =  new Clientes();
    }

    public function cantidad_de_clientes()
    {
        $sql = $this->conexion->ejecutar_consulta_simple("SELECT COUNT(*) AS cantidad FROM clientes");
        $resultado = $sql->fetchAll();
        $total = 0;
        foreach ($resultado as $row) {
            $total = $row['cantidad'];
        }
        echo $total;
    }


    public function cantidad_de_productos()
    {
        $sql = $this->conexion->ejecutar_consulta_simple("SELECT COUNT(*) AS cantidad FROM productos");
        $resultado = $sql->fetchAll();
        $total = 0;
        foreach ($resultado as $row) {
            $total = $row['cantidad'];
        }
        echo $total;
    }

    public function cantidad_de_rutas()
    {
        $sql = $this->conexion->ejecutar_consulta_simple("SELECT COUNT(*) AS cantidad FROM rutas");
        $resultado = $sql->fetchAll();
        $total = 0;
        foreach ($resultado as $row) {
            $total = $row['cantidad'];
        }
        echo $total;
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