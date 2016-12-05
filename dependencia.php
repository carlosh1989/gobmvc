<?php
require 'app/controller/dependencia.controller.php';
		
	$controller = new DependenciaController();
	
	if(isset($_GET["a"]) and $_GET["a"]=="crud")
		$controller->crud();	
		
	
	
	else if(isset($_GET["a"]) and $_GET["a"]=="eliminar")
		$controller->eliminar();

	else if(isset($_GET["a"]) and $_GET["a"]=="guardar")
		$controller->guardar();
	
	
	else
		$controller->principal();

	

?>