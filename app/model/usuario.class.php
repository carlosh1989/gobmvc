<?php
require_once("db.class.php");
class Usuario
{
	private $pdo;
    public $id;
    public $codigo;
    public $descripcion;
    public $direccion;
    public $telefono;
    public $correo;
    public $rol;
    
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

			$query = $this->pdo->prepare("SELECT * FROM usuario");
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
			          ->prepare("SELECT * FROM usuario WHERE id = ?");
			          

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
			            ->prepare("DELETE FROM usuario WHERE id = ?");			          
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
			$sql = "UPDATE usuario SET 
						cedula          = ?, 
						nombre     = ?, 
						apellido       = ?, 
						usuario        = ?,
						clave = ?,
						idrol = ?                
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data["cedula"],                         
                        $data["nombre"],                      
                        $data["apellido"],
                        $data["usuario"],
                        md5($data["clave"]),
                        $data["rol"],
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
		$sql = "INSERT INTO usuario (cedula, nombre, apellido, usuario, clave, idrol) 
		        VALUES (?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data["cedula"], 
                    $data["nombre"],                    
                    $data["apellido"],
                    $data["usuario"],
                    md5($data["clave"]),
                    $data["rol"]                  
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}