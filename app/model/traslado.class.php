<?php
require_once("db.class.php");
class Traslado
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

    public function store($data)
    {
        try {
            $sql = "INSERT INTO decretos (numero, descripcion) 
		            VALUES (?, ?)";

            $this->pdo->prepare($sql)
             ->execute(array($data["numero"],$data["descripcion"]));
        //$this->registrarRolAccion($data);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function guardar($table,$array)
    {
       $str = "insert into $table ";
       $strn = "(";
       $strv = " VALUES (";
       while(list($name,$value) = each($array)) {

           if(is_bool($value)) {
                    $strn .= "$name,";
                    $strv .= ($value ? "true":"false") . ",";
                    continue;
            };

           if(is_string($value)) {
                    $strn .= "$name,";
                    $strv .= "'$value',";
                    continue;
            }
           if (!is_null($value) and ($value != "")) {
                    $strn .= "$name,";
                    $strv .= "$value,";
                    continue;
           }
       }
       $strn[strlen($strn)-1] = ')';
       $strv[strlen($strv)-1] = ')';
       $str .= $strn . $strv;
echo $srt;
        //echo $str;
        //$query = $this->pdo->prepare($str);
        //$query->execute();

  /*      try {
            $this->pdo->execute($str);
        //$this->registrarRolAccion($data);
        } catch (Exception $e) {
            die($e->getMessage());
        }*/

        try {
            $sql = "INSERT INTO decretos (numero, descripcion) 
                    VALUES (?, ?)";

            $this->pdo->prepare($sql)
             ->execute(array($data["numero"],$data["descripcion"]));
        //$this->registrarRolAccion($data);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function buscarDecreto($id)
    {
       try 
       {
            $sql = "SELECT * FROM decretos join detalles on decretos.id=detalles.decreto_id where decretos.id = ? LIMIT 1";
            $query = $this->pdo->prepare($sql);
            $query->execute(array($id));
            return $query->fetchAll(PDO::FETCH_OBJ);
        } 
        catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}
