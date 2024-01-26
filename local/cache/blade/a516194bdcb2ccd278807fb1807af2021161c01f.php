<?php if($userAuthorised): ?>
    <?php    
        $uri = explode('?', $_SERVER["REQUEST_URI"])[0];

        $loginMod = $uri == '/auth/' ? 'selected' : '';
        $registerMod = $uri == '/auth/register.php' ? 'selected' : '';
    ?>

    <a href="/auth/" class="<?php echo e($block->elem('link')->mod($loginMod)); ?>">Авторизация</a>
    <a href="/auth/register.php" class="<?php echo e($block->elem('link')->mod($registerMod)); ?>">Регистрация</a>
    <?php else: ?>
    <form action="/auth/">
        <?php echo $sessionId; ?>

        <input type="hidden" name="logout" value="yes" >
        
        <div class="<?php echo e($block->elem('user')); ?>">	
            <div class="<?php echo e($block->elem('login')); ?>"><?php echo e($userName); ?></div>

            <?php echo $renderer->renderBlock(
                'assets/button',
                [
                    'text' => "Выйти",
                    'type' => 'submit',
                    'name' => 'logout_butt',
                    'optional_class' => 'b-button--logout'
                ]
            ); ?>

        </div>
    </form>
<?php endif; ?><?php /**PATH /var/www/workspace/test/www/local/templates/main/frontend/src/block/common/auth-header/auth-header.blade.php ENDPATH**/ ?>