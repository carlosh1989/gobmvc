<?php
//require_once "db.class.php";

class privilegios {
	private $conexion;
	
	function conec()
	{
		//$this->conexion = (pg_connect("host=localhost port=5433 dbname=sigoca user=postgres password=1234")) or die(pg_last_error());
		//$this->conexion = (pg_connect("host=localhost port=8080 dbname=sigoca user=postgres password=winita")) or die(pg_last_error());
        $this->conexion = mysql_connect('localhost', 'root', 'Adm15.') or die('No se pudo conectar: ' . mysql_error());
        mysql_select_db("evaluacion_cajera",$this->conexion) or die(mysql_error());
	}
	function rolAcciones($idRol)
	{
		$this->conec();
		$sql="SELECT distinct(modulo) FROM rol_accion where rol_id=$idRol";
		//echo $sql."<br>";
		$query = mysql_query($sql, $this->conexion);

		if(mysql_num_rows($query) > 0) // existe -> datos correctos
		{		
			//se llenan los datos en un array
			while ( $tsArray = mysql_fetch_assoc($query) )
			{
				$data[] = $tsArray;		
				$modulos[] = $tsArray["modulo"];
			}
			return $modulos;
		}else
		{	
			return '';
		}			
	}
	function permisoModulo($idRol, $idModulo)
	{
		$this->conec();
		$sql="SELECT * FROM rol_accion where rol_id=$idRol and modulo = $idModulo";
		//echo $sql."<br>";
		$query = mysql_query($sql, $this->conexion);;

		if(mysql_num_rows($query) > 0) // existe -> datos correctos
		{
			//se llenan los datos en un array
			return true;
		}else
		{
			return false;
		}			
	}
	function accionesModulo($idRol, $idModulo)
	{
		$this->conec();
		$sql="SELECT * FROM rol_accion where rol_id=$idRol and modulo = $idModulo";
		//echo $sql."<br>";
		$query = mysql_query($sql, $this->conexion);;
 	   				
		if(mysql_num_rows($query) > 0) // existe -> datos correctos
		{		
			while ( $tsArray = mysql_fetch_assoc($query) )
			{
				$acciones[] = $tsArray["accion"];
			}
			return $acciones;
		}else
		{	
			return '';
		}			
	}
}
?>