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
$unidad = new UnidadesControllers();
$producto = new ProductosControllers();


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
        $categoria->preparar_categoria();
    } elseif ($_GET['op'] == "Actualizar_Categoria") {
        $categoria->actualizar_categoria();
    } elseif ($_GET['op'] == "Eliminar_Categoria") {
        $categoria->elimiar_categoria();
    }

    /* Funciones de Unidad */
    if ($_GET['op'] == "Listar_Unidad") {
        $unidad->listar_unidad();
    } elseif ($_GET['op'] == "Preparar_Unidad") {
        $unidad->preparar_unidad();
    } elseif ($_GET['op'] == "Actualizar_Unidad") {
        $unidad->actualiar_unidad();
    } elseif ($_GET['op'] == "Agregar_Unidad") {
        $unidad->agregar_unidad();
    } elseif ($_GET['op'] == "Bloquear_Unidad") {
        $unidad->block();
    } elseif ($_GET['op'] == "Activar_Unidad") {
        $unidad->active();
    } elseif ($_GET['op'] == "Eliminar_Unidad") {
        $unidad->delete();
    }

    /* Rutas para Productos */
    if ($_GET['op'] == "listar_Productos") {
        $producto->listar_productos();
    } elseif ($_GET['op'] == "Listar_Unidades_Producto") {
        $unidad->list_unidades();
    } elseif ($_GET['op'] == "Listar_Categoria_Producto") {
        $categoria->listar_categoria();
    } elseif ($_GET['op'] == "Generar_Codigo_Producto") {
        $producto->generar_codigo();
    } elseif ($_GET['op'] == "Preparar_Producto") {
        $producto->preparar_producto();
    } elseif ($_GET['op'] == "Bloquear_Producto") {
        $producto->block();
    } elseif ($_GET['op'] == "Activar_Producto") {
        $producto->active();
    } elseif ($_GET['op'] == "Eliminar_Producto") {
        $producto->delete();
    } elseif ($_GET['op'] == "Agregar_Producto") {
        $producto->agregar_producto();
    } elseif ($_GET['op'] == "Actualizar_Producto") {
        $producto->actualizar_productos();
    }

    /* Funciones de Rutas */
    if ($_GET['op'] == "Listar_Rutas") {
        $ruta->Listar_Rutas();
    } elseif ($_GET['op'] == "Listar_Rutas_Ruta") {
        $ruta->Lista_Rutas();
    } elseif ($_GET['op'] == "Listar_Vendedores_Ruta") {
        $ruta->Listar_vendedores();
    } elseif ($_GET['op'] == "Preparar_Ruta") {
        $ruta->Preparar_Ruta();
    }
}