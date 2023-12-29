<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("test");

global $USER;
$USER->Authorize(1); 

?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>