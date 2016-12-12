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
            $sql = "SELECT * FROM decretos LEFT JOIN detalles on decretos.id = detalles.decreto_id WHERE id = ?";
            $query = $this->pdo->prepare($sql);
            $query->execute(array($id));
            return $query->fetchAll(PDO::FETCH_OBJ);
        } 
        catch (Exception $e) 
        {
            die($e->getMessage());
        }
        $dbconn = pg_connect("host=localhost port=5432 dbname=dbp user=postgres password=123")
        or die('NO HAY CONEXION: ' . pg_last_error());

        $result = pg_query($dbconn, $str) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());
    }

    public function conectar()
    {
        $dbconn = pg_connect("host=".$this->host." port=".$this->port." dbname=".$this->dbname." user=".$this->user." password=".$this->pass."")
        or die('NO HAY CONEXION: ' . pg_last_error());

        return $dbconn;
    }
 
 //función para cerrar una conexión pdo
    public function close_con()
    {
 
        $this->dbh = null;
    }
    public function buscarDetalles($idDecreto)
    {
        $srt = "SELECT * FROM SELECT * FROM decretos LEFT JOIN detalles on decretos.id = detalles.decreto_id WHERE id = " . $idDecreto . "";
        $result = pg_query($this->dbconn, $srt) or die('ERROR AL BUSCAR LOS DATOS: ' . pg_last_error());
        $rows = array();
        while ($fch = pg_fetch_object($result)) {
        $rows[] = $fch; 
        }
        return $rows;   
    }
}
