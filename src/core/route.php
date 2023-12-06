<?php

class Route
{
    public static function route()
    {
        // контроллер и метод по умолчанию
        $controller_name = "news";
        $action_name = "index";
		// параметр для методов контроллера
		$param = null;

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        // получаем имя контроллера из URL
        if ( !empty($routes[1]) )
		{	
			$controller_name = $routes[1];
		}

		// определяем имя действия
		if ( !empty($routes[2]) && !is_numeric( $routes[2] ) )
		{
			$action_name = $routes[2];
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
		$model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'.$controller_name;
		$action_name = 'action_'.$action_name;
		
        $model_file = strtolower($model_name).'.php';
		$model_path = "src/models/".$model_file;
        
		if(file_exists($model_path))
		{
			require_once "src/models/".$model_file;
		}

		// подцепляем файл с классом контроллера
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "src/controllers/".$controller_file;

		if(file_exists($controller_path))
		{
			require_once "src/controllers/".$controller_file;
		}
		else
		{
			Route::ErrorPage404();
			die();
		}
		
		// создаем контроллер
		$controller = new $controller_name;
		$action = $action_name;
		
		if(method_exists($controller, $action))
		{
			$controller->$action($param);
		}
		else
		{
			Route::ErrorPage404();
			die();
		}
	
	}

	public static function ErrorPage404()
	{
		require_once 'src/controllers/controller_404.php';
        $controller = new Controller_404();
		$controller->action_index('Страница не найдена :(');
    }
    
}