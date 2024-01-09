<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("ROBOTS", "Список категорий");
$APPLICATION->SetPageProperty("TITLE", "Список категорий");
$APPLICATION->SetPageProperty("keywords", "Список категорий");
$APPLICATION->SetPageProperty("description", "Список категорий");
$APPLICATION->SetTitle("Список категорий[класс]");

$APPLICATION->IncludeComponent(
	"techart:ChapterList", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"IBLOCK_TYPE" => "content",
		"IBLOCK_ID" => "2",
		"ORDER_FIELD" => "NAME",
		"ORDER_TYPE" => "ASC"
	),
	false
);

?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>