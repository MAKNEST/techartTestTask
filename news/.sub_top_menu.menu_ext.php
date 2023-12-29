<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (CModule::IncludeModule("iblock")) {
    $arOrder = ['PROPERTY_DATE' => 'ASC'];   
    $arFilter = ["IBLOCK_ID" => 2, "ACTIVE" => "Y"];
    $arSelectFields = ['ID', 'NAME'];

    $res = CIBlockElement::GetList($arOrder, $arFilter, false, [], $arSelectFields);

    $aMenuLinksExt = [];
    while ($arFields = $res->Fetch()) {
        $aMenuLinksExt[] = [
            $arFields['NAME'],
            '/news/' . $arFields['ID'] . '/1',
            [],
            [],
            ""
        ];
    }
}

$aMenuLinks = array_merge($aMenuLinksExt, $aMenuLinks);