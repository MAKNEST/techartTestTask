<?php 
require_once 'src/views/components/component_button.php';

function pager($page, $countPages) {
    
    // кнопка назад
    if($page > 1) {
        getButton([
            'link' => '/news/' . $page-1,
            'icon' => '<svg width="26" height="16" viewbox="0 0 26 16" xmlns="http://www.w3.org/2000/svg" class="button_icon" fill="currentColor">
                <path d="M0.293015 8.70711C-0.0975094 8.31658 -0.0975094 7.68342 0.293014 7.2929L6.65698 0.928934C7.0475 0.538409 7.68067 0.538409 8.07119 0.928934C8.46171 1.31946 8.46171 1.95262 8.07119 2.34315L2.41434 8L8.07119 13.6569C8.46171 14.0474 8.46171 14.6805 8.07119 15.0711C7.68067 15.4616 7.0475 15.4616 6.65698 15.0711L0.293015 8.70711ZM26 9L1.00012 9L1.00012 7L26 7L26 9Z"/>
                </svg>',
            'button_class' => 'pager_button',
        ]);
    }

    // кнопка 1
    if($page <= 1) {
        $button_1_page = $page;
    } else {
        $button_1_page = $page - 1;
    }

    if($button_1_page > 0) {
        getButton([
            'link' => '/news/' . $button_1_page,
            'text' => $button_1_page,
            'button_class' => $button_1_page == $page ? 'pager_button button_selected' : 'pager_button',
        ]);
    }

    // кнопка 2
    $button_2_page = $button_1_page + 1;
    getButton([
        'link' => '/news/' . $button_2_page,
        'text' => $button_2_page,
        'button_class' => $button_2_page == $page ? 'pager_button button_selected' : 'pager_button',
    ]);

    // кнопка 3
    $button_3_page = $button_2_page + 1;
    if(!($button_3_page > $countPages)) {
        getButton([
            'link' => '/news/' . $button_3_page,
            'text' => $button_3_page,
            'button_class' => $button_3_page == $page ? 'pager_button button_selected' : 'pager_button',
        ]);
    }

    // кнопка вперед
    if($page < $countPages ) {
        getButton([
            'link'=> '/news/' . $page+1,
            'icon' => '<svg width="26" height="16" viewBox="0 0 26 16" xmlns="http://www.w3.org/2000/svg" class="button_icon" fill="currentColor">
                <path d="M25.707 8.70711C26.0975 8.31658 26.0975 7.68342 25.707 7.2929L19.343 0.928934C18.9525 0.538409 18.3193 0.538409 17.9288 0.928934C17.5383 1.31946 17.5383 1.95262 17.9288 2.34315L23.5857 8L17.9288 13.6569C17.5383 14.0474 17.5383 14.6805 17.9288 15.0711C18.3193 15.4616 18.9525 15.4616 19.343 15.0711L25.707 8.70711ZM-8.74228e-08 9L24.9999 9L24.9999 7L8.74228e-08 7L-8.74228e-08 9Z"/>
                </svg>',
        ]);
    }
} 
?>