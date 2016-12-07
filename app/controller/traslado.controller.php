<?php
require_once 'mvc.controller.php';

class TrasladoController extends MvcController
{
    public function __CONSTRUCT()
    {
        $this->traslado = $this->modelo('traslado');
        $this->orm = $this->modelo('orm');
    }
    
    public function principal()
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
        extract($_POST);
        $data['numero'] = $numero;
        $data['descripcion'] = $descripcion;
        $this->orm->guardar('decretos',$data);
        $this->ir('traslado');
    }
    
    public function eliminar()
    {
        $this->model->eliminar($_REQUEST['id']);
        header('Location: rol.php');
    }
}
