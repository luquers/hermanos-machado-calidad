
        <?php if (isset($component)) { $__componentOriginal942cbedc8524995abeccadc00a91f89c8cb356bd = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\Text::class, ['col' => 'col-12 col-lg-3','id' => 'name','name' => 'name','label' => 'global.user']); ?>
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

        <?php if (isset($component)) { $__componentOriginal7e3a75d427b72c7b370cd556bc60e2d775ea238d = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Selects\Basic::class, ['id' => 'audit_events','col' => 'col-12 col-lg-3','options' => $eventselect,'optionValue' => 'id','display' => 'name','name' => 'audit_events','label' => 'global.event']); ?>
<?php $component->withName('selects.basic'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal7e3a75d427b72c7b370cd556bc60e2d775ea238d)): ?>
<?php $component = $__componentOriginal7e3a75d427b72c7b370cd556bc60e2d775ea238d; ?>
<?php unset($__componentOriginal7e3a75d427b72c7b370cd556bc60e2d775ea238d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

        <?php if (isset($component)) { $__componentOriginal7e3a75d427b72c7b370cd556bc60e2d775ea238d = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Selects\Basic::class, ['id' => 'audit_models','col' => 'col-12 col-lg-3','options' => $modelselect,'optionValue' => 'id','display' => 'name','name' => 'audit_models','label' => 'global.model']); ?>
<?php $component->withName('selects.basic'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal7e3a75d427b72c7b370cd556bc60e2d775ea238d)): ?>
<?php $component = $__componentOriginal7e3a75d427b72c7b370cd556bc60e2d775ea238d; ?>
<?php unset($__componentOriginal7e3a75d427b72c7b370cd556bc60e2d775ea238d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

        <?php if (isset($component)) { $__componentOriginal0ecedeb3c957f9223ef73c7cc4bee2fc63f88097 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Buttons\Button::class, ['col' => 'col-12 col-lg-3','label' => 'global.delete_filters','type' => 'button','color' => 'primary']); ?>
<?php $component->withName('buttons.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'delete_filters','name' => 'delete_filters']); ?>
<?php if (isset($__componentOriginal0ecedeb3c957f9223ef73c7cc4bee2fc63f88097)): ?>
<?php $component = $__componentOriginal0ecedeb3c957f9223ef73c7cc4bee2fc63f88097; ?>
<?php unset($__componentOriginal0ecedeb3c957f9223ef73c7cc4bee2fc63f88097); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH F:\laragon\www\gestion_de_calidad\resources\views/project/audit/filters.blade.php ENDPATH**/ ?>