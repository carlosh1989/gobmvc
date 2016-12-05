<?php
require 'app/controller/usuario.controller.php';
		
	$controller = new UsuarioController();
	
	if(isset($_GET["a"]) and $_GET["a"]=="crud")
		$controller->crud();	
		
	
	
	else if(isset($_GET["a"]) and $_GET["a"]=="eliminar")
		$controller->eliminar();

	else if(isset($_GET["a"]) and $_GET["a"]=="guardar")
		$controller->guardar();
	
	
	else
		$controller->principal();

	

?>