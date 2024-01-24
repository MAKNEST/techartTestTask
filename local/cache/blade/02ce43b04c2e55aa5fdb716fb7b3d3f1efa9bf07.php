<div class="swiper <?php echo e($block); ?>">
	<div class="swiper-wrapper">
		<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="swiper-slide">
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
			</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>

	<div class="swiper-button-prev">
		<svg viewBox="0 0 26 16" xmlns="http://www.w3.org/2000/svg" class="<?php echo e($block->elem('slider-icon')); ?>" fill="currentColor">
			<path d="M0.293015 8.70711C-0.0975094 8.31658 -0.0975094 7.68342 0.293014 7.2929L6.65698 0.928934C7.0475 0.538409 7.68067 0.538409 8.07119 0.928934C8.46171 1.31946 8.46171 1.95262 8.07119 2.34315L2.41434 8L8.07119 13.6569C8.46171 14.0474 8.46171 14.6805 8.07119 15.0711C7.68067 15.4616 7.0475 15.4616 6.65698 15.0711L0.293015 8.70711ZM26 9L1.00012 9L1.00012 7L26 7L26 9Z"></path>
		</svg>
	</div>
	
	<div class="swiper-button-next">
		<svg viewBox="0 0 26 16" xmlns="http://www.w3.org/2000/svg" class="<?php echo e($block->elem('slider-icon')); ?>" fill="currentColor">
			<path d="M25.707 8.70711C26.0975 8.31658 26.0975 7.68342 25.707 7.2929L19.343 0.928934C18.9525 0.538409 18.3193 0.538409 17.9288 0.928934C17.5383 1.31946 17.5383 1.95262 17.9288 2.34315L23.5857 8L17.9288 13.6569C17.5383 14.0474 17.5383 14.6805 17.9288 15.0711C18.3193 15.4616 18.9525 15.4616 19.343 15.0711L25.707 8.70711ZM-8.74228e-08 9L24.9999 9L24.9999 7L8.74228e-08 7L-8.74228e-08 9Z"></path>
		</svg>
	</div>
</div><?php /**PATH /var/www/workspace/test/www/local/templates/main/frontend/src/block/news/news-banner/news-banner.blade.php ENDPATH**/ ?>