<?php
session_start();
require 'app/model/privilegios.class.php';
class MvcController {   	   
  
	public function __contruct()
	{
		
	}

	public function baseUrl()
	{
		$base = 'http://localhost/gobmvc/';
		return $base;
	}

	function load_template($modulo){
		$pagina = $this->load_page('app/views/pageMenu1.php');
		return $pagina;				
	}

	function hola()
	{
		$hola = "asdasd";
		return $hola;
	}

	function load_layout($layout){
		$pagina = $this->load_page('app/views/layouts/'.$layout.'.php');
		return $pagina;				
	}

    function vista($vista, $titulo)
    {
    	$this->baseUrl = $this->baseUrl();
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

    function modelo($modelo)
    {
        $nombreModel = 'app/model/'.$modelo.'.class.php';
        include $nombreModel;
        return new $modelo();
    }

    function ver_arreglo($arreglo)
    {
        $krumo = new Krumo;
        $krumo->dump($arreglo);
    }
	
	function ir($url,$data=null)
	{
		$final = $this->baseUrl().''.$url . "?" . http_build_query($data);
		$query = urlencode(serialize($data));
        header('Location: '.$final);
	}
/*	function ir_con_datos($url,$data=null)
	{
		$final = $this->baseUrl().''.$url . "?" . http_build_query($data);
		$query = urlencode(serialize($data));
        header('Location: '.$final);
	}
*/
    function vista2($vista, $titulo)
    {
        $pagina = file_get_contents('app/views/layouts/app.php');
        $menu = file_get_contents('app/views/templates/menu.php');
        $pagina = preg_replace('/\#TITULO\#/ms', $titulo, $pagina);
        $pagina = preg_replace('/\#MENU\#/ms', $menu, $pagina);
        ob_start();
		$nombre_archivo = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        //verificamos si en la ruta nos han indicado el directorio en el que se encuentra
        if (strpos($nombre_archivo, '/') !== false) {
            //de ser asi, lo eliminamos, y solamente nos quedamos con el nombre sin su extension
            $nombre_archivo = preg_replace('/\.php$/', '', array_pop(explode('/', $nombre_archivo)));
        }
        include 'app/views/modules/'.$vista.'.php';
        $table = ob_get_clean();
        $pagina = preg_replace('/\#CONTENIDO\#/ms', $table, $pagina); 	
        echo $pagina;
    }


			
	/* METODO QUE CARGA UNA PAGINA DE LA SECCION VIEW Y LA MANTIENE EN MEMORIA
		INPUT
		$page | direccion de la pagina 
		OUTPUT
		STRING | devuelve un string con el codigo html cargado
	*/	
	function load_page($page)
	{
		return file_get_contents($page);
	}
	
	/* METODO QUE ESCRIBE EL CODIGO PARA QUE SEA VISTO POR EL USUARIO
		INPUT
		$html | codigo html
		OUTPUT
		HTML | codigo html		
	*/
	function view_page($html)
	{
		echo $html;
	}
	
	/* PARSEA LA PAGINA CON LOS NUEVOS DATOS ANTES DE MOSTRARLA AL USUARIO
		INPUT
		$out | es el codigo html con el que sera reemplazada la etiqueta CONTENIDO
		$pagina | es el codigo html de la pagina que contiene la etiqueta CONTENIDO
		OUTPUT
		HTML 	| cuando realiza el reemplazo devuelve el codigo completo de la pagina
	*/
	function replace_content($in='/\#CONTENIDO\#/ms', $out,$pagina)
	{
		 return preg_replace($in, $out, $pagina);	 	
	}
	
	function load_template_index($title='Sin Titulo'){
		$pagina = $this->load_page('app/views/page1.php');							
		return $pagina;
	}
	function limpiarPOST($data)
	{
		foreach ($data as $key => $input_arr) 
		{ 
			$data[$key] = addslashes($this->limpiarCadena($input_arr)); 
		}
		return $data;	
	}
	function limpiarGET($data)
	{
		
		foreach ($data as $key => $input_arr) 
		{ 
			$data[$key] = addslashes($this->limpiarCadena(base64_decode(urldecode($input_arr)))); 				
		}	
		
 		return $data;
	}
	function limpiarCadena($valor)
	{
		$valor = str_ireplace("SELECT","",$valor);
		$valor = str_ireplace("COPY","",$valor);
		$valor = str_ireplace("DELETE","",$valor);
		$valor = str_ireplace("DROP","",$valor);
		$valor = str_ireplace("DUMP","",$valor);
		$valor = str_ireplace(" OR ","",$valor);
		$valor = str_ireplace("%","",$valor);
		$valor = str_ireplace("LIKE","",$valor);
		$valor = str_ireplace("--","",$valor);
		$valor = str_ireplace("^","",$valor);
		$valor = str_ireplace("[","",$valor);
		$valor = str_ireplace("]","",$valor);
		$valor = str_ireplace("\\","",$valor);
		$valor = str_ireplace("!","",$valor);
		$valor = str_ireplace("¡","",$valor);
		$valor = str_ireplace("?","",$valor);
		$valor = str_ireplace("=","",$valor);
		$valor = str_ireplace("&","",$valor);
		return $valor;
	}
	function menu()
	{
		//$lista="menu";
		$lista = '<ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle"  />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="forum_main.html#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Usuario</strong>
                             </span> <span class="text-muted text-xs block">Cargo <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="profile.html">Perfil</a></li>
                            
                            <li class="divider"></li>
                            <li><a href="login.html">Cerrar Sesión</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li class="active">
                    <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Entidades</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">                        
                        <li class="active"><a href="dependencia.php">Dependencia</a></li>
                        <li><a href="accion_centralizada.php">Acción Centralizada</a></li>
                        <li><a href="accion_especifica.php">Acción Específica</a></li>
                        <li><a href="tipo_movimiento.php">Tipo Movimiento</a></li>                        
                    </ul>
                </li>
                <li class="active">
                    <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Configuración</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">                        
                        <li><a href="usuario.php">Usuarios</a></li>
                        <li><a href="rol.php">Roles</a></li>
                        <li><a href="modulo.php">Modulos</a></li>
                                             
                    </ul>
                </li>                
</ul>                ';
		 return $lista;

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
?>