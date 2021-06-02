

<?php $__env->startSection('title', __('users-index.users-list')); ?>

<?php $__env->startSection('vendor-style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css'))); ?>">
    <link rel="stylesheet" href="<?php echo e(asset(mix('vendors/css/tables/datatable/buttons.bootstrap4.min.css'))); ?>">
    <link rel="stylesheet" href="<?php echo e(asset(mix('vendors/css/extensions/sweetalert2.min.css'))); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-style'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('includes.notifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="users-edit">
        <div class="card">
            <div class="card-content">
                <div class="card-body">

                    <div class="row">
                        <?php echo $__env->make('project.users.filters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <div class="table-responsive">
                        <?php echo e($dataTable->table()); ?>

                    </div>

                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
    
    <script src="<?php echo e(asset(mix('vendors/js/tables/datatable/datatables.min.js'))); ?>"></script>
    <script src="<?php echo e(asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js'))); ?>"></script>
    <script src="<?php echo e(asset(mix('vendors/js/tables/datatable/buttons.bootstrap4.min.js'))); ?>"></script>
    <script src="<?php echo e(asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js'))); ?>"></script>

    <script src="<?php echo e(asset(mix('vendors/js/extensions/sweetalert2.all.min.js'))); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
    <script src="<?php echo e(asset('vendor/datatables/buttons.server-side.js')); ?>"></script>
    <script src="<?php echo e(asset(mix('assets/js/project/users/index.js'))); ?>"></script>

    <?php echo e($dataTable->scripts()); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\gestion_de_calidad\resources\views/project/users/index.blade.php ENDPATH**/ ?>