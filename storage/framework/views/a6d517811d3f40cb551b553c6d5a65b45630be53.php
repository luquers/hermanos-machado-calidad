

<?php $__env->startSection('title', __('global.chapter_list')); ?>

<?php $__env->startSection('vendor-style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset(mix('vendors/css/tables/datatable/datatables.min.css'))); ?>">

    <link rel="stylesheet" href="<?php echo e(asset(mix('vendors/css/extensions/sweetalert2.min.css'))); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-style'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('includes.notifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="chapter-edit">
        <div class="card">
            <div class="card-content">
                <div class="card-body">

                    <div class="row">
                        <?php echo $__env->make('chapter.filters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
    <script src="<?php echo e(asset(mix('vendors/js/tables/datatable/buttons.bootstrap.min.js'))); ?>"></script>
    <script src="<?php echo e(asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js'))); ?>"></script>

    <script src="<?php echo e(asset(mix('vendors/js/extensions/sweetalert2.all.min.js'))); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
    <script src="<?php echo e(asset('vendor/datatables/buttons.server-side.js')); ?>"></script>

    <?php echo e($dataTable->scripts()); ?>


    <script>
        $('#chapter-table').on('click', '.delete-chapter', function () {

            let url = $(this).data('href');

            Swal.fire({
                title: '<?php echo e(__('global.confirm-question')); ?>',
                text: "<?php echo e(__('global.confirm-notice')); ?>",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '<?php echo e(__('global.continue')); ?>',
                confirmButtonClass: 'btn btn-primary',
                cancelButtonClass: 'btn btn-danger ml-1',
                cancelButtonText: '<?php echo e(__('global.cancel')); ?>',
                buttonsStyling: false,
            }).then(function (result) {
                if (result.value) {
                    shortPost(url, { _method: 'DELETE', _token: $('meta[name="csrf-token"]').attr('content') }, true);
                }
            })
        });
        $('#code, #name').donetyping(function() {
            window.LaravelDataTables['chapter-table'].draw();
        });

        $('#chapters_softDelete').change(function() {
            window.LaravelDataTables['chapter-table'].draw();
        })


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\gestion_de_calidad\resources\views/chapter/index.blade.php ENDPATH**/ ?>