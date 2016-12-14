<?php
require_once __DIR__ . '/vendor/autoload.php';
require 'app/controller/traslado.controller.php';
        
 $controller = new TrasladoController();
    
if (isset($_GET["a"]) and $_GET["a"]=="create") {
    $controller->create();
} else if (isset($_GET["a"]) and $_GET["a"]=="store") {
        $controller->store();
} else if (isset($_GET["a"]) and $_GET["a"]=="guardar") {
    $controller->guardar();
}else if (isset($_GET["a"]) and $_GET["a"]=="show") {
    $controller->show();
}else if (isset($_GET["a"]) and $_GET["a"]=="agregarDetalle") {
    $controller->agregarDetalle();
} else {
    $controller->principal();
}
