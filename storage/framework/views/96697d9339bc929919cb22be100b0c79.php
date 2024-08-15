<li>

    <article class="post media"><a href="/profile/<?php echo e($post->user_id); ?>"><img src="<?php echo e($post->user->image); ?>" alt="user"
                class="d-flex align-self-start mr-3" ></a>
        <div class="media-body">
            <h5 class="my-0 font-weight-bold mr-4 <?php if($post->active==" 0" || $post->expire_at<$date_now): ?> text-muted
                    <?php endif; ?>"> <?php echo e($post->title); ?> <small>|
                        <?php echo e($post->location->name); ?> </small></h5> <a href="#" id="dropdown_menu_post_<?php echo e($post->id); ?>"
                data-toggle="dropdown" class="btn-menu btn"><i class="fas fa-ellipsis-h"></i></a>
            <ul class="dropdown-menu" aria-labelledby="dropdown_menu_post_<?php echo e($post->id); ?>">
                <?php if($post->user->id == auth()->user()->id): ?>
                <?php if($post->active=="0" || $post->expire_at>$date_now): ?>

                <li><a class="dropdown-item" href="#post-expire-form" onclick="event.preventDefault();
                    document.getElementById('post-expire-form').submit();"
                        title="<?php echo e(__("tooltip.post.close")); ?>"><?php echo e(__("post.options.close")); ?></a>
                    <form id="post-expire-form" action="/post/expire/<?php echo e($post->id); ?>" method="POST"
                        style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>
                </li>
                
                <li class="line"></li>
                <?php endif; ?>
                <li><a class="dropdown-item" href="#post-delete-form" onclick="event.preventDefault();
                    document.getElementById('post-delete-form').submit();"
                        title="<?php echo e(__("tooltip.post.delete")); ?>"><?php echo e(__("post.options.delete")); ?></a>
                    <form id="post-delete-form" action="/post/<?php echo e($post->id); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field("delete"); ?>
                    </form>
                </li>
                <?php else: ?>
                <li><a class="dropdown-item" href="/report/post/<?php echo e($post->id); ?>"
                        title="<?php echo e(__("tooltip.post.report")); ?>"><?php echo e(__("post.options.report")); ?></a></li>
                <?php endif; ?>
            </ul>
            <p class="small text-muted mb-1 <?php if($post->active==" 0" ||$post->expire_at<$date_now): ?> text-muted
                    text-line-through <?php endif; ?>"><b class="text-dark">
                        <?php if($post->active=="0" ||$post->expire_at<$date_now): ?> <?php echo e(__("post.closed")); ?> <?php endif; ?> <?php if($post->
                            type==0): ?>
                            <?php echo e(__("post.types.invite")); ?>

                            <?php elseif($post->type==1): ?>
                            <?php echo e(__("post.types.post")); ?>

                            <?php endif; ?> </b>
                    
                    | <?php echo e(__("post.posted_at")); ?> <?php echo e(\Carbon\Carbon::parse($post->created_at)); ?> | <?php if($post->expire_at>$date_now): ?>
                    <?php echo e(__("post.expires_at")); ?> <?php else: ?> <?php echo e(__("post.closed_at")); ?> <?php endif; ?>
                    <?php echo e(\Carbon\Carbon::parse($post->expire_at)); ?>

                    
                    
                    

                    
                    <p><?php echo e($post->content); ?></p>
                    
                    <?php if( $post->user_id != auth()->user()->id): ?>
                    <div class="w-100 text-right">
                        <?php if(auth()->user()->email_verified_at==null): ?>

                        <a href="/email/verify" class="btn btn-sm btn-dark"><?php echo e(__("post.answer")); ?></a>
                        <?php else: ?>
                        <button onclick="window.loadThreadByParticipantChat(<?php echo e($post->user_id); ?>,{
            'post_id':<?php echo e($post->id); ?>

        });" class="btn btn-sm btn-dark"><?php echo e(__("post.answer")); ?></button>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
        </div>
    </article>
</li>
<?php /**PATH C:\Users\RicRib\Desktop\Projects\Fiesta\TheNoche\resources\views/components/posts/index.blade.php ENDPATH**/ ?>