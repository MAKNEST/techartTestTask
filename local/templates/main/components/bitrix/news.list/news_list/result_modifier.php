<?php

if($_REQUEST['CHAPTER_ID']) {
    $categoryObj = CIBlockElement::GetByID($_REQUEST['CHAPTER_ID']);
    $categoryName = $categoryObj->GetNext()['NAME'];
    $arResult['TITLE_CHAPTER'] = " по категории: " . $categoryName;
}
