<?php
//AUTOLOAD PHP 
spl_autoload_register(function ($nombreClase) {
    require_once '../Controllers/' . $nombreClase . '.php';
});
$login = new LoginController();
$clientes = new ClientesControllers();
/*$administrador = new AdministradorController();
$vendedor = new VendedorController(); */

if (isset($_GET['op'])) {

    if ($_GET['op'] == "Iniciar_Sesion") {
        $login->iniciar_sesion();
    } /* elseif ($_GET['op'] == "Search_Consolidado_General") {
        $consolidados->Consolidado_General_Fecha();
    }  */
}