<div>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ໜ້າຫຼັກ</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ຂໍ້ມູນໃຊ້ງານລະບົບ</a></li>
                        <li class="breadcrumb-item active">ໂປຣຟາຍ</li>
                    </ol>
                </div>
                <h4 class="page-title">ໂປຣຟາຍ</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
                        <div class="text-center card-box shadow-none border border-secoundary">
                            <div class="member-card">
                                <div class="avatar-xl member-thumb mb-3 mx-auto d-block">

                                    <!--[if BLOCK]><![endif]--><?php if($profile): ?>
                                    <img src="<?php echo e(asset($profile->temporaryUrl())); ?>" class="rounded-circle img-thumbnail"
                                        alt="profile-image">
                                    <i class="mdi mdi-star-circle member-star text-success" title="verified user"></i>
                                    <?php elseif($profiles): ?>
                                    <img src="<?php echo e(asset('https://192.168.128.193:8443/'.$profiles)); ?>"
                                        class="rounded-circle img-thumbnail" alt="profile-image">
                                    <?php else: ?>
                                    <img src="<?php echo e(asset('backend/assets/images/users/avatar-1.jpg')); ?>"
                                        class="rounded-circle img-thumbnail" alt="profile-image">
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                </div>

                                <div class="">
                                    <h5 class="font-18 mb-1"><?php echo e($username); ?></h5>
                                </div>

                                <div class="form-group" wire:ignore>
                                    <p>ອັບໂຫຼດຮູບພາບ</p>
                                    <input type="file" class="filestyle" wire:model="profile">
                                </div>

                                <hr>


                                <div class="row">
                                    <div class="col-6 text-right">
                                        <span class="text-muted font-13"><strong>ຊື່ເຂົ້າໃຊ້ງານ :</strong> </span>
                                    </div>
                                    <div class="col-6 text-left">
                                        <span class="ml-4 font-13"><?php echo e($username); ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 text-right">
                                        <span class="text-muted font-13"><strong>ອີເມວ :</strong></span>
                                    </div>
                                    <div class="col-6 text-left">
                                        <span class="ml-4 font-13"><?php echo e($emails); ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 text-right">
                                        <span class="text-muted font-13"><strong>ເບີໂທລະສັບ :</strong></span>
                                    </div>
                                    <div class="col-6 text-left">
                                        <span class="ml-4 font-13"><?php echo e($phone); ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 text-right">
                                        <span class="text-muted font-13"><strong>ລະຫັດຜ່ານ :</strong> </span>
                                    </div>
                                    <div class="col-6 text-left">
                                        <span class="ml-4 font-13">******</span>
                                    </div>
                                </div>

                                <ul class="social-links list-inline mt-4">
                                    <li class="list-inline-item">
                                        <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#"
                                            data-original-title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#"
                                            data-original-title="Twitter"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#"
                                            data-original-title="Skype"><i class="fab fa-skype"></i></a>
                                    </li>
                                </ul>

                            </div>

                        </div>
                        <!-- end card-box -->

                    </div>
                    <!-- end col -->

                    <div class="col-xl-8 col-lg-6 col-md-12 col-sm-12">

                        <div class="text-center">
                            <h5 class="header-title">ຂໍ້ມູນໂປຣຟາຍ</h5>
                            <hr>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <p>ຊື່ພາສາອັງກິດ</p>
                                    <input type="text" class="form-control" wire:model="name"
                                        placeholder="ຊື່ພາສາອັງກິດ">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <p>ລະຫັດຜ່ານ</p>
                                    <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        wire:model="password" placeholder="ລະຫັດຜ່ານ">
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color: red"
                                        class="error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <p>ຢືນຢັນລະຫັດຜ່ານ</p>
                                    <input type="password"
                                        class="form-control <?php $__errorArgs = ['confirm_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        wire:model="confirm_password" placeholder="ຢືນຢັນລະຫັດຜ່ານ">
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['confirm_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color: red"
                                        class="error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <p>ເບີໂທລະສັບ <span class="text-danger">*</span></p>
                                    <input type="text" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        wire:model="phone" placeholder="ເບີໂທລະສັບ">
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color: red"
                                        class="error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <p>ອີເມວ <span class="text-danger">*</span></p>
                                    <input type="text" class="form-control <?php $__errorArgs = ['emails'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        wire:model="emails" placeholder="ອີເມວ" disabled>
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color: red"
                                        class="error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">

                                <center>
                                    <button class="btn btn-warning phetsarath-font items-center"
                                        wire:click="store">ແກ້ໄຂໂປຣຟາຍ</button>
                                </center>

                            </div>
                        </div>

                    </div>
                    <!-- end col -->

                </div>
            </div>
        </div>
    </div>
    <!-- End row -->
</div><?php /**PATH D:\Project\Web\dms-2024\resources\views/livewire/auth/profile-component.blade.php ENDPATH**/ ?>