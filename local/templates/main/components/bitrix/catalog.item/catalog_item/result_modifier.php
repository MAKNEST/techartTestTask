<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

if ($arResult['ITEM']['PROPERTIES']['DISCOUNT']['VALUE'] == 'Да') {
    $arResult['ITEM']['ITEM_PRICES'][0]['PRICE'] = (int) ($arResult['ITEM']['ITEM_PRICES'][0]['PRICE'] * 0.8);
    $arResult['ITEM']['ITEM_PRICES'][0]['PRINT_DISCOUNT'] = $arResult['ITEM']['ITEM_PRICES'][0]['PRICE'] . ' ₽';
}