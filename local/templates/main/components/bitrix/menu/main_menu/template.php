<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();


if (!empty($arResult)): ?>
	<div class="container">
		<header>
			<div class="header_container">
				<a href="/" class="logo_container">
					<div class="logo">
						<img src="<?= SITE_TEMPLATE_PATH?>/assets/icons/header_logo.svg">
					</div>
					<p class="header_title">
						Галактический<br>
						вестник
					</p>
				</a>

                <?$APPLICATION->IncludeComponent("bitrix:search.form", "search_form", Array(
                    "PAGE" => "#SITE_DIR#search/index.php",	// Страница выдачи результатов поиска (доступен макрос #SITE_DIR#)
                    "USE_SUGGEST" => "N",	// Показывать подсказку с поисковыми фразами
                    ),
                    false
                );?>
                <div class="header_links">
                    <?php foreach ($arResult as $arItem): ?>
                        <div class="navbar">
                                <div class="dropdown">
                                    <a class="header_link <?= $arItem['SELECTED'] == 1 ? 'header_link-selected' : ''; ?>" href="<?= $arItem['LINK'];?>"><?= $arItem['TEXT']; ?>
                                        <?php if(!empty($arItem['SUBITEMS'])): ?>
                                            <svg class="header_link-dropdown-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 58.999 58.999" style="enable-background:new 0 0 58.999 58.999;" xml:space="preserve">
                                                <path d="M29.167,0c-1.104,0-2,0.896-2,2v50.289L11.86,36.728c-0.781-0.781-1.922-0.781-2.703,0 c-0.781,0.78-0.719,2.047,0.062,2.828l18.883,18.857c0.375,0.375,0.899,0.586,1.43,0.586s1.047-0.211,1.422-0.586l18.857-18.857 c0.781-0.781,0.783-2.048,0.002-2.828c-0.781-0.781-2.296-0.781-3.077,0L31.167,52.052V2C31.167,0.895,30.271,0,29.167,0z"/>
                                            </svg>
                                        <?php endif; ?>
                                    </a>

                                    <?php if(!empty($arItem['SUBITEMS'])): ?>
                                        <div class="dropdown-content">
                                            <?php foreach ($arItem['SUBITEMS'] as $subItem): ?>
                                                <a href="<?= $subItem['LINK'];?>" class="header_link-submenu <?= $subItem['SELECTED'] == 1 ? 'header_link-selected' : ''; ?>"><?= $subItem['TEXT']; ?></a>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div> 
                        </div>
                    <?php endforeach; ?>

                    <div class="navbar">
                        <?php if (!$USER->IsAuthorized()): ?>
                            <a href="/auth/" class="header_link">Авторизация</a>
                            <a href="/auth/register.php" class="header_link">Регистрация</a>
                        <?php else: ?>
                            <form action="/auth/">
                                <?=bitrix_sessid_post()?>
                                <input type="hidden" name="logout" value="yes" />
                                <div class="user_block">	
                                    <div class="user_login"><?= $USER->GetFullName(); ?></div>
                                    <input type="submit" name="logout_butt" value="Выйти" class="main_button logout_button">
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>

                    <div class="bassket">
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
); ?>
                    </div>
                </div>
            </div>
        </header>
    </div>	
<?php endif; ?>	