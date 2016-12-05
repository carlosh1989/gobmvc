<?php 
require_once("db.class.php");
class AccionEspecifica
{
	private $pdo;
    public $id;
    public $id_accion_centralizada;
    public $codigo;
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

			$query = $this->pdo->prepare("SELECT ae.id, ae.codigo, ae.descripcion, ae.id_accion_centralizada, 
											ac.descripcion as descrip_accion_centralizada 
											FROM accion_especifica ae
											LEFT JOIN accion_centralizada ac on ae.id_accion_centralizada = ac.id");
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
			          ->prepare("SELECT * FROM accion_especifica WHERE id = ?");
			          

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
			            ->prepare("DELETE FROM accion_especifica WHERE id = ?");			          

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
			$sql = "UPDATE accion_especifica SET 
						id_accion_centralizada
						codigo          = ?, 
						descripcion     = ?						
                        
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
				    	$data["accionCentralizada"],  
                        $data["codigo"],                         
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
		$sql = "INSERT INTO accion_especifica (id_accion_centralizada, codigo, descripcion) 
		        VALUES (?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data["accionCentralizada"],
					$data["codigo"], 
                    $data["descripcion"]                                                  
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}