<?php if($col): ?>
<div class="<?php echo e($col); ?>">
<?php endif; ?>

    <button type="<?php echo e($type); ?>" class="btn btn-<?php echo e($color); ?> mb-1 waves-effect waves-light <?php echo e($class); ?>" <?php echo e($attributes); ?>>
        <?php echo e(__($label)); ?>

    </button>

<?php if($col): ?>
</div>
<?php endif; ?><?php /**PATH F:\laragon\www\gestion_de_calidad\resources\views/components/buttons/button.blade.php ENDPATH**/ ?>