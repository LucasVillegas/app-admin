const
    API_INICIAR_SESION = `${location.origin}/app/routes/web.php?op=Iniciar_Sesion`,
    //Rutas para Clienets
    API_LISTAR_CLIENTES = `${location.origin}/app/routes/web.php?op=Listar_Clientes`,
    API_CODIGO_CLIENTE = `${location.origin}/app/routes/web.php?op=Codigo_Cliente`,
    API_PREPARAR_CLIENTE = `${location.origin}/app/routes/web.php?op=Preparar_Cliente`,
    API_AGREGAR_CLIENTES = `${location.origin}/app/routes/web.php?op=Agregar_Cliente`,
    API_ACTUALIZAR_CLIENTE = `${location.origin}/app/routes/web.php?op=Actualizar_Cliente`,
    API_BLOQUEAR_CLIENTE = `${location.origin}/app/routes/web.php?op=Bloquear_Cliente`,
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
    API_BLOQUEAR_CLIENTE
};
