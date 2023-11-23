<?php
require_once __DIR__ . '/controller_404.php';

class Controller_news extends Controller
{
    public function __construct()
    {
        $this->model = new Model_news();
        $this->view = new View();
    }

    public function action_index($page = null)
    {
        // кол-во новостей на 1 странице
        $newOnPage = 4;

        // общее кол-во страниц для табл. новостей
        $countPages = $this->model->getCountPages($newOnPage);

        // определяем номер страницы
        if($page == null || $page == 0) {
            $page = 1;
        }

        if($page >= $countPages)
        {
            $page = $countPages;
        }

        if($page == 1) {
            $offset = 0;
        } else {
            $offset = ($newOnPage * ($page - 1));
        }

        // получаем список новостей для текущей страницы
        $data = $this->model->getAllNews($newOnPage, $offset);

        if(is_null($data)) {
            $controller = new Controller_404();
            $controller->action_index('Новость не найдена');
            die();
        }

        // последняя по дате новость в БД
        $data['latest_news'] = $this->model->getLatestNews();

        // номер страницы
        $data['page'] = $page;
        
        $data['count_pages'] = $countPages;

        $this->view->generate('all_news_view.php', 'template_view.php', $data);
    }

    public function action_one($id)
    {
        $data = $this->model->getOneNews($id);
        if(is_null($data)) {
            $controller = new Controller_404();
            $controller->action_index('Новость не найдена');
            die();
        } 
        $this->view->generate('one_news_view.php', 'template_view.php', $data);
    }
}