<?
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2014 Bitrix
 */

/**
 * Bitrix vars
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @param array $arParams
 * @param array $arResult
 * @param CBitrixComponentTemplate $this
 */

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

if($arResult["SHOW_SMS_FIELD"] == true)
{
	CJSCore::Init('phone_auth');
}

if (!empty($arResult["ERRORS"])):
	foreach ($arResult["ERRORS"] as $key => $error)
		if (intval($key) == 0 && $key !== 0) 
			$arResult["ERRORS"][$key] = str_replace("#FIELD_NAME#", "&quot;".GetMessage("REGISTER_FIELD_".$key)."&quot;", $error);
endif;

?>

<script>
new BX.PhoneAuth({
	containerId: 'bx_register_resend',
	errorContainerId: 'bx_register_error',
	interval: <?=$arResult["PHONE_CODE_RESEND_INTERVAL"]?>,
	data:
		<?=CUtil::PhpToJSObject([
			'signedData' => $arResult["SIGNED_DATA"],
		])?>,
	onError:
		function(response)
		{
			var errorDiv = BX('bx_register_error');
			var errorNode = BX.findChildByClassName(errorDiv, 'errortext');
			errorNode.innerHTML = '';
			for(var i = 0; i < response.errors.length; i++)
			{
				errorNode.innerHTML = errorNode.innerHTML + BX.util.htmlspecialchars(response.errors[i].message) + '<br>';
			}
			errorDiv.style.display = '';
		}
});
</script>

<div class="container">
	<div id="bx_register_error" style="display:none"><?ShowError("error")?></div>
	<div id="bx_register_resend"></div>

	<form  method="post" action="<?=POST_FORM_ACTION_URI?>" name="regform" enctype="multipart/form-data">
		<div class="form_container">
			<input type="hidden" name="SIGNED_DATA" value="<?=htmlspecialcharsbx($arResult["SIGNED_DATA"])?>" />

			<?php if($arResult["BACKURL"] <> ''): ?>
				<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
			<?php endif; ?>

			<div class="form_container-block">
				<div class="form_title">
					<?php echo GetMessage("AUTH_REGISTER")?>
				</div>
			</div>

			<?php foreach ($arResult["SHOW_FIELDS"] as $FIELD): ?>
			<div class="form_container-block">
				<?php
				switch ($FIELD) {
					case "LOGIN": ?>
						<input placeholder="<?= GetMessage('REGISTER_FIELD_' . $FIELD); ?>" type="text" size="30" name="REGISTER[LOGIN]" class="form_input" value="<?= $arResult['VALUES'][$FIELD]; ?>">
						<?php
						if ($arResult["ERRORS"][$FIELD]): ?>
							<div class="error_block">
								<span class="starrequired">*</span>
								<?= $arResult["ERRORS"][$FIELD]; ?>
							</div>
						<?php endif;
						break;
					
					case "EMAIL": ?>
						<input placeholder="<?= GetMessage('REGISTER_FIELD_' . $FIELD); ?>" type="text" size="30" name="REGISTER[EMAIL]" class="form_input" value="<?= $arResult['VALUES'][$FIELD]; ?>">
						<?php
						if ($arResult["ERRORS"][$FIELD]): ?>
							<div class="error_block">
								<span class="starrequired">*</span>
								<?= $arResult["ERRORS"]['EMAIL']; ?>
							</div>
						<?php endif;
						break;

					case "PASSWORD": ?>
						<input placeholder="<?= GetMessage('REGISTER_FIELD_' . $FIELD); ?>" size="30" type="password" name="REGISTER[<?=$FIELD?>]" autocomplete="off" class="bx-auth-input form_input"/>
						<?php
						if ($arResult["ERRORS"][$FIELD]) : ?>
							<div class="error_block">
								<span class="starrequired">*</span>
								<?= $arResult["ERRORS"][$FIELD]; ?>
							</div>
						<?php endif;
						break;

					case "CONFIRM_PASSWORD": ?>
						<input placeholder="<?= GetMessage('REGISTER_FIELD_' . $FIELD); ?>" size="30" type="password" name="REGISTER[<?=$FIELD?>]" autocomplete="off" class="bx-auth-input form_input"/>
						<?php
						if ($arResult["ERRORS"][$FIELD]) : ?>
							<div class="error_block">
								<span class="starrequired">*</span>
								<?= $arResult["ERRORS"][$FIELD]; ?>
							</div>
						<?php endif;
						break;

					case "NAME": ?>
						<input placeholder="<?= GetMessage('REGISTER_FIELD_' . $FIELD); ?>" type="text" size="30" name="REGISTER[<?= $FIELD; ?>]" class="form_input" value="<?=$arResult["VALUES"][$FIELD]?>">
						<?php
						if ($arResult["ERRORS"][$FIELD]): ?>
							<div class="error_block">
								<span class="starrequired">*</span>
								<?= $arResult["ERRORS"][$FIELD]; ?>
							</div>
						<?php endif;
						break;
					
					case "LAST_NAME": ?>
						<input placeholder="<?= GetMessage('REGISTER_FIELD_' . $FIELD); ?>" type="text" size="30" name="REGISTER[<?= $FIELD; ?>]" class="form_input" value="<?=$arResult["VALUES"][$FIELD]?>">
						<?php
						if ($arResult["ERRORS"][$FIELD]): ?>
							<div class="error_block">
								<span class="starrequired">*</span>
									<?= $arResult["ERRORS"][$FIELD]; ?>
							</div>
						<?php endif;
						break;
				} ?>
			</div>
			<?php endforeach; ?>

			<div class="form_container-block">
				<input type="submit" class="btn btn-primary form_button main_button" name="register_submit_button" value="<?=GetMessage("AUTH_REGISTER")?>"/>
			</div>

			<?php if (!empty($arResult['ERRORS'])): ?>
				<div class="form_container-block direction_column">
					* - <?=GetMessage("AUTH_REQ")?>
				</div>
			<?php endif; ?>
		</div>
	</form>
</div>			