<div class="<?php echo e($block); ?>">
    <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as &$arSection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $component->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
			$component->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
        ?>
        <?php echo \TAO::frontend()->renderBlock(
					'catalog/section-item',
					[
						'id' => $component->GetEditAreaId($arSection['ID']),
						'text' => $arSection['NAME'],
						'link' => $arSection['SECTION_PAGE_URL']
					]
				); ?>


        <?php unset($arSection); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div><?php /**PATH /var/www/workspace/test/www/local/templates/main/frontend/src/block/catalog/section/section.blade.php ENDPATH**/ ?>