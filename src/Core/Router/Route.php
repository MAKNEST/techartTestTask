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
		foreach ($routes as $reg => $route) {
			$res += preg_match($reg, $_SERVER['REQUEST_URI'], $matches);
			if($res > 0) {
				$uri = explode('/', $matches[0]);
				
				$controllerName = "Controllers\\Controller" . $routes[$reg]['controller'];

				$actionName = "action";
				$actionName .= $matches['action'] ?? $routes[$reg]['action'];

				$param = $matches['param'] ?? $routes[$reg]['param'] ?? null;
					
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
    }
    
}