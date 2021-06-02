<div <?php echo $col ? 'class="'.$col.'"' : ''; ?>>
    <div class="form-group <?php echo e($errors->has($name) ? 'error' : ''); ?>">
        <div class="controls">
            <?php if($label): ?>
                <label><?php echo e(__($label)); ?></label>
            <?php endif; ?>

            <?php if($help): ?>
                <small class="text-muted"><?php echo e(__($help)); ?></small>
            <?php endif; ?>

            <input
                    <?php echo $id ? 'id="'.$id.'"' : ''; ?>

                    type="email"
                    class="form-control <?php echo $class; ?>"
                    name="<?php echo e($name); ?>"
                    <?php echo $placeholder ? 'placeholder="'.__($placeholder).'"' : ''; ?>

                    <?php echo e($readOnly); ?>

                    <?php echo e($disabled); ?>

                    <?php echo e($required); ?>

                    value="<?php echo e($value); ?>"
                    <?php echo e($attributes); ?>

            />

        </div>

        <?php if($errors->has($name)): ?>
            <?php echo $__env->make('includes.input-error', ['name' => $name], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

    </div>
</div><?php /**PATH F:\laragon\www\gestion_de_calidad\resources\views/components/inputs/email.blade.php ENDPATH**/ ?>