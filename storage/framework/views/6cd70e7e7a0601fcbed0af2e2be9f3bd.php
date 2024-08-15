<div class="profile-image container">
    <img class="img-circle" src="<?php echo e($user->image); ?>" >
    <div class="user-options">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $user)): ?>
        <div class="right">
            <a class="btn btn-lg btn-light  btn-circle" href="/profile/edit"><i class="fas fa-user-edit"></i></a>
            <p class="text-center text-muted d-none d-sm-block"><?php echo e(__("profile.profile.edit")); ?></p>
        </div>
        <?php else: ?>
        <div class="left">
                <?php if(auth()->user()->email_verified_at==null): ?>
                <a href="/email/verify" class="btn btn-lg btn-danger btn-circle"><i class="fas fa-comment"></i></a>
                <?php else: ?>
            <button onclick="window.loadThreadByParticipantChat(<?php echo e($user->id); ?>)" class="btn btn-lg btn-danger btn-circle"><i class="fas fa-comment"></i></button>
            <?php endif; ?>

            <p class="text-center text-muted d-none d-sm-block"><?php echo e(__("profile.profile.chat")); ?></p>
        </div>
        <div class="right">
                <a data-toggle="dropdown" class="btn btn-lg btn-light  btn-circle text-muted" href="#dropdown-profile-options"><i class="fas fa-ellipsis-h"></i></a>
        <ul aria-labelledby="dropdown-profile-options" class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(723px, 42px, 0px);"><li><a href="/report/user/<?php echo e($user->id); ?>" title="Denuncie se conter informação ilicita ou que não lhe pertence" class="dropdown-item"><?php echo e(__("profile.profile.options.report")); ?></a></li></ul>
            </div>
        <?php endif; ?>
    </div>
</div>
<div class="profile-info">
<h2><?php echo e($user->name); ?>, <?php echo e($user->age); ?></h2>
    <address class="text-muted">
        <?php echo e($user->stats->country->name .", ".$user->stats->location->name); ?></address>
    <p><?php echo e($user->description??null); ?></p>
</div>
<?php /**PATH C:\Users\RicRib\Desktop\Projects\Fiesta\TheNoche\resources\views/users/components/info.blade.php ENDPATH**/ ?>