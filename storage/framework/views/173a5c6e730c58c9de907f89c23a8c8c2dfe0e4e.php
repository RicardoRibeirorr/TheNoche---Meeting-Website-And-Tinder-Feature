<div class="col-sm-6 col-md-4 profile-item zoom">
        <div class="img-container">
                <a target="_blank" rel="noopener noreferrer" href="/profile/<?php echo e($user->id); ?>"><img src="<?php echo e($user->image); ?>"class="img-profile"></a>
        </div>
        <div class="info-container">
                <a target="_blank" rel="noopener noreferrer" href="/profile/<?php echo e($user->id); ?>"> <h3><?php echo e($user->name); ?></h3>
            <p><?php echo e($user->description??__("explore.no_description")); ?></p></a>
        </div>
        <div class="options-container text-center">
            <a target="_blank" rel="noopener noreferrer" href="/profile/<?php echo e($user->id); ?>"><?php echo e(__("explore.see_profile")); ?></a>
        </div>
    </div><?php /**PATH C:\Utilities\MAMP\htdocs\Fiesta\resources\views/components/explore/index.blade.php ENDPATH**/ ?>