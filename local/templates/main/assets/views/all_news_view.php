<?php

// последняя новость в таблице
$latestNewsId = $data['latest_news'][0]['id'];
$latestNewsImage = $data['latest_news'][0]['image'];
$latestNewsTitle = $data['latest_news'][0]['title'];
$latestNewsAnnounce = $data['latest_news'][0]['announce'];
unset($data['latest_news']);

// номер текущей страницы
$page = $data['page'];
unset($data['page']);

// общее кол-во страниц для компонента Pager
$countPages = $data['count_pages'];
unset($data['count_pages']);

// новости
$newsList = $data;
?>

<a href="/news/one/<?= $latestNewsId; ?>" class="all_news-banner-link">
<div class="all_news-banner" style="background-image: url(/style/images/<?= $latestNewsImage; ?>);">
    <div class="banner-container">
        <h1 class="all_news-banner-title"><?= $latestNewsTitle; ?></h1>
        <div class="all_news-banner-announce"><?= $latestNewsAnnounce; ?></div>
    </div>
</div>
</a>
<div class="container">
    <div class="content_title all_news-title">
        Новости
    </div>

    <div class="all_news-list">
        <?php
        foreach ($newsList as $value) {
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