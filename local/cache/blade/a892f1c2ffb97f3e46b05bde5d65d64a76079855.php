<a href="<?php echo e($link); ?>" class="<?php echo e($block); ?>">
    <?php
        $pos = 'right';

        $pos = !is_null($icon_postion) ? $icon_postion : '';
    ?>

    <?php if($pos == 'right' || $pos == ''): ?>
        <?php echo e($text); ?>

        <?php echo $icon; ?>        
    <?php else: ?>
        <?php echo $icon; ?>

        <?php echo e($text); ?> 
    <?php endif; ?>
</a><?php /**PATH /var/www/workspace/test/www/local/templates/main/frontend/src/block/assets/button-link/button-link.blade.php ENDPATH**/ ?>