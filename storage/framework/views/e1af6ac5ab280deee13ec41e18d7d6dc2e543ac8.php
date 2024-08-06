<?php $__env->startSection('content'); ?>
<div>

    <div class="container container-md">
        <?php echo $__env->make('apps.components.posts.search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <ul class=" list-unstyled container pt-5">
        <?php echo $__env->make('components.posts.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php if($posts->count()>0): ?>
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('components.posts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <li class="pagination-center"><?php echo e($posts->links()); ?></li>
        <?php endif; ?>

        <?php if($others!=null && $others->count()>0): ?>
    <li><p class="text-center text-muted"><?php echo e(__("post.help.list_others")); ?></p></li>
        <?php $__currentLoopData = $others; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('components.posts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <li class="pagination-center"><?php echo e($others->links()); ?></li>
        <?php endif; ?>

        <?php if($others!=null && $others->count()<6 && $posts->count()<6): ?>
            <li><p class="text-center py-3"><?php echo e(__("post.no_results")); ?></p></li>
        <?php endif; ?>
        
    </ul>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Utilities\MAMP\htdocs\Fiesta\resources\views//apps/post.blade.php ENDPATH**/ ?>