<aside class="row bg-light-1 ">
    
    <div class="col px-0 text-right">
        <form method="POST" action="/search/explore" class="d-inline-flex py-2  text-center text-sm-right">
            <?php echo csrf_field(); ?>
            <div class="d-grid d-sm-inline-block">
                <select name="gender" class="form-control w-auto d-inline-block nav-link py-0 px-0 "
                    style="color: rgb(189, 189, 189);">
                        <option value="-1"><?php echo e(__("search.gender.gender")); ?></option>
                        <option value="0" <?php if(auth()->user()->interest==0): ?> selected <?php endif; ?>><?php echo e(__("search.gender.male")); ?></option>
                        <option value="1" <?php if(auth()->user()->interest==1): ?> selected <?php endif; ?>> </option>)><?php echo e(__("search.gender.female")); ?></option>
                </select>
                <select name="location" class="form-control w-auto d-inline-block nav-link py-0 px-0 "
                    style="color: rgb(189, 189, 189);">
                    <option value="-1"><?php echo e(__("search.location")); ?></option>
                    <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($location->id); ?>" <?php if(isset($location_selected) && $location_selected==$location->id): ?> selected <?php endif; ?>><?php echo e($location->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select></div>
            <div class="d-grid d-sm-inline-block"><input name="for" type="search" placeholder="<?php echo e(__("search.holder.search")); ?>"
                    aria-label="Search" class="form-control form-search-input border-bottom"> <button type="submit"
                    class="btn btn-dark mr-2"><?php echo e(__("search.search")); ?></button></div>
        </form>
    </div>
</aside>
<?php /**PATH C:\Users\RicRib\Desktop\Projects\Fiesta\TheNoche\resources\views/apps/components/explore/search.blade.php ENDPATH**/ ?>