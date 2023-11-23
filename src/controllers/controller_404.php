<?php

class Controller_404 extends Controller
{
    public function action_index($param)
    {
        $this->view->generate('404.php', 'template_view.php', $param);
    }
}