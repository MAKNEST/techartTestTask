<?php
require_once __DIR__ . '/Controller404.php';

class ControllerNews extends Controller
{
    public function __construct()
    {
        $this->model = new ModelNews();
        $this->view = new View();
        $this->Controller404 = new Controller404();
    }

    public function action_index($page = null)
    {
        // кол-во новостей на странице
        $newOnPage = 4;

        // общее кол-во страниц для табл. новостей
        $countPages = ceil($this->model->getCountNews() / $newOnPage);

        // определяем номер страницы
        if($page == null || $page == 0) {
            $page = 1;
        }

        // если номер запрашиваемой страницы больше общего кол-ва страниц, то отдаем последнюю страницу
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
        $data = $this->model->getAll($newOnPage, $offset);

        if(is_null($data)) {
            $this->Controller404->action_index("404 Страница не найдена");
        }

        // последняя по дате новость в БД
        $data['latest_news'] = $this->model->getLatest();

        // номер страницы
        $data['page'] = $page;
        
        $data['count_pages'] = $countPages;

        $this->view->generate('all_news_view.php', 'template_view.php', $data);
    }

    public function action_one($id)
    {
        if (!is_numeric($id)) {
            $this->Controller404->action_index("404 Страница не найдена");
            die();
        }
        $data = $this->model->getOne($id);

        if(is_null($data)) {
            $this->Controller404->action_index("404 Страница не найдена");
        } 
        $this->view->generate('one_news_view.php', 'template_view.php', $data);
    }
}