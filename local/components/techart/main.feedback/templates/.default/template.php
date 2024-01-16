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
<div class="mfeedback">
<div class="container">
	<div class="form_feedback-title-block">
		<h2 class="form_feedback-title">Обратная связь</h2>

		<?php if(!empty($arResult["ERROR_MESSAGE"])): ?>
			<p><span class="mf-req">*</span> - поля обязательны для заполнения</p>
		<?php endif; ?>
	</div>

<form action="<?=POST_FORM_ACTION_URI?>" method="POST" class="form_feedback">

<?php
if($arResult["OK_MESSAGE"] <> '')
{
	?><div class="mf-ok-text"><?=$arResult["OK_MESSAGE"]?></div><?
}

?>

<?=bitrix_sessid_post()?>
	<div class="mf-name">
		<div class="error_message">
			<?php if (!empty($arResult['ERROR_MESSAGE']) && !empty($arResult['ERROR_MESSAGE']['user_name'])) {
				echo '<span class="mf-req">*</span>  ' . $arResult['ERROR_MESSAGE']['user_name'];
			}?>
		</div>

		<input type="text" name="user_name" value="<?= !empty($arResult['ERROR_MESSAGE']) ? $arResult["AUTHOR_NAME"] : ''; ?>" placeholder="<?=GetMessage("MFT_NAME")?>" class="form_feedback-input">
	</div>

	<div class="mf-email">
		<div class="error_message">
			<?php if (!empty($arResult['ERROR_MESSAGE']) && !empty($arResult['ERROR_MESSAGE']['user_email'])) {
				echo '<span class="mf-req">*</span>  ' . $arResult['ERROR_MESSAGE']['user_email'];
			}?>
		</div>

		<input type="text" name="user_email" value="<?= !empty($arResult['ERROR_MESSAGE']) ? $arResult["AUTHOR_EMAIL"] : ''; ?>" placeholder="<?=GetMessage("MFT_EMAIL")?>" class="form_feedback-input">
	</div>

	<div class="mf-phone">
		<div class="error_message">
			<?php if (!empty($arResult['ERROR_MESSAGE']) && !empty($arResult['ERROR_MESSAGE']['user_phone']) || !empty($arResult['ERROR_MESSAGE']['user_phone_preg'])) {
				echo '<span class="mf-req">*</span>  ';
				echo $arResult['ERROR_MESSAGE']['user_phone'] ?? $arResult['ERROR_MESSAGE']['user_phone_preg'];
			}?>
		</div>

		<input type="tel" placeholder="<?=GetMessage("MFT_PHONE")?>: 8 (900) 000-00-00" name="user_phone" value="<?= !empty($arResult['ERROR_MESSAGE']) ? $arResult["AUTHOR_PHONE"] : ''; ?>" class="form_feedback-input">
	</div>

	<div class="mf-chapter">
		<div class="error_message">
			<?php if (!empty($arResult['ERROR_MESSAGE']) && !empty($arResult['ERROR_MESSAGE']['CHAPTER'])) {
				echo '<span class="mf-req">*</span>  ' . $arResult['ERROR_MESSAGE']['CHAPTER'];
			}?>
		</div>

		<select name="chapter" id="" class="form_feedback-input form_feedback-select">
			<option value="">-<?=GetMessage("MFT_CHAPTER")?>-</option>
			<?php 
			foreach ($arResult["CHAPTER_LIST"] as $chapterName): ?>
				<option value="<?= $chapterName; ?>"><?= $chapterName; ?></option>
			<?php endforeach; ?>
		</select>
	</div>

	<div class="mf-message">
		<div class="error_message">
			<?php if (!empty($arResult['ERROR_MESSAGE'])  && !empty($arResult['ERROR_MESSAGE']['MESSAGE'])) {
				echo '<span class="mf-req">*</span>  ' . $arResult['ERROR_MESSAGE']['MESSAGE'];
			}?>
		</div>

		<textarea name="MESSAGE" rows="5" cols="40" placeholder="<?=GetMessage("MFT_MESSAGE")?>" class="form_feedback-input"></textarea>
	</div>

	<?if($arParams["USE_CAPTCHA"] == "Y"):?>
	<div class="mf-captcha">
		<div class="mf-text"><?=GetMessage("MFT_CAPTCHA")?></div>
		<input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
		<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="180" height="40" alt="CAPTCHA">
		<div class="mf-text"><?=GetMessage("MFT_CAPTCHA_CODE")?><span class="mf-req">*</span></div>
		<input type="text" name="captcha_word" size="30" maxlength="50" value="">
	</div>
	<?endif;?>
	<input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
	<input type="submit" name="submit" value="<?=GetMessage("MFT_SUBMIT")?>" class="main_button form_feedback-submit">
</form>
</div>
</div>