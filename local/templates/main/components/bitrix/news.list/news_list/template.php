<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
$APPLICATION->SetPageProperty("TITLE", "Новости" . $arResult['TITLE_CHAPTER']);

require_once $_SERVER["DOCUMENT_ROOT"] . "/local/templates/main/assets/components/component_button.php";

?>

<div class="container">
    <div class="content_title all_news-title">
		<?php $APPLICATION->ShowTitle(); ?>
    </div>

    <div class="all_news-list">
        <?php
        foreach ($arResult['ITEMS'] as $item): ?>
			<div class="news-card">
				<div class="newsDate">
					<?= $item['PROPERTIES']['DATE']['VALUE'] ?? $item['PROPERTY_DATE_VALUE']; ?>
				</div>
				<a href="<?= $item['DETAIL_PAGE_URL']; ?>" class="news-card_link">
					<div class="news-card_title">
						<?= $item['NAME']; ?>
					</div>

					<?= $item['PREVIEW_TEXT'];?>

					<?php
					getButton([
						'text' => 'Подробнее',
						'link' => $item['DETAIL_PAGE_URL'],
						'icon' => '<svg width="26" height="16" viewBox="0 0 26 16" xmlns="http://www.w3.org/2000/svg" class="button_icon" fill="currentColor">
							<path d="M25.707 8.70711C26.0975 8.31658 26.0975 7.68342 25.707 7.2929L19.343 0.928934C18.9525 0.538409 18.3193 0.538409 17.9288 0.928934C17.5383 1.31946 17.5383 1.95262 17.9288 2.34315L23.5857 8L17.9288 13.6569C17.5383 14.0474 17.5383 14.6805 17.9288 15.0711C18.3193 15.4616 18.9525 15.4616 19.343 15.0711L25.707 8.70711ZM-8.74228e-08 9L24.9999 9L24.9999 7L8.74228e-08 7L-8.74228e-08 9Z"/>
								</svg>',
						'icon_postion' => 'right',
					]);
					?>

				</a>
			</div>
		<?php endforeach; ?>
    </div>

    <div class="pager">
		<?php if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
			<br/><?=$arResult["NAV_STRING"]?>
		<?php endif;?>
    </div>
</div>