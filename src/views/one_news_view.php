<div class="container">
    <div class="line"></div>
    <div class="work_news">
        <div class="breadcrumb">
            <a href="/news/1" class="breadcrumb_link">
                Главная /
            </a> 
            <div class="breadcrumb_title">
                <?= $data['title'];?>
            </div>
        </div>
        <h1 class="content_title">
            <?= $data['title'];?>
        </h1>

        <div class="work_news-content">
            <div class="work_news-content-text">
                <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/src/views/components/component_date.php";?>

                <div class="work_news-content-title">
                    <?= $data['announce']; ?>
                </div>

                <div class="work_news-content-news-text">
                    <?= $data['content']?>
                </div>

                <?php
                require_once $_SERVER['DOCUMENT_ROOT'] . "/src/views/components/component_button.php";
                echo getButton([
                    'text' => 'Назад к новостям',
                    'link' => "/news/1",
                    'icon' => '<svg width="26" height="16" viewbox="0 0 26 16" xmlns="http://www.w3.org/2000/svg" class="button_icon" fill="currentColor">
                        <path d="M0.293015 8.70711C-0.0975094 8.31658 -0.0975094 7.68342 0.293014 7.2929L6.65698 0.928934C7.0475 0.538409 7.68067 0.538409 8.07119 0.928934C8.46171 1.31946 8.46171 1.95262 8.07119 2.34315L2.41434 8L8.07119 13.6569C8.46171 14.0474 8.46171 14.6805 8.07119 15.0711C7.68067 15.4616 7.0475 15.4616 6.65698 15.0711L0.293015 8.70711ZM26 9L1.00012 9L1.00012 7L26 7L26 9Z"/>
                        </svg>',
                ]);
                ?>
                
            </div>
            <div class="work_news-content-image-container">
                <img src="/style/images/<?= $data['image']?>" class="work_news-content-image">
            </div>

        </div>
    </div>
</div>