<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;
use Bitrix\Catalog\ProductTable;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

$this->setFrameMode(true);

$templateLibrary = array('popup', 'fx', 'ui.fonts.opensans');
$currencyList = '';

if (!empty($arResult['CURRENCIES']))
{
	$templateLibrary[] = 'currency';
	$currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}

$haveOffers = !empty($arResult['OFFERS']);

$templateData = [
	'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
	'TEMPLATE_LIBRARY' => $templateLibrary,
	'CURRENCIES' => $currencyList,
	'ITEM' => [
		'ID' => $arResult['ID'],
		'IBLOCK_ID' => $arResult['IBLOCK_ID'],
	],
];
if ($haveOffers)
{
	$templateData['ITEM']['OFFERS_SELECTED'] = $arResult['OFFERS_SELECTED'];
	$templateData['ITEM']['JS_OFFERS'] = $arResult['JS_OFFERS'];
}
unset($currencyList, $templateLibrary);

$mainId = $this->GetEditAreaId($arResult['ID']);
$itemIds = array(
	'ID' => $mainId,
	'DISCOUNT_PERCENT_ID' => $mainId.'_dsc_pict',
	'STICKER_ID' => $mainId.'_sticker',
	'BIG_SLIDER_ID' => $mainId.'_big_slider',
	'BIG_IMG_CONT_ID' => $mainId.'_bigimg_cont',
	'SLIDER_CONT_ID' => $mainId.'_slider_cont',
	'OLD_PRICE_ID' => $mainId.'_old_price',
	'PRICE_ID' => $mainId.'_price',
	'DESCRIPTION_ID' => $mainId.'_description',
	'DISCOUNT_PRICE_ID' => $mainId.'_price_discount',
	'PRICE_TOTAL' => $mainId.'_price_total',
	'SLIDER_CONT_OF_ID' => $mainId.'_slider_cont_',
	'QUANTITY_ID' => $mainId.'_quantity',
	'QUANTITY_DOWN_ID' => $mainId.'_quant_down',
	'QUANTITY_UP_ID' => $mainId.'_quant_up',
	'QUANTITY_MEASURE' => $mainId.'_quant_measure',
	'QUANTITY_LIMIT' => $mainId.'_quant_limit',
	'BUY_LINK' => $mainId.'_buy_link',
	'ADD_BASKET_LINK' => $mainId.'_add_basket_link',
	'BASKET_ACTIONS_ID' => $mainId.'_basket_actions',
	'NOT_AVAILABLE_MESS' => $mainId.'_not_avail',
	'COMPARE_LINK' => $mainId.'_compare_link',
	'TREE_ID' => $mainId.'_skudiv',
	'DISPLAY_PROP_DIV' => $mainId.'_sku_prop',
	'DISPLAY_MAIN_PROP_DIV' => $mainId.'_main_sku_prop',
	'OFFER_GROUP' => $mainId.'_set_group_',
	'BASKET_PROP_DIV' => $mainId.'_basket_prop',
	'SUBSCRIBE_LINK' => $mainId.'_subscribe',
	'TABS_ID' => $mainId.'_tabs',
	'TAB_CONTAINERS_ID' => $mainId.'_tab_containers',
	'SMALL_CARD_PANEL_ID' => $mainId.'_small_card_panel',
	'TABS_PANEL_ID' => $mainId.'_tabs_panel'
);
$obName = $templateData['JS_OBJ'] = 'ob'.preg_replace('/[^a-zA-Z0-9_]/', 'x', $mainId);
$name = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']
	: $arResult['NAME'];
$title = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE']
	: $arResult['NAME'];
$alt = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT']
	: $arResult['NAME'];


$actualItem = $arResult;
$showSliderControls = $arResult['MORE_PHOTO_COUNT'] > 1;


$skuProps = array();
$price = $actualItem['ITEM_PRICES'][$actualItem['ITEM_PRICE_SELECTED']];
$measureRatio = $actualItem['ITEM_MEASURE_RATIOS'][$actualItem['ITEM_MEASURE_RATIO_SELECTED']]['RATIO'];
$showDiscount = $price['PERCENT'] > 0;

$showDescription = !empty($arResult['PREVIEW_TEXT']) || !empty($arResult['DETAIL_TEXT']);

$showBuyBtn = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION']);
$buyButtonClassName = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-default' : 'btn-link';
$showAddBtn = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION']);
$showButtonClassName = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-default' : 'btn-link';
$showSubscribe = $arParams['PRODUCT_SUBSCRIPTION'] === 'Y' && ($arResult['PRODUCT']['SUBSCRIBE'] === 'Y' || $haveOffers);
$productType = $arResult['PRODUCT']['TYPE'];

$arParams['MESS_BTN_BUY'] = $arParams['MESS_BTN_BUY'] ?: Loc::getMessage('CT_BCE_CATALOG_BUY');
$arParams['MESS_BTN_ADD_TO_BASKET'] = $arParams['MESS_BTN_ADD_TO_BASKET'] ?: Loc::getMessage('CT_BCE_CATALOG_ADD');

if ($arResult['MODULES']['catalog'] && $arResult['PRODUCT']['TYPE'] === ProductTable::TYPE_SERVICE)
{
	$arParams['~MESS_NOT_AVAILABLE'] = $arParams['~MESS_NOT_AVAILABLE_SERVICE']
		?: Loc::getMessage('CT_BCE_CATALOG_NOT_AVAILABLE_SERVICE')
	;
	$arParams['MESS_NOT_AVAILABLE'] = $arParams['MESS_NOT_AVAILABLE_SERVICE']
		?: Loc::getMessage('CT_BCE_CATALOG_NOT_AVAILABLE_SERVICE')
	;
}
else
{
	$arParams['~MESS_NOT_AVAILABLE'] = $arParams['~MESS_NOT_AVAILABLE']
		?: Loc::getMessage('CT_BCE_CATALOG_NOT_AVAILABLE')
	;
	$arParams['MESS_NOT_AVAILABLE'] = $arParams['MESS_NOT_AVAILABLE']
		?: Loc::getMessage('CT_BCE_CATALOG_NOT_AVAILABLE')
	;
}

$arParams['MESS_BTN_COMPARE'] = $arParams['MESS_BTN_COMPARE'] ?: Loc::getMessage('CT_BCE_CATALOG_COMPARE');
$arParams['MESS_PRICE_RANGES_TITLE'] = $arParams['MESS_PRICE_RANGES_TITLE'] ?: Loc::getMessage('CT_BCE_CATALOG_PRICE_RANGES_TITLE');
$arParams['MESS_DESCRIPTION_TAB'] = $arParams['MESS_DESCRIPTION_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_DESCRIPTION_TAB');
$arParams['MESS_PROPERTIES_TAB'] = $arParams['MESS_PROPERTIES_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_PROPERTIES_TAB');
$arParams['MESS_COMMENTS_TAB'] = $arParams['MESS_COMMENTS_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_COMMENTS_TAB');
$arParams['MESS_SHOW_MAX_QUANTITY'] = $arParams['MESS_SHOW_MAX_QUANTITY'] ?: Loc::getMessage('CT_BCE_CATALOG_SHOW_MAX_QUANTITY');
$arParams['MESS_RELATIVE_QUANTITY_MANY'] = $arParams['MESS_RELATIVE_QUANTITY_MANY'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['MESS_RELATIVE_QUANTITY_FEW'] = $arParams['MESS_RELATIVE_QUANTITY_FEW'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_FEW');

$positionClassMap = array(
	'left' => 'product-item-label-left',
	'center' => 'product-item-label-center',
	'right' => 'product-item-label-right',
	'bottom' => 'product-item-label-bottom',
	'middle' => 'product-item-label-middle',
	'top' => 'product-item-label-top'
);

$discountPositionClass = 'product-item-label-big';
if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION']))
{
	foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos)
	{
		$discountPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
	}
}

$labelPositionClass = 'product-item-label-big';
if (!empty($arParams['LABEL_PROP_POSITION']))
{
	foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos)
	{
		$labelPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
	}
}
?>

<!-- <div class="item_container" >
	<div class="product-item-detail-slider-images-container item_picture" data-entity="images-container">
		<img src="<?= $arResult['DETAIL_PICTURE']['SRC']; ?>" alt="<?= $arResult['DETAIL_PICTURE']['ALT']; ?>" data-entity="image">
	</div>

	<div class="item_info">
		<div class="item_name">
			<h1 class="item_title"><?=$name?></h1>
		</div>

		<div class="genre_container">
			<?= '<span class="genre_name">' . $arResult['PROPERTIES']['GENRE']['NAME'] . '</span>'; ?>
			<?= implode(' / ', $arResult['PROPERTIES']['GENRE']['VALUE_ENUM']); ?>
		</div>

		<div class="binding_container">
			<?= '<span class="binding_name">' . $arResult['PROPERTIES']['BINDING']['NAME'] . '</span>'; ?>
			<?= '<span class="binding">' . $arResult['PROPERTIES']['BINDING']['VALUE'] . '</span>'; ?>
		</div>

		<div class="author_container">
			<?= '<span>' . $arResult['DISPLAY_PROPERTIES']['AUTHOR']['NAME'] . '</span>'; ?>
			<?php if (is_array($arResult['DISPLAY_PROPERTIES']['AUTHOR']['DISPLAY_VALUE'])): ?>
				<?= implode(' / ', $arResult['DISPLAY_PROPERTIES']['AUTHOR']['DISPLAY_VALUE']); ?>
			<?php else: ?>
				<?= '<span class="author">' . $arResult['DISPLAY_PROPERTIES']['AUTHOR']['DISPLAY_VALUE'] . '</span>'; ?>
			<?php endif; ?>
		</div>
	</div>

	<div class="item_price">
		<div class="price">
			<?php
			$price = $arResult['ITEM_PRICES'][0];
			if ($price['BASE_PRICE'] > $price['PRICE']) {
				echo '<span class="old_price" id="' . $itemIds['PRICE_ID'] . '">' . $price['PRINT_BASE_PRICE'] . '</span>';
				echo '<span class="new_price">' . $price['PRINT_DISCOUNT'] . '</span>';
			} else {
				echo '<span>' . $price['PRINT_BASE_PRICE'] . '</span>';
			}
			?>
		</div>

		<div class="count_item" data-entity="quantity-block">
			<div class="product-item-amount-field-container">
				<div class="amount_count">
					<span class="product-item-amount-field-btn-minus no-select" id="<?=$itemIds['QUANTITY_DOWN_ID']?>">-</span>
					<input class="product-item-amount-field" id="<?=$itemIds['QUANTITY_ID']?>" type="number"
						value="<?=$price['MIN_QUANTITY']?>" readonly>
					<span class="product-item-amount-field-btn-plus no-select" id="<?=$itemIds['QUANTITY_UP_ID']?>">+</span>
					<span class="product-item-amount-description-container">
						<span id="<?=$itemIds['QUANTITY_MEASURE']?>">
							<?=$actualItem['ITEM_MEASURE']['TITLE']?>
						</span>
					</span>
				</div>

				<span id="<?=$itemIds['PRICE_TOTAL']?>"></span>
			</div>
		</div>

		<div class="product-item-detail-info-container" data-entity="main-button-container" id="<?=$itemIds['BASKET_ACTIONS_ID']?>">
			<a class="btn <?=$showButtonClassName?> product-item-detail-buy-button" id="<?=$itemIds['ADD_BASKET_LINK']?>"
				href="javascript:void(0);">
				<span><?=$arParams['MESS_BTN_ADD_TO_BASKET']?></span>
			</a>
		</div>
	</div>
</div> -->

<?=
\TAO::frontend()->renderBlock(
	'catalog/element',
	[
		'arResult' => $arResult,
		'arParams' => $arParams,
		'name' => $name,
		'itemIds' => $itemIds,
		'actualItem' => $actualItem,
		'showButtonClassName' => $showButtonClassName,
		'price' => $price
	]
)
?>

<div class="bx-catalog-element bx-<?=$arParams['TEMPLATE_THEME']?>" id="<?=$itemIds['ID']?>"
	itemscope itemtype="http://schema.org/Product">
	
	<div class="product-item-detail-slider-images-container" data-entity="images-container"></div>

</div>

<?php

$emptyProductProperties = empty($arResult['PRODUCT_PROPERTIES']);
if ($arParams['ADD_PROPERTIES_TO_BASKET'] === 'Y' && !$emptyProductProperties)
{
	?>
	<div id="<?=$itemIds['BASKET_PROP_DIV']?>" style="display: none;">
		<?php
		if (!empty($arResult['PRODUCT_PROPERTIES_FILL']))
		{
			foreach ($arResult['PRODUCT_PROPERTIES_FILL'] as $propId => $propInfo)
			{
				?>
				<input type="hidden" name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propId?>]" value="<?=htmlspecialcharsbx($propInfo['ID'])?>">
				<?php
				unset($arResult['PRODUCT_PROPERTIES'][$propId]);
			}
		}

		$emptyProductProperties = empty($arResult['PRODUCT_PROPERTIES']);
		if (!$emptyProductProperties)
		{
			?>
			<table>
				<?php
				foreach ($arResult['PRODUCT_PROPERTIES'] as $propId => $propInfo)
				{
					?>
					<tr>
						<td><?=$arResult['PROPERTIES'][$propId]['NAME']?></td>
						<td>
							<?php
							if (
								$arResult['PROPERTIES'][$propId]['PROPERTY_TYPE'] === 'L'
								&& $arResult['PROPERTIES'][$propId]['LIST_TYPE'] === 'C'
							)
							{
								foreach ($propInfo['VALUES'] as $valueId => $value)
								{
									?>
									<label>
										<input type="radio" name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propId?>]"
											value="<?=$valueId?>" <?=($valueId == $propInfo['SELECTED'] ? '"checked"' : '')?>>
										<?=$value?>
									</label>
									<br>
									<?php
								}
							}
							else
							{
								?>
								<select name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propId?>]">
									<?php
									foreach ($propInfo['VALUES'] as $valueId => $value)
									{
										?>
										<option value="<?=$valueId?>" <?=($valueId == $propInfo['SELECTED'] ? '"selected"' : '')?>>
											<?=$value?>
										</option>
										<?php
									}
									?>
								</select>
								<?php
							}
							?>
						</td>
					</tr>
					<?php
				}
				?>
			</table>
			<?php
		}
		?>
	</div>
	<?php
}

$jsParams = array(
	'CONFIG' => array(
		'USE_CATALOG' => $arResult['CATALOG'],
		'SHOW_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
		'SHOW_PRICE' => !empty($arResult['ITEM_PRICES']),
		'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'] === 'Y',
		'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'] === 'Y',
		'USE_PRICE_COUNT' => $arParams['USE_PRICE_COUNT'],
		'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
		'MAIN_PICTURE_MODE' => $arParams['DETAIL_PICTURE_MODE'],
		'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
		'SHOW_CLOSE_POPUP' => $arParams['SHOW_CLOSE_POPUP'] === 'Y',
		'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
		'RELATIVE_QUANTITY_FACTOR' => $arParams['RELATIVE_QUANTITY_FACTOR'],
		'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
		'USE_STICKERS' => true,
		'USE_SUBSCRIBE' => $showSubscribe,
		'SHOW_SLIDER' => $arParams['SHOW_SLIDER'],
		'SLIDER_INTERVAL' => $arParams['SLIDER_INTERVAL'],
		'ALT' => $alt,
		'TITLE' => $title,
		'MAGNIFIER_ZOOM_PERCENT' => 200,
		'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
		'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
		'BRAND_PROPERTY' => !empty($arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']])
			? $arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']]['DISPLAY_VALUE']
			: null
	),
	'VISUAL' => $itemIds,
	'PRODUCT_TYPE' => $arResult['PRODUCT']['TYPE'],
	'PRODUCT' => array(
		'ID' => $arResult['ID'],
		'ACTIVE' => $arResult['ACTIVE'],
		'PICT' => reset($arResult['MORE_PHOTO']),
		'NAME' => $arResult['~NAME'],
		'SUBSCRIPTION' => true,
		'ITEM_PRICE_MODE' => $arResult['ITEM_PRICE_MODE'],
		'ITEM_PRICES' => $arResult['ITEM_PRICES'],
		'ITEM_PRICE_SELECTED' => $arResult['ITEM_PRICE_SELECTED'],
		'ITEM_QUANTITY_RANGES' => $arResult['ITEM_QUANTITY_RANGES'],
		'ITEM_QUANTITY_RANGE_SELECTED' => $arResult['ITEM_QUANTITY_RANGE_SELECTED'],
		'ITEM_MEASURE_RATIOS' => $arResult['ITEM_MEASURE_RATIOS'],
		'ITEM_MEASURE_RATIO_SELECTED' => $arResult['ITEM_MEASURE_RATIO_SELECTED'],
		'SLIDER_COUNT' => $arResult['MORE_PHOTO_COUNT'],
		'SLIDER' => $arResult['MORE_PHOTO'],
		'CAN_BUY' => $arResult['CAN_BUY'],
		'CHECK_QUANTITY' => $arResult['CHECK_QUANTITY'],
		'QUANTITY_FLOAT' => is_float($arResult['ITEM_MEASURE_RATIOS'][$arResult['ITEM_MEASURE_RATIO_SELECTED']]['RATIO']),
		'MAX_QUANTITY' => $arResult['PRODUCT']['QUANTITY'],
		'STEP_QUANTITY' => $arResult['ITEM_MEASURE_RATIOS'][$arResult['ITEM_MEASURE_RATIO_SELECTED']]['RATIO'],
		'CATEGORY' => $arResult['CATEGORY_PATH']
	),
	'BASKET' => array(
		'ADD_PROPS' => $arParams['ADD_PROPERTIES_TO_BASKET'] === 'Y',
		'QUANTITY' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
		'PROPS' => $arParams['PRODUCT_PROPS_VARIABLE'],
		'EMPTY_PROPS' => $emptyProductProperties,
		'BASKET_URL' => $arParams['BASKET_URL'],
		'ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
		'BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE']
	)
);
unset($emptyProductProperties);



$jsParams["IS_FACEBOOK_CONVERSION_CUSTOMIZE_PRODUCT_EVENT_ENABLED"] =
	$arResult["IS_FACEBOOK_CONVERSION_CUSTOMIZE_PRODUCT_EVENT_ENABLED"]
;
?>
<script>
	BX.message({
		ECONOMY_INFO_MESSAGE: '<?=GetMessageJS('CT_BCE_CATALOG_ECONOMY_INFO2')?>',
		TITLE_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_TITLE_ERROR')?>',
		TITLE_BASKET_PROPS: '<?=GetMessageJS('CT_BCE_CATALOG_TITLE_BASKET_PROPS')?>',
		BASKET_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_BASKET_UNKNOWN_ERROR')?>',
		BTN_SEND_PROPS: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_SEND_PROPS')?>',
		BTN_MESSAGE_DETAIL_BASKET_REDIRECT: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_BASKET_REDIRECT')?>',
		BTN_MESSAGE_CLOSE: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_CLOSE')?>',
		BTN_MESSAGE_DETAIL_CLOSE_POPUP: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_CLOSE_POPUP')?>',
		TITLE_SUCCESSFUL: '<?=GetMessageJS('CT_BCE_CATALOG_ADD_TO_BASKET_OK')?>',
		COMPARE_MESSAGE_OK: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_OK')?>',
		COMPARE_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_UNKNOWN_ERROR')?>',
		COMPARE_TITLE: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_TITLE')?>',
		BTN_MESSAGE_COMPARE_REDIRECT: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_COMPARE_REDIRECT')?>',
		PRODUCT_GIFT_LABEL: '<?=GetMessageJS('CT_BCE_CATALOG_PRODUCT_GIFT_LABEL')?>',
		PRICE_TOTAL_PREFIX: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_PRICE_TOTAL_PREFIX')?>',
		RELATIVE_QUANTITY_MANY: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_MANY'])?>',
		RELATIVE_QUANTITY_FEW: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_FEW'])?>',
		SITE_ID: '<?=CUtil::JSEscape($component->getSiteId())?>'
	});

	var <?=$obName?> = new JCCatalogElement(<?=CUtil::PhpToJSObject($jsParams, false, true)?>);
</script>
<?php
unset($actualItem, $itemIds, $jsParams);