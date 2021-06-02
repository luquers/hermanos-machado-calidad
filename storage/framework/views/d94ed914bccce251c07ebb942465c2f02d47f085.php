

<?php $__env->startSection('title', 'Acceso'); ?>

<?php $__env->startSection('page-style'); ?>

<link rel="stylesheet" href="<?php echo e(asset(mix('css/base/pages/page-auth.css'))); ?>">

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="auth-wrapper auth-v1 px-2">
  <div class="auth-inner py-2">
    <!-- Login v1 -->
    <div class="card mb-0">
      <div class="card-body">
        <a href="javascript:void(0);" class="brand-logo">

          <img class="img-fluid brand-logo" src="<?php echo e('images/logo/hnosmachado.jpg'); ?>" alt="logo" />
        </a>

        <h4 class="card-title mb-1 text-center"><?php echo e(__('global.welcome')); ?></h4>

        <form class="auth-login-form mt-2" method="POST" action="<?php echo e(route('login')); ?>">
          <?php echo csrf_field(); ?>


          <div class="form-group">
            <label for="login-email" class="form-label"><?php echo e(__('global.email')); ?></label>
            <input type="text" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="login-email" name="email" aria-describedby="login-email" tabindex="1" autofocus value="<?php echo e(old('email')); ?>" />
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <span class="invalid-feedback" role="alert">
                <strong><?php echo e($message); ?></strong>
              </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>

          <div class="form-group">
            <div class="d-flex justify-content-between">
              <label for="login-password"><?php echo e(__('global.password')); ?></label>
              <?php if(Route::has('password.request')): ?>
              <a href="<?php echo e(route('password.request')); ?>">
                <small><?php echo e(__('global.forgot-password')); ?></small>
              </a>
              <?php endif; ?>
            </div>
            <div class="input-group input-group-merge form-password-toggle">
              <input type="password" class="form-control form-control-merge" id="login-password" name="password" tabindex="2" aria-describedby="login-password" />
              <div class="input-group-append">
                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="remember-me" name="remember-me" tabindex="3" <?php echo e(old('remember-me') ? 'checked' : ''); ?> />
              <label class="custom-control-label" for="remember-me"> <?php echo e(__('global.remember')); ?> </label>
            </div>
            <br>
            <div class="m-auto">
            <?php echo htmlFormSnippet([
                "theme" => "light",
                "size" => "normal",
                "tabindex" => "3",
                "callback" => "callbackFunction",
                "expired-callback" => "expiredCallbackFunction",
                "error-callback" => "errorCallbackFunction",
            ]); ?>

            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block" tabindex="4"><?php echo e(__('global.login')); ?></button>
        </form>

        <p class="text-center mt-2">
          <?php if(Route::has('register')): ?>
          <a href="<?php echo e(route('register')); ?>">
            <span><?php echo e(__('global.register')); ?></span>
          </a>
          <?php endif; ?>
        </p>



















      </div>
    </div>
    <!-- /Login v1 -->
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/fullLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\gestion_de_calidad\resources\views//auth/login.blade.php ENDPATH**/ ?>