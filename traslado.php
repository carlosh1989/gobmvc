<?php
require 'app/controller/traslado.controller.php';
        
 $controller = new TrasladoController();
    
if (isset($_GET["a"]) and $_GET["a"]=="create") {
    $controller->create();
} else if (isset($_GET["a"]) and $_GET["a"]=="store") {
        $controller->store();
} else if (isset($_GET["a"]) and $_GET["a"]=="guardar") {
    $controller->guardar();
} else {
    $controller->principal();
}
