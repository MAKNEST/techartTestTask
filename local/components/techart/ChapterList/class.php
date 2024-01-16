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
        $args = [
            'filter' => [
                "ACTIVE" => "Y"
            ],
            'order' => [
                $this->arParams['ORDER_FIELD'] => $this->arParams['ORDER_TYPE'],
                "SORT" => $this->arParams['ORDER_TYPE']
            ],
            'fields' => ['ID', 'NAME']
        ];

        $res = \TAO::infoblock($this->arParams['IBLOCK_ID'])->getRows($args);
        
        return $res;
    }

    public function executeComponent()
    {
        $this->checkModules();
        
        $this->arResult['ITEMS'] = array_merge($this->arResult, $this->getChaptersList());

        $this->IncludeComponentTemplate();
    }
}