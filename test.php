<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("test");

global $USER;
$USER->Authorize(1); 

?><?$APPLICATION->IncludeComponent(
	"techart:ChapterList",
	"",
	Array(
		"IBLOCK_ID" => "13",
		"IBLOCK_TYPE" => "catalog",
		"ORDER_FIELD" => "PROPERTY_DATE",
		"ORDER_TYPE" => "ASC"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>