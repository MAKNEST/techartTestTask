<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

$this->IncludeLangFile('template.php');

$cartId = $arParams['cartId'];

require(realpath(__DIR__).'/top_template.php');

if ($arParams["SHOW_PRODUCTS"] == "Y" && ($arResult['NUM_PRODUCTS'] > 0 || !empty($arResult['CATEGORIES']['DELAY'])))
{
?>
	<div data-role="basket-item-list" class="basket_item_list">

		<!-- <?if ($arParams["POSITION_FIXED"] == "Y"):?>
			<div id="<?=$cartId?>status" class="bx-basket-item-list-action" onclick="<?=$cartId?>.toggleOpenCloseCart()"><?=GetMessage("TSB1_COLLAPSE")?></div>
		<?endif?> -->

		<div id="<?=$cartId?>products" class="bx-basket-item-list-container">
			<?foreach ($arResult["CATEGORIES"] as $category => $items): ?>
				<?php foreach ($items as $item): ?>
					<a href="<?= $item['DETAIL_PAGE_URL']; ?>">
						<div class="basket_item_container">
							<div class="basket_item_image">
								<img src="<?= $item['PICTURE_SRC']; ?>" alt="<?= $item['NAME']; ?>">
							</div>

							<div class="basket_item_name">
								<?= $item['NAME']; ?>
							</div>

							<div class="basket_item_price">
								<?= 'Цена: ' . $item['FULL_PRICE']; ?>
							</div>

							<div class="basket_item_total_price">
								<span>
									<?= $item['QUANTITY'] . ' ' . $item['MEASURE_NAME'] . ' ' . GetMessage("TSB1_SUM"); ?>
								</span><br>

								<span>
									<?= $item['SUM']; ?>
								</span>
							</div>
						</div>
					</a>
				<?php endforeach; ?>
			<?php endforeach; ?>
			
			<div class="basket_result_container">
				<div class="basket_result_price">
					<?= 'Итого: ' . $arResult['TOTAL_PRICE']?>
				</div>

				<div class="basket_button_continer">
					<a href="<?=$arParams["PATH_TO_ORDER"]?>" class="basket_link"><?=GetMessage("TSB1_2ORDER")?></a>
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