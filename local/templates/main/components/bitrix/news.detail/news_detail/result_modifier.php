<?php
$categoryIdList = $arResult['PROPERTIES']['CHAPTER']['VALUE'];

$args = [
    'filter' => array(
        'ACTIVE' => 'Y',
        'ID' => $categoryIdList
    ),

    'fields' => array(
        'ID',
        'NAME'
    )
];

$categories = \TAO::infoblock('categories')->getRows($args);

$arResult['CATEGORIES'] = [];
foreach ($categories as $category) {
    array_push($arResult['CATEGORIES'], [
        'NAME' => $category['NAME'],
        'ID' => $category['ID']
    ]);
}