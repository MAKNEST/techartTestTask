<?php
use \Bitrix\Main\Loader;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

class ChaptersList extends CBitrixComponent
{

    private function checkModules() 
    {
        if (!Loader::includeModule('iblock')) {
            throw new \Exception('Не загружены модули необходимые для работы модуля');
        }

        return true;
    }

    public function onPrepareComponentParams($arParams)
    {
        $this->arParams = $arParams;
        
        return $this->arParams;
    }

    public function getChaptersList()
    {
        $arOrder = [
            $this->arParams['ORDER_FIELD'] => $this->arParams['ORDER_TYPE'],
            "SORT" => $this->arParams['ORDER_TYPE']
        ];

        $arFilter = ["IBLOCK_ID" => $this->arParams['IBLOCK_ID'], "ACTIVE" => "Y"];
        
        $res = CIBlockElement::GetList($arOrder, $arFilter, false, [], []);
        
        $chapters = [];
        while ($arFields = $res->Fetch()) {
            $chapters[] = $arFields;
        }
        
        return $chapters;
    }

    public function executeComponent()
    {
        $this->checkModules();
        
        $this->arResult['ITEMS'] = array_merge($this->arResult, $this->getChaptersList());

        $this->IncludeComponentTemplate();
    }
}