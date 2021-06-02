
<ul class="menu-content">
  <?php if(isset($menu)): ?>
  <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <li class="<?php echo e($submenu['url'] === request()->url() ? 'active' : ''); ?>">
    <a href="<?php echo e(isset($submenu['url']) ? url($submenu['url']):'javascript:void(0)'); ?>" class="d-flex align-items-center" target="<?php echo e(isset($submenu['newTab']) && $submenu['newTab'] === true  ? '_blank':'_self'); ?>">
      <?php if(isset($submenu['icon'])): ?>
      <i data-feather="<?php echo e($submenu['icon']); ?>"></i>
      <?php endif; ?>
      <span class="menu-item text-truncate"><?php echo e(__('menu.'.$submenu['name'])); ?></span>
    </a>
    <?php if(isset($submenu['submenu'])): ?>
    <?php echo $__env->make('panels/submenu', ['menu' => $submenu['submenu']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
  </li>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php endif; ?>
</ul>
<?php /**PATH F:\laragon\www\gestion_de_calidad\resources\views/panels/submenu.blade.php ENDPATH**/ ?>