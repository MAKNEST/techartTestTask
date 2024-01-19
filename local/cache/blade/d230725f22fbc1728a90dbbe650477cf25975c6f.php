<div class="<?php echo e($block); ?>">
    <div class="<?php echo e($block->elem('title-container')); ?>">
		<h2 class="<?php echo e($block->elem('title')); ?>"><?php echo e($title); ?></h2>

        
        <?php if(!empty($error_message)): ?>
            <?php echo $renderer->renderBlock(
                'assets/error',
                [
                    'error_text' => ' - поля обязательны для заполнения'
                ]
                ); ?>

        <?php endif; ?>
	</div>

    <form action="">

    </form>
</div><?php /**PATH /var/www/workspace/test/www/local/templates/main/frontend/src/block/form/form/form.blade.php ENDPATH**/ ?>