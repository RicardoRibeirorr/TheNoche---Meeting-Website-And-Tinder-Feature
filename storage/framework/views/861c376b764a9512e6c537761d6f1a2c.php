<div class="card profile-timeline-fotos mb-0 mb-sm-4">
    <div class="card-header">
        Fotografias
    </div>
    <div class="card-body">
        <ul class="list-unstyled">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $user)): ?>
            <li>
                <label data-toggle="modal" data-target="#modal_updload_image" for="upload_image"
                    class="other-options display-4 text-dark mx-0 " style="font-size: 35px;"><i
                        class="fas fa-plus-circle"></i></label>
            </li>
            <?php endif; ?>

            <?php $__currentLoopData = $photoSamples; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><a href="/profile/<?php echo e($user->id); ?>/photos"><img src="<?php echo e($photo->url); ?>" srcset="/storage/default/profile.svg"></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if(count($photoSamples)>9): ?>
            <li>
                <a href="/profile/<?php echo e($user->id); ?>/photos" class=" text-muted">
                    <div class="other-options">+9</div>
                </a>
            </li>
            <?php elseif(count($photoSamples)==0): ?>
            <li class="w-100 h-auto">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $user)): ?>
                <p class="text-muted"><?php echo __("profile.photo.help.add_message",["icon"=>'<i class="fas fa-plus-circle"></i>']); ?></p>
                <?php else: ?>
                <p class="text-muted"><?php echo e(__("profile.no_photos")); ?></p>
                <?php endif; ?>
            </li>
            <?php endif; ?>
        </ul>
    </div>
    <?php if($user->id == auth()->user()->id): ?>
    <div id="modal_updload_image" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form method="POST" action="/photo" class="modal-content" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div style="min-height:30vh; max-height: 40vh; overflow:hidden;">
                        <label for="upload_image" class="position-relative w-100">
                            <p class="position-absolute w-100 text-center text-muted mt-3"><?php echo e(__("profile.photo.help.add_message",["icon"=>""])); ?></p>
                            <img id="image" class="w-100" src="/storage/default/profile.svg">
                        </label>
                    </div>
                    <textarea id="description" class="form-control mt-3" name="description"
                        placeholder="Deixe uma pequena descrição" rows="3"></textarea>
                    <input id="upload_image" name="upload_image" class="form-control input-rounded mt-3 w-100"
                        style="padding-bottom: 2.2rem;" type="file" accept="image/*" onchange="
                            document.getElementById('image').src = window.URL.createObjectURL(this.files[0]) ">
                </div>
                <div class="modal-footer text-right">
                    <button class="btn btn-dark"><?php echo e(__("profile.photo.add")); ?></button>
                </div>
            </form>
        </div>
    </div>
    <?php endif; ?>

</div>
<?php /**PATH C:\Users\RicRib\Desktop\Projects\Fiesta\TheNoche\resources\views/users/components/photos.blade.php ENDPATH**/ ?>