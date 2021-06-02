

<?php $__env->startSection('title', __('users-create.create-user')); ?>

<?php $__env->startSection('vendor-style'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-style'); ?>
    
    <link rel="stylesheet" href="<?php echo e(asset(mix('css/base/plugins/forms/form-validation.css'))); ?>">
    <!-- Dropify CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('includes.notifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="users-edit">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <?php echo $__env->make('project.users.form-create-edit', ['action' => route('user.store')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
    <!-- vendor files -->
    <script src="<?php echo e(asset(mix('vendors/js/forms/validation/jquery.validate.min.js'))); ?>"></script>
    <?php if(app()->getLocale() !== 'en'): ?>
        <script src="<?php echo e(asset(mix('assets/js/template/validation/messages_'.app()->getLocale().'.js'))); ?>"></script>
    <?php endif; ?>

    <script src="<?php echo e(asset(mix('assets/js/template/validation/validator-config-methods.js'))); ?>"></script>
    <script src="<?php echo e(asset(mix('assets/js/template/validation/validator-render-errors.js'))); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
    <!-- Page js files -->
    <script src="<?php echo e(asset(mix('assets/js/project/users/create.js'))); ?>"></script>
    <!-- Dropify JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#image").dropify({
                messages: {
                    'default': '<?php echo e(__('global.dropify_default')); ?>',
                    'replace': '<?php echo e(__('global.dropify_replace')); ?>',
                    'remove': '<?php echo e(__('global.dropify_remove')); ?>',
                    'error': '<?php echo e(__('global.dropify_error')); ?>'
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\gestion_de_calidad\resources\views/project/users/create.blade.php ENDPATH**/ ?>