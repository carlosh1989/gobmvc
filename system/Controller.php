<?php
session_start();
require 'app/model/privilegios.class.php';
require ('config/config.php');
require_once ('system/View.php');

class Controller
{
  
    public function __contruct()
    {
        $view = new Template();
    }

    public function baseUrl()
    {
        $base = baseUrl;
        return $base;
    }


    private $vars = array();
    public function __get($name)
    {
        return $this->vars[$name];
    }

    public function __set($name, $value)
    {
        if ($name == 'view_template_file') {
            throw new Exception("Cannot bind variable named 'view_template_file'");
        }
        $this->vars[$name] = $value;
    }

    public function render($view_template_file)
    {
        if (array_key_exists('view_template_file', $this->vars)) {
            throw new Exception("Cannot bind variable called 'view_template_file'");
        }
        extract($this->vars);
        ob_start();
        include($view_template_file);
        return ob_get_clean();
    }

    public function view($vista, $array)
    {
        $view = new Template();
        if ($array) {
            foreach ($array as $name => $value) {
                //$this->vars[$name] = $value;
                $view->$name = $value;
                echo $view->title;
            }
        }

        $view->baseUrl = $this->baseUrl();
        $view->menu = $view->render('app/views/templates/menu.php');
        $view->content = $view->render('app/views/modules/'.$vista.'.php');
        echo $view->render('app/views/templates/main.php');
    }

    public function vista($vista, $titulo, array $vars = array())
    {
        $this->baseUrl = $this->baseUrl();
        extract($vars);
        ob_start();
        include  'app/views/templates/app.php';
        $pagina = ob_get_clean();
        include('app/views/templates/menu.php');
        $menu = ob_get_clean();
        $pagina = preg_replace('/\#TITULO\#/ms', $titulo, $pagina);
        $pagina = preg_replace('/\#MENU\#/ms', $menu, $pagina);
        
        $nombre_archivo = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        //verificamos si en la ruta nos han indicado el directorio en el que se encuentra
        if (strpos($nombre_archivo, '/') !== false) {
            //de ser asi, lo eliminamos, y solamente nos quedamos con el nombre sin su extension
            $nombre_archivo = preg_replace('/\.php$/', '', array_pop(explode('/', $nombre_archivo)));
        }
        ob_start();
        include 'app/views/modules/'.$vista.'.php';
        $table = ob_get_clean();
        $pagina = preg_replace('/\#CONTENIDO\#/ms', $table, $pagina);
        echo $pagina;
    }

    function modelo($modelo,$tabla=null)
    {
        $nombreModel = 'app/model/'.$modelo.'.class.php';
        include $nombreModel;
        return new $modelo($tabla);
    }

    function ver_arreglo($arreglo)
    {
        $krumo = new Krumo;
        $krumo->dump($arreglo);
    }
    
    function ir($url, $data = null)
    {
        $final = $this->baseUrl().''.$url . "?" . http_build_query($data);
        $query = urlencode(serialize($data));
        header('Location: '.$final);
    }

    function limpiarPOST($data)
    {
        foreach ($data as $key => $input_arr) {
            $data[$key] = addslashes($this->limpiarCadena($input_arr));
        }
        return $data;
    }

    function limpiarGET($data)
    {
        
        foreach ($data as $key => $input_arr) {
            $data[$key] = addslashes($this->limpiarCadena(base64_decode(urldecode($input_arr))));
        }
        
        return $data;
    }
    function limpiarCadena($valor)
    {
        $valor = str_ireplace("SELECT", "", $valor);
        $valor = str_ireplace("COPY", "", $valor);
        $valor = str_ireplace("DELETE", "", $valor);
        $valor = str_ireplace("DROP", "", $valor);
        $valor = str_ireplace("DUMP", "", $valor);
        $valor = str_ireplace(" OR ", "", $valor);
        $valor = str_ireplace("%", "", $valor);
        $valor = str_ireplace("LIKE", "", $valor);
        $valor = str_ireplace("--", "", $valor);
        $valor = str_ireplace("^", "", $valor);
        $valor = str_ireplace("[", "", $valor);
        $valor = str_ireplace("]", "", $valor);
        $valor = str_ireplace("\\", "", $valor);
        $valor = str_ireplace("!", "", $valor);
        $valor = str_ireplace("¡", "", $valor);
        $valor = str_ireplace("?", "", $valor);
        $valor = str_ireplace("=", "", $valor);
        $valor = str_ireplace("&", "", $valor);
        return $valor;
    }

    function permisoModulo($idModulo)
    {
        $privilegios  = new privilegios();
        $permisoModulo = $privilegios->permisoModulo($_SESSION["rol"], $idModulo);
        return $permisoModulo;
    }
    function accionesModulo($idModulo)
    {
        $privilegios = new privilegios();
        $acciones = $privilegios->accionesModulo($_SESSION["rol"], $idModulo);
        return $acciones;
    }
}
