<?php
require_once 'mvc.controller.php';

class Controller extends MvcController
{
    public function __CONSTRUCT()
    {
        $this->traslado = $this->modelo('traslado');
        $this->orm = $this->modelo('orm');
		
    }

	public function method( $param1, $param2 = 'No especificado', $param3 = 'No especificado' )
	{
		echo "Parámetro 1: $param1";
		echo '<br>';
		echo "Parámetro 2: $param2";
		echo '<br>';
		echo "Parámetro 3: $param3";
		$this->MvcController = new MvcController;
		$this->MvcController->ver_arreglo($param2);
	}
}

?>