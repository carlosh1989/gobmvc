<?php
require_once("db.class.php");

class Modulo
{
	private $pdo;
    public $id;
    public $nombre;
    public $descripcion;
    
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

			$query = $this->pdo->prepare("SELECT * FROM modulo");
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
			          ->prepare("SELECT * FROM modulo WHERE id = ?");
			          

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
			$query = $this->pdo
			            ->prepare("DELETE FROM modulo WHERE id = ?");			          
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
			$sql = "UPDATE modulo SET 
						nombre          = ?,
						descripcion     = ?
						         
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data["nombre"],                         
                        $data["descripcion"],                                              
                        $data["id"]
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function registrar($data)
	{
		
		try 
		{
		$sql = "INSERT INTO modulo (nombre, descripcion) 
		        VALUES (?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data["nombre"], 
                    $data["descripcion"]                 
                                      
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}