<?php
	//require 'app/model/persona.class.php';
	require_once 'mvc.controller.php';

class PrincipalController extends MvcController{

	private $model;
	private $menu;
	private $pagina;

	public function __CONSTRUCT(){
        //$this->model = new Persona();
        $this->pagina = $this->load_template('Pagina Principal MVC');	
        $this->menu = $this->menu();
        $this->pagina = $this->replace_content('/\#TITULO\#/ms' ,"Principal" , $this->pagina);
		$this->pagina = $this->replace_content('/\#MENU\#/ms' ,$this->menu , $this->pagina);
			//$pagina = $this->replace_content('/\#ROL\#/ms', $_SESSION["usuario"], $pagina);	
    }

   	function principal()
   	{	   							
		ob_start();
		//$alm = $this->model->Listar();
		//var_dump($alm);
		//$tsArrayMunicipio = $georeferencial->municipios();						
		include 'app/views/modules/m.principal.php';				
		$table = ob_get_clean();	
		$this->pagina = $this->replace_content('/\#CONTENIDO\#/ms', $table , $this->pagina);		
		$this->view_page($this->pagina);			
   } 
} 	

 



?>