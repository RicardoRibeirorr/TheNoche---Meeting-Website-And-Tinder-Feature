<div class="card profile-timeline-fotos mb-0 mb-sm-4">
    <div class="card-header ">
        <?php echo e(__("profile.seeking.seeking")); ?>

    </div>
    <div class="card-body">

        <?php if($user->seeking->reason||$user->seeking->music||$user->seeking->season||$user->seeking->skill||$user->seeking->language): ?>
        <table class="w-100 text-left">
            <tbody>
                <?php if($user->seeking->reason): ?>
                <tr>
                    <td class="font-weight-bold"><?php echo e(__("profile.edit.seeking.reason")); ?></td>
                    <td class="text-muted pl-2"><?php echo e($user->seeking->reason); ?></td>
                </tr>
                <?php endif; ?>

                <?php if($user->seeking->music): ?>
                <tr>
                    <td class="font-weight-bold"><?php echo e(__("profile.edit.seeking.music")); ?></td>
                    <td class="text-muted pl-2"><?php echo e($user->seeking->music); ?></td>
                </tr>
                <?php endif; ?>

                <?php if($user->seeking->season): ?>
                <tr>
                    <td class="font-weight-bold"><?php echo e(__("profile.edit.seeking.season")); ?></td>
                    <td class="text-muted pl-2"><?php echo e($user->seeking->season); ?></td>
                </tr>
                <?php endif; ?>

                <?php if($user->seeking->skill): ?>
                <tr>
                    <td class="font-weight-bold"><?php echo e(__("profile.edit.seeking.skill")); ?></td>
                    <td class="text-muted pl-2"><?php echo e($user->seeking->skill); ?></td>
                </tr>
                <?php endif; ?>

                <?php if($user->seeking->language): ?>
                <tr>
                    <td class="font-weight-bold"><?php echo e(__("profile.edit.seeking.language")); ?></td>
                    <td class="text-muted pl-2"><?php echo e($user->seeking->language); ?></td>
                </tr>
                <?php endif; ?>

            </tbody>
        </table>
        <?php else: ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $user)): ?>
        <p class="text-muted"><?php echo e(__("profile.seeking.help.no_seeking",["name"=>""])); ?></p>
        <?php else: ?>
        <p class="text-muted"><?php echo e(__("profile.seeking.help.no_seeking",["name"=>$user->name])); ?></p>
        <?php endif; ?>
        <?php endif; ?>
    </div>
</div><?php /**PATH C:\Utilities\MAMP\htdocs\Fiesta\resources\views/users/components/seeking.blade.php ENDPATH**/ ?>