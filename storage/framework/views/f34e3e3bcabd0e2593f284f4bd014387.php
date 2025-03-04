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

    <div class="row">
        <div class="col-4">
            <!--[if BLOCK]><![endif]--><?php if(!empty($data_role['viewGroup-add'])): ?>
                <div class="card">
                    <!--[if BLOCK]><![endif]--><?php if($editId): ?>
                        <div class="card-header bg-warning py-3 text-white">
                            <h5 class="card-title mb-0 text-white"><i class="mdi mdi-pencil-remove-outline"></i>
                                ແກ້ໄຂຂໍ້ມູນ
                            </h5>
                        </div>
                    <?php else: ?>
                        <div class="card-header bg-info py-3 text-white">
                            <h5 class="card-title mb-0 text-white"><i class="mdi mdi-plus"></i> ເພີ່ມຂໍ້ມູນ </h5>
                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    <div id="cardCollpase1" class="collapse show">
                        <div wire:ignore.self>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <p>ຊື່ກຸ່ມ</p>
                                            <input type="text"
                                                class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                wire:model="name" placeholder="ຊື່ກຸ່ມ" wire:keydown.enter="store"
                                                require>
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
                                </div>
                            </div>
                            <div class="card-footer">

                                <!--[if BLOCK]><![endif]--><?php if($editId): ?>
                                    <button class="btn btn-warning" wire:click="store">ອັບເດດ</button>
                                <?php else: ?>
                                    <button class="btn btn-success" wire:click="store">ບັນທຶກ</button>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                <a href="<?php echo e(route('group')); ?>" class="btn btn-danger">ລ້າງຂໍ້ມູນ</a>

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
                                <td style="vertical-align: center;" class="text-right">ສະແດງ &emsp;</td>
                                <td>
                                    <select wire:model="dataQ" wire:click="dataQS" name="Q" id="Q"
                                        class="form-control">
                                        <option value="0">0</option>
                                        <option value="15">15</option>/
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                        <option value="999999999">ທັງໝົດ</option>
                                    </select>
                                    <!-- <input type="number" wire:model="dataQ" name="dataQ" id="dataQ" class="form-control col-12"> -->
                                </td>
                                <td style="vertical-align: center;"><span>&emsp; ລາຍການ</span></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-4">

                    </div>

                    <div class="col-4">
                        <input type="text" name="search" id="search" wire:model="search" class="form-control"
                            placeholder="ຄົ້ນຫາ">
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
                                            <th class="p-2"> ຊື່ກຸ່ມ </th>
                                            <!--[if BLOCK]><![endif]--><?php if(!empty($data_role['viewGroup-edit']) || !empty($data_role['viewGroup-edit'])): ?>
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
                                                <td class="p-2"><?php echo e($item['name']); ?></td>

                                                <!--[if BLOCK]><![endif]--><?php if(!empty($data_role['viewGroup-edit']) || !empty($data_role['viewGroup-edit'])): ?>
                                                    <td class="p-2">
                                                        <div class="btn-group btn-group-justified text-white mb-2">
                                                            <?php if(!empty($data_role['viewGroup-edit'])): ?>
                                                                <a class="btn btn-warning waves-effect waves-light"
                                                                    wire:click="edit(<?php echo e($item['id']); ?>)"><i
                                                                        class="mdi mdi-pencil-remove-outline"></i></a>
                                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                            <?php if(!empty($data_role['viewGroup-edit'])): ?>
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
        window.addEventListener('show-del', event => {
            $('#custom-modal').modal('show');
        })
        window.addEventListener('show-del', event => {
            $('#custom-modal').modal('hide');
        })
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\Project\Web\Font-End\dms-2024\resources\views/livewire/settings/group-component.blade.php ENDPATH**/ ?>