<?php
require_once 'system/Controller.php';

class TrasladoController extends Controller
{
    public function __CONSTRUCT()
    {
        $this->traslado = $this->modelo('traslado');
    }

    public function index()
    {
        $data['titulo'] = "Decreto ( Traslado de Partida ) ";
        $data['decretos'] = $this->traslado->todo('decretos');
        $this->view('traslado/all', $data);
    }

    public function create()
    {
        $this->view('traslado/create');
    }

    public function guardar()
    {
        $data['numero'] = "++++++++++++";
        $data['descripcion'] = "++++++++++++";
        $this->traslado->guardar('decretos', $data);
        echo "listo";
    }

  /*  public function create()
    {
        $this->vista('traslado/create', 'Crear Nuevo Decreto');
    }

    public function store()
    {
        $this->orm->guardar('decretos', $_POST);
        $this->ir('index.php/traslado/index');
    }
    
    public function eliminar()
    {
        $this->model->eliminar($_REQUEST['id']);
        header('Location: rol.php');
    }*/
}
