<?php
require_once "db.class.php";

class index extends database {

	private $pdo;
    public $id; 
    public $cedula;   
    public $nombre;
    public $apellido;
    public $usuario;
    public $idrol;
    

	public function __construct()
	{
		try
		{
			$this->pdo = new Database();   			
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function obtener($data)
	{
		try 
		{
			$query = $this->pdo
			          ->prepare("SELECT * FROM usuario where usuario=? and clave = ?");
			          

			$query->execute(array($data["usuario"], md5($data["clave"])));
			return $query->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


	/*public function iniciarSesion($data)
	{
		var_dump($data);
		try 
		{
			$sql = "SELECT * FROM usuario where usu=?";
			echo $sql;
			$query = $this->pdo
			        ->prepare($sql)			          
					->execute(
						array(
							$data["usuario"]
                    		)
					);

			return $query->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}*/
}

?>
