<?php

class Route
{
    public static function route()
    {
        // контроллер по умолчанию
        $controllerName = "News";
        // имя действия по умолчанию
        $actionName = "index";
		// параметр для методов контроллера
		$param = null;

		// массив входных параметров
        $routes = explode('/', $_SERVER['REQUEST_URI']);

        
        // получаем имя контроллера из URL
        if ( !empty($routes[1]) )
		{	
			$controllerName = ucwords($routes[1]);
		}

		// определяем имя действия
		if ( !empty($routes[2]) && !is_numeric( $routes[2] ) )
		{
			$actionName = $routes[2];
		}
		
		// если второй параметр uri числовой, то 
		// воспринимаем его как параметр для базового метода контроллера
		if( !empty($routes[2]) && is_numeric( $routes[2] )) {
			$param = (int)$routes[2];
		}

		// параметр вывода
		if ( !empty($routes[3]) )
		{
			$param = $routes[3];
		}

        // добавляем префиксы
		$modelName = 'Model'.$controllerName;
		$controllerName = 'Controller'.$controllerName;
		$actionName = 'action_'.$actionName;
		
        $modelFile = $modelName . '.php';
		$modelPath = "src/models/".$modelFile;
        
		if(file_exists($modelPath))
		{
			require_once "src/models/".$modelFile;
		}

		// подцепляем файл с классом контроллера
		$controller_file = $controllerName . '.php';
		$controller_path = "src/controllers/".$controller_file;

		if(file_exists($controller_path))
		{
			require_once "src/controllers/".$controller_file;
		}
		else
		{
			Route::ErrorPage404();
		}
		
		// создаем контроллер
		$controller = new $controllerName;
		
		if(method_exists($controller, $actionName))
		{
			$controller->$actionName($param);
		}
		else
		{
			Route::ErrorPage404();
		}
	
	}

	public static function ErrorPage404()
	{
		require_once 'src/controllers/Controller404.php';
        $controller = new Controller404();
		$controller->action_index("404 Страница не найдена");
		die();
    }
    
}