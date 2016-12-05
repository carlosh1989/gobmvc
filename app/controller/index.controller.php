<?php
session_start();
require 'app/model/index.class.php';
//require 'app/model/rol.class.php';
require_once 'mvc.controller.php';

class index_controller extends MvcController{
   
	
   /* METODO QUE MUESTRA LA PAGINA PRINCIPAL CUANDO NO EXISTEN NUEVAS ORDENES
   OUTPUT
   HTML | codigo html de la pagina   
   */
   function principal($tipoVista)
   {
		$pagina=$this->load_template_index('Pagina Principal MVC');										
		
		//-------------------------------------------------------------------------------------------------		
		//$index  = new index();	
		
		ob_start();
		  									
		include 'app/views/modules/form_login.php';		
		$table = ob_get_clean();		
		if($tipoVista)	
			$pagina = $this->replace_content('/\#CONTENIDO\#/ms', $table."<center><h3>Usuario o Contraseña Incorrecto</h3></center>" , $pagina);				
		else	
	  		$pagina = $this->replace_content('/\#CONTENIDO\#/ms', $table , $pagina);
		$this->view_page($pagina);				
		//--------------------------------------------------------------------------------------------------
   } 
   function iniciarSesion($data)
   {	     		
   		$index  = new index();	
	    $tsArray = $index->obtener($data);
	    //var_dump($tsArray);
		if($tsArray!=''){
			echo "bien";
			//$_SESSION["rol"]=$tsArray["rol_id"];	
			$_SESSION["usuario"] = $data["usuario"];
			header('Location: principal.php');
		}
		else{
			session_destroy();
			$this->principal(1);
		}
   		//header('Location: principal.php');
   }

} 	
?>
