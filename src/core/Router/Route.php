<?php

namespace Core\Router;

use Controllers\Controller404;
use Controllers\ControllerNews;

class Route
{
    public static function route()
    {
		$routes = require_once "routes.php";
		echo '<pre>';
		echo "URI: ".($_SERVER['REQUEST_URI']);
		echo "<br>";
		// preg_match_all('/\/[a-zA-Z]{1,}\/[0-9]{1,}|\/[a-zA-Z]{1,}\/[0-9]{1,}/', $_SERVER['REQUEST_URI'], $matches);
		// preg_match_all('/news\/[a-zA-Z0-9]{1,}\/\w{1,}/', $_SERVER['REQUEST_URI'], $matches);
		preg_match_all('/[\w]{1,}/', $_SERVER['REQUEST_URI'], $matches);

		print_r($matches[0]);
		echo 'match_len: ' . count($matches[0]).'<br>';	

		// $controller = $routes[]
		// $controllerName = "controllers\\Controller" . ucfirst($matches[0][0]);
		
		$controller = count($matches[0]) == 0 ? '/' :  $routes[$matches[0]];
		$controller = $routes[$controller];

		
		$controllerName = "Controllers\Controller".$controller['controller'];
		$controller = new $controllerName;
		var_dump($controller);
		

	}

	public static function ErrorPage404()
	{
        $controller = new Controller404();
		$controller->action_index();
    }
    
}