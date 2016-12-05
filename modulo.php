<?php
require 'app/controller/modulo.controller.php';
		
	$controller = new ModuloController();
	
	if(isset($_GET["a"]) and $_GET["a"]=="crud")
		$controller->crud();	
		
	
	
	else if(isset($_GET["a"]) and $_GET["a"]=="eliminar")
		$controller->eliminar();

	else if(isset($_GET["a"]) and $_GET["a"]=="guardar")
		$controller->guardar();
	
	
	else{
		//echo "princi";
		$controller->principal();
	}

	

?>