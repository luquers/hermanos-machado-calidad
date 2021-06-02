<div <?php echo $col ? 'class="'.$col.'"' : ''; ?>>
    <?php if($label): ?>
        <label><?php echo e(__($label)); ?></label>
    <?php endif; ?>

    <fieldset class="form-group <?php echo e($errors->has($name) ? 'error' : ''); ?>">
        <select class="form-control <?php echo $class; ?>"
                <?php echo $id ? 'id="'.$id.'"' : ''; ?> name="<?php echo e($name); ?>" <?php echo e($required); ?> <?php echo e($disabled); ?> <?php echo e($multiple); ?> <?php echo e($attributes); ?>>

            <?php if($isIncludedSelectOptionTitle($includeSelectOptionTitle)): ?>
                <option value><?php echo e(__($includeSelectOptionTitle)); ?></option>
            <?php endif; ?>


            <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option <?php echo $isSelected($option->$optionValue ?? $option[$optionValue]) ? 'selected="selected"' : ''; ?>

                        value="<?php echo e($option->$optionValue ?? $option[$optionValue]); ?>"><?php echo e($option->$display ?? $option[$display]); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </select>
    </fieldset>
    <?php if($errors->has($name)): ?>
        <?php echo $__env->make('includes.input-error', ['name' => $name], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
</div><?php /**PATH F:\laragon\www\gestion_de_calidad\resources\views/components/selects/basic.blade.php ENDPATH**/ ?>