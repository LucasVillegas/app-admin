<?php
$_SESSION['usuario_dis'] = null;
$_SESSION['token_dis'] = null;
$_SESSION['carrito'] = null;
session_destroy();
$redireccion = '<script> window.location.href="' . SERVERURL . '" </script>';
echo $redireccion;