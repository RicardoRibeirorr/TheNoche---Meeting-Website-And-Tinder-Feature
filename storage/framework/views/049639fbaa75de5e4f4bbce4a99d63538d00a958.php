<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('auth.verify_email.title')); ?></div>

                <div class="card-body">
                    <?php if(session('resent')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(__('auth.verify_email.resent')); ?>

                        </div>
                    <?php endif; ?> 

                    <?php echo e(__('auth.verify_email.description')); ?> <a href="<?php echo e(route('verification.resend')); ?>"><?php echo e(__('auth.verify_email.link_resent')); ?></a>.
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Utilities\MAMP\htdocs\Fiesta\resources\views/auth/verify.blade.php ENDPATH**/ ?>