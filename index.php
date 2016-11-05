<?php
require_once "vendor/autoload.php";

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)) . DS);
define('URL', "http://localhost:8080/framework/frameworkJ/");

use \Config\Bootstrap as Bootstrap;
Bootstrap::init(new Config\Request);


	

	
?>