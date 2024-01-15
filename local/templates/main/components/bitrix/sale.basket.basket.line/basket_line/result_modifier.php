<?php

if (count($arResult['CATEGORIES']['READY']) > 0) {
    $elementIds = [];
    foreach ($arResult['CATEGORIES']['READY'] as $item) {
        $elementIds[] = (int) $item['PRODUCT_ID'];
    }

    $arSelect = ["ID", "PROPERTY_DISCOUNT"];
    $arFilter = ["IBLOCK_ID" => 13, 'ID' => $elementIds, 'PROPERTY_DISCOUNT_VALUE' => 'Да'];

    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);

    $itemsIdsWidthDiscount = [];
    while($ob = $res->GetNextElement())
    {
        $arFields = $ob->GetFields();

        foreach ($arResult['CATEGORIES']['READY'] as $key => $item) {
            if ($item['PRODUCT_ID'] == $arFields['ID']) {
                $priceForOneItem = (int) ($item['PRICE'] * 0.8);

                $arResult['CATEGORIES']['READY'][$key]['PRICE'] = $priceForOneItem;
                $arResult['CATEGORIES']['READY'][$key]['PRICE_FMT'] = $priceForOneItem . ' ₽';
                $arResult['CATEGORIES']['READY'][$key]['SUM_VALUE'] = $priceForOneItem * $item['QUANTITY'];
                $arResult['CATEGORIES']['READY'][$key]['SUM'] =  $arResult['CATEGORIES']['READY'][$key]['SUM_VALUE'] . ' ₽';
                $arResult['CATEGORIES']['READY'][$key]['FULL_PRICE'] = $priceForOneItem . ' ₽';
                $arResult['CATEGORIES']['READY'][$key]['PRICE_FORMATED'] = $priceForOneItem . ' ₽';
            }
        }
    }

    $totalPrice = 0;

    foreach ($arResult['CATEGORIES']['READY'] as $item) {
        $totalPrice += $item['PRICE'] * $item['QUANTITY'];
    }

    $arResult['TOTAL_PRICE_RAW'] = $totalPrice;
    $arResult['TOTAL_PRICE'] = $totalPrice . ' ₽';
}