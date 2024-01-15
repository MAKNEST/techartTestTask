<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

$this->IncludeLangFile('template.php');

$cartId = $arParams['cartId'];

require(realpath(__DIR__).'/top_template.php');

if ($arParams["SHOW_PRODUCTS"] == "Y" && ($arResult['NUM_PRODUCTS'] > 0 || !empty($arResult['CATEGORIES']['DELAY'])))
{
?>
	<div data-role="basket-item-list" class="basket_item_list">
		<div id="<?=$cartId?>products" class="bx-basket-item-list-container">
			<?foreach ($arResult["CATEGORIES"] as $category => $items): ?>
				<?php foreach ($items as $item): ?>
						<div class="basket_item_container">
							<a href="<?= $item['DETAIL_PAGE_URL']; ?>">
								<div class="basket_item_image">
									<img src="<?= $item['PICTURE_SRC']; ?>" alt="<?= $item['NAME']; ?>">
								</div>

								<div class="basket_item_name">
									<?= $item['NAME']; ?>
								</div>
							</a>
							<div class="basket_item_price">
								<?php if ($item['BASE_PRICE'] > $item['PRICE']): ?>
									<span class="old_price"><?= $item['BASE_PRICE']; ?></span>
									<span class="new_price"><?= $item['PRICE_FMT']; ?></span>
								<?php else: ?>
									<span><?= $item['PRICE'] ?></span>
								<?php endif; ?>
							</div>

							<div class="basket_item_total_price">
								<span>
									<?= $item['QUANTITY'] . ' ' . $item['MEASURE_NAME'] . ' ' . GetMessage("TSB1_SUM"); ?>
								</span><br>

								<span>
									<?= $item['SUM']; ?>
								</span>
							</div>

							<div class="basket_remove_item_button" onclick="<?=$cartId?>.removeItemFromCart(<?=$item['ID']?>)" title="<?=GetMessage("TSB1_DELETE")?>">X</div>
						</div>
				<?php endforeach; ?>
			<?php endforeach; ?>
			
			<div class="basket_result_container">
				<div class="basket_result_price">
					<?= 'Итого: ' . $arResult['TOTAL_PRICE']?>
				</div>

				<div class="basket_button_continer">
					<a href="<?=$arParams["PATH_TO_BASKET"]?>" class="basket_link"><?=GetMessage("TSB1_CART")?></a>
				</div>
			</div>
		</div>	
	</div>

	<script>
		BX.ready(function(){
			<?=$cartId?>.fixCart();
		});
	</script>
<?
}