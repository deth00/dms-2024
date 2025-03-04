<div>
    <div class="row">
        <div class="col-md-6 order-md-2">
            <img src="<?php echo e(asset('login/images/logo.jpg')); ?>" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="mb-4">
                        <h1 style="font-family: 'Phetsarath OT';"> <strong>ລະບົບເກັບກຳເອກະສານອອນລາຍ</strong></h1>
                        <p class="mb-4" style="font-size: 20px;font-family: 'Phetsarath OT';">ຈັດການຂໍ້ມູນ ແລະ ຕິດຕາມເອກະສານຂາເຂົ້າ-ຂາອອກ.</p>
                    </div>
                    <div class="form-group first">
                        <label for="username">
                            <h5 class="phetsarath-font">ອີເມວ</h5>
                        </label>
                        <input type="email" class="form-control phetsarath-font <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="username"
                            wire:model="username" wire:keydown.enter="login">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color: red" class="error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                    <div class="form-group last mb-4">
                        <label for="password">
                            <h5 class="phetsarath-font">ລະຫັດຜ່ານ</h5>
                        </label>
                        <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            id="password" wire:model="password" wire:keydown.enter="login">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color: red" class="error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                    <div class="mb-5 align-items-center">
                        <div class="row">
                            <div class="col-md-6">
                            <a href="javascript:void(0)" wire:click="showReset">ລືມລະຫັດຜ່ານ ?</a>
                            </div>
                            <div class="col-md-6 text-right">
                            <a href="javascript:void(0)" class="float-end" style="color: #000;" wire:click="register"> >>> ລົງທະບຽນ <<< </a>
                            </div>
                        </div>
                    </div>
                    <buttom type="submit" class="btn text-white btn-block btn-primary"
                        wire:click="login"> <h5 class="phetsarath-font p-2">ເຂົ້າລະບົບ</h5></buttom>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-reset" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title mt-0 text-white phetsarath-font">ລືມລະຫັດ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="mail">ອີເມວ</label>
                        <input type="text" class="form-control" wire:model="email" placeholder="ກະລຸນາປ້ອນເມວຂອງທ່ານ">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">ປິດ</button>
                    <button type="button" class="btn btn-warning waves-effect waves-light"
                        wire:click="resetPass">ສົ່ງ</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

</div>

<?php $__env->startPush('scripts'); ?>
<script>

    window.addEventListener('show-reset', event => {
        $('#modal-reset').modal('show');
    })

</script>
<?php $__env->stopPush(); ?><?php /**PATH D:\Project\Web\Font-End\dms-2024\resources\views/livewire/auth/login-component.blade.php ENDPATH**/ ?>