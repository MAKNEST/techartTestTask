<?php
// последняя новость в БД
$latestNews = $data['latest_news'];
unset($data['latest_news']);

// номер текущей страницы
$page = $data['page'];
unset($data['page']);

// общее кол-во страниц для компонента Pager
$countPages = $data['count_pages'];
unset($data['count_pages']);
?>

<a href="/news/one/<?= $latestNews[0]['id']?>" class="all_news-banner-link">
<div class="all_news-banner" style="background-image: url(/style/images/<?= $latestNews[0]['image']?>);">
    <div class="banner-container">
        
        <h1 class="all_news-banner-title"><?= $latestNews[0]['title']?></h1>
        <div class="all_news-banner-announce"><?= $latestNews[0]['announce']?></div>
    </div>
</div>
</a>
<div class="container">
    <div class="content_title all_news-title">
        Новости
    </div>

    <div class="all_news-list">
        <?php
        foreach ($data as $key => $value) {
            require 'src/views/components/component_news_card.php';
        }
        ?>
    </div>

    <div class="pager">
        <?php require_once 'src/views/components/component_pager.php';
        
        pager($page, $countPages);
        ?>
    </div>
</div>