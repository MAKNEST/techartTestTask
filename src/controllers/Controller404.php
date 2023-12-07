<?php

class Controller404 extends Controller
{
    public function action_index($param)
    {
        header("HTTP/1.0 404 Not Found");
        $this->view->generate('404.php', 'template_view.php', $param);
    }
}