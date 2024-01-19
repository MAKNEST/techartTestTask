<div class="<?php echo e($block); ?>">
    <a href="<?= $item['DETAIL_PAGE_URL']; ?>" class="<?php echo e($block->elem('link')); ?>">
		<div class="<?php echo e($block->elem('text-block')); ?>" style="background-image: url(<?= $item['DETAIL_PICTURE']['SRC']; ?>);">
			<div class="<?php echo e($block->elem('container')); ?>">
				<h1 class="<?php echo e($block->elem('title')); ?>">
                    <?= $item['NAME']; ?>
                </h1>

				<div class="<?php echo e($block->elem('announce')); ?>">
                    <?= $item['PREVIEW_TEXT']; ?>
			    </div>
			</div>
		</div>
	</a>
</div><?php /**PATH /var/www/workspace/test/www/local/templates/main/frontend/src/block/common/news-banner/news-banner.blade.php ENDPATH**/ ?>