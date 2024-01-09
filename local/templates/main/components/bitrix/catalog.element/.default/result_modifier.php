<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

if ($arResult['PROPERTIES']['DISCOUNT']['VALUE'] == 'Да') {
    $arResult['ITEM_PRICES'][0]['PRICE'] = (int) ($arResult['ITEM_PRICES'][0]['PRICE'] * 0.8);
    $arResult['ITEM_PRICES'][0]['PRINT_DISCOUNT'] = $arResult['ITEM_PRICES'][0]['PRICE'] . ' ₽';
}