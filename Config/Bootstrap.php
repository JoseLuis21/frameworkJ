<?php namespace Config;

	class Bootstrap{

		public static function init(Request $request){
			$controlador = $request->getController() . "Controller";
			$ruta = ROOT . "Controllers" . DS . $controlador .".php";
			$metodo = $request->getMethod();
			if($metodo == "index.php"){
				$metodo = "index";
			}
			$argumento = $request->getArgument();
			if(is_readable($ruta)){
				require_once $ruta;
				$mostrar = "Controllers\\" . $controlador;
				$controlador = new $mostrar;
				if(!isset($argumento)){
					$datos = call_user_func(array($controlador, $metodo));
				}else{
					$datos = call_user_func_array(array($controlador, $metodo), $argumento);
				}
			}

			//Cargando la Vista
			if($request->getController()=="index")
			{
				$ruta = ROOT . "Views" . DS . $request->getMethod() . ".php";
			}else
			{
				$ruta = ROOT . "Views" . DS . $request->getController() . DS . $request->getMethod() . ".php";
			}
			
			if(is_readable($ruta)){
				
				require_once $ruta;
			}else{
				
				print "No se encontro la vista";
			}
		}

	}
?>