<?php 
require 'app/controller/index.controller.php';
    
$mvc = new index_controller();
if(isset($_POST["tipoFormulario"]))	
{
	if($_POST["tipoFormulario"]=="form_index_inicio")
		//echo "entro";
		$mvc->iniciarSesion($_POST);
}
else
{
	session_destroy();
	$mvc->principal(0);
}

?>