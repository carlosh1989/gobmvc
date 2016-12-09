<?php
include_once "db.class.php";
class Orm
{
 //nombre base de datos
    private $dbname = "dbp";
 //nombre servidor
    private $host = "localhost";
 //nombre usuarios base de datos
    private $user = "postgres";
 //password usuario
    private $pass = '123';
 //puerto postgreSql
    private $port = 5432;
    private $dbh;
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
   //return $str;

       //echo $strn; //numero , descripcion
       //echo "<hr>";
       //echo $strv; //'259/16','333'


    //$sql = "INSERT INTO " . $table . " (" . $strn . ") 
                    //VALUES (" . $strv . ")";

   $dbconn = pg_connect("host=localhost port=5432 dbname=dbp user=postgres password=123")
    or die('NO HAY CONEXION: ' . pg_last_error());

    $result = pg_query($dbconn, $str) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());
    }
}
