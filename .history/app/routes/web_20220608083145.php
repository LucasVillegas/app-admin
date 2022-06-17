<?php
//AUTOLOAD PHP 
spl_autoload_register(function ($nombreClase) {
    require_once '../Controllers/' . $nombreClase . '.php';
});
/* $consolidados = new ConsolidadoController();
$clientes = new ClientesController();
$administrador = new AdministradorController();
$vendedor = new VendedorController(); */

if (isset($_GET['op'])) {

    if ($_GET['op'] == "Consolidado_General") {
        $consolidados->consolidado_general();
    } elseif ($_GET['op'] == "Search_Consolidado_General") {
        $consolidados->Consolidado_General_Fecha();
    } elseif ($_GET['op'] == "Consolidado_Vendedor") {
        $consolidados->consolidado_vendedor();
    } elseif ($_GET['op'] == "Search_Consolidado_Vendedor") {
        $consolidados->consolidado_vendedor_fecha();
    } elseif ($_GET['op'] == "Codigo_Cliente") {
        $clientes->Codigo();
    } elseif ($_GET['op'] == "Agregar_Cliente") {
        $clientes->Agregar_Cliente();
    } elseif ($_GET['op'] == "Listar_Cliente") {
        $clientes->listar_clientes();
    } elseif ($_GET['op'] == "Preparar_Cliente") {
        $clientes->preparar_cliente();
    } elseif ($_GET['op'] == "Actualizar_Cliente") {
        $clientes->actualizar_cliente();
    } elseif ($_GET['op'] == "Bloquear_Cliente") {
        $clientes->block();
    } elseif ($_GET['op'] == "Activar_Cliente") {
        $clientes->active();
    } elseif ($_GET['op'] == "Eliminar_Cliente") {
        $clientes->delete();
    } elseif ($_GET['op'] == "Cantidad_Cliente") {
        $clientes->cantidad_de_clientes();
        //Rutas de Administradores
    } elseif ($_GET['op'] == "Agregar_Administrador") {
        $administrador->agrgar_administrador();
    } elseif ($_GET['op'] == "Listar_Administrador") {
        $administrador->listar_administrador();
    } elseif ($_GET['op'] == "Preparar_Administrador") {
        $administrador->preparar_persona();
    } elseif ($_GET['op'] == "Actualizar_Administrador") {
        $administrador->actualizar_datos_administrador();
    } elseif ($_GET['op'] == "Preparar_Administrador_Usuario") {
        $administrador->prepare_user_administrador();
    } elseif ($_GET['op'] == "Actualizar_Administrador_Usuario") {
        $administrador->actualizar_usuario_administrador();
    } elseif ($_GET['op'] == "Bloquear_Administrador") {
        $administrador->block();
    } elseif ($_GET['op'] == "Activar_Administrador") {
        $administrador->active();
    } elseif ($_GET['op'] == "Eliminar_Administrador") {
        $administrador->delete();
        //Rutas de Vendedores
    } elseif ($_GET['op'] == "Agregar_Vendedor") {
        $vendedor->agregar_vendedor();
    } elseif ($_GET['op'] == "Listar_Vendedor") {
        $vendedor->listar_vendedor();
    } elseif ($_GET['op'] == "Preparar_Vendedor") {
        $vendedor->preparar_persona();
    } elseif ($_GET['op'] == "Actualizar_Vendedor") {
        $vendedor->actualizar_datos_vendedor();
    } elseif ($_GET['op'] == "Preparar_Vendedor_Usuario") {
        $vendedor->prepare_user_vendedor();
    } elseif ($_GET['op'] == "Actualizar_Vendedor_Usuario") {
        $vendedor->actualizar_usuario_vendedor();
    } elseif ($_GET['op'] == "Bloquear_Vendedor") {
        $vendedor->block();
    } elseif ($_GET['op'] == "Activar_Vendedor") {
        $vendedor->active();
    } elseif ($_GET['op'] == "Eliminar_Vendedor") {
        $vendedor->delete();
    } elseif ($_GET['op'] == "Cantidad_Vendedores") {
        $vendedor->cantidad_de_vendedores();
        //Rutas de Rutas Foraneas
    } elseif ($_GET['op'] == "Agregar_Rutas") {
        $vendedor->cantidad_de_vendedores();
    }
}