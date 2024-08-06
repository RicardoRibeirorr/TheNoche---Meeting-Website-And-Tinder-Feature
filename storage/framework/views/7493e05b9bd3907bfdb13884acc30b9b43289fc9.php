<?php $__env->startSection('content'); ?>
<div id="profile-show" class="container container-max">
    <?php echo $__env->make('users.components.info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row mt-4">
        <?php echo $__env->make('users.components.sex', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="col-12 offset-sm-1 col-sm-10">
            <hr class="mt-1">
        </div>
    </div>
    <div class="container container-max px-0">
        <div class="row">
            <div class="col-12 col-md-3 offset-md-1">
                <?php echo $__env->make('users.components.seeking', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('users.components.photos', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                
            </div>
            
            <div class="col-12 col-md-6 offset-md-1 profile-timeline-posts">
                <ul class=" list-unstyled list-inline text-center">
                    <li><a class="btn btn-link" href="/profile/<?php echo e($user->id); ?>/photos"><?php echo e(__("profile.photos")); ?></a></li>
                    <li><a class="btn btn-link" href="/profile/<?php echo e($user->id); ?>"><?php echo e(__("profile.posts")); ?></a></li>
                </ul>
                <ul class=" list-unstyled">
                    <?php if($type && $type=="photos"): ?>
                    <?php if($photos->count()>0): ?>
                    <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('users.components.indexPhoto', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <p class="text-muted text-center"><?php echo e(__("profile.no_photos")); ?></p>
                    <?php endif; ?>
                    <li class="pagination-center mt-4"><?php echo e($photos->links()); ?></li>
                    <?php else: ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $user)): ?>
                    <?php echo $__env->make('components.posts.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('components.posts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if(count($posts)==0): ?>
                    <li class="w-100" style="height:50px;">
                        <p class="text-muted text-center"><?php echo e(__("profile.no_posts")); ?></p>
                    </li>
                    <?php endif; ?>
                    <li class="text-center"><?php echo e($posts->links()); ?></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Utilities\MAMP\htdocs\Fiesta\resources\views//users/show.blade.php ENDPATH**/ ?>