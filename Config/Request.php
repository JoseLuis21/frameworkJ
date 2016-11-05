<?php namespace Config;

	class Request{

		private $controller;
		private $method;
		private $argument;

		public function __construct(){
			if(isset($_GET['url'])){
				$uri = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
				$uri = explode("/", $uri);
				$uri = array_filter($uri);
				if($uri[0] == "index.php"){
					$this->controller = "index";					
				}else{
					$this->controller = strtolower(array_shift($uri));
				}

				$this->method = strtolower(array_shift($uri));

				if(!$this->method){
					$this->method = "index";
				}
				$this->argument = $uri;
			}else{
				$this->controller = "index";
				$this->method = "index";
			}
		}

		public function getController(){
			return $this->controller;
		}

		public function getMethod(){
			return $this->method;
		}

		public function getArgument(){
			return $this->argument;
		}
	}
?>