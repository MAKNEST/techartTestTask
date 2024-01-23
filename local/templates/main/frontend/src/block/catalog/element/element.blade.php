<div class="{{ $block }}">
	<div class="product-item-detail-slider-container" id="{{ $itemIds['BIG_SLIDER_ID'] }}">
		<div class="product-item-detail-slider-images-container" data-entity="images-container">
			<img src="{{ $arResult['DETAIL_PICTURE']['SRC'] }}" alt="{{ $arResult['DETAIL_PICTURE']['ALT'] }}" data-entity="image">
		</div>
	</div>
	
	<div class="{{ $block->elem('info') }}">
		<div class="{{ $block->elem('name') }}">
			<h1 class="{{ $block->elem('title') }}">{{ $name }}</h1>
		</div>

		<div class="{{ $block->elem('genre-container') }}">
			<?= '<span class="genre_name">' . $arResult['PROPERTIES']['GENRE']['NAME'] . ': </span>'; ?>
            <span class="{{ $block->elem('genre-value') }}">
                <?= implode(' / ', $arResult['PROPERTIES']['GENRE']['VALUE_ENUM']); ?>
            </span>
		</div>

		<div class="{{ $block->elem('binding-container') }}">
            <span class="{{ $block->elem('binding-name') }}">{{ $arResult['PROPERTIES']['BINDING']['NAME'] }}</span>
            <span class="{{ $block->elem('binding-value') }}">{{ $arResult['PROPERTIES']['BINDING']['VALUE'] }}</span>
		</div>

		<div class="{{ $block->elem('author-container') }}">
            <dl>
                <dt class="{{ $block->elem('author-name') }}">
                    {{ $arResult['DISPLAY_PROPERTIES']['AUTHOR']['NAME'] }}
                </dt>
                <dd class="{{ $block->elem('author-value') }}">
                    <?=(is_array($arResult['DISPLAY_PROPERTIES']['AUTHOR']['DISPLAY_VALUE']))
                        ? implode("<br>", $arResult['DISPLAY_PROPERTIES']['AUTHOR']['DISPLAY_VALUE'])
                        : $arResult['DISPLAY_PROPERTIES']['AUTHOR']['DISPLAY_VALUE']?>
                </dd>
            </dl>
		</div>
	</div>

	<div class="product-item-detail-info-container">
	</div>

	<div class="{{ $block->elem('amount-container') }}">
		<div class="{{ $block->elem('price-container') }}">
            @php
                $price = $arResult['ITEM_PRICES'][0];
            @endphp

            @if ($price['BASE_PRICE'] > $price['PRICE'])
                <span class="{{ $block->elem('price')->mod('old') }}" id="{{ $itemIds['PRICE_ID'] }}">{!! $price['PRINT_BASE_PRICE'] !!}</span>
                <span class="{{ $block->elem('price')->mod('new') }}">{!! $price['PRINT_DISCOUNT'] !!}</span>
            @else
				<div class="product-item-detail-price-current" id="{{ $itemIds['PRICE_ID'] }}">
					<span>{!! $price['PRINT_BASE_PRICE'] !!}</span>
				</div>
            @endif
		</div>

		<div class="{{ $block->elem('count') }}" data-entity="quantity-block">
			<div class="{{ $block->elem('amount-filed') }}">
				<div class="{{ $block->elem('amount-count') }}">
					<span class="{{ $block->elem('button-minus') }}" id="{{ $itemIds['QUANTITY_DOWN_ID'] }}">-</span>
					<input class="product-item-amount-field" id="{{ $itemIds['QUANTITY_ID'] }}" type="number"
						value="{{ $price['MIN_QUANTITY'] }}" readonly>
					<span class="{{ $block->elem('button-plus') }}" id="{{ $itemIds['QUANTITY_UP_ID'] }}">+</span>
				</div>
				<span id="{{ $itemIds['QUANTITY_MEASURE'] }}">
					{{ $actualItem['ITEM_MEASURE']['TITLE'] }}
				</span>

				<span id="{{ $itemIds['PRICE_TOTAL'] }}"></span>

				
			</div>
		</div>

		<div class="product-item-detail-info-container" data-entity="main-button-container" id="{{ $itemIds['BASKET_ACTIONS_ID'] }}">
			<a class="btn <?=$showButtonClassName?> product-item-detail-buy-button" id="{{ $itemIds['ADD_BASKET_LINK'] }}"
				href="javascript:void(0);">
				<span>{{ $arParams['MESS_BTN_ADD_TO_BASKET'] }}</span>
			</a>

			{{-- {!!
			$renderer->renderBlock(
				'assets/button-link',
				[
					'text' => $arParams['MESS_BTN_ADD_TO_BASKET'],
					'link' => 'javascript:void(0);',
					'id' => $itemIds['BASKET_ACTIONS_ID'],
					'optional_class' => 'btn ' . $showButtonClassName . ' product-item-detail-buy-button'
				]
			);
			!!} --}}
		</div>

	</div>

	

	<div class="{{ $block->elem('meta-container') }}">
		<meta itemprop="name" content="<?=$name?>" />
		<meta itemprop="category" content="<?=$arResult['CATEGORY_PATH']?>" />
		<span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
			<meta itemprop="price" content="<?= ($price['BASE_PRICE'] > $price['PRICE']) ? $price['PRICE'] : $price['BASE_PRICE'] ?>" />
			<meta itemprop="priceCurrency" content="<?=$price['CURRENCY']?>" />
			<link itemprop="availability" href="http://schema.org/<?=($actualItem['CAN_BUY'] ? 'InStock' : 'OutOfStock')?>" />
		</span>
	</div>
</div>