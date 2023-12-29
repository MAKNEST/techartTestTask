<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<?if($arResult["AUTH_SERVICES"]):?>
<?
$APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "",
	array(
		"AUTH_SERVICES" => $arResult["AUTH_SERVICES"],
		"CURRENT_SERVICE" => $arResult["CURRENT_SERVICE"],
		"AUTH_URL" => $arResult["AUTH_URL"],
		"POST" => $arResult["POST"],
		"SHOW_TITLES" => $arResult["FOR_INTRANET"]?'N':'Y',
		"FOR_SPLIT" => $arResult["FOR_INTRANET"]?'Y':'N',
		"AUTH_LINE" => $arResult["FOR_INTRANET"]?'N':'Y',
	),
	$component,
	array("HIDE_ICONS"=>"Y")
);
?>
<?endif; ?>

<div class="container">
	<form name="form_auth" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
		<input type="hidden" name="AUTH_FORM" value="Y" />
		<input type="hidden" name="TYPE" value="AUTH" />

		<?if ($arResult["BACKURL"] <> ''):?>
			<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
		<?endif?>

		<?foreach ($arResult["POST"] as $key => $value):?>
			<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
		<?endforeach?>

		<div class="form_container">
			<div class="form_container-block">
				<div class="form_title">
					<?= GetMessage("AUTH_PLEASE_AUTH")?>
				</div>
			</div>

			<?php if (!empty($arParams["~AUTH_RESULT"])): ?>
				<div class="form_container-block">
					<?php ShowMessage($arParams["~AUTH_RESULT"]); ?>
				</div>
			<?php endif; ?>

			<div class="form_container-block">
				<input placeholder="<?=GetMessage("AUTH_LOGIN")?>" class="bx-auth-input form-control form_input" type="text" name="USER_LOGIN" maxlength="255" value="<?=$arResult["LAST_LOGIN"]?>" />
			</div>

			<div class="form_container-block direction_column">
				<input placeholder="<?=GetMessage("AUTH_PASSWORD")?>" class="bx-auth-input form-control form_input" type="password" name="USER_PASSWORD" maxlength="255" autocomplete="off" />
				<a href="/auth/forget.php" rel="nofollow" class="forgot_link"><?=GetMessage("AUTH_FORGOT_PASSWORD_2")?></a>
			</div>

			<div class="form_container-block direction_row">
				<input type="checkbox" id="USER_REMEMBER" name="USER_REMEMBER" value="Y" class="form_checkbox"/><label for="USER_REMEMBER">&nbsp;<?=GetMessage("AUTH_REMEMBER_ME")?></label>
			</div>

			<div class="form_container-block">
				<input type="submit" class="btn btn-primary form_button main_button" name="Login" value="<?=GetMessage("AUTH_AUTHORIZE")?>"/>
			</div>

			<div class="form_container-block direction_column">
				<a href="<?=$arResult["AUTH_REGISTER_URL"]?>" rel="nofollow" class="forgot_link"><?=GetMessage("AUTH_REGISTER")?></a><br />
			</div>
				
		</div>
	</form>
</div>			