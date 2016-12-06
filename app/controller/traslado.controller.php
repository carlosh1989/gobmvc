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
        $this->decreto = $this->orm->buscar('decretos',1);
        $this->vista('create', 'Crear Nuevo Decreto');
    }

    public function store()
    {
        extract($_POST);
        $data['numero'] = $numero;
        $data['descripcion'] = $descripcion;
        $this->orm->guardar('decretos',$data);
        //$this->ir_con_datos('traslado',$data);
        //$this->ver_arreglo($data);
      /*  $table = "decretos";
        $array = $data;
       $str = "insert into $table ";
       $strv = "";
       while(list($name,$value) = each($array)) {

           if(is_bool($value)) {
                    $strn .= "$name,";
                    $strv .= ($value ? "true":"false") . ",";
                    continue;
            };

           if(is_string($value)) {
                    $strn .= "$name,";
                    $strv .= "'$value',";
                    continue;
            }
           if (!is_null($value) and ($value != "")) {
                    $strn .= "$name,";
                    $strv .= "$value,";
                    continue;
           }
       }

       $strv[strlen($strv)-1] = '';
       $str .= $strn . $strv;
       echo $strn; //numero , descripcion
       echo "<hr>";
       echo $strv; //'259/16','333'*/
    }

    
    public function guardar()
    {
        var_dump($_REQUEST);
        $_REQUEST['id'] > 0
            ? $this->traslado->actualizar($_REQUEST)
            : $this->traslado->registrar($_REQUEST);
        
        header('Location: rol.php');
    }
    
    public function eliminar()
    {
        $this->model->eliminar($_REQUEST['id']);
        header('Location: rol.php');
    }
}
