
<?php
require 'app/controller/accion_especifica.controller.php';
		
	$controller = new AccionEspecificaController();
	
	if(isset($_GET["a"]) and $_GET["a"]=="crud")
		$controller->crud();	
	
	else if(isset($_GET["a"]) and $_GET["a"]=="eliminar")
		$controller->eliminar();

	else if(isset($_GET["a"]) and $_GET["a"]=="guardar")
		$controller->guardar();
	
	else if(isset($_POST["tipoFormulario"])){		
		$controller->guardar();
	}
	
	else
		$controller->principal();

	

?>