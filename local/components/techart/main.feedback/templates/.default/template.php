<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>
<div class="container">
	
<?=
\TAO::frontend()->renderBlock(
	'form/form',
	[
		'action' => POST_FORM_ACTION_URI,
		'error_message' => $arResult['ERROR_TITLE'],
		'title' => 'Обратная связь',
		'bitrix_sessid_post' => bitrix_sessid_post(),
		'inputs' => $arResult['INPUTS'],
		'params_hash' => $arResult['PARAMS_HASH'],
		'submit_button' => $arResult['SUBMIT_BUTTON'],
		'ok_message' => $arResult['OK_MESSAGE_BLOCK']
	]
);
?>
</div>