<?php

namespace Controllers;

use Core\Controller;

class Controller404 extends Controller
{
    public function action_index($param = "404 страница не найдена")
    {
        $this->view->generate('404.php', 'template_view.php', $param);
    }
}