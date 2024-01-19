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

foreach ($arResult['ITEMS'] as $item) : ?>
	<!-- <a href="<?= $item['DETAIL_PAGE_URL']; ?>" class="all_news-banner-link">
		<div class="all_news-banner" style="background-image: url(<?= $item['DETAIL_PICTURE']['SRC']; ?>);">
			<div class="banner-container">
				<h1 class="all_news-banner-title">
					<?= $item['NAME']; ?>
				</h1>

				<div class="all_news-banner-announce">
					<?= $item['PREVIEW_TEXT']; ?>
				</div>
			</div>
		</div>
	</a> -->

	<?= \TAO::frontend()->renderBlock(
		'news/news-banner',
		[
			'item' => $item
		]); 
	?>
<?php endforeach; ?>