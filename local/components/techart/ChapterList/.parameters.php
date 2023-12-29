<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Loader;

if( !Loader::includeModule("iblock") ) {
    throw new \Exception('Не загружены модули необходимые для работы компонента');
}

// типы инфоблоков
$arIBlockType = CIBlockParameters::GetIBlockTypes();

// инфоблоки выбранного типа
$arIBlock = [];
$iblockFilter = !empty($arCurrentValues['IBLOCK_TYPE'])
    ? ['TYPE' => $arCurrentValues['IBLOCK_TYPE'], 'ACTIVE' => 'Y']
    : ['ACTIVE' => 'Y'];

$rsIBlock = CIBlock::GetList(['SORT' => 'ASC'], $iblockFilter);
while ($arr = $rsIBlock->Fetch()) {
    $arIBlock[$arr['ID']] = '['.$arr['ID'].'] '.$arr['NAME'];
}

unset($arr, $rsIBlock, $iblockFilter);

$arComponentParameters = [
    "PARAMETERS" => [
        "IBLOCK_TYPE" => [
            "PARENT" => "BASE",
            "NAME" => "Тип инфоблока",
            "TYPE" => "LIST",
            "ADDITIONAL_VALUES" => "Y",
            "VALUES" => $arIBlockType,
            "REFRESH" => "Y"
        ],
        "IBLOCK_ID" => [
            "PARENT" => "BASE",
            "NAME" => "Инфоблок",
            "TYPE" => "LIST",
            "ADDITIONAL_VALUES" => "Y",
            "VALUES" => $arIBlock,
            "REFRESH" => "Y"
        ],
        "ORDER_FIELD" => [
            "NAME" => "Поле сортировки",
            "TYPE" => "LIST",
            "PARENT" => "BASE",
            "VALUES" => [
                "PROPERTY_DATE" => "Свойство дата",
                "ID" => "Идентификатор элемента",
                'NAME' => "Имя элемента",
                'CODE' => "Символьный код элемента",
            ],
            "DEFAULT" => [
                "PROPERTY_DATE" => "Свойство дата"
            ]
        ],

        "ORDER_TYPE" => [
            "NAME" => "Сортировка и ее тип",
            "TYPE" => "LIST",
            "PARENT" => "BASE",
            "VALUES" => [
                "ASC" => "По возрастанию",
                "DESC" => "По убыванию",
            ]
        ]
    ]
];