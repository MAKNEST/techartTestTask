<div class="<?php echo e($block); ?>">
    <div class="<?php echo e($block->elem('title-container')); ?>">
		<h2 class="<?php echo e($block->elem('title')); ?>"><?php echo e($title); ?></h2>

        <?php if(!empty($error_message)): ?>
            <?php echo $error_message; ?>

        <?php endif; ?>

        <?php if(!is_null($ok_message)): ?>
            <?php echo $ok_message; ?>

        <?php endif; ?>
	</div>

    <form action="<?php echo e($action); ?>" method="POST" class="<?php echo e($block->elem('feedback')); ?>">
        <?php echo $bitrix_sessid_post; ?>


        <?php $__currentLoopData = $inputs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $input): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="<?php echo e($block->elem('input-container')); ?>">
                <?php echo $input['ERROR']; ?>

                <?php echo $input['INPUT']; ?>

            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php echo $submit_button; ?>

    </form>
</div><?php /**PATH /var/www/workspace/test/www/local/templates/main/frontend/src/block/form/form/form.blade.php ENDPATH**/ ?>