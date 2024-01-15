<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("ROBOTS", "Список категорий");
$APPLICATION->SetPageProperty("TITLE", "Список категорий");
$APPLICATION->SetPageProperty("keywords", "Список категорий");
$APPLICATION->SetPageProperty("description", "Список категорий");
$APPLICATION->SetTitle("Список категорий"); 
?><?$APPLICATION->IncludeComponent(
	"techart:chaptersList", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"IBLOCK_TYPE" => "content",
		"IBLOCK_ID" => "9",
		"ORDER_FIELD" => "NAME",
		"ORDER_TYPE" => "DESC"
	),
	false
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>