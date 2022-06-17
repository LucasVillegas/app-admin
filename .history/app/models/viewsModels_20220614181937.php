<?php
class viewsModels
{
   protected function obtener_vistas_modelo($vistas)
   { // recibi una variable para obtenr la vista
      $listaBlanca = [
         "home", "login", "404", "vendedores", "clientes", "carrito", "ventas", "detalle-venta", "productos", "rutas",
         "perfil", "logout",  "ventas-list"
      ];
      // lista de las palabras permitidas como URL
      if (in_array($vistas, $listaBlanca)) { // va a ver si la palabra manda esta en la lista permitida
         if (is_file("./resources/views/pages/" . $vistas . ".php")) { // para comprobar si ese fichero existe y mostrar el contenido
            $content = "./resources/views/pages/" . $vistas . ".php";
         } else {
            $content = "login";
         }
      } elseif ($vistas == "login") { // que si vitas no es correcta me muestra el login
         $content = "login";
      } elseif ($vistas == "index") { // define de donde viene la URL y si no trae muestra el login
         $content = "login";
      } else {
         $content = "404"; // por defecto retorna el login
      }
      return $content;
   }
}