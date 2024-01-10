<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogTopComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

// меням цену товара при наличии свойства скидки
foreach ($arResult['ITEMS'] as $key => $item) {
    if ($item['PROPERTIES']['DISCOUNT']['VALUE'] == 'Да') {
        $arResult['ITEMS'][$key]['ITEM_PRICES'][0]['PRICE'] = (int) ($item['ITEM_PRICES'][0]['PRICE'] * 0.8);
        $arResult['ITEMS'][$key]['ITEM_PRICES'][0]['RATIO_PRICE'] = $arResult['ITEMS'][$key]['ITEM_PRICES'][0]['PRICE'];
        $arResult['ITEMS'][$key]['ITEM_PRICES'][0]['PRINT_DISCOUNT'] = $arResult['ITEMS'][$key]['ITEM_PRICES'][0]['PRICE'] . ' ₽';
        $arResult['ITEMS'][$key]['ITEM_PRICES'][0]['PRINT_PRICE'] = $arResult['ITEMS'][$key]['ITEM_PRICES'][0]['PRICE'];
    }
}