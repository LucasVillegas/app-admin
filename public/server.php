<?php

require_once "./app/core/config.php";
require_once "./app/Controllers/viewsControllers.php";

$layout = new viewsControllers();
$layout->obtener_plantilla_controlador();