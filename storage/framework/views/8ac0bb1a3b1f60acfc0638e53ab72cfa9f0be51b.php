

<?php $__env->startSection('title', __('global.edit_version')); ?>

<?php $__env->startSection('vendor-style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset(mix('vendors/css/forms/select/select2.min.css'))); ?>">
    <link rel="stylesheet" href="<?php echo e(asset(mix('vendors/css/pickers/pickadate/pickadate.css'))); ?>">
    <link rel="stylesheet" href="<?php echo e(asset(mix('css/base/plugins/forms/form-validation.css'))); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-style'); ?>
    

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('includes.notifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="version-edit">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <?php echo $__env->make('version.create-edit-form', ['action' => route('version.update', ['version' => $version]), 'version' => $version], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
    <!-- vendor files -->
    <script src="<?php echo e(asset(mix('vendors/js/forms/select/select2.full.min.js'))); ?>"></script>

    <script src="<?php echo e(asset(mix('vendors/js/pickers/pickadate/picker.js'))); ?>"></script>
    <script src="<?php echo e(asset(mix('vendors/js/pickers/pickadate/picker.date.js'))); ?>"></script>
    <script src="<?php echo e(asset(mix('vendors/js/pickers/pickadate/picker.time.js'))); ?>"></script>
    <script src="<?php echo e(asset(mix('vendors/js/pickers/pickadate/legacy.js'))); ?>"></script>

    <script src="<?php echo e(asset(mix('vendors/js/forms/validation/jquery.validate.min.js'))); ?>"></script>
    <?php if(app()->getLocale() !== 'en'): ?>
        <script src="<?php echo e(asset(mix('assets/js/template/pickadate/translations/'.app()->getLocale().'.js'))); ?>"></script>
        <script src="<?php echo e(asset(mix('assets/js/template/validation/messages_'.app()->getLocale().'.js'))); ?>"></script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
    <!-- Page js files -->
    <script>

        let validation = {};
        let messages = {};

        $('#create-version').validate({
            lang: '<?php echo e(app()->getLocale()); ?>',
            rules: validation,
            messages: messages
        });

    </script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\gestion_de_calidad\resources\views/version/edit.blade.php ENDPATH**/ ?>