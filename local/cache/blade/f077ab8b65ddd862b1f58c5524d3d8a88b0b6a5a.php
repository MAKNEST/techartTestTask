<div class="<?php echo e($block); ?>">
	<div class="product-item-detail-slider-container" id="<?php echo e($itemIds['BIG_SLIDER_ID']); ?>">
		<div class="product-item-detail-slider-images-container" data-entity="images-container">
			<img src="<?php echo e($arResult['DETAIL_PICTURE']['SRC']); ?>" alt="<?php echo e($arResult['DETAIL_PICTURE']['ALT']); ?>" data-entity="image">
		</div>
	</div>
	
	<div class="<?php echo e($block->elem('info')); ?>">
		<div class="<?php echo e($block->elem('name')); ?>">
			<h1 class="<?php echo e($block->elem('title')); ?>"><?php echo e($name); ?></h1>
		</div>

		<div class="<?php echo e($block->elem('genre-container')); ?>">
			<?= '<span class="genre_name">' . $arResult['PROPERTIES']['GENRE']['NAME'] . ': </span>'; ?>
            <span class="<?php echo e($block->elem('genre-value')); ?>">
                <?= implode(' / ', $arResult['PROPERTIES']['GENRE']['VALUE_ENUM']); ?>
            </span>
		</div>

		<div class="<?php echo e($block->elem('binding-container')); ?>">
            <span class="<?php echo e($block->elem('binding-name')); ?>"><?php echo e($arResult['PROPERTIES']['BINDING']['NAME']); ?></span>
            <span class="<?php echo e($block->elem('binding-value')); ?>"><?php echo e($arResult['PROPERTIES']['BINDING']['VALUE']); ?></span>
		</div>

		<div class="<?php echo e($block->elem('author-container')); ?>">
            <dl>
                <dt class="<?php echo e($block->elem('author-name')); ?>">
                    <?php echo e($arResult['DISPLAY_PROPERTIES']['AUTHOR']['NAME']); ?>

                </dt>
                <dd class="<?php echo e($block->elem('author-value')); ?>">
                    <?=(is_array($arResult['DISPLAY_PROPERTIES']['AUTHOR']['DISPLAY_VALUE']))
                        ? implode("<br>", $arResult['DISPLAY_PROPERTIES']['AUTHOR']['DISPLAY_VALUE'])
                        : $arResult['DISPLAY_PROPERTIES']['AUTHOR']['DISPLAY_VALUE']?>
                </dd>
            </dl>
		</div>
	</div>

	<div class="product-item-detail-info-container">
	</div>

	<div class="<?php echo e($block->elem('amount-container')); ?>">
		<div class="<?php echo e($block->elem('price-container')); ?>">
            <?php
                $price = $arResult['ITEM_PRICES'][0];
            ?>

            <?php if($price['BASE_PRICE'] > $price['PRICE']): ?>
                <span class="<?php echo e($block->elem('price')->mod('old')); ?>" id="<?php echo e($itemIds['PRICE_ID']); ?>"><?php echo $price['PRINT_BASE_PRICE']; ?></span>
                <span class="<?php echo e($block->elem('price')->mod('new')); ?>"><?php echo $price['PRINT_DISCOUNT']; ?></span>
            <?php else: ?>
				<div class="product-item-detail-price-current" id="<?php echo e($itemIds['PRICE_ID']); ?>">
					<span><?php echo $price['PRINT_BASE_PRICE']; ?></span>
				</div>
            <?php endif; ?>
		</div>

		<div class="<?php echo e($block->elem('count')); ?>" data-entity="quantity-block">
			<div class="<?php echo e($block->elem('amount-filed')); ?>">
				<div class="<?php echo e($block->elem('amount-count')); ?>">
					<span class="<?php echo e($block->elem('button-minus')); ?>" id="<?php echo e($itemIds['QUANTITY_DOWN_ID']); ?>">-</span>
					<input class="product-item-amount-field" id="<?php echo e($itemIds['QUANTITY_ID']); ?>" type="number"
						value="<?php echo e($price['MIN_QUANTITY']); ?>" readonly>
					<span class="<?php echo e($block->elem('button-plus')); ?>" id="<?php echo e($itemIds['QUANTITY_UP_ID']); ?>">+</span>
				</div>
				<span id="<?php echo e($itemIds['QUANTITY_MEASURE']); ?>">
					<?php echo e($actualItem['ITEM_MEASURE']['TITLE']); ?>

				</span>

				<span id="<?php echo e($itemIds['PRICE_TOTAL']); ?>"></span>

				
			</div>
		</div>

		<div class="product-item-detail-info-container" data-entity="main-button-container" id="<?php echo e($itemIds['BASKET_ACTIONS_ID']); ?>">
			<a class="btn <?=$showButtonClassName?> product-item-detail-buy-button" id="<?php echo e($itemIds['ADD_BASKET_LINK']); ?>"
				href="javascript:void(0);">
				<span><?php echo e($arParams['MESS_BTN_ADD_TO_BASKET']); ?></span>
			</a>

			
		</div>

	</div>

	

	<div class="<?php echo e($block->elem('meta-container')); ?>">
		<meta itemprop="name" content="<?=$name?>" />
		<meta itemprop="category" content="<?=$arResult['CATEGORY_PATH']?>" />
		<span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
			<meta itemprop="price" content="<?= ($price['BASE_PRICE'] > $price['PRICE']) ? $price['PRICE'] : $price['BASE_PRICE'] ?>" />
			<meta itemprop="priceCurrency" content="<?=$price['CURRENCY']?>" />
			<link itemprop="availability" href="http://schema.org/<?=($actualItem['CAN_BUY'] ? 'InStock' : 'OutOfStock')?>" />
		</span>
	</div>
</div><?php /**PATH /var/www/workspace/test/www/local/templates/main/frontend/src/block/catalog/element/element.blade.php ENDPATH**/ ?>