<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

require_once $_SERVER['DOCUMENT_ROOT'] . "/src/views/components/component_button.php";

?>

<div class="container">
    <div class="chapters_list">
        <?php
            foreach ($arResult['ITEMS'] as $item) {
                getButton([
                    'text' => $item['NAME'],
                    'link' => "/news/" . $item['ID'] . '/1',
                    'optional_button_class' => 'button_chapters-list'
                ]);
            }
        ?>
    </div>
</div>
