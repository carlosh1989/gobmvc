<?php
// Dividimos la URL.
$requestURI = explode( '/', $_SERVER['REQUEST_URI'] );
// Eliminamos los espacios del principio y final
// y recalculamos los índices del vector.
$requestURI = array_values( array_filter( $requestURI ) );
$controlador = $requestURI[2];

$metodo = $requestURI[3];

list($nombreControlador,$ext) = explode('.', $controlador);
//echo $requestURI[2];
require_once __DIR__ . '/vendor/autoload.php';
require 'app/controller/'.$nombreControlador.'.controller.php';
$nombreClase = ucfirst($nombreControlador).'Controller';        
$controller = new $nombreClase();
$controller->$metodo(); 
