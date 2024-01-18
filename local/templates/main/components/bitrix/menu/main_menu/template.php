<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if (!empty($arResult)): ?>
	<div class="container">
        <?php
            ob_start();
            $APPLICATION->IncludeComponent("bitrix:search.form", "search_form", Array(
                "PAGE" => "#SITE_DIR#search/index.php",	// Страница выдачи результатов поиска (доступен макрос #SITE_DIR#)
                "USE_SUGGEST" => "N",	// Показывать подсказку с поисковыми фразами
                ),
                false
            );
            $search = ob_get_clean();

            ob_start(); ?>
            <?php
                $APPLICATION->IncludeComponent(
                    "bitrix:sale.basket.basket.line", 
                    "basket_line", 
                    array(
                        "COMPONENT_TEMPLATE" => "basket_line",
                        "PATH_TO_BASKET" => "/personal/basket.php",
                        "PATH_TO_ORDER" => "",
                        "SHOW_NUM_PRODUCTS" => "Y",
                        "SHOW_TOTAL_PRICE" => "Y",
                        "SHOW_EMPTY_VALUES" => "Y",
                        "SHOW_PERSONAL_LINK" => "N",
                        "PATH_TO_PERSONAL" => "/personal/",
                        "SHOW_AUTHOR" => "N",
                        "PATH_TO_AUTHORIZE" => "",
                        "SHOW_REGISTRATION" => "N",
                        "PATH_TO_REGISTER" => "/auth/register.php",
                        "PATH_TO_PROFILE" => "/personal/",
                        "SHOW_PRODUCTS" => "Y",
                        "POSITION_FIXED" => "N",
                        "HIDE_ON_BASKET_PAGES" => "Y",
                        "SHOW_DELAY" => "N",
                        "SHOW_NOTAVAIL" => "Y",
                        "SHOW_IMAGE" => "Y",
                        "SHOW_PRICE" => "Y",
                        "SHOW_SUMMARY" => "Y",
                        "MAX_IMAGE_SIZE" => "70"
                    ),
                    false
            );

            $basketLine = ob_get_clean();
?>

<?=
\TAO::frontend()->renderBlock(
    'common/header',
    [
        'basket_line' => $basketLine,
        'search' => $search,
        'menu_links' => \TAO::frontend()->renderBlock(
            'common/menu',
            [
                'links' => $arResult,
                'userAuthorised' => !$USER->IsAuthorized(),
                'sessionId' => bitrix_sessid_post(),
                'userName' => $USER->GetFullName()
            ]
        )
    ]
)
?>
</div>	
<?php endif; ?> 
