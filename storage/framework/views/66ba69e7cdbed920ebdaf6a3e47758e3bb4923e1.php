<li>
        <div class="card post post-create p-0 zoom">
            <div class="card-header p-2 small">
                    <?php echo e(__("post.create_header")); ?>

            </div>
            <div class="card-body pb-2">
                <form method="POST" action="<?php echo e(route('posts')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="media"><a href="#" class="d-none d-sm-block"><img src="
                        <?php echo e($user->image); ?>"alt="" class="align-self-start"></a>
                        <div class="media-body ml-sm-2">
                            <input type="text" name="title" placeholder="<?php echo e(__("post.holder.title")); ?>"
                                class="form-control pt-0 <?php if ($errors->has('title')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('title'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                value="<?php echo e(old('title')); ?>" autocomplete="off">
                            <?php if ($errors->has('title')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('title'); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            <textarea name="content" rows="2" cols="30"
                                placeholder="<?php echo e(__("post.holder.description")); ?>"
                                class="form-control <?php if ($errors->has('content')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('content'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                autocomplete="off"><?php echo e(old('content')); ?></textarea>
                            <?php if ($errors->has('content')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('content'); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>
                    </div>
                    <div class="w-100 text-right pt-2"><select name="location_id"
                            class="form-control w-auto d-inline-block nav-link py-0 px-0  <?php if ($errors->has('location_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('location_id'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                            style="color: #bdbdbd;">
                            <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($location->id); ?>" <?php if(auth()->user()->stats->location_id == $location->id): ?> selected <?php endif; ?>><?php echo e($location->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select><span>|</span><select name="type"
                            class="form-control w-auto d-inline-block nav-link py-0 mr-2  <?php if ($errors->has('type')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('type'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                            <option value="0" <?php echo e(old('type') && old('type')==0?"selected":"selected"); ?> title="<?php echo e(__("tooltip.post.invite")); ?>">
                                    <?php echo e(__("post.types.invite")); ?></option>
                            <option value="1" <?php echo e(old('type') && old('type')==1?"selected":null); ?> title="<?php echo e(__("tooltip.post.post")); ?>"><?php echo e(__("post.types.post")); ?>

                            </option>
                        </select> <button type="submit" class="btn btn-sm btn-dark"><?php echo e(__("post.publish")); ?></button>
                    </div>
                    <?php if ($errors->has('location_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('location_id'); ?><span class="invalid-feedback"
                        role="alert"><strong><?php echo e($message); ?></strong></span> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                    <?php if ($errors->has('type')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('type'); ?><span class="invalid-feedback"
                        role="alert"><strong><?php echo e($message); ?></strong></span> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                </form>
            </div>
        </div>
    </li><?php /**PATH C:\Utilities\MAMP\htdocs\Fiesta\resources\views/components/posts/create.blade.php ENDPATH**/ ?>