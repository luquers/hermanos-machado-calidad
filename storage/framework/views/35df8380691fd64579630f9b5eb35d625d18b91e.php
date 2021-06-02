<form id="create-chapter" method="post" action="<?php echo e($action); ?>" novalidate>
    <?php echo csrf_field(); ?>
    <?php echo e(isset($chapter) ? method_field('put') : ''); ?>

    <div class="row">
        <?php if (isset($component)) { $__componentOriginal942cbedc8524995abeccadc00a91f89c8cb356bd = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\Text::class, ['col' => 'col-12 col-lg-6','name' => 'code','label' => 'global.code','id' => 'code','value' => ''.e(old('code', $chapter->code ?? '')).'']); ?>
<?php $component->withName('inputs.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal942cbedc8524995abeccadc00a91f89c8cb356bd)): ?>
<?php $component = $__componentOriginal942cbedc8524995abeccadc00a91f89c8cb356bd; ?>
<?php unset($__componentOriginal942cbedc8524995abeccadc00a91f89c8cb356bd); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

        <?php if (isset($component)) { $__componentOriginal942cbedc8524995abeccadc00a91f89c8cb356bd = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\Text::class, ['col' => 'col-12 col-lg-6','name' => 'name','label' => 'global.name','id' => 'name','value' => ''.e(old('name', $chapter->name ?? '')).'']); ?>
<?php $component->withName('inputs.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal942cbedc8524995abeccadc00a91f89c8cb356bd)): ?>
<?php $component = $__componentOriginal942cbedc8524995abeccadc00a91f89c8cb356bd; ?>
<?php unset($__componentOriginal942cbedc8524995abeccadc00a91f89c8cb356bd); ?>
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
</form><?php /**PATH F:\laragon\www\gestion_de_calidad\resources\views/chapter/create-edit-form.blade.php ENDPATH**/ ?>