<?php
require_once("db.class.php");
class Hijos
{
	private $pdo;
    public $id;    
    public $nombre;
    public $apellido;
    

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

	public function listar()
	{
		try
		{
			$result = array();

			$query = $this->pdo->prepare("SELECT * FROM persona");
			$query->execute();

			return $query->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function obtener($id)
	{
		try 
		{
			$query = $this->pdo
			          ->prepare("SELECT * FROM persona WHERE id = ?");
			          

			$query->execute(array($id));
			return $query->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function eliminar($idPersona)
	{
		try 
		{
			$query = $this->pdo
			            ->prepare("DELETE FROM hijos WHERE idpersona = ?");			          

			$query->execute(array($idPersona));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function actualizar($data)
	{		
		try 
		{
			$sql = "UPDATE persona SET 
						cedula          = ?, 
						nombre          = ?, 
						apellido        = ?
                        
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data["cedula"],                         
                        $data["nombre"],                      
                        $data["apellido"],
                        $data["id"]
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function registrar($data, $idPersona)
	{
		//echo "idP: ".$idPersona."<br>";
		//var_dump($data);
		try 
		{
			for ($i=1; $i<=$data["numRows"]; $i++) {
				$sql = "INSERT INTO hijos (nombre, apellido, idpersona) 
		        VALUES (?, ?, ?)";		
				$this->pdo->prepare($sql)
		     		->execute(
						array(					
                    		$data["nombre_".$i],                    
                    		$data["apellido_".$i],
                    		$idPersona   
                		)
					);
			}
		
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}