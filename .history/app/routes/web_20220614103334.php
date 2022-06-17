<?php
//AUTOLOAD PHP 
spl_autoload_register(function ($nombreClase) {
    require_once '../Controllers/' . $nombreClase . '.php';
});
$login = new LoginController();
$clientes = new ClientesControllers();
$ruta = new RutasControllers();
/*$administrador = new AdministradorController();
$vendedor = new VendedorController(); */

if (isset($_GET['op'])) {

    if ($_GET['op'] == "Iniciar_Sesion") {
        $login->iniciar_sesion();
    } /* elseif ($_GET['op'] == "Search_Consolidado_General") {
        $consolidados->Consolidado_General_Fecha();
    }  */
    /* Funciones de CLientes */
    if ($_GET['op'] == "Listar_Clientes") {
        $clientes->listar_clientes();
    } elseif ($_GET['op'] == "Codigo_Cliente") {
        $clientes->Codigo();
    } elseif ($_GET['op'] == "Preparar_Cliente") {
        $clientes->preparar_cliente();
    } elseif ($_GET['op'] == "Agregar_Cliente") {
        $clientes->Agregar_Cliente();
    }

    /* Funciones de Rutas */
    if ($_GET['op'] == "Listar_Rutas") {
        $ruta->Listar_Rutas();
    }
}