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
        $this->decreto = $this->orm->buscar('decretos', $id);
        $this->detallesMas = $this->traslado->buscarDetallesAumentos($id);
        $this->detallesMenos = $this->traslado->buscarDetallesDisminuciones($id);
        $this->detallesSuma = $this->traslado->sumaDetalles(164);
        //$this->ver_arreglo($this->detallesSuma);
        $this->vista('show', 'Decreto');
    }


    public function agregarDetalle()
    {
        extract($_POST);
        $this->ver_arreglo($_POST);
        $monto1 = str_replace(".", "", $monto);
        $monto2 = str_replace(",", ".", $monto1);
        echo $monto2;
        $data['decreto_id'] = $idDecreto;
        $data['codigo_presupuestario'] = $codigo_presupuestario;
        $data['monto'] = $monto2;
        $data['estado'] = TRUE;
        $data['traslado'] = $traslado;
        $this->ver_arreglo($data);
        $monto_actual =  $this->traslado->sumaDetalles(164);
        $monto_sumado = $monto_actual + $monto2; 
        //$monto_sumado = $monto_sumado + 20000.45;
        echo $monto_sumado;
        echo "<hr>";
        echo $idDecreto;
        $this->decreto = $this->orm->buscar('decretos', $idDecreto);
        $this->ver_arreglo($this->decreto);
        echo "<hr>";

        if ($monto_sumado >= $this->decreto->monto_total) 
        {

        } 
        else 
        {
            $this->orm->guardar('detalles', $data);
            echo "guardado";
        }
        //$this->orm->guardar('decretos', $data);
    }
    
    public function eliminar()
    {
        $this->model->eliminar($_REQUEST['id']);
        header('Location: rol.php');
    }
}
