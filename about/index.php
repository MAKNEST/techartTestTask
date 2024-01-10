<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetPageProperty("ROBOTS", "О нас");
$APPLICATION->SetPageProperty("keywords", "О нас");
$APPLICATION->SetPageProperty("description", "О нас");
$APPLICATION->SetPageProperty("TITLE", "О нас");
$APPLICATION->SetTitle("О нас");
?>

    <div class="container">
        <h2>Страница О нас...</h2>
        <p>
            тестовый текст на странице о нас
        </p>

        <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dicta voluptate culpa pariatur molestiae sapiente ratione et. At atque magnam debitis velit similique natus explicabo, deleniti dolores modi quo. Culpa, doloribus?
        </p>
    </div>
<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>