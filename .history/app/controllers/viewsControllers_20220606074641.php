<?php
require_once "./app/Models/viewsModels.php";

class viewsControllers extends viewsModels
{
    public function obtener_plantilla_controlador()
    {
        return include_once './resources/views/layouts/app.php';
    }

    public function obtener_vistas_controlador()
    {
        if (isset($_GET['vista'])) { // identificar si viene definda la vitas,se recupera la varia del hyaccess para obtener la vida a mostrar es Get porque todo los valores van de tipo url.
            $ruta = explode("/", $_GET['vista']); // permite partir la variable enviada
            $respuesta = viewsModels::obtener_vistas_modelo($ruta[0]);  // recordando que queremos usar el modelo de este controlador que el modelo, se usa self o el nombre del modelo para hacer una instancia de las funciones de la clase heredada
        } else {
            $respuesta = "login"; // cuando la variable no esta definida o el usuario solo se le muestra la vista del login
        }
        return $respuesta;
    }
}