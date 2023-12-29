<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("TITLE", "Регистрация");
$APPLICATION->SetTitle("Регистрация");
?><?$APPLICATION->IncludeComponent(
	"bitrix:main.register", 
	"main_register_form", 
	array(
		"AUTH" => "Y",
		"REQUIRED_FIELDS" => array(
			0 => "EMAIL",
			1 => "NAME",
		),
		"SET_TITLE" => "Y",
		"SHOW_FIELDS" => array(
			0 => "NAME",
			1 => "LAST_NAME",
		),
		"SUCCESS_PAGE" => "/",
		"USER_PROPERTY" => array(
		),
		"USER_PROPERTY_NAME" => "",
		"USE_BACKURL" => "Y",
		"COMPONENT_TEMPLATE" => "main_register_form"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>