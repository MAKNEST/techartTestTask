<?php
require_once 'src/views/components/component_button.php';

$id = $value['id'];
$title = $value['title'];
$announce = $value['announce'];
$date = $value['date'];

?>

<div class="news-card">
    <?php require 'src/views/components/component_date.php'; ?>
    <a href="/news/one/<?= $id; ?>" class="news-card_link">
        <div class="news-card_title">
            <?= $title; ?>
        </div>

        <?= $announce; ?>

        <?php getButton([
            'text' => 'Подробнее',
            'link' => "/news/one/" . $id,
            'icon' => '<svg width="26" height="16" viewBox="0 0 26 16" xmlns="http://www.w3.org/2000/svg" class="button_icon" fill="currentColor">
                <path d="M25.707 8.70711C26.0975 8.31658 26.0975 7.68342 25.707 7.2929L19.343 0.928934C18.9525 0.538409 18.3193 0.538409 17.9288 0.928934C17.5383 1.31946 17.5383 1.95262 17.9288 2.34315L23.5857 8L17.9288 13.6569C17.5383 14.0474 17.5383 14.6805 17.9288 15.0711C18.3193 15.4616 18.9525 15.4616 19.343 15.0711L25.707 8.70711ZM-8.74228e-08 9L24.9999 9L24.9999 7L8.74228e-08 7L-8.74228e-08 9Z"/>
                    </svg>',
            'icon_postion' => 'right',
        ]); ?>
    </a>
</div>