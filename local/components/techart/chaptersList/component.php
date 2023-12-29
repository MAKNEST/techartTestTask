<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $this
*/


$arOrder = [
    $arParams['ORDER_FIELD'] => $arParams['ORDER_TYPE'],
    "SORT" => $arParams['ORDER_TYPE']
];
$arFilter = ["IBLOCK_ID" => $arParams['IBLOCK_ID'], "ACTIVE" => "Y"];

if (CModule::IncludeModule("iblock")) {

    $res = CIBlockElement::GetList($arOrder, $arFilter, false, [], []);

    $chapters = [];
    while ($arFields = $res->Fetch()) {
        $chapters[] = $arFields;
    }

    $arResult['ITEMS'] = array_merge($chapters, $arResult);
}

$this->IncludeComponentTemplate();