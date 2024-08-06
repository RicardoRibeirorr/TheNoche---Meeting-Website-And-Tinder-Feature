<div class="col-6 offset-sm-1 col-sm-2">
    <p class="text-center text-muted"><b class="text-dark"><?php echo e(__("profile.gender.gender")); ?></b> <br>
        <?php if($user->gender==0): ?>
        <?php echo e(__("profile.gender.male")); ?>

        <?php else: ?>
        <?php echo e(__("profile.gender.female")); ?>

        <?php endif; ?></p>
</div>
<div class="col-6 offset-sm-6 col-sm-2">
    <p class="text-center text-muted"><b class="text-dark"><?php echo e(__("profile.interest.interest")); ?></b> <br>
        <?php if($user->interest==0): ?>
        <?php echo e(__("profile.interest.male")); ?>

        <?php elseif($user->interest==1): ?>
        <?php echo e(__("profile.interest.female")); ?>

        <?php else: ?>
        <?php echo e(__("profile.interest.both")); ?>

        <?php endif; ?></p>
</div><?php /**PATH C:\Utilities\MAMP\htdocs\Fiesta\resources\views/users/components/sex.blade.php ENDPATH**/ ?>