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
?>

<div class="container">
	<?= \TAO::frontend()->renderBlock(
		'news/list',
		[
			'data' => $arResult
		]
	);
	?>
	<?
	// echo '<pre>';
	// print_r($_REQUEST);
	// vd($arParams);
	?>
</div>