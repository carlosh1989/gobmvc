<?php
require_once 'app/model/dependencia.class.php';
require_once 'mvc.controller.php';

class DependenciaController extends MvcController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Dependencia();
        $this->pagina = $this->load_template('Pagina Maestra');   
        $this->menu = $this->menu();
        $this->pagina = $this->replace_content('/\#TITULO\#/ms' ,"Dependencia" , $this->pagina);
        $this->pagina = $this->replace_content('/\#MENU\#/ms' ,$this->menu , $this->pagina);
    }
    
    public function principal(){
        ob_start();
               
        include 'app/views/modules/dependencia_index.php';                
        $table = ob_get_clean();    
        $this->pagina = $this->replace_content('/\#CONTENIDO\#/ms', $table , $this->pagina);        
        $this->view_page($this->pagina);
    }
    //Llama al formulario para editar o crear un registro
    public function crud(){
        
        ob_start();  
        $dependencia = new Dependencia();
        
        if(isset($_REQUEST['id'])){
            $dependencia = $this->model->obtener($_REQUEST['id']);
        }              
        include 'app/views/modules/dependencia_form.php';

        $table = ob_get_clean();    
        $this->pagina = $this->replace_content('/\#CONTENIDO\#/ms', $table , $this->pagina);        
        $this->view_page($this->pagina);
      
    }
    
    public function guardar(){
        
        $_REQUEST['id'] > 0 
            ? $this->model->actualizar($_REQUEST)
            : $this->model->registrar($_REQUEST);
        
        header('Location: dependencia.php');
    }
    
    public function eliminar(){
        $this->model->eliminar($_REQUEST['id']);
        header('Location: dependencia.php');
    }
}