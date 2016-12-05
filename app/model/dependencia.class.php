<?php
require_once("db.class.php");
class Dependencia
{
	private $pdo;
    public $id;
    public $codigo;
    public $descripcion;
    public $direccion;
    public $telefono;
    public $correo;
    
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

			$query = $this->pdo->prepare("SELECT * FROM dependencia");
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
			          ->prepare("SELECT * FROM dependencia WHERE id = ?");
			          

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
			            ->prepare("DELETE FROM dependencia WHERE id = ?");			          
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
			$sql = "UPDATE dependencia SET 
						codigo          = ?, 
						descripcion     = ?, 
						direccion       = ?, 
						telefono        = ?,
						correo = ?                       
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data["codigo"],                         
                        $data["descripcion"],                      
                        $data["direccion"],
                        $data["telefono"],
                        $data["correo"],
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
		$sql = "INSERT INTO dependencia (codigo, descripcion, direccion, telefono, correo) 
		        VALUES (?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data["codigo"], 
                    $data["descripcion"],                    
                    $data["direccion"],
                    $data["telefono"],
                    $data["correo"]                    
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}