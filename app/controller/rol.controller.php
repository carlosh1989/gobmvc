<?php
require_once 'app/model/rol.class.php';
require_once 'app/model/modulo.class.php';
require_once 'mvc.controller.php';

class RolController extends MvcController{
    
    private $model;
    private $modelModulo;

    public function __CONSTRUCT(){
        $this->model = new Rol();
        $this->modelModulo = new Modulo();
        $this->pagina = $this->load_template('Pagina Maestra');   
        $this->menu = $this->menu();
        $this->pagina = $this->replace_content('/\#TITULO\#/ms' ,"Roles" , $this->pagina);
        $this->pagina = $this->replace_content('/\#MENU\#/ms' ,$this->menu , $this->pagina);
    }
    
    public function principal(){
        ob_start();
               
        include 'app/views/modules/rol_index.php';                
        $table = ob_get_clean();    
        $this->pagina = $this->replace_content('/\#CONTENIDO\#/ms', $table , $this->pagina);        
        $this->view_page($this->pagina);
    }
    //Llama al formulario para editar o crear un registro
    public function crud(){
        
        ob_start();  
        $rol = new Rol();
        
        if(isset($_REQUEST['id'])){
            $rol = $this->model->obtener($_REQUEST['id']);
        }              
        include 'app/views/modules/rol_form.php';

        $table = ob_get_clean();    
        $this->pagina = $this->replace_content('/\#CONTENIDO\#/ms', $table , $this->pagina);        
        $this->view_page($this->pagina);
      
    }
    
    public function guardar(){
        var_dump($_REQUEST);
        /*$_REQUEST['id'] > 0 
            ? $this->model->actualizar($_REQUEST)
            : $this->model->registrar($_REQUEST);
        
        header('Location: rol.php');*/
    }
    
    public function eliminar(){
        $this->model->eliminar($_REQUEST['id']);
        header('Location: rol.php');
    }
}