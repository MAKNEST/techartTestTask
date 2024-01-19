<div class="<?php echo e($block); ?>">
    <div class="<?php echo e($block->elem('title')); ?>">
        <?php echo e($data['NAME']); ?>

    </div>

    <div class="<?php echo e($block->elem('item-list')); ?>">
        <?php $__currentLoopData = $data['ITEMS']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $renderer->renderBlock('news/list-item', ['item' => $item]); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="<?php echo e($block->elem('pager')); ?>">
        <?php echo $data['NAV_STRING']; ?>

    </div>
</div><?php /**PATH /var/www/workspace/test/www/local/templates/main/frontend/src/block/news/list/list.blade.php ENDPATH**/ ?>