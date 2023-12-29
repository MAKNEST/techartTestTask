<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("TITLE", "Обратная связь");
$APPLICATION->SetTitle("Обратная связь");
?>

<?$APPLICATION->IncludeComponent(
	"techart:main.feedback",
	"",
	Array(
		"EMAIL_TO" => "suleymanov@techart.ru",
		"EVENT_MESSAGE_ID" => array(),
		"OK_TEXT" => "Спасибо, ваше сообщение принято.",
		"REQUIRED_FIELDS" => array("NAME", "EMAIL", "MESSAGE", "PHONE", "CHAPTER"),
		"USE_CAPTCHA" => "N"
	)
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>