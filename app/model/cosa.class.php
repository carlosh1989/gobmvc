<?php
require_once("db.class.php");
class Cosa
{
    private $pdo;
    public $id;
    public $nombre;
    public $descripcion;
    
    
    public function __construct()
    {
        try {
            $this->pdo = new Database();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function all()
    {
        try {
            $result = array();

            $query = $this->pdo->prepare("SELECT * FROM decretos");
            $query->execute();

            return $query->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtener($id)
    {
        try {
            $query = $this->pdo
                      ->prepare("SELECT * FROM rol WHERE id = ?");
                      
            $query->execute(array($id));
            return $query->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminar($id)
    {
        try {
            $query = $this->pdo
                        ->prepare("DELETE FROM rol WHERE id = ?");
            $query->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizar($data)
    {
        try {
            $sql = "UPDATE rol SET 
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
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function registrar($data)
    {
        
        try {
            $sql = "INSERT INTO rol (nombre, descripcion) 
		        VALUES (?, ?)";

            $this->pdo->prepare($sql)
             ->execute(
                array(
                    $data["nombre"],
                    $data["descripcion"]
                )
            );
        //$this->registrarRolAccion($data);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    /*function registrarRolAccion($data)
	{
		try 
		{						
			foreach($data[$i] as $key => $item)
			{						
				$sql = "insert into rol_accion (rol_id, modulo, accion) values (?, '?, ?)";
				
				$this->pdo->prepare($sql)
			     ->execute(
					array(
						$data["rol"], 
	                    $data["modulo"] 
	                    $data["accion"]                                          
	                )
				);
			}							
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}	
		
	}*/
}
