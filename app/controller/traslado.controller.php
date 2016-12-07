<?php
require_once 'mvc.controller.php';

class TrasladoController extends MvcController
{
    public function __CONSTRUCT()
    {
        $this->traslado = $this->modelo('traslado');
        $this->orm = $this->modelo('orm');
    }
    
    public function index()
    {
        $this->decretos = $this->orm->todo('decretos');
        $this->vista('all', 'Traslados');
    }

    public function create()
    {
        $this->vista('create', 'Crear Nuevo Decreto');
    }

    public function store()
    {
        $this->orm->guardar('decretos', $_POST);
        $this->ir('traslado');
    }
    
    public function eliminar()
    {
        $this->model->eliminar($_REQUEST['id']);
        header('Location: rol.php');
    }
}
