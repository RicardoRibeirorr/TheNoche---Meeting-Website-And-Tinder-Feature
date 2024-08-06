<?php $__env->startSection('content'); ?>
<div class="h-100  bg-gradient h-100-vh">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="font-family-pacific text-white font-20px font-weight-light w-100 mt-6 mb-3"><?php echo e(__("auth.login.title")); ?></h1>
            </div>
            <div class="col-md-8">
                <p class="text-muted"><?php echo e(__("auth.login.subtitle")); ?></p> 
            </div>
            <div class="col-md-6">
                <form method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>

                    
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="email" class="col-form-label text-white"><?php echo e(__("auth.login.email")); ?></label>
                            <input id="email" type="email"
                                class="form-control input-rounded <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email"
                                value="<?php echo e(old('email')); ?>" required autocomplete="email">

                            <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>
                    </div>



                    <div class="form-group row">
                        <div class="col-12">
                                <label for="password" class="col-form-label text-white"><?php echo e(__("auth.login.password")); ?></label>
                            <input id="password" type="password"
                                class="form-control input-rounded <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="password" required
                                autocomplete="current-password">

                            <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>
                    </div>

                    <div class="form-group row">
                            <div class="col-md-5 ">
                                <div class="form-check text-left">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                    <label class="form-check-label text-light" for="remember">
                                            <?php echo e(__("auth.login.remember")); ?>

                                    </label>
                                </div>
                            </div>
                            <?php if(Route::has('password.request')): ?>
                            <div class="col-md-7 text-right text-muted">
                            <a class="text-muted py-0" href="<?php echo e(route('password.request')); ?>">
                                    <?php echo e(__("auth.login.forgot_password")); ?>

                            </a>
                            </div>
                        <?php endif; ?>
                        </div>

                    <div class="form-group row mb-0">
                            
                        <div class="col-12 text-center mt-4">
                            <button type="submit" class="btn btn-light btn-rounded">
                                    <?php echo e(__("auth.login.submit")); ?>

                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.blank', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Utilities\MAMP\htdocs\Fiesta\resources\views/auth/login.blade.php ENDPATH**/ ?>