<?
define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("TITLE", "Авторизация");
$APPLICATION->SetTitle("Авторизация");

if (isset($_REQUEST["backurl"]) && strlen($_REQUEST["backurl"])>0) 
	LocalRedirect($backurl);


?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>	