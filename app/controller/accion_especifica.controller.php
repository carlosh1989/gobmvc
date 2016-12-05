<?php
require_once 'app/model/accion_especifica.class.php';
require_once 'app/model/accion_centralizada.class.php';
require_once 'mvc.controller.php';

class AccionEspecificaController extends MvcController{
    
    private $model;
    private $modelAC;
    
    public function __CONSTRUCT(){
        $this->model = new AccionEspecifica();
        $this->modelAC = new AccionCentralizada();
        $this->pagina = $this->load_template('Pagina Maestra');   
        $this->menu = $this->menu();
        $this->pagina = $this->replace_content('/\#TITULO\#/ms' ,"Acción Especifica" , $this->pagina);
        $this->pagina = $this->replace_content('/\#MENU\#/ms' ,$this->menu , $this->pagina);
    }
    
    public function principal(){
        ob_start();
               
        include 'app/views/modules/accion_especifica_index.php';                
        $table = ob_get_clean();    
        $this->pagina = $this->replace_content('/\#CONTENIDO\#/ms', $table , $this->pagina);        
        $this->view_page($this->pagina);
    }
    //Llama al formulario para editar o crear un registro
    public function crud(){
        
        ob_start();  


        $accionEspecifica = new AccionEspecifica();
        
        
        if(isset($_REQUEST['id'])){
            $accionEspecifica = $this->model->obtener($_REQUEST['id']);
        }              
        include 'app/views/modules/accion_especifica_form.php';

        $table = ob_get_clean();    
        $this->pagina = $this->replace_content('/\#CONTENIDO\#/ms', $table , $this->pagina);        
        $this->view_page($this->pagina);
      
    }
    
    public function guardar(){
       
        $_REQUEST['id'] > 0 
            ? $this->model->actualizar($_REQUEST)
            : $this->model->registrar($_REQUEST);
        
        header('Location: accion_especifica.php');
    }
    
    public function eliminar(){
        $this->model->eliminar($_REQUEST['id']);
        header('Location: accion_especifica.php');
    }
}