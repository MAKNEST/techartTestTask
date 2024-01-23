<div class="<?php echo e($block); ?>">
    <a class="<?php echo e($block->elem('section-item')); ?>">
        <?php echo $renderer->renderBlock(
            'assets/button-link',
            [
                'text' => $section['NAME'],
                'link' => $section['SECTION_PAGE_URL']
            ]
        ); ?>

    </a>
</div><?php /**PATH /var/www/workspace/test/www/local/templates/main/frontend/src/block/catalog/section-list/section-list.blade.php ENDPATH**/ ?>