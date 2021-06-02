<form id="create-version" method="post" action="<?php echo e($action); ?>" novalidate>
    <?php echo csrf_field(); ?>
    <?php echo e(isset($version) ? method_field('put') : ''); ?>

    <div class="row">
        <?php if (isset($component)) { $__componentOriginal0f7ee213a5aa0dce63817a9a05a6de38365c3f13 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Textareas\Textarea::class, ['col' => 'col-12 col-lg-6','rows' => '6','label' => 'global.description','name' => 'description','value' => ''.e(old('description', $version->description ?? '')).'']); ?>
<?php $component->withName('textareas.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal0f7ee213a5aa0dce63817a9a05a6de38365c3f13)): ?>
<?php $component = $__componentOriginal0f7ee213a5aa0dce63817a9a05a6de38365c3f13; ?>
<?php unset($__componentOriginal0f7ee213a5aa0dce63817a9a05a6de38365c3f13); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>


    </div>
    <div class="row">
        <?php if (isset($component)) { $__componentOriginal0ecedeb3c957f9223ef73c7cc4bee2fc63f88097 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Buttons\Button::class, ['col' => 'col-12','label' => 'global.save','type' => 'submit','color' => 'primary','class' => 'float-right']); ?>
<?php $component->withName('buttons.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal0ecedeb3c957f9223ef73c7cc4bee2fc63f88097)): ?>
<?php $component = $__componentOriginal0ecedeb3c957f9223ef73c7cc4bee2fc63f88097; ?>
<?php unset($__componentOriginal0ecedeb3c957f9223ef73c7cc4bee2fc63f88097); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
    </div>
</form><?php /**PATH F:\laragon\www\gestion_de_calidad\resources\views/version/create-edit-form.blade.php ENDPATH**/ ?>