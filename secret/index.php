<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("TITLE", "Секретная страница");
$APPLICATION->SetTitle("Секретная страница");
?>
<div class="container">
    <?php
    if ($USER->IsAuthorized()): ?>
        <p>Секретный текст для авторизованных пользователей</p>
    <?php else: ?>
        <p>Авторизуйтесь или зарегестрируйтесь чтобы продолжить</p>
        <a href="/auth/" class="header_link">Авторизация</a>
        <a href="/auth/register.php" class="header_link">Регистрация</a>
    <?php endif; ?>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>