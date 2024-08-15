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
                                class="form-control input-rounded <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email"
                                value="<?php echo e(old('email')); ?>" required autocomplete="email">

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
                    </div>



                    <div class="form-group row">
                        <div class="col-12">
                                <label for="password" class="col-form-label text-white"><?php echo e(__("auth.login.password")); ?></label>
                            <input id="password" type="password"
                                class="form-control input-rounded <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required
                                autocomplete="current-password">

                            <?php $__errorArgs = ['password'];
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

<?php echo $__env->make('layouts.blank', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\RicRib\Desktop\Projects\Fiesta\TheNoche\resources\views/auth/login.blade.php ENDPATH**/ ?>