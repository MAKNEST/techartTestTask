<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("ROBOTS", "Корзина");
$APPLICATION->SetPageProperty("TITLE", "Корзина");
$APPLICATION->SetPageProperty("keywords", "Корзина");
$APPLICATION->SetPageProperty("description", "Корзина");
$APPLICATION->SetTitle("Корзина");

global $USER;
$USER->Authorize(1); 

?><?$APPLICATION->IncludeComponent(
	"bitrix:sale.basket.basket", 
	"basket", 
	array(
		"ACTION_VARIABLE" => "basketAction",
		"ADDITIONAL_PICT_PROP_4" => "-",
		"AUTO_CALCULATION" => "Y",
		"BASKET_IMAGES_SCALING" => "adaptive",
		"COLUMNS_LIST_EXT" => array(
			0 => "PREVIEW_PICTURE",
			1 => "PREVIEW_TEXT",
			2 => "DISCOUNT",
			3 => "PROPS",
			4 => "DELETE",
			5 => "DELAY",
			6 => "TYPE",
			7 => "SUM",
			8 => "PROPERTY_AUTHOR",
			9 => "PROPERTY_GENRE",
			10 => "PROPERTY_BINDING",
			11 => "PROPERTY_DISCOUNT",
		),
		"COLUMNS_LIST_MOBILE" => array(
			0 => "PREVIEW_PICTURE",
			1 => "DISCOUNT",
			2 => "DELETE",
			3 => "DELAY",
			4 => "TYPE",
			5 => "SUM",
		),
		"COMPATIBLE_MODE" => "N",
		"CORRECT_RATIO" => "Y",
		"DEFERRED_REFRESH" => "Y",
		"DISCOUNT_PERCENT_POSITION" => "bottom-right",
		"DISPLAY_MODE" => "extended",
		"EMPTY_BASKET_HINT_PATH" => "/books/",
		"GIFTS_BLOCK_TITLE" => "Выберите один из подарков",
		"GIFTS_CONVERT_CURRENCY" => "N",
		"GIFTS_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_HIDE_NOT_AVAILABLE" => "N",
		"GIFTS_MESS_BTN_BUY" => "Выбрать",
		"GIFTS_MESS_BTN_DETAIL" => "Подробнее",
		"GIFTS_PAGE_ELEMENT_COUNT" => "4",
		"GIFTS_PLACE" => "BOTTOM",
		"GIFTS_PRODUCT_PROPS_VARIABLE" => "prop",
		"GIFTS_PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
		"GIFTS_SHOW_OLD_PRICE" => "N",
		"GIFTS_TEXT_LABEL_GIFT" => "Подарок",
		"HIDE_COUPON" => "Y",
		"LABEL_PROP" => array(
		),
		"LABEL_PROP_MOBILE" => "",
		"LABEL_PROP_POSITION" => "top-left",
		"PATH_TO_ORDER" => "/personal/order.php",
		"PRICE_DISPLAY_MODE" => "Y",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"PRODUCT_BLOCKS_ORDER" => "props,sku,columns",
		"QUANTITY_FLOAT" => "N",
		"SET_TITLE" => "Y",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_FILTER" => "N",
		"SHOW_RESTORE" => "N",
		"TEMPLATE_THEME" => "",
		"TOTAL_BLOCK_DISPLAY" => array(
			0 => "bottom",
		),
		"USE_DYNAMIC_SCROLL" => "Y",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"USE_GIFTS" => "N",
		"USE_PREPAYMENT" => "N",
		"USE_PRICE_ANIMATION" => "N",
		"COMPONENT_TEMPLATE" => "basket"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>