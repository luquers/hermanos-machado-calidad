 <?php if($configData["mainLayoutType"] === 'horizontal' && isset($configData["mainLayoutType"])): ?>
<nav class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center <?php echo e($configData['navbarColor']); ?>" data-nav="brand-center">
  <div class="navbar-header d-xl-block d-none">
    <ul class="nav navbar-nav">
      <li class="nav-item">
        <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
          <span class="brand-logo">
        <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
          <defs>
            <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
              <stop stop-color="#000000" offset="0%"></stop>
              <stop stop-color="#FFFFFF" offset="100%"></stop>
            </lineargradient>
            <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
              <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
              <stop stop-color="#FFFFFF" offset="100%"></stop>
            </lineargradient>
          </defs>
          <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g id="Artboard" transform="translate(-400.000000, -178.000000)">
              <g id="Group" transform="translate(400.000000, 178.000000)">
                <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill:currentColor"></path>
                <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
              </g>
            </g>
          </g>
        </svg></span>
        <h2 class="brand-text mb-0">Vuexy</h2>
        </a>
      </li>
    </ul>
  </div>
  <?php else: ?>
  <nav class="header-navbar navbar navbar-expand-lg align-items-center <?php echo e($configData['navbarClass']); ?> navbar-light navbar-shadow <?php echo e($configData['navbarColor']); ?>">
    <?php endif; ?>
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
          <ul class="nav navbar-nav d-xl-none">
            <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
          </ul>
        </div>
        <ul class="nav navbar-nav align-items-center ml-auto">
          <li class="nav-item dropdown dropdown-language">
            <a class="nav-link dropdown-toggle" id="dropdown-flag" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="flag-icon flag-icon-us"></i>
              <span class="selected-language">English</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-flag">
              <a class="dropdown-item" href="<?php echo e(url('lang/es')); ?>" data-language="es">
                <i class="flag-icon flag-icon-es"></i>Spanish
              </a>
              <a class="dropdown-item" href="<?php echo e(url('lang/en')); ?>" data-language="en">
                <i class="flag-icon flag-icon-us"></i>English
              </a>
            </div>
          </li>
          <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="<?php echo e(($configData['theme'] === 'dark') ? 'sun' : 'moon'); ?>"></i></a></li>
          <!--
           <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon" data-feather="search"></i></a>
            <div class="search-input">
              <div class="search-input-icon"><i data-feather="search"></i></div>
              <input class="form-control input" type="text" placeholder="Explore Vuexy..." tabindex="-1" data-search="search">
              <div class="search-input-close"><i data-feather="x"></i></div>
              <ul class="search-list search-list-main"></ul>
            </div>
          </li>
          -->
          <li class="nav-item dropdown dropdown-user">
          <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="user-nav d-sm-flex d-none">
              <span class="user-name font-weight-bolder"><?php echo e(Auth::user()->username); ?></span>
              <span class="user-status"><?php echo e(Auth::user()->roles()->first() ? ucfirst(Auth::user()->roles()->first()->name) : ''); ?></span>
            </div>
            <span class="avatar">
              <img class="round" src="<?php echo e(Auth::user()->getMedia('avatar')->first() ?
                Auth::user()->getMedia('avatar')->first()->getUrl('avatar-thumb') : asset('images/avatars/default-user.png')); ?>" alt="avatar" height="40" width="40">
              <span class="avatar-status-online"></span>
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
              <i class="mr-50" data-feather="power"></i> <?php echo e(__('global.logout')); ?>

            </a>
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
              <?php echo csrf_field(); ?>
            </form>
          </div>
        </li>
      </ul>
    </div>
  </nav>

  
  <ul class="main-search-list-defaultlist d-none">
    <li class="d-flex align-items-center">
      <a href="javascript:void(0);">
        <h6 class="section-label mt-75 mb-0">Files</h6>
      </a>
    </li>
    <li class="auto-suggestion">
      <a class="d-flex align-items-center justify-content-between w-100" href="<?php echo e(url('app/file-manager')); ?>">
        <div class="d-flex">
          <div class="mr-75">
            <img src="<?php echo e(asset('images/icons/xls.png')); ?>" alt="png" height="32">
          </div>
          <div class="search-data">
            <p class="search-data-title mb-0">Two new item submitted</p>
            <small class="text-muted">Marketing Manager</small>
          </div>
        </div>
        <small class="search-data-size mr-50 text-muted">&apos;17kb</small>
      </a>
    </li>
    <li class="auto-suggestion">
      <a class="d-flex align-items-center justify-content-between w-100" href="<?php echo e(url('app/file-manager')); ?>">
        <div class="d-flex">
          <div class="mr-75">
            <img src="<?php echo e(asset('images/icons/jpg.png')); ?>" alt="png" height="32">
          </div>
          <div class="search-data">
            <p class="search-data-title mb-0">52 JPG file Generated</p>
            <small class="text-muted">FontEnd Developer</small>
          </div>
        </div>
        <small class="search-data-size mr-50 text-muted">&apos;11kb</small>
      </a>
    </li>
    <li class="auto-suggestion">
      <a class="d-flex align-items-center justify-content-between w-100" href="<?php echo e(url('app/file-manager')); ?>">
        <div class="d-flex">
          <div class="mr-75">
            <img src="<?php echo e(asset('images/icons/pdf.png')); ?>" alt="png" height="32">
          </div>
          <div class="search-data">
            <p class="search-data-title mb-0">25 PDF File Uploaded</p>
            <small class="text-muted">Digital Marketing Manager</small>
          </div>
        </div>
        <small class="search-data-size mr-50 text-muted">&apos;150kb</small>
      </a>
    </li>
    <li class="auto-suggestion">
      <a class="d-flex align-items-center justify-content-between w-100" href="<?php echo e(url('app/file-manager')); ?>">
        <div class="d-flex">
          <div class="mr-75">
            <img src="<?php echo e(asset('images/icons/doc.png')); ?>" alt="png" height="32"></div>
          <div class="search-data">
            <p class="search-data-title mb-0">Anna_Strong.doc</p>
            <small class="text-muted">Web Designer</small>
          </div>
        </div>
        <small class="search-data-size mr-50 text-muted">&apos;256kb</small>
      </a>
    </li>
    <li class="d-flex align-items-center">
      <a href="javascript:void(0);">
        <h6 class="section-label mt-75 mb-0">Members</h6>
      </a>
    </li>
    <li class="auto-suggestion">
      <a class="d-flex align-items-center justify-content-between py-50 w-100" href="<?php echo e(url('app/user/view')); ?>">
        <div class="d-flex align-items-center">
          <div class="avatar mr-75">
            <img src="<?php echo e(asset('images/portrait/small/avatar-s-8.jpg')); ?>" alt="png" height="32">
          </div>
          <div class="search-data">
            <p class="search-data-title mb-0">John Doe</p>
            <small class="text-muted">UI designer</small>
          </div>
        </div>
      </a>
    </li>
    <li class="auto-suggestion">
      <a class="d-flex align-items-center justify-content-between py-50 w-100" href="<?php echo e(url('app/user/view')); ?>">
        <div class="d-flex align-items-center">
          <div class="avatar mr-75">
            <img src="<?php echo e(asset('images/portrait/small/avatar-s-1.jpg')); ?>" alt="png" height="32">
          </div>
          <div class="search-data">
            <p class="search-data-title mb-0">Michal Clark</p>
            <small class="text-muted">FontEnd Developer</small>
          </div>
        </div>
      </a>
    </li>
    <li class="auto-suggestion">
      <a class="d-flex align-items-center justify-content-between py-50 w-100" href="<?php echo e(url('app/user/view')); ?>">
        <div class="d-flex align-items-center">
          <div class="avatar mr-75">
            <img src="<?php echo e(asset('images/portrait/small/avatar-s-14.jpg')); ?>" alt="png" height="32">
          </div>
          <div class="search-data">
            <p class="search-data-title mb-0">Milena Gibson</p>
            <small class="text-muted">Digital Marketing Manager</small>
          </div>
        </div>
      </a>
    </li>
    <li class="auto-suggestion">
      <a class="d-flex align-items-center justify-content-between py-50 w-100" href="<?php echo e(url('app/user/view')); ?>">
        <div class="d-flex align-items-center">
          <div class="avatar mr-75">
            <img src="<?php echo e(asset('images/portrait/small/avatar-s-6.jpg')); ?>" alt="png" height="32">
          </div>
          <div class="search-data">
            <p class="search-data-title mb-0">Anna Strong</p>
            <small class="text-muted">Web Designer</small>
          </div>
        </div>
      </a>
    </li>
  </ul>

  
  <ul class="main-search-list-defaultlist-other-list d-none">
    <li class="auto-suggestion justify-content-between">
      <a class="d-flex align-items-center justify-content-between w-100 py-50">
        <div class="d-flex justify-content-start">
          <span class="mr-75" data-feather="alert-circle"></span>
          <span>No results found.</span>
        </div>
      </a>
    </li>
  </ul>
  
  <!-- END: Header-->
<?php /**PATH F:\laragon\www\gestion_de_calidad\resources\views/panels/navbar.blade.php ENDPATH**/ ?>