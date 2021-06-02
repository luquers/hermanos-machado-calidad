<?php if(session()->has('type')): ?>
    <?php if (isset($component)) { $__componentOriginald982f6892136ff26c62ef21a6e9e07fae2f341c7 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alerts\Alert::class, ['type' => ''.e(session('type')).'','message' => ''.e(session('message')).'']); ?>
<?php $component->withName('alerts.alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginald982f6892136ff26c62ef21a6e9e07fae2f341c7)): ?>
<?php $component = $__componentOriginald982f6892136ff26c62ef21a6e9e07fae2f341c7; ?>
<?php unset($__componentOriginald982f6892136ff26c62ef21a6e9e07fae2f341c7); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php endif; ?>
<?php /**PATH F:\laragon\www\gestion_de_calidad\resources\views/includes/notifications.blade.php ENDPATH**/ ?>