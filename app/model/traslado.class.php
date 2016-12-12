<?php
include_once('system/Database.php');
class Traslado extends Database
{
    private $pdo;
    public $id;
    public $nombre;
    public $descripcion;
    public $tabla = 'decretos';
    
    public function __construct()
    {
        try {
            $this->pdo = new Database($tabla);
        } catch (Exception $e) {
            die($e->getMessage());
        }
        $this->dbconn = $this->pdo->conectar();
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


    public function guardar($table, $array)
    {
        $str = "insert into $table ";
        $strn = "(";
        $strv = " VALUES (";
        while (list($name,$value) = each($array)) {
            if (is_bool($value)) {
                $strn .= "$name,";
                $strv .= ($value ? "true":"false") . ",";
                continue;
            };

            if (is_string($value)) {
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
}
