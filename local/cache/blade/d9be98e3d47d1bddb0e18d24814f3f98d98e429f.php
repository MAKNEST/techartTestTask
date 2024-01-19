<select name="<?php echo e($name); ?>" class="<?php echo e($block); ?>">
    <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($chapter); ?>"><?php echo e($chapter); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select><?php /**PATH /var/www/workspace/test/www/local/templates/main/frontend/src/block/inputs/select/select.blade.php ENDPATH**/ ?>