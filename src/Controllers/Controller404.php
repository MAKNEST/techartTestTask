<?php

namespace Controllers;

use Core;

class Controller404 extends Core\Controller
{
    public function actionIndex($param = "404 Страница не найдена")
    {
        header("HTTP/1.0 404 Not Found");
        $this->view->generate('404.php', 'template_view.php', $param);
        die;
    }
}