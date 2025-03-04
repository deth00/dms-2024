<div>

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ໜ້າຫຼັກ</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ຂາເຂົ້າ-ຂາອອກ</a></li>
                        <li class="breadcrumb-item active">ເພີ່ມເອກະສານຂາເຂົ້າ-ຂາອອກ</li>
                    </ol>
                </div>
                <h4 class="page-title">ເພີ່ມເອກະສານຂາເຂົ້າ-ຂາອອກ</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">ເລກທີເອກະສານ</span>
                                            </div>
                                            <input type="text" id="example-input1-group1"
                                                name="example-input1-group1" class="form-control"
                                                placeholder="ປ້ອນເລກທີເອກະສານ" wire:model="doc_no">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">ວັນທີເອກະສານ</span>
                                            </div>
                                            <input type="date" id="example-input1-group1"
                                                name="example-input1-group1" class="form-control" wire:model="doc_date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" style="display: <?php echo e($hiddenType1); ?>">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">ເລກທີ</span>
                                            </div>
                                            <input type="text" id="example-input1-group1"
                                                name="example-input1-group1"
                                                class="form-control <?php $__errorArgs = ['no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                placeholder="ເລກທີ" wire:model="no">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" style="display: <?php echo e($hiddenType1); ?>">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">ວັນທີເອກະສານ</span>
                                            </div>
                                            <input type="date" id="example-input1-group1"
                                                name="example-input1-group1"
                                                class="form-control <?php $__errorArgs = ['date_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                wire:model="date_no">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">ຫົວຂໍ້ເອກະສານ</span>
                                            </div>
                                            <input type="text" id="example-input1-group1"
                                                name="example-input1-group1"
                                                class="form-control <?php $__errorArgs = ['doc_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                placeholder="ຫົວຂໍ້ເອກະສານ" wire:model="doc_title">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" wire:ignore>
                                        <select class="form-control select2-multiple" multiple="multiple"
                                            data-placeholder="ເລືອກປະເພດເອກະສານ" id="cate"
                                            wire:model="docgroup_id">
                                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $doc_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($item['id']); ?>"><?php echo e($item['name']); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                        </select>
                                    </div>
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['docgroup_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span style="color: red" class="error"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                                </div>

                                <div class="col-md-6" >
                                    <div wire:key="select-field-model-version-<?php echo e($refresh_dpart); ?>"></div>
                                    <div class="form-group" wire:ignore>
                                        <select class="form-control select2-multiple" multiple="multiple"
                                            style="width: 100%" data-placeholder="ເລືອກພາກສ່ວນພາຍໃນ" id="dpart"
                                            wire:model="dpart_id">
                                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $doc_dpart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($item['id']); ?>"><?php echo e($item['name']); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                        </select>
                                    </div>
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['dpart_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span style="color: red" class="error"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group" wire:ignore>
                                        <select class="form-control select2-multiple" multiple="multiple"
                                            data-placeholder="ເລືອກຕູ້ເອກະສານ" id="sheft" wire:model="sh_id">
                                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $doc_sheft; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($item['id']); ?>"><?php echo e($item['name']); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                        </select>
                                    </div>
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['sh_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span style="color: red" class="error"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" wire:ignore>
                                        <select class="form-control select2-multiple" multiple="multiple"
                                            data-placeholder="ເລືອກໂກໂລໂນ" id="dock" wire:model="k_id">
                                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $doc_dock; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($item['id']); ?>"><?php echo e($item['name']); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                        </select>
                                    </div>
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['k_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span style="color: red" class="error"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">ໝາຍເຫດ</span>
                                            </div>
                                            <input type="text" id="example-input1-group1"
                                                name="example-input1-group1" class="form-control"
                                                placeholder="ໝາຍເຫດ" wire:model="note">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 my-2">
                                    <div class="form-group" wire:ignore>
                                        <p>ຟາຍເອກະສານ</p>
                                        <input type="file" class="filestyle" wire:model="file">
                                        <div wire:loading wire:target="file">ອັບໂຫຼດ...</div>
                                    </div>
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span style="color: red" class="error"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-success" wire:click="store">ບັນທຶກ</button>
                    <a href="<?php echo e(route('document-secret')); ?>" class="btn btn-danger">ກັບຄືນ</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
    <!-- Init js-->
    <!-- <script src="<?php echo e(asset('backend/assets/js/pages/form-advanced.init.js')); ?>"></script> -->
    <script>
        $(function() {
            $("#inbox").select2({
                maximumSelectionLength: 1,
                width: 'resolve'
            });
            $('#inbox').on('change', function(e) {
                var data = $('#inbox').select2("val");
                window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('mss_user', data);
            });
            $("#tag_depart").select2({
                width: 'resolve'
            });
            $('#tag_depart').on('change', function(e) {
                var data = $('#tag_depart').select2("val");
                window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('tag_depart', data);
            });
            $("#tag_sector").select2({
                width: 'resolve'
            });
            $('#tag_sector').on('change', function(e) {
                var data = $('#tag_sector').select2("val");
                window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('tag_sector', data);
            });
            $("#tag_alone").select2({
                width: 'resolve'
            });
            $('#tag_alone').on('change', function(e) {
                var data = $('#tag_alone').select2("val");
                window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('tag_user', data);
            });
            $("#dock").select2({
                maximumSelectionLength: 1,
                width: 'resolve'
            });
            $('#dock').on('change', function(e) {
                var data = $('#dock').select2("val");
                window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('k_id', data);
            });
            $("#dpart").select2({
                maximumSelectionLength: 1,
                width: 'resolve'
            });
            $('#dpart').on('change', function(e) {
                var data = $('#dpart').select2("val");
                window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('dpart_id', data);
            });
            $("#docdpart").select2({
                maximumSelectionLength: 1,
                width: 'resolve'
            });
            $('#docdpart').on('change', function(e) {
                var data = $('#docdpart').select2("val");
                window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('doc_dpart_id', data);
            });
            $("#sheft").select2({
                maximumSelectionLength: 1,
                width: 'resolve'
            });
            $('#sheft').on('change', function(e) {
                var data = $('#sheft').select2("val");
                window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('sh_id', data);
            });
            $("#cate").select2({
                maximumSelectionLength: 1,
                width: 'resolve'
            });
            $('#cate').on('change', function(e) {
                var data = $('#cate').select2("val");
                window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('docgroup_id', data);
            });

            $("#ori").select2({
                maximumSelectionLength: 1,
                width: 'resolve'
            });
            $('#ori').on('change', function(e) {
                var data = $('#ori').select2("val");
                window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('ori_id', data);
            });
        });

        Livewire.on('g_id', postId => {
            jQuery(document).ready(function() {
                $("#inbox").select2({
                    maximumSelectionLength: 1,
                    width: 'resolve'
                });
                $('#inbox').on('change', function(e) {
                    var data = $('#inbox').select2("val");
                    window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('mss_user', data);
                });
                $("#tag_depart").select2({
                    width: 'resolve'
                });
                $('#tag_depart').on('change', function(e) {
                    var data = $('#tag_depart').select2("val");
                    window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('tag_depart', data);
                });
                $("#tag_sector").select2({
                    width: 'resolve'
                });
                $('#tag_sector').on('change', function(e) {
                    var data = $('#tag_sector').select2("val");
                    window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('tag_sector', data);
                });
                $("#tag_alone").select2({
                    width: 'resolve'
                });
                $('#tag_alone').on('change', function(e) {
                    var data = $('#tag_alone').select2("val");
                    window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('tag_user', data);
                });
                $("#dpart").select2({
                    maximumSelectionLength: 1,
                    width: 'resolve'
                });
                $('#dpart').on('change', function(e) {
                    var data = $('#dpart').select2("val");
                    window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('dpart_id', data);
                });
            });
            $("#docdpart").select2({
                maximumSelectionLength: 1,
                width: 'resolve'
            });
            $('#docdpart').on('change', function(e) {
                var data = $('#docdpart').select2("val");
                window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('doc_dpart_id', data);
            });
        })
    </script>
<?php $__env->stopPush(); ?>

<?php /**PATH D:\Project\Web\Font-End\dms-2024\resources\views/livewire/document/secret/secret-edit-component.blade.php ENDPATH**/ ?>