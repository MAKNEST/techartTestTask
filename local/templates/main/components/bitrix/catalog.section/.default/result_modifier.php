<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

// echo '<pre>';
// print_r($arResult['ITEMS']);
// echo '</pre>';

// меням цену товара при наличии свойства скидки
foreach ($arResult['ITEMS'] as $key => $item) {
    if ($item['PROPERTIES']['DISCOUNT']['VALUE'] == 'Да') {
        $arResult['ITEMS'][$key]['ITEM_PRICES'][0]['PRICE'] = (int) ($item['ITEM_PRICES'][0]['PRICE'] * 0.8);
        $arResult['ITEMS'][$key]['ITEM_PRICES'][0]['RATIO_PRICE'] = $arResult['ITEMS'][$key]['ITEM_PRICES'][0]['PRICE'];
        $arResult['ITEMS'][$key]['ITEM_PRICES'][0]['PRINT_DISCOUNT'] = $arResult['ITEMS'][$key]['ITEM_PRICES'][0]['PRICE'] . ' ₽';
        $arResult['ITEMS'][$key]['ITEM_PRICES'][0]['PRINT_PRICE'] = $arResult['ITEMS'][$key]['ITEM_PRICES'][0]['PRICE'];
    }
}http://test.suleymanov/bitrix/css/main/themes/blue/style.min.css?1705300161331