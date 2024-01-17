<div class="<?php echo e($block); ?>">

    <a href="/" class="<?php echo e($block->elem('logo')); ?>">
        <div class="<?php echo e($block->elem('image')); ?>">
            <img class="<?php echo e($block->elem('icon')); ?>" src="<?= SITE_TEMPLATE_PATH?>/assets/icons/header_logo.svg">
        </div>
        <p class="<?php echo e($block->elem('title')); ?>">
            Галактический<br>
            вестник
        </p>    
    </a>

    <?php echo $search; ?>


    <?php echo $menu_links; ?>


    <?php echo $basket_line; ?>

</div><?php /**PATH /var/www/workspace/test/www/local/templates/main/frontend/src/block/common/header/header.blade.php ENDPATH**/ ?>