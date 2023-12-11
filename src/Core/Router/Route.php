<?php

namespace Core\Router;

use Models;
use Controllers;

class Route
{
    public static function route()
    {
        $routes = require_once "routes.php";

		$res = 0;
		foreach ($routes as $reg) {
			$res += preg_match($reg, $_SERVER['REQUEST_URI'], $matches);
			
			if($res > 0) {
				$uri = explode('/', $matches[0]);
				$controllerName = "Controllers\\Controller" . ucfirst($uri[0]);
				$actionName = "action" . ucfirst($uri[1]);
				$param = $uri[2];
					
				$controller = new $controllerName;
				$controller->$actionName($param);
				break;
			}
		}
	
		if($res == 0) {
			static::ErrorPage404();
		}
	}

	public static function ErrorPage404()
	{
        $controller = new Controllers\Controller404();
		$controller->actionIndex();
		die();
    }
    
}