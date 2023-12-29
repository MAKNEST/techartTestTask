<?php

$arPrepItem = [];

if (!empty($arResult)) {
    foreach ($arResult as $item) {
        if($item['DEPTH_LEVEL'] == 1) {
            $arPrepItem[] = $item;
        } else {
            $lastItem = end(array_keys($arPrepItem));
            $arPrepItem[$lastItem]['SUBITEMS'][] = $item;

            if ($item['SELECTED'] == 1) {
               $arPrepItem[$lastItem]['SELECTED'] = 1;
            }
        }
   }
}

$arResult = $arPrepItem;