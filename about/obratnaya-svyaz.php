<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("ROBOTS", "Обратная связь");
$APPLICATION->SetPageProperty("keywords", "Обратная связь");
$APPLICATION->SetPageProperty("description", "Обратная связь");
$APPLICATION->SetPageProperty("TITLE", "Обратная связь");
$APPLICATION->SetTitle("Форма обратной связи");
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