<div class="{{ $block }}">
    <a href="<?= $item['DETAIL_PAGE_URL']; ?>" class="{{$block->elem('link')}}">
		<div class="{{ $block->elem('text-block') }}" style="background-image: url(<?= $item['DETAIL_PICTURE']['SRC']; ?>);">
			<div class="{{ $block->elem('container') }}">
				<h1 class="{{ $block->elem('title') }}">
                    <?= $item['NAME']; ?>
                </h1>

				<div class="{{ $block->elem('announce') }}">
                    <?= $item['PREVIEW_TEXT']; ?>
			    </div>
			</div>
		</div>
	</a>
</div>