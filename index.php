<?php 
require_once __DIR__ . '/vendor/autoload.php';
// Dividimos la URL.
$requestURI = explode( '/', $_SERVER['REQUEST_URI'] );
// Eliminamos los espacios del principio y final
// y recalculamos los índices del vector.
$requestURI = array_values( array_filter( $requestURI ) );

$krumo = new Krumo;
$krumo->dump($requestURI);

