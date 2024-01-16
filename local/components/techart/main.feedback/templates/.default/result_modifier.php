<?php

$arOrder = ['SORT' => 'ASC'];
$arFilter = ['IBLOCK_ID' => 9];
$arSelect = ['ID', 'NAME'];

$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
$arResult['CHAPTER_LIST'] = [];

while($ob = $res->GetNextElement())
{
	$arFields = $ob->GetFields();
    $arResult['CHAPTER_LIST'][] = $arFields['NAME'];
}