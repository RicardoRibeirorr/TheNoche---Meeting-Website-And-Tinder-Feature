<?php $__env->startSection('content'); ?>
<div class="container">
<form action="/profile/update/<?php echo e($user->id); ?>" enctype="multipart/form-data" method="post">
        <?php echo csrf_field(); ?>
        <?php echo method_field("PUT"); ?>
        <div class="container">
            <div class="row">

                <div class="col-12 ">
                    <p class="text-muted mb-0 mt-3"><small><?php echo e(__("profile.edit.help.public_info")); ?></small></p>
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-10 col-md-9 col-lg-10 pt-4">
                            <div class="line"></div>
                            <div class="form-group row  justify-content-center">
                                <label for="name" class="col-md-4 col-form-label"><?php echo e(__("profile.edit.name")); ?></label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name"
                                        value="<?php echo e(old('name') ?? $user->name); ?>" maxlength="20" required placeholder="<?php echo e(__("profile.edit.holder.name")); ?>" autofocus>

                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group row  justify-content-center">
                                <label for="age" class="col-md-4 col-form-label"><?php echo e(__("profile.edit.age")); ?></label>

                                <div class="col-md-6">
                                    <input id="age" type="text"
                                        class="form-control <?php $__errorArgs = ['age'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="age"
                                        value="<?php echo e(old('age') ?? $user->age); ?>" min="18" max="120" required autofocus>

                                    <?php $__errorArgs = ['age'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group row  justify-content-center">
                                <label for="gender"
                                    class="col-md-4 col-form-label"><?php echo e(__("profile.gender.gender")); ?></label>
                                <div class="col-md-6">
                                    <select id="gender" 
                                        class="form-control <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="gender">
                                        <option value="-1" <?php if($user->gender == null && old('gender')==null): ?>
                                                selected <?php endif; ?> ><?php echo e(__("profile.gender.none")); ?></option>
                                    <option value="0" <?php if(old('gender') =="0" || $user->gender =="0"): ?>
                                        selected <?php endif; ?> ><?php echo e(__("profile.gender.male")); ?></option>
                                    <option value="1" <?php if(old('gender') =="1" || $user->gender =="1"): ?>
                                        selected <?php endif; ?> ><?php echo e(__("profile.gender.female")); ?></option>
                                </select>
                                    <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group row  justify-content-center">
                                <label for="interest"
                                    class="col-md-4 col-form-label"><?php echo e(__("profile.interest.interest")); ?></label>
                                <div class="col-md-6">
                                    <select id="interest" 
                                        class="form-control <?php $__errorArgs = ['interest'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="interest">
                                    <option value="-1" <?php if($user->interest == null && old('interest')==null): ?>
                                        selected <?php endif; ?> ><?php echo e(__("profile.interest.none")); ?></option>
                                    <option value="0" <?php if(old('interest') =="0" || $user->interest =="0"): ?>
                                        selected <?php endif; ?> ><?php echo e(__("profile.interest.male")); ?></option>
                                    <option value="1" <?php if(old('interest') =="1" || $user->interest =="1"): ?>
                                        selected <?php endif; ?> ><?php echo e(__("profile.interest.female")); ?></option>
                                    <option value="2" <?php if(old('interest') =="2" || $user->interest =="2"): ?>
                                        selected <?php endif; ?> ><?php echo e(__("profile.interest.both")); ?></option>
                                </select>
                                    <?php $__errorArgs = ['interest'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group row  justify-content-center">
                                <label for="description" class="col-md-4 col-form-label"><?php echo e(__("profile.edit.description")); ?></label>

                                <div class="col-md-6">
                                    <textarea rows="2" id="description" maxlength="255"
                                        class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        name="description" placeholder="<?php echo e(__("profile.edit.holder.description")); ?>"><?php echo e(old('description') ?? $user->description); ?></textarea>

                                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 col-lg-2 order-first order-md-last pt-3 px-0">
                            <div class="row">
                                <label for="image" class="col-12 col-form-label text-center px-0">
                                    <img id="image-container" class="img-fluid img-thumbnail rounded-circle"
                                        style="height: 150px;width:150px;" src="<?php echo e($user->image); ?>"alt="">
                                    <p class="pt-1 text-muted"><?php echo e(__("profile.edit.load_image")); ?></p>
                                </label>
                                <div class="col-md-6 text-center">
                                    <input id="image" type="file"
                                        class="form-control-file <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> collapse"
                                        name="image"
                                        onchange="
                                                         document.getElementById('image-container').src = window.URL.createObjectURL(this.files[0]) "
                                        accept="image/*">
                                    <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="p-1 mt-5">
                </div>
                <div class="col-12 ">
                    <p class="text-muted mb-0 mt-3"><small><?php echo e(__("profile.edit.help.seeking_info")); ?></small></p>
                    <div class="form-group row  justify-content-center">
                        <label for="reason" class="col-md-4 col-form-label"><?php echo e(__("profile.edit.seeking.reason")); ?></label>

                        <div class="col-md-6">
                            <input id="reason" type="text"
                                class="form-control <?php $__errorArgs = ['reason'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="reason"
                                value="<?php echo e(old('reason') ?? $user->seeking->reason); ?>" placeholder="<?php echo e(__("profile.edit.holder.seeking.reason")); ?>" maxlength="40" autofocus>

                            <?php $__errorArgs = ['reason'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="form-group row  justify-content-center">
                        <label for="music" class="col-md-4 col-form-label"><?php echo e(__("profile.edit.seeking.music")); ?></label>

                        <div class="col-md-6">
                            <input id="music" type="text"
                                class="form-control <?php $__errorArgs = ['music'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="music" placeholder="<?php echo e(__("profile.edit.holder.seeking.music")); ?>" 
                                value="<?php echo e(old('music') ?? $user->seeking->music); ?>" maxlength="40" autofocus>

                            <?php $__errorArgs = ['music'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="form-group row  justify-content-center">
                        <label for="season" class="col-md-4 col-form-label"><?php echo e(__("profile.edit.seeking.season")); ?></label>

                        <div class="col-md-6">
                            <input id="season" type="text"
                                class="form-control <?php $__errorArgs = ['season'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="season" placeholder="<?php echo e(__("profile.edit.holder.seeking.season")); ?>" 
                                value="<?php echo e(old('season') ?? $user->seeking->season); ?>"  maxlength="40" autofocus>

                            <?php $__errorArgs = ['season'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="form-group row  justify-content-center">
                        <label for="skill" class="col-md-4 col-form-label"><?php echo e(__("profile.edit.seeking.skill")); ?></label>

                        <div class="col-md-6">
                            <input id="skill" type="text"
                                class="form-control <?php $__errorArgs = ['skill'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="skill" placeholder="<?php echo e(__("profile.edit.holder.seeking.skill")); ?>" 
                                value="<?php echo e(old('skill') ?? $user->seeking->skill); ?>"  maxlength="40" autofocus>

                            <?php $__errorArgs = ['skill'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="form-group row  justify-content-center">
                        <label for="language" class="col-md-4 col-form-label"><?php echo e(__("profile.edit.seeking.language")); ?></label>

                        <div class="col-md-6">
                            <input id="language" type="text"
                                class="form-control <?php $__errorArgs = ['language'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="language" placeholder="<?php echo e(__("profile.edit.holder.seeking.language")); ?>" 
                                value="<?php echo e(old('language') ?? $user->seeking->language); ?>"  maxlength="40" autofocus >

                            <?php $__errorArgs = ['language'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    
                    <hr class="p-1 mt-5">
                </div>
                <div class="col-12 ">
                    <p class="text-muted mb-0 mt-3"><small><?php echo e(__("profile.edit.help.private_info")); ?></small></p>
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-10 col-md-9 col-lg-10 pt-4">

                            <div class="form-group row  justify-content-center">
                                <label for="email" class="col-md-4 col-form-label"><?php echo e(__("profile.edit.email")); ?></label>
                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email"
                                        value="<?php echo e(old('email') ?? $user->email); ?>" required autofocus>

                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group row  justify-content-center">
                                <label for="phone" class="col-md-4 col-form-label"><?php echo e(__("profile.edit.phone")); ?></label>
                                <div class="col-md-6">
                                    <input id="phone" type="text"
                                        class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="phone"
                                        value="<?php echo e(old('phone') ?? $user->phone); ?>" autofocus>

                                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 col-lg-2 "></div>
                    </div>
                    <hr class="p-1 mt-5">
                </div>
                <div class="col-12 ">
                    <p class="text-muted mb-0 mt-3"><small><?php echo e(__("profile.edit.help.password")); ?></small></p>
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-10 col-md-9 col-lg-10 pt-4">

                            <div class="form-group row  justify-content-center">
                                <label for="password" class="col-md-4 col-form-label"><?php echo e(__("profile.edit.old_password")); ?></label>
                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password"
                                        autocomplete="password" placeholder="************">

                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group row  justify-content-center">
                                <label for="new_password" class="col-md-4 col-form-label"><?php echo e(__("profile.edit.new_password")); ?></label>
                                <div class="col-md-6">
                                    <input id="new_password" type="password"
                                        class="form-control <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        name="new_password" autocomplete="new-new_password">

                                    <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="form-group row  justify-content-center">
                                <label for="confirm_password"
                                    class="col-md-4 col-form-label"><?php echo e(__("profile.edit.confirm_password")); ?></label>
                                <div class="col-md-6">
                                    <input id="confirm_password" type="password"
                                        class="form-control <?php $__errorArgs = ['confirm_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        name="confirm_password" autocomplete="new-password">
                                    <?php $__errorArgs = ['confirm_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 col-lg-2 "></div>
                    </div>
                    <hr class="p-1 mt-5">
                </div>
                <div class="col-12 col-sm-6 content text-left"><button type="button" data-toggle="modal"
                        data-target="#delete_model" class="btn btn-light mt-4 mb-3"><?php echo e(__("profile.edit.delete")); ?></button></div>
                <div class="col-12 col-sm-6 content text-right"><button type="submit"
                        class="btn btn-primary mt-4 mb-3"><?php echo e(__("profile.edit.save")); ?></button></div>
            </div>
        </div>
    </form>

    
    <div id="delete_model" tabindex="-1" role="dialog" aria-labelledby="delete_modelTitle" class="modal fade"
        aria-modal="true">
        <div role="document" class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-body">
                    <p class="pt-2 mb-0"><?php echo e(__("profile.edit.help.confirm_delete")); ?></p>
                    <p class="pb-2 small text-muted"><?php echo e(__("profile.edit.help.confirm_delete_note")); ?></p>
                    <div class="container">
                        <div class="row">
                            <div class="col-12 pb-2 border-top">
                                <form action="/user/<?php echo e($user->id); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('delete'); ?>
                                    <button type="submit"
                                        class="btn btn-light w-100 bg-white border-0 text-danger"><?php echo e(__("profile.edit.delete")); ?></button>
                                </form>

                            </div>
                            <div class="col-12 pb-2 border-top"><button type="button" data-dismiss="modal"
                                    class="btn btn-light w-100 bg-white border-0"><?php echo e(__("profile.edit.cancel")); ?></button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\RicRib\Desktop\Projects\Fiesta\TheNoche\resources\views/users/edit.blade.php ENDPATH**/ ?>