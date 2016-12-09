<?php
class Database extends PDO
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
 
 //creamos la conexión a la base de datos prueba
    public function __construct()
    {
        try 
        {
            $this->dbh = parent::__construct("pgsql:host=$this->host;port=$this->port;dbname=$this->dbname;user=$this->user;password=$this->pass");
        } 
        catch (PDOException $e) 
        {
            echo  $e->getMessage();
        }

        $this->dbconn = pg_connect("host=".$this->host." port=".$this->port." dbname=".$this->dbname." user=".$this->user." password=".$this->pass."")
        or die('NO HAY CONEXION: ' . pg_last_error());
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
    public function todo($table)
    {
        $srt = "SELECT * FROM " . $table . "";
        $result = pg_query($this->dbconn, 'SELECT * FROM decretos') or die('ERROR AL BUSCAR LOS DATOS: ' . pg_last_error());
        $rows = array();
        while ($fch = pg_fetch_object($result)) {
        $rows[] = $fch; 
        }
        return $rows;   
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

        $result = pg_query($this->dbconn, $str) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());
    }

    public function hola()
    {
        echo "hola mundo";
    }
}
