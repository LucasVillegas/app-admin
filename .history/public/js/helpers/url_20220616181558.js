const
    API_INICIAR_SESION = `${location.origin}/app/routes/web.php?op=Iniciar_Sesion`,
    //Rutas para Clienets
    API_LISTAR_CLIENTES = `${location.origin}/app/routes/web.php?op=Listar_Clientes`,
    API_CODIGO_CLIENTE = `${location.origin}/app/routes/web.php?op=Codigo_Cliente`,
    API_PREPARAR_CLIENTE = `${location.origin}/app/routes/web.php?op=Preparar_Cliente`,
    API_AGREGAR_CLIENTES = `${location.origin}/app/routes/web.php?op=Agregar_Cliente`,
    API_ACTUALIZAR_CLIENTE = `${location.origin}/app/routes/web.php?op=Actualizar_Cliente`,
    API_BLOQUEAR_CLIENTE = `${location.origin}/app/routes/web.php?op=Bloquear_Cliente`,
    API_ACTIVAR_CLIENTE = `${location.origin}/app/routes/web.php?op=Activar_Cliente`,
    API_ELIMINAR_CLIENTE = `${location.origin}/app/routes/web.php?op=Eliminar_Cliente`,
    //Rutas Para Vendedores
    API_LISTAR_VENDEDORES = `${location.origin}/app/routes/web.php?op=Listar_Vendedores`,
    API_PREPARAR_VENDEDOR = `${location.origin}/app/routes/web.php?op=Preparar_Vendedor`,
    API_PREPARE_USER_VENDEDOR = `${location.origin}/app/routes/web.php?op=Preparar_Vendedor_Usuario`,

    //Rutas Para Rutas
    API_LISTAR_RUTAS = `${location.origin}/app/routes/web.php?op=Listar_Rutas`;
//Listar_Rutas

export default {
    API_INICIAR_SESION,
    API_LISTAR_CLIENTES,
    API_LISTAR_RUTAS,
    API_CODIGO_CLIENTE,
    API_PREPARAR_CLIENTE,
    API_AGREGAR_CLIENTES,
    API_ACTUALIZAR_CLIENTE,
    API_BLOQUEAR_CLIENTE,
    API_ACTIVAR_CLIENTE,
    API_ELIMINAR_CLIENTE,
    API_LISTAR_VENDEDORES,
    API_PREPARAR_VENDEDOR, worldAPI_PREPARE_USER_VENDEDOR
};
