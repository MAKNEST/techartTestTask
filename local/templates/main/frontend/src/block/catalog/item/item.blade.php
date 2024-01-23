<div class="{{ $block }}" id="{{ $id }}" data-entity="{{ $data_entity_card }}">
    <a class="{{ $block->elem('image-wrapper') }}" title="{{ $imgTitle }}" data-entity="image-wrapper" href="{{ $item['DETAIL_PAGE_URL'] }}">
        <span class="product-item-image-slider-slide-container slide" id="{{ $itemIds['PICT_SLIDER'] }}"
            {{ ($showSlider ? '' : 'style="display: none;"') }}
            data-slider-interval="<?=$arParams['SLIDER_INTERVAL']?>" data-slider-wrap="true">
        </span>
        
        <img class="{{ $block->elem('image') }}" src="{{ $item['PREVIEW_PICTURE']['SRC'] }}">

        @if ($item['SECOND_PICT'])
            @php $bgImage = !empty($item['PREVIEW_PICTURE_SECOND']) ? $item['PREVIEW_PICTURE_SECOND']['SRC'] : $item['PREVIEW_PICTURE']['SRC']; @endphp
            <span class="product-item-image-alternative" id="{{ $itemIds['SECOND_PICT'] }}"
                style="background-image: url('');">
            </span>
        @endif
    </a>
  
    <div class="{{ $block->elem('title') }}">
        <a href="{{ $item['DETAIL_PAGE_URL'] }}" title="{{ $productTitle }}">
            {{ $productTitle }}
        </a>
    </div>

    <div class="product-item-info-container product-item-hidden" data-entity="props-block">
        <dl class="product-item-properties">
            @foreach ($item['DISPLAY_PROPERTIES'] as $code => $displayProperty)
                <dt class="{{ $block->elem('prop-name') }}">
                    <?=$displayProperty['NAME']?>
                </dt>
                <dd class="{{ $block->elem('prop-value') }}">
                    <?=(is_array($displayProperty['DISPLAY_VALUE'])
                        ? implode("<br>", $displayProperty['DISPLAY_VALUE'])
                        : $displayProperty['DISPLAY_VALUE'])?>
                </dd>
            @endforeach
        </dl>
    </div>

    @if (!empty($arParams['PRODUCT_BLOCKS_ORDER']))
        <div class="product-item-info-container {{ $block->elem('price-container') }}" data-entity="price-block">
            @if ($arParams['SHOW_OLD_PRICE'] === 'Y')
                <span class="{{ $block->elem('price-old') }}" id="{{ $itemIds['PRICE_OLD'] }}"
                    <?= ($price['RATIO_PRICE'] >= $price['RATIO_BASE_PRICE'] ? 'style="display: none;"' : '') ?>>
                    {!! $price['PRINT_RATIO_BASE_PRICE'] !!}
                </span>&nbsp;
            @endif

            <span class="{{ $block->elem('price-current') }}" id="{{ $itemIds['PRICE'] }}"
                @if ($price['BASE_PRICE'] > $price['PRICE']) style="color: red;" @endif>
                
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

        <div class="{{ $block->elem('quntity-count') }}" data-entity="quantity-block">
            <div class="{{ $block->elem('item-amount') }}">
                <div class="{{ $block->elem('amount-filed') }}">
                    <span class="{{ $block->elem('button-minus') }}" id="{{ $itemIds['QUANTITY_DOWN'] }}">-</span>
                    <input class="{{ $block->elem('field-count') }}" id="{{ $itemIds['QUANTITY'] }}" type="number"
                        name="{{ $arParams['PRODUCT_QUANTITY_VARIABLE'] }}"
                        value="{{ $measureRatio }}">
                    <span class="{{ $block->elem('button-plus') }}" id="{{ $itemIds['QUANTITY_UP'] }}">+</span>
                </div>
                <span class="{{ $block->elem('amount-description') }}">
                    <span id="{{ $itemIds['QUANTITY_MEASURE'] }}">
                        {{ $actualItem['ITEM_MEASURE']['TITLE'] }}
                    </span>
                </span>
            </div>
            <span id="{{ $itemIds['PRICE_TOTAL'] }}"></span>
        </div>

        <div class="product-item-info-container product-item-hidden" data-entity="buttons-block">
            <div class="{{ $block->elem('button-container') }}" id="{{ $itemIds['BASKET_ACTIONS'] }}">
                {!!
                $renderer->renderBlock(
                    'assets/button-link',
                    [
                        'text' => ($arParams['ADD_TO_BASKET_ACTION'] === 'BUY' ? $arParams['MESS_BTN_BUY'] : $arParams['MESS_BTN_ADD_TO_BASKET']),
                        'link' => 'javascript:void(0)',
                        'id' => $itemIds['BUY_LINK'],
                        'rel' => 'nofollow',
                        'optional_class' => ' btn btn-default' . $buttonSizeClass
                    ]
                );    
                !!}
            </div>
        </div>
    @endif
<script>
    var {{ $obName }} = new JCCatalogItem({!! $jsObj !!});
</script>

</div>