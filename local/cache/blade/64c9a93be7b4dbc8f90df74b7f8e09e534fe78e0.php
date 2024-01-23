<div class="<?php echo e($block); ?>" id="<?php echo e($id); ?>" data-entity="<?php echo e($data_entity_card); ?>">
    <a class="<?php echo e($block->elem('image-wrapper')); ?>" title="<?php echo e($imgTitle); ?>" data-entity="image-wrapper" href="<?php echo e($item['DETAIL_PAGE_URL']); ?>">
        <span class="product-item-image-slider-slide-container slide" id="<?php echo e($itemIds['PICT_SLIDER']); ?>"
            <?php echo e(($showSlider ? '' : 'style="display: none;"')); ?>

            data-slider-interval="<?=$arParams['SLIDER_INTERVAL']?>" data-slider-wrap="true">
        </span>
        
        <img class="<?php echo e($block->elem('image')); ?>" src="<?php echo e($item['PREVIEW_PICTURE']['SRC']); ?>">

        <?php if($item['SECOND_PICT']): ?>
            <?php $bgImage = !empty($item['PREVIEW_PICTURE_SECOND']) ? $item['PREVIEW_PICTURE_SECOND']['SRC'] : $item['PREVIEW_PICTURE']['SRC']; ?>
            <span class="product-item-image-alternative" id="<?php echo e($itemIds['SECOND_PICT']); ?>"
                style="background-image: url('');">
            </span>
        <?php endif; ?>
    </a>
  
    <div class="<?php echo e($block->elem('title')); ?>">
        <a href="<?php echo e($item['DETAIL_PAGE_URL']); ?>" title="<?php echo e($productTitle); ?>">
            <?php echo e($productTitle); ?>

        </a>
    </div>

    <div class="product-item-info-container product-item-hidden" data-entity="props-block">
        <dl class="product-item-properties">
            <?php $__currentLoopData = $item['DISPLAY_PROPERTIES']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $displayProperty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <dt class="<?php echo e($block->elem('prop-name')); ?>">
                    <?=$displayProperty['NAME']?>
                </dt>
                <dd class="<?php echo e($block->elem('prop-value')); ?>">
                    <?=(is_array($displayProperty['DISPLAY_VALUE'])
                        ? implode("<br>", $displayProperty['DISPLAY_VALUE'])
                        : $displayProperty['DISPLAY_VALUE'])?>
                </dd>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </dl>
    </div>

    <?php if(!empty($arParams['PRODUCT_BLOCKS_ORDER'])): ?>
        <div class="product-item-info-container <?php echo e($block->elem('price-container')); ?>" data-entity="price-block">
            <?php if($arParams['SHOW_OLD_PRICE'] === 'Y'): ?>
                <span class="<?php echo e($block->elem('price-old')); ?>" id="<?php echo e($itemIds['PRICE_OLD']); ?>"
                    <?= ($price['RATIO_PRICE'] >= $price['RATIO_BASE_PRICE'] ? 'style="display: none;"' : '') ?>>
                    <?php echo $price['PRINT_RATIO_BASE_PRICE']; ?>

                </span>&nbsp;
            <?php endif; ?>

            <span class="<?php echo e($block->elem('price-current')); ?>" id="<?php echo e($itemIds['PRICE']); ?>"
                <?php if($price['BASE_PRICE'] > $price['PRICE']): ?> style="color: red;" <?php endif; ?>>
                
                <? if (!empty($price))
                {
                    if ($price['BASE_PRICE'] > $price['PRICE'])
                    {
                        echo $price['PRINT_DISCOUNT'];
                    }
                    else 
                    {
                        echo $price['PRINT_BASE_PRICE'];
                    }
                } ?>
            </span>
        </div>

        <div class="<?php echo e($block->elem('quntity-count')); ?>" data-entity="quantity-block">
            <div class="<?php echo e($block->elem('item-amount')); ?>">
                <div class="<?php echo e($block->elem('amount-filed')); ?>">
                    <span class="<?php echo e($block->elem('button-minus')); ?>" id="<?php echo e($itemIds['QUANTITY_DOWN']); ?>">-</span>
                    <input class="<?php echo e($block->elem('field-count')); ?>" id="<?php echo e($itemIds['QUANTITY']); ?>" type="number"
                        name="<?php echo e($arParams['PRODUCT_QUANTITY_VARIABLE']); ?>"
                        value="<?php echo e($measureRatio); ?>">
                    <span class="<?php echo e($block->elem('button-plus')); ?>" id="<?php echo e($itemIds['QUANTITY_UP']); ?>">+</span>
                </div>
                <span class="<?php echo e($block->elem('amount-description')); ?>">
                    <span id="<?php echo e($itemIds['QUANTITY_MEASURE']); ?>">
                        <?php echo e($actualItem['ITEM_MEASURE']['TITLE']); ?>

                    </span>
                </span>
            </div>
            <span id="<?php echo e($itemIds['PRICE_TOTAL']); ?>"></span>
        </div>

        <div class="product-item-info-container product-item-hidden" data-entity="buttons-block">
            <div class="<?php echo e($block->elem('button-container')); ?>" id="<?php echo e($itemIds['BASKET_ACTIONS']); ?>">
                <?php echo $renderer->renderBlock(
                    'assets/button-link',
                    [
                        'text' => ($arParams['ADD_TO_BASKET_ACTION'] === 'BUY' ? $arParams['MESS_BTN_BUY'] : $arParams['MESS_BTN_ADD_TO_BASKET']),
                        'link' => 'javascript:void(0)',
                        'id' => $itemIds['BUY_LINK'],
                        'rel' => 'nofollow',
                        'optional_class' => ' btn btn-default' . $buttonSizeClass
                    ]
                ); ?>

            </div>
        </div>
    <?php endif; ?>
<script>
    var <?php echo e($obName); ?> = new JCCatalogItem(<?php echo $jsObj; ?>);
</script>

</div><?php /**PATH /var/www/workspace/test/www/local/templates/main/frontend/src/block/catalog/item/item.blade.php ENDPATH**/ ?>