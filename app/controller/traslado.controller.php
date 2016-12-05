<?php
use Jenssegers\Blade\Blade;
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
        $this->decretos = $this->traslado->all('decretos');
        $this->vista('all', 'Traslados');
    }

    public function create()
    {
        $this->decreto = $this->traslado->find(1,'decretos');
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
}
