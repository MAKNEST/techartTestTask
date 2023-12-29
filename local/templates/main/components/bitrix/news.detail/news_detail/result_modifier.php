<?php
$categoryIdList = $arResult['PROPERTIES']['CHAPTER']['VALUE'];
$arResult['CATEGORIES'] = [];
foreach ($categoryIdList as $categoryId) {
    $categoryObj = CIBlockElement::GetByID($categoryId);
    $category = $categoryObj->GetNext();
    
    array_push($arResult['CATEGORIES'], [
        'NAME' => $category['NAME'],
        'ID' => $category['ID']
    ]);
}