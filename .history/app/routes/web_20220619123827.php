<?php
//AUTOLOAD PHP 
spl_autoload_register(function ($nombreClase) {
    require_once '../Controllers/' . $nombreClase . '.php';
});
$login = new LoginController();
$clientes = new ClientesControllers();
$ruta = new RutasControllers();
$vendedor = new VendedorController();
$categoria = new CategoriaControllers();

if (isset($_GET['op'])) {

    if ($_GET['op'] == "Iniciar_Sesion") {
        $login->iniciar_sesion();
    }
    /* Funciones de CLientes */
    if ($_GET['op'] == "Listar_Clientes") {
        $clientes->listar_clientes();
    } elseif ($_GET['op'] == "Codigo_Cliente") {
        $clientes->Codigo();
    } elseif ($_GET['op'] == "Preparar_Cliente") {
        $clientes->preparar_cliente();
    } elseif ($_GET['op'] == "Agregar_Cliente") {
        $clientes->Agregar_Cliente();
    } elseif ($_GET['op'] == "Actualizar_Cliente") {
        $clientes->actualizar_cliente();
    } elseif ($_GET['op'] == "Bloquear_Cliente") {
        $clientes->block();
    } elseif ($_GET['op'] == "Activar_Cliente") {
        $clientes->active();
    } elseif ($_GET['op'] == "Eliminar_Cliente") {
        $clientes->delete();
    }
    /* Funciones de Rutas */
    if ($_GET['op'] == "Listar_Vendedores") {
        $vendedor->listar_vendedor();
    } elseif ($_GET['op'] == "Preparar_Vendedor") {
        $vendedor->preparar_persona();
    } elseif ($_GET['op'] == "Preparar_Vendedor_Usuario") {
        $vendedor->prepare_user_vendedor();
    } elseif ($_GET['op'] == "Actualizar_Vendedor") {
        $vendedor->actualizar_datos_vendedor();
    } elseif ($_GET['op'] == "Actualizar_Vendedor_Usuario") {
        $vendedor->actualizar_usuario_vendedor();
    } elseif ($_GET['op'] == "Agregar_Vendedor") {
        $vendedor->agregar_vendedor();
    } elseif ($_GET['op'] == "Bloquear_Vendedor") {
        $vendedor->block();
    } elseif ($_GET['op'] == "Activar_Vendedor") {
        $vendedor->active();
    } elseif ($_GET['op'] == "Eliminar_Vendedor") {
        $vendedor->delete();
    }

    /* Funciones de Categorias */
    if ($_GET['op'] == "Agregar_Categoria") {
        $categoria->agregar_categoria();
    } elseif ($_GET['op'] == "Listar_Categoria") {
        $categoria->lisar_categoria();
    } elseif ($_GET['op'] == "Preparar_Categoria") {
        $categoria->lisar_categoria();
    }

    /* Funciones de Rutas */
    if ($_GET['op'] == "Listar_Rutas") {
        $ruta->Listar_Rutas();
    }
}