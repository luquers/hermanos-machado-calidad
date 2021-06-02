<form id="create-user" method="post" action="<?php echo e($action); ?>" novalidate enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php if(isset($user)): ?>
        <?php echo e(method_field('PUT')); ?>

        <input type="hidden" name="id" value="<?php echo e($user->id); ?>" />
    <?php endif; ?>
    <div class="row">
        <input type="hidden" name="avatar-status" id="avatar-status" value="1" />
        <div class="col-12 col-lg-6 mb-2">
            <label for="avatar"><?php echo e(__('global.avatar')); ?></label>
            <input id="image" style="box-sizing: inherit!important;" type="file" name="avatar" data-height="100%" data-allowed-file-extensions="png jpg jpeg" data-default-file="<?php echo e(old('avatar', isset($user) && $user->getMedia('avatar')->count() > 0 ? asset($user->getMedia('avatar')->first()->getUrl()) : '')); ?>" />
        </div>
        <div class="col-12 col-lg-6">
        <?php if (isset($component)) { $__componentOriginal942cbedc8524995abeccadc00a91f89c8cb356bd = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\Text::class, ['label' => 'global.username','name' => 'username','required' => 'required','id' => 'username','value' => ''.e(old('username', isset($user) ? $user->username : '')).'']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\Text::class, ['label' => 'global.name','name' => 'name','id' => 'name','value' => ''.e(old('name', isset($user) ? $user->name : '')).'']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\Text::class, ['label' => 'global.surname','name' => 'surname','id' => 'surname','value' => ''.e(old('surname', isset($user) ? $user->surname : '')).'']); ?>
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
        <?php if (isset($component)) { $__componentOriginal43dfa80e7ef46486989a60982286f6275e173c25 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\Email::class, ['label' => 'global.email','name' => 'email','required' => 'required','id' => 'email','value' => ''.e(old('email', isset($user) ? $user->email : '')).'']); ?>
<?php $component->withName('inputs.email'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal43dfa80e7ef46486989a60982286f6275e173c25)): ?>
<?php $component = $__componentOriginal43dfa80e7ef46486989a60982286f6275e173c25; ?>
<?php unset($__componentOriginal43dfa80e7ef46486989a60982286f6275e173c25); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal25139e3851c4ed17d42e36348a81c779f02c6739 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\Password::class, ['label' => 'global.password','name' => 'password','id' => 'password']); ?>
<?php $component->withName('inputs.password'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal25139e3851c4ed17d42e36348a81c779f02c6739)): ?>
<?php $component = $__componentOriginal25139e3851c4ed17d42e36348a81c779f02c6739; ?>
<?php unset($__componentOriginal25139e3851c4ed17d42e36348a81c779f02c6739); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal25139e3851c4ed17d42e36348a81c779f02c6739 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\Password::class, ['label' => 'global.password_confirmation','name' => 'password_confirmation','id' => 'password_confirmation']); ?>
<?php $component->withName('inputs.password'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal25139e3851c4ed17d42e36348a81c779f02c6739)): ?>
<?php $component = $__componentOriginal25139e3851c4ed17d42e36348a81c779f02c6739; ?>
<?php unset($__componentOriginal25139e3851c4ed17d42e36348a81c779f02c6739); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal7e3a75d427b72c7b370cd556bc60e2d775ea238d = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Selects\Basic::class, ['label' => 'global.role','options' => $selectrole,'optionValue' => 'id','display' => 'name','name' => 'selectrole','id' => 'selectrole','selected' => ''.e(isset($user) ? $user->roles->first()->name : 'admin').'']); ?>
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

        </div>
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
</form>
<?php /**PATH F:\laragon\www\gestion_de_calidad\resources\views/project/users/form-create-edit.blade.php ENDPATH**/ ?>