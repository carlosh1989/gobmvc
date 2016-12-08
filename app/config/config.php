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
}
?>