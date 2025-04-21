<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ໜ້າຫຼັກ</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ຕັ້ງຄ່າ</a></li>
                        <li class="breadcrumb-item active">ຂໍ້ມູນກຸ່ມ</li>
                    </ol>
                </div>
                <h4 class="page-title">ຂໍ້ມູນກຸ່ມ</h4>
            </div>
        </div>
    </div>
    <!--[if BLOCK]><![endif]--><?php if(!empty($data_CK0['CK-add'])): ?>
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-primary">
                    <h5 class="card-title mb-0 text-white" wire:click="add"><i class="mdi mdi-plus"></i>
                        ເພີ່ມກຸ່ມ </h5>
                </button>

            </div>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    <div class="row">
        <div class="col-12">
            <div class="table-rep-plugin">
                <div class="table-responsive mb-0" data-pattern="priority-columns">
                    <br>
                    <table border="2" width="100%">
                        <thead>
                            <tr class="text-center">
                                <th class="p-2"> ລຳດັບ </th>
                                <th class="p-2"> ຊື່ </th>
                                <th class="p-2"> ສະຖານະ </th>
                                <!--[if BLOCK]><![endif]--><?php if(!empty($data_CK0['R-edit']) || !empty($data_CK0['R-del'])): ?>
                                    <th class="p-2">
                                        ປຸ່ມກົດ </th>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $data_tt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="text-center">
                                    <td class="p-2"><?php echo e($no++); ?></td>
                                    <td class="p-2"><?php echo e($item['name']); ?></td>
                                    <td class="p-2">
                                        <!--[if BLOCK]><![endif]--><?php if($item['status'] == 'N'): ?>
                                            <span class="badge badge-success">ເປີດໃຊ້</span>
                                        <?php else: ?>
                                            <span class="badge badge-danger">ປີດໃຊ້</span>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    </td>
                                    <!--[if BLOCK]><![endif]--><?php if(!empty($data_CK0['R-edit']) || !empty($data_CK0['R-del'])): ?>
                                        <td class="p-2">
                                            <div class="btn-group btn-group-justified text-white mb-2">
                                                <?php if(!empty($data_CK0['R-edit'])): ?>
                                                    <a class="btn btn-warning waves-effect waves-light"
                                                        wire:click="edit(<?php echo e($item['id']); ?>)"><i
                                                            class="mdi mdi-pencil-remove-outline"></i></a>
                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                <!--[if BLOCK]><![endif]--><?php if(!empty($data_CK0['R-del'])): ?>
                                                    <a class="btn btn-danger waves-effect waves-light"
                                                        wire:click="delete(<?php echo e($item['id']); ?>)"><i
                                                            class="mdi mdi-window-close"></i></a>
                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                            </div>
                                        </td>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr class="text-center">
                                    <td colspan="8" style="color: #787878;" class="p-2">ບໍ່ມີຂໍ້ມູນ
                                    </td>
                                </tr>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-4">
            <!--[if BLOCK]><![endif]--><?php if(!empty($data_CK0['R-add'])): ?>
                <div class="card">

                    <div class="card-header bg-info py-3 text-white">
                        <h5 class="card-title mb-0 text-white"><i class="mdi mdi-plus"></i> ເພີ່ມສະມາຊິກ </h5>
                    </div>

                    <div id="cardCollpase1" class="collapse show">
                        <div wire:ignore.self>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group" wire:ignore>
                                            <select class="form-control select2" data-placeholder="ເລືອກກຸ່ມ"
                                                id="tm_id" wire:model="tm_id">
                                                <option value="0">ເລືອກ ກຸ່ມ</option>
                                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $data_team; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($item['id']); ?>"><?php echo e($item['name']); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                            </select>
                                        </div>
                                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['tm_id'];
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
                                        <div class="form-group" wire:ignore>
                                            <select class="form-control select2" data-placeholder="ເລືອກພະແນກ || ສາຂາ"
                                                id="dpart_id" wire:model="dpart_id">
                                                <option value="0">ເລືອກພະແນກ || ສາຂາ</option>
                                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $departs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select class="form-control select2-multiple" multiple="multiple"
                                                data-placeholder="ເລືອກ" id="user_id" wire:model="user_id">
                                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $data_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($item['id']); ?>"><?php echo e($item['emp_name']); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                            </select>
                                        </div>
                                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['user_id'];
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
                            <div class="card-footer">


                                <button class="btn btn-success" wire:click="store">ບັນທຶກ</button>


                                <a href="<?php echo e(route('document-secret-role')); ?>" class="btn btn-danger">ລ້າງຂໍ້ມູນ</a>

                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
        <div class="col-sm-8">
            <div class="card-box">

                <div class="row">
                    <div class="col-3">
                        <table width="100%">
                            <tr>
                                <td>
                                    <select class="form-control select2" data-placeholder="ເລືອກກຸ່ມ" id="group_id"
                                        wire:model="dpart_id">
                                        
                                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $data_tt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item['id']); ?>"><?php echo e($item['name']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                    </select>
                                </td>

                            </tr>
                        </table>
                    </div>
                    <div class="col-4">

                    </div>

                    <div class="col-4">
                        <input type="text" name="search" id="search" wire:model="search"
                            class="form-control" placeholder="ຄົ້ນຫາ">
                    </div>
                    <div class="col-1 ">
                        <button type="button" class="btn btn-primary" wire:click="searchData">
                            <i class="mdi mdi-file-search-outline"></i>
                        </button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="table-rep-plugin">
                            <div class="table-responsive mb-0" data-pattern="priority-columns">
                                <br>
                                <table border="2" width="100%">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="p-2"> ລຳດັບ </th>
                                            <th class="p-2"> ຊື່ </th>
                                            <th class="p-2"> ພະແນກ </th>
                                            <th class="p-2"> ກຸ່ມ </th>
                                            <!--[if BLOCK]><![endif]--><?php if(!empty($data_CK0['R-edit']) || !empty($data_CK0['R-del'])): ?>
                                                <th class="p-2">
                                                    ປຸ່ມກົດ </th>
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr class="text-center">
                                                <td class="p-2"><?php echo e($no++); ?></td>
                                                <td class="p-2"><?php echo e($item['emp_name']); ?></td>
                                                <td class="p-2"><?php echo e($item['dname']); ?></td>
                                                <td class="p-2"><?php echo e($item['tname']); ?></td>
                                                <!--[if BLOCK]><![endif]--><?php if(!empty($data_CK0['R-edit']) || !empty($data_CK0['R-del'])): ?>
                                                    <td class="p-2">
                                                        <div class="btn-group btn-group-justified text-white mb-2">
                                                            
                                                            <!--[if BLOCK]><![endif]--><?php if(!empty($data_CK0['R-del'])): ?>
                                                                <a class="btn btn-danger waves-effect waves-light"
                                                                    wire:click="delete(<?php echo e($item['id']); ?>)"><i
                                                                        class="mdi mdi-window-close"></i></a>
                                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                        </div>
                                                    </td>
                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr class="text-center">
                                                <td colspan="8" style="color: #787878;" class="p-2">ບໍ່ມີຂໍ້ມູນ
                                                </td>
                                            </tr>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <span><br> ລວມທັງໝົດ <span class="text-danger"><?php echo e($count); ?></span> ລາຍການ</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self id="modal-add" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title mt-0 text-white">ເພີ່ມຂໍ້ມູນ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 my-2">
                            <p>ຫົວຂໍ້</p>
                            <input type="text" class="form-control" placeholder="ຫົວຂໍ້" wire:model="name">
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['name'];
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
                    <div class="form-group" wire:ignore>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">ປິດ</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light"
                        wire:click="storeTeam">ເພີ່ມຂໍ້ມູນ</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div wire:ignore.self id="modal-edit" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title mt-0 text-white">ເເກ້ໄຂຂໍ້ມູນ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 my-2">
                            <p>ຫົວຂໍ້</p>
                            <input type="text" class="form-control" placeholder="ຫົວຂໍ້" wire:model="name">
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['name'];
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
                    <div class="row">

                        <div class="col-md-12 my-2">
                            <p>ສະຖານະ</p>
                            <div class="form-check">
                                <input wire:model="status" value="N" class="form-check-input" type="radio"
                                    name="exampleRadios" id="exampleRadios1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    ເປີດໃຊ້ງານ
                                </label>
                            </div>
                            <div class="form-check">
                                <input wire:model="status" value="F" class="form-check-input" type="radio"
                                    name="exampleRadios" id="exampleRadios2" value="option2">
                                <label class="form-check-label" for="exampleRadios2">
                                    ປິດໃຊ້ງານ
                                </label>
                            </div>

                        </div>
                    </div>
                    <div class="form-group" wire:ignore>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">ປິດ</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light"
                        wire:click="updateTeam">ບັນທຶກ</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div id="custom-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title mt-0 text-white">ລົບຂໍ້ມູນ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3><b>ທ່ານຕ້ອງການລົບຂໍ້ມູນນີ້ ຫຼື ບໍ່ ?</b></h3>
                    <p>ລາຍລະອຽດ: <span class="text-danger"><?php echo e($delName); ?></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">ປິດ</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light"
                        wire:click="destroy">ລົບຂໍ້ມູນ</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        window.addEventListener('show-add', event => {
            $('#modal-add').modal('show');
        })
        window.addEventListener('hide-add', event => {
            $('#modal-add').modal('hide');
        })
        window.addEventListener('show-edit', event => {
            $('#modal-edit').modal('show');
        })
        window.addEventListener('hide-edit', event => {
            $('#modal-edit').modal('hide');
        })
        window.addEventListener('show-del', event => {
            $('#custom-modal').modal('show');
        })
        window.addEventListener('show-del', event => {
            $('#custom-modal').modal('hide');
        })
        $(function() {

            $("#tm_id").select2({
                // maximumSelectionLength: 1,
                width: 'resolve'
            });
            $('#tm_id').on('change', function(e) {
                var data = $('#tm_id').select2("val");
                window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('tm_id', data);
            });
            $("#dpart_id").select2({
                // maximumSelectionLength: 1,
                width: 'resolve'
            });
            $('#dpart_id').on('change', function(e) {
                var data = $('#dpart_id').select2("val");
                window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('dpart_id', data);
            });
            $("#group_id").select2({
                // maximumSelectionLength: 1,
                width: 'resolve'
            });
            $('#group_id').on('change', function(e) {
                var data = $('#group_id').select2("val");
                window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('group_id', data);
            });
        });
        Livewire.on('g_id', postId => {
            jQuery(document).ready(function() {
                $("#user_id").select2({
                    maximumSelectionLength: 10,
                    width: 'resolve'
                });
                $('#user_id').on('change', function(e) {
                    var data = $('#user_id').select2("val");
                    window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('user_id', data);
                });
                $("#group_id").select2({
                    // maximumSelectionLength: 1,
                    width: 'resolve'
                });
                $('#group_id').on('change', function(e) {
                    var data = $('#group_id').select2("val");
                    window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('group_id', data);
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\Project\Web\dms-2024\resources\views/livewire/document/secret/secret-roled-component.blade.php ENDPATH**/ ?>