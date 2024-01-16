<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$args = [
    'filter' => [
        "ACTIVE" => "Y"
    ],
    'order' => [
        $arParams['ORDER_FIELD'] => $arParams['ORDER_TYPE'],
        "SORT" => $arParams['ORDER_TYPE']
    ],
    'fields' => ['ID', 'NAME']
];

$res = \TAO::infoblock($arParams['IBLOCK_ID'])->getRows($args);

$arResult['ITEMS'] = $res;

$this->IncludeComponentTemplate();