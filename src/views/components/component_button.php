<?php

/**
 * @param array $params - массив параметров кнопки(текст, расположение иконкиб наличие иконки)
 *  - string text - текст кнопки
 *  - string optional_button_class - дополнительный класс стилизации кнопки
 *  - string link - ссылка на страницу перехода
 *  - string icon - икнонка кнопки
 *  - string icon_postion расположение кнопки left|right
 */

function getButton($param) {
    $param['text'] = $param['text'] ?? ''; 
    $param['optional_button_class'] = $param['optional_button_class'] ?? '';
    $param['link'] = $param['link'] ?? '#';
    $param['icon'] = $param['icon'] ?? '';
    $param['icon_postion'] = $param['icon_postion'] ?? 'left';

    ?>
    <button onclick="document.location='<?= $param['link']?>'" class="main_button <?= $param['optional_button_class']?>">
        <?php
        if(array_key_exists('icon', $param) && $param['icon_postion'] == 'left') { 
            echo $param['icon'];
        }

        echo $param['text'];

        if(array_key_exists('icon', $param) && $param['icon_postion'] == 'right') {
            echo $param['icon'];
        } 
        ?>
    </button>
<?php } ?>