<?php $__env->startSection('content'); ?>
<div class="h-100  bg-gradient h-100-vh">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="font-family-pacific text-white font-20px font-weight-light w-100 mt-6 mb-3"><?php echo e(__("auth.register.title")); ?></h1>
            </div>
            <div class="col-md-8">
                <p class="text-muted"><?php echo e(__("auth.register.subtitle")); ?></p>
            </div>
            <div class="col-md-6">
                <form method="POST" action="<?php echo e(route('register')); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="country_id" id="country_id" value="1">
                    
                    <div class="form-group row"> 
                        <div class="col-12">
                            <label for="name" class="col-form-label text-white"><?php echo e(__("auth.register.name")); ?></label>
                            <input id="name" type="text"
                                class="form-control input-rounded <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="name"
                                value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus>

                            <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?>
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
                            <label for="email" class="col-form-label text-white"><?php echo e(__("auth.register.email")); ?></label>
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


                    
                    <div class="form-group row text-center justify-content-center">
                        <div class="col-12 col-sm-6">
                            <label for="location_id" class="col-form-label text-white"><?php echo e(__("auth.register.location")); ?></label>
                            <select class="form-control input-rounded w-100 <?php if ($errors->has('location_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('location_id'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                name="location_id" value="<?php echo e(old('location_id')); ?>" required autocomplete="location_id">
                                <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($location->id); ?>" <?php if( old('location') ==  $location->id): ?> selected <?php endif; ?>><?php echo e($location->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if ($errors->has('location_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('location_id'); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="age" class="col-form-label text-white"><?php echo e(__("auth.register.age")); ?></label>
                            <input id="age" type="number" min="18" value="18" max="120"
                                class="form-control input-rounded <?php if ($errors->has('age')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('age'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="age"
                                value="<?php echo e(old('age') ?? 18); ?>" required autocomplete="age">

                            <?php if ($errors->has('age')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('age'); ?>
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
                                <label for="password" class="col-form-label text-white"><?php echo e(__("auth.register.password")); ?></label>
                            <input id="password" type="password"
                                class="form-control input-rounded <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="password" required
                                autocomplete="new-password">

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

                    <div class="form-group row mb-0">
                        <div class="col-12 text-center text-light-1">
                                <hr class="hr-light">
                                <input id="terms" type="checkbox"
                                class="mr-1 <?php if ($errors->has('terms')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('terms'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="terms" required ><?php echo e(__("auth.register.terms.content")); ?><a href="/terms/term" target="_blank" class="text-white"><?php echo e(__("auth.register.terms.use")); ?></a> & <a href="/terms/privacy" target="_blank" class="text-white"><?php echo e(__("auth.register.terms.privacy")); ?></a>.
                                <?php if ($errors->has('terms')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('terms'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>

                        <div class="col-12 text-center mt-4">
                            <button type="submit" class="btn btn-light btn-rounded">
                                    <?php echo e(__('auth.register.submit')); ?>

                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.blank', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Utilities\MAMP\htdocs\Fiesta\resources\views/auth/register.blade.php ENDPATH**/ ?>