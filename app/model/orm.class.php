<?php
require_once("db.class.php");
class Orm
{
    public $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new Database();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function todo($table)
    {
        try {
            $result = array();

            $query = $this->pdo->prepare("SELECT * FROM " . $table . "");
            $query->execute();

            return $query->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function buscar($table, $id)
    {
        try {
            $query = $this->pdo
                      ->prepare("SELECT * FROM " . $table . " WHERE id = ?");
                      
            $query->execute(array($id));
            return $query->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminar($table, $id)
    {
        try {
            $query = $this->pdo
                        ->prepare("DELETE FROM " . $table . " WHERE id = ?");
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

    public function guardar($table,$array)
    {
       $str = "insert into $table ";
       $strn = "";
       $strv = "";
        while(list($name,$value) = each($array)) {

           if(is_bool($value)) {
                    $strn .= "$name";
                    $strv .= ($value ? "true":"false") . "";
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

       $strn[strlen($strv)-0] = '';
       $strv[strlen($strv)-1] = '';
       $str .= $strn . $strv;
       //echo $strn; //numero , descripcion
       //echo "<hr>";
       //echo $strv; //'259/16','333'

        try {
            $sql = "INSERT INTO " . $table . " (" . $strn . ") 
                    VALUES (" . $strv . ")";
            echo $sql;
            //$this->pdo->execute($sql);
        //$this->registrarRolAccion($data);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
