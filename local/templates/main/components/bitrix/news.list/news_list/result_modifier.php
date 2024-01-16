<?php

if($_REQUEST['CHAPTER_ID']) {
    $categoryName = \TAO::infoblock('categories')->loadItem((int) $_REQUEST['CHAPTER_ID'])['NAME'];
    $arResult['TITLE_CHAPTER'] = " по категории: " . $categoryName;
}