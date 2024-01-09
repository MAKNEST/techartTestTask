<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
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
?>

<?
// echo '<pre>';
// print_r($arResult);
// echo '</pre>';
?>

<div class="container">
	<form action="" method="get">
		<input class="search_input" type="text" name="q" value="<?=$arResult["REQUEST"]["QUERY"]?>" size="40" />
		<input class="seatch_button" type="submit" value="<?=GetMessage("SEARCH_GO")?>" />
	</form>

	<h2 class="search-result-title">Результаты поиска</h2>
	
	<?php if (!empty($arResult['SEARCH'])): ?>
		<?php foreach ($arResult['SEARCH'] as $item): ?>
			<div class="search_item">
				<a class="search_link" href="<?= $item['URL_WO_PARAMS']; ?>">
					<div class="search_name">
						<h2>
							<?= $item['TITLE'] ?>
						</h2>
					</div>

					<div class="serch_text">
						<?= $item['BODY_FORMATED']; ?>
					</div>

					<div class="date">
						<?= $item['DATE_CHANGE']; ?>
					</div>
				</a>
			</div>
			<hr>
		<?php endforeach; ?>
	<?php else: ?>
		<p class="search_notfound">
			<?php if (is_null($arResult['REQUEST']['ORIGINAL_QUERY'])): ?>
				Поисковый запрос не может быть пустым
			<?php else: ?>
				По запросу "<?= $arResult['REQUEST']['ORIGINAL_QUERY']; ?>" ничего не найдено
			<?php endif; ?>
		</p>
	<?php endif; ?>
</div>

<script>
var switch_search_params = function()
{
	var sp = document.getElementById('search_params');
	var flag;
	var i;

	if(sp.style.display == 'none')
	{
		flag = false;
		sp.style.display = 'block'
	}
	else
	{
		flag = true;
		sp.style.display = 'none';
	}

	var from = document.getElementsByName('from');
	for(i = 0; i < from.length; i++)
		if(from[i].type.toLowerCase() == 'text')
			from[i].disabled = flag;

	var to = document.getElementsByName('to');
	for(i = 0; i < to.length; i++)
		if(to[i].type.toLowerCase() == 'text')
			to[i].disabled = flag;

	return false;
}
</script>