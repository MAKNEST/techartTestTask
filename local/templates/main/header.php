<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();

use Bitrix\Main\Page\Asset;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" /> -->

    <?php 
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/style/main.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/style/form.css");
    Asset::getInstance()->addString('<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;700&family=Open+Sans&display=swap" rel="stylesheet">');
    $APPLICATION->ShowHead();
	
	\TAO::frontendCss('index');
	\TAO::frontendJs('index');
    ?>
	<!-- <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> -->
    <title><?php $APPLICATION->ShowTitle();?></title>
</head>

<body>
<div id="panel">
	<?php $APPLICATION->ShowPanel();?>
</div>
	
<?

$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"main_menu", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "sub_top_menu",
		"DELAY" => "N",
		"MAX_LEVEL" => "2",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "N",
		"ROOT_MENU_TYPE" => "main_top_menu",
		"USE_EXT" => "Y",
		"COMPONENT_TEMPLATE" => "main_menu"
	),
	false
); ?>

