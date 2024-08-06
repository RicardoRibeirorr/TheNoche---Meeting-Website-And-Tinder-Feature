<aside class="row bg-light-1 ">
    <div class="col px-0">
        <ul id="post-nav" class="text-center text-sm-left">
            <li class="nav-item <?php if($type==null): ?> active <?php endif; ?>"><a href="/post" class="nav-link"><?php echo e(__("search.all")); ?></a></li>
            <li class="nav-item <?php if($type=="invite"): ?> active <?php endif; ?>"><a href="/post/invites"
                    class="nav-link"><?php echo e(__("search.invites")); ?> <?php if($type!="invite"): ?> <span
                        class="badge badge-danger badge-point"><b></b></span><?php endif; ?></a></li>
            <li class="nav-item <?php if($type=="event"): ?> active <?php endif; ?>"><a href="/post/events"
                    class="nav-link"><?php echo e(__("search.posts")); ?> <?php if($type!="event"): ?> <span
                        class="badge badge-danger badge-point"><b></b></span><?php endif; ?></a></li>
        </ul>
    </div>
    <div class="col px-0 text-right">
        <form method="POST" action="/search/post/<?php echo e($type); ?>" class="d-inline-flex py-2  text-center text-sm-right">
            <?php echo csrf_field(); ?>
            <div class="d-grid d-sm-inline-block">
                
                <select name="location" class="form-control w-auto d-inline-block nav-link py-0 px-0 "
                    style="color: rgb(189, 189, 189);">
                    <option value="-1"><?php echo e(__("search.location")); ?></option>
                    <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($location->id); ?>" <?php if( old('location') ==  $location->id): ?> selected <?php endif; ?>><?php echo e($location->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </select></div>
            <div class="d-grid d-sm-inline-block"><input name="for" type="search" placeholder="<?php echo e(__("search.holder.search")); ?>"
                    aria-label="Search" class="form-control form-search-input border-bottom" value="<?php echo e(old('for')); ?>"> <button type="submit"
                    class="btn btn-dark mr-2"><?php echo e(__("search.search")); ?></button></div>
        </form>
    </div>
</aside>
<?php /**PATH C:\Utilities\MAMP\htdocs\Fiesta\resources\views/apps/components/posts/search.blade.php ENDPATH**/ ?>