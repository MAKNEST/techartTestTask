<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("TAO Обратная связь");?>

<?
print \TAO::form('Feedback')->render();

?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>