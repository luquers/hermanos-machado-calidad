<?php
$configData = Helper::applClasses();
?>
<div class="main-menu menu-fixed <?php echo e(($configData['theme'] === 'dark') ? 'menu-dark' : 'menu-light'); ?> menu-accordion menu-shadow" data-scroll-to-active="true">
  <div class="navbar-header">
    <ul class="nav navbar-nav flex-row">
      <li class="nav-item mr-auto">
        <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
          <span class="brand-logo">
            <img src="<?php echo e(asset('images/logo/hnosmachado.jpg')); ?>" width="50px">
            <img src="<?php echo e(asset('images/logo/hnosmachado.jpg')); ?>" width="40px" class="brandMobile">
          </span>
          <!-- <h2 class="brand-text">Heca</h2> -->
        </a>
      </li>
      <li class="nav-item nav-toggle">
        <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
          <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
          <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i>
        </a>
      </li>
    </ul>
  </div>
  <div class="shadow-bottom"></div>
  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
      
      <?php if(isset($menuData[0])): ?>
      <?php $__currentLoopData = $menuData[0]['menu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if(isset($menu['navheader'])): ?>
      <li class="navigation-header">
        <span><?php echo e(__('menu.'.$menu['navheader'])); ?></span>
        <i data-feather="more-horizontal"></i>
      </li>
      <?php else: ?>
      
      <?php
      $custom_classes = "";
      if(isset($menu['classlist'])) {
      $custom_classes = $menu['classlist'];
      }
      ?>
      <li class="nav-item <?php echo e(request()->url() === $menu['url'] ? 'active' : ''); ?> <?php echo e($custom_classes); ?>">
        <a href="<?php echo e(isset($menu['url'])? url($menu['url']):'javascript:void(0)'); ?>" class="d-flex align-items-center" target="<?php echo e(isset($menu['newTab']) ? '_blank':'_self'); ?>">
          <i data-feather="<?php echo e($menu['icon']); ?>"></i>
          <span class="menu-title text-truncate"><?php echo e(__('menu.'.$menu['name'])); ?></span>
          <?php if(isset($menu['badge'])): ?>
          <?php $badgeClasses = "badge badge-pill badge-light-primary ml-auto mr-1" ?>
          <span class="<?php echo e(isset($menu['badgeClass']) ? $menu['badgeClass'] : $badgeClasses); ?> "><?php echo e($menu['badge']); ?></span>
          <?php endif; ?>
        </a>
        <?php if(isset($menu['submenu'])): ?>
        <?php echo $__env->make('panels/submenu', ['menu' => $menu['submenu']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
      </li>
      <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
      
    </ul>
  </div>
</div>
<!-- END: Main Menu-->
<?php /**PATH F:\laragon\www\gestion_de_calidad\resources\views/panels/sidebar.blade.php ENDPATH**/ ?>