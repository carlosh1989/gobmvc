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
        $data['fecha'] = date('d').'/'.date('m').'/'.date('Y');
        $data['numero'] = $numero;
        $data['descripcion'] = $descripcion;
        $data['observaciones'] = "";
        $data['tipo_movimiento'] = 'Traslado';
        $montototal1 = str_replace(".", "", $montoTotal);
        $montototal2 = str_replace(",", ".", $montototal1);
        $data['monto_total'] = $montototal2;
        $data['estado'] = true;
        $this->orm->guardar('decretos', $data);
        $this->ir('traslado');
    }

    public function show()
    {
        $id = $_REQUEST['idDecreto'];
        $this->decreto = $this->orm->buscar('decretos',$id);
        $this->detallesMas = $this->traslado->buscarDetallesAumentos($id);
        $this->detallesMenos = $this->traslado->buscarDetallesDisminuciones($id);
        $this->detallesSuma = $this->traslado->buscarDetallesSuma($id);
        //echo $decreto[0]->numero;
        //$this->ver_arreglo($this->detallesMas);
        //$this->ver_arreglo($this->detallesMenos);
        $monto_actual = 0;
        foreach ($this->detallesSuma as $key => $monto) {
            $monto_actual = $monto_actual + $monto->monto;
        }

        $this->detallesSuma = $monto_actual;
        //$this->ver_arreglo($this->detallesSuma);
        $this->vista('show', 'Decreto');
    }

    public function agregarDetalle()
    {
        $this->ver_arreglo($_POST);
    }
    
    public function eliminar()
    {
        $this->model->eliminar($_REQUEST['id']);
        header('Location: rol.php');
    }
}
