<?php

class Controller
{
	public static function Method( $param1, $param2 = 'No especificado', $param3 )
	{
		echo "Parámetro 1: $param1";
		echo '<br>';
		echo "Parámetro 2: $param2";
		echo '<br>';
		echo "Parámetro 3: $param3";
	}
}

?>