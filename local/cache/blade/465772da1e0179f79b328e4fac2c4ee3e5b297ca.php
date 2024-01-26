<div class="<?php echo e($block); ?>">
    <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="<?php echo e($block->elem('navbar')); ?>">
            <div class="<?php echo e($block->elem('dropdown')); ?>">
                <?php
                    $aLinkMod = (int) $item['SELECTED'] == 1 ? 'selected' : '' ;
                ?>

                <a class="<?php echo e($block->elem('link')->mod($aLinkMod)); ?>" href="<?= $item['LINK'];?>"><?= $item['TEXT']; ?>
                    <?php if(!empty($item['SUBITEMS'])): ?>
                        <svg class="<?php echo e($block->elem('icon')); ?>" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 58.999 58.999" style="enable-background:new 0 0 58.999 58.999;" xml:space="preserve">
                            <path d="M29.167,0c-1.104,0-2,0.896-2,2v50.289L11.86,36.728c-0.781-0.781-1.922-0.781-2.703,0 c-0.781,0.78-0.719,2.047,0.062,2.828l18.883,18.857c0.375,0.375,0.899,0.586,1.43,0.586s1.047-0.211,1.422-0.586l18.857-18.857 c0.781-0.781,0.783-2.048,0.002-2.828c-0.781-0.781-2.296-0.781-3.077,0L31.167,52.052V2C31.167,0.895,30.271,0,29.167,0z"/>
                        </svg>
                    <?php endif; ?>
                </a>

                <?php if(!empty($item['SUBITEMS'])): ?>
                    <div class="<?php echo e($block->elem('dropdown-content')); ?>">
                        <?php $__currentLoopData = $item['SUBITEMS']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $aSubLinkMod = (int) $subItem['SELECTED'] == 1 ? 'selected' : '' ;
                            ?>

                            <a href="<?= $subItem['LINK'];?>" class="<?php echo e($block->elem('submenu')->mod($aSubLinkMod)); ?>"><?= $subItem['TEXT']; ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
            </div> 
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <div class="<?php echo e($block->elem('navbar')); ?>">
        <?php echo $renderer->renderBlock(
            'common/auth-header',
            [
                'userAuthorised' => $userAuthorised,
                'uri' => $uri,
                'sessionId' => $sessionId,
                'userName' => $userName
            ]
        ); ?>

    </div>
</div><?php /**PATH /var/www/workspace/test/www/local/templates/main/frontend/src/block/common/menu/menu.blade.php ENDPATH**/ ?>