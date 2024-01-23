<div class="<?php echo e($block); ?>" id="<?php echo e($id); ?>">
    <?php echo $renderer->renderBlock(
            'assets/button-link',
            [
                'text' =>  $text,
                'link' => $link
            ]
        ); ?>


</div><?php /**PATH /var/www/workspace/test/www/local/templates/main/frontend/src/block/catalog/section-item/section-item.blade.php ENDPATH**/ ?>