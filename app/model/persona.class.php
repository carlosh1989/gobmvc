<?php
require_once("db.class.php");
require_once("hijos.class.php");
class Persona
{
	private $pdo;
    public $id;
    public $cedula;
    public $nombre;
    public $apellido;
    public $hijos;
    

	public function __construct()
	{
		try
		{
			$this->pdo = new Database();   
			$this->hijos = new Hijos();  
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

	public function eliminar($id)
	{
		try 
		{
			$this->hijos->eliminar($id);
			$query = $this->pdo
			            ->prepare("DELETE FROM persona WHERE id = ?");			          

			$query->execute(array($id));
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

	public function obtenerId()
	{
		try 
		{
			$query = $this->pdo
			          ->prepare("select nextval('persona_id') as id;");
			          

			$query->execute();
			return $query->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function registrar($data)
	{
		
		try 
		{
		$sql = "INSERT INTO persona (cedula, nombre, apellido) 
		        VALUES (?, ?, ?)";
		
		$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data["cedula"], 
                    $data["nombre"],                    
                    $data["apellido"]                    
                )
			);
		$id = $this->obtenerId();
		
		$this->hijos->registrar($data, $id->id-1);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}