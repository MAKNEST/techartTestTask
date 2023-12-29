<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("test"); 
?><?$APPLICATION->IncludeComponent(
	"techart:chaptersList", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"IBLOCK_TYPE" => "content",
		"IBLOCK_ID" => "2",
		"ORDER_FIELD" => "NAME",
		"ORDER_TYPE" => "DESC"
	),
	false
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>