<?php
require_once 'mvc.controller.php';



class TrasladoController extends MvcController
{
    private $model;

    public function __CONSTRUCT()
    {
        $this->traslado = $this->load_model('traslado');
    }
    
    public function principal()
    {
        $this->vista('all', 'Traslados');
    }

    public function create()
    {
        //$this->all = $this->traslado->all('decretos');
        //$this->decreto = $this->traslado->find(1,'decretos');
        //var_dump($this->all);
        $this->vista('create', 'Crear Nuevo Decreto');
    }

    public function store()
    {
        extract($_POST);
        $data['numero'] = $numero;
        $data['descripcion'] = $descripcion;
        var_dump($data);
        $this->traslado->store($data);
        $this->all = $this->traslado->all('decretos');
        var_dump($this->all);
    }




    //Llama al formulario para editar o crear un registro
    public function crud()
    {
        
        ob_start();
        $rol = new Rol();
        
        if (isset($_REQUEST['id'])) {
            $rol = $this->model->obtener($_REQUEST['id']);
        }
        include 'app/views/modules/rol_form.php';

        $table = ob_get_clean();
        $this->pagina = $this->replace_content('/\#CONTENIDO\#/ms', $table, $this->pagina);
        $this->view_page($this->pagina);
    }
    
    public function guardar()
    {
        var_dump($_REQUEST);
        /*$_REQUEST['id'] > 0
            ? $this->model->actualizar($_REQUEST)
            : $this->model->registrar($_REQUEST);
        
        header('Location: rol.php');*/
    }
    
    public function eliminar()
    {
        $this->model->eliminar($_REQUEST['id']);
        header('Location: rol.php');
    }



    function vista($vista, $titulo)
    {
        $this->pagina = $this->load_layout('app');
        $this->menu = $this->menu();
        $this->pagina = $this->replace_content('/\#TITULO\#/ms', $titulo, $this->pagina);
        $this->pagina = $this->replace_content('/\#MENU\#/ms', $this->menu, $this->pagina);
        ob_start();
        include 'app/views/modules/'.$this->nombreArchivo().'/'.$vista.'.php';
        $table = ob_get_clean();
        $this->pagina = $this->replace_content('/\#CONTENIDO\#/ms', $table, $this->pagina);
        return $this->view_page($this->pagina);
    }

    public function load_model($modelo)
    {
        $nombreModel = 'app/model/'.$modelo.'.class.php';
        require_once $nombreModel;
        return new $modelo();
    }

    public function nombreArchivo()
    {
        $nombre_archivo = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        //verificamos si en la ruta nos han indicado el directorio en el que se encuentra
        if (strpos($nombre_archivo, '/') !== false) {
            //de ser asi, lo eliminamos, y solamente nos quedamos con el nombre sin su extension
            $nombre_archivo = preg_replace('/\.php$/', '', array_pop(explode('/', $nombre_archivo)));
        }

        return $nombre_archivo;
    }
}
