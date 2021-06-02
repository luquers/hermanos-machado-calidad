<div <?php echo $col ? 'class="'.$col.'"' : ''; ?>>
    <?php if($label): ?>
        <label><?php echo e(__($label)); ?></label>
    <?php endif; ?>
    <fieldset class="form-group <?php echo e($errors->has($name) ? 'error' : ''); ?>">
        <textarea
                class="form-control <?php echo $class; ?>"
                <?php echo $id ? 'id="'.$id.'"' : ''; ?>

                rows="<?php echo e($rows); ?>"
                name="<?php echo e($name); ?>"
                <?php echo $placeholder ? 'placeholder="'.__($placeholder).'"' : ''; ?>

                <?php echo e($required); ?>

                <?php echo e($disabled); ?>

                <?php echo e($readOnly); ?>

                <?php echo $counter ? 'data-length="'.$counter.'"' : ''; ?>

                <?php echo e($attributes); ?>

        ><?php echo e($value); ?></textarea>
        <?php if($counter): ?>
            <small class="counter-value float-right"><span class="char-count">0</span>/<?php echo e($counter); ?></small>
        <?php endif; ?>
        <?php if($errors->has($name)): ?>
        <?php echo $__env->make('includes.input-error', ['name' => $name], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </fieldset>
</div><?php /**PATH F:\laragon\www\gestion_de_calidad\resources\views/components/textareas/textarea.blade.php ENDPATH**/ ?>