<?php $__env->startSection('content'); ?>
<div>
        <div class="container container-md">
                <?php echo $__env->make('apps.components.explore.search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="container container-md pt-5">
                <div class="row mb-4">
                <?php if($users->count()>0): ?>

                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                
                
                
                <?php echo $__env->make('components.explore.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 mt-4 d-flex justify-content-center">
                        <?php echo e($users->links()); ?>

                </div>
                <?php endif; ?>
                <?php if($users->count()<7 && $users->nextPageUrl()==null && $others!=null && $others->count()>0): ?>
                        <div class="col-12 mt-4 text-center text-muted">
                                        <?php echo e(__("explore.help.list_others")); ?>

                        </div>
                        <?php $__currentLoopData = $others; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        
                        
                        
                        <?php echo $__env->make('components.explore.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <?php if(($others!=null && $others->count()==0) && $users->count()==0): ?>
                <div class="col-12 mt-4 text-center">
                                <?php echo e(__("explore.no_results")); ?>

                </div>
                <?php endif; ?>
                </div>
        </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Utilities\MAMP\htdocs\Fiesta\resources\views//apps/explore.blade.php ENDPATH**/ ?>