<?php
require_once 'system/Controller.php';
require_once 'system/database.php';

class TrasladoController extends Controller
{
    public function __CONSTRUCT()
    {
        $this->traslado = $this->modelo('traslado');
        $this->orm = new Database();
    }
    
    public function index()
    {
        $this->decretos = $this->orm->todo('decretos');
        $this->vista('traslado/all', 'Traslados');
    }

    public function cosa()
    {
        $data['numero'] = "jjjjjjjj";
        $data['descripcion'] = "jjjjjjjj";
        $this->orm->guardar('decretos',$data);
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
