<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ໜ້າຫຼັກ</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ເອກະສານ ສະເພາະ</a></li>
                        
                    </ol>
                </div>
                
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <!--[if BLOCK]><![endif]--><?php if(!empty($data_CK0['CK-add'])): ?>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-primary">
                                <h5 class="card-title mb-0 text-white" wire:click="add"><i class="mdi mdi-plus"></i>
                                    ເພີ່ມຂໍ້ມູນ </h5>
                            </button>
                            <hr>
                        </div>
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
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

                    <div class="col-2">
                        <!-- <input type="date" name="date" id="date" wire:model="dateS" class="form-control"> -->
                    </div>
                    <div class="col-2">
                        <input type="text" name="search" id="search" wire:model="search"
                            wire:keydown.enter="searchData" class="form-control" placeholder="ຄົ້ນຫາ">
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
                                <table border="1" width="100%">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="p-2">ລຳດັບ</th>
                                            <th class="p-2">ຫົວຂໍ້</th>
                                            <th class="p-2">ສະຖານະ</th>
                                            <!--[if BLOCK]><![endif]--><?php if(!empty($data_CK0['CK-edit']) || !empty($data_CK0['CK-del'])): ?>
                                                <th class="p-2">ປູ່ມຄຳສັ່ງ</th>
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr class="text-center" >
                                                <td class="p-2"><?php echo e($no++); ?></td>
                                                <td class="px-3" wire:click="docs(<?php echo e($item['id']); ?>)"><?php echo e($item['name']); ?></td>
                                                <td class="px-3"><?php echo e($item['status']); ?></td>
                                                <!--[if BLOCK]><![endif]--><?php if(!empty($data_CK0['CK-edit']) || !empty($data_CK0['CK-del'])): ?>
                                                    <td class="p-2">
                                                        <div class="btn-group-vertical mb-2">
                                                            <div class="btn-group btn-group-justified text-white mb-2">
                                                                
                                                                <?php if(!empty($data_CK0['CK-edit'])): ?>
                                                                    <a class="btn btn-warning waves-effect waves-light"
                                                                        wire:click="edit(<?php echo e($item['id']); ?>)"><i
                                                                            class="mdi mdi-pencil-remove-outline"></i></a>
                                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                                
                                                            </div>
                                                        </div>
                                                    </td>
                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr>
                                                <td colspan="13" class="text-center p-2">
                                                    ບໍ່ມີຂໍ້ມູນເອກະສານ</td>
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
                        wire:click="store">ເພີ່ມຂໍ້ມູນ</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div wire:ignore.self id="modal-edit" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
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
                    <div class="form-group" wire:ignore>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">ປິດ</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light"
                        wire:click="update">ແກ້ໄຂຂໍ້ມູນ</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <div id="modal-del" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
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
            $('#modal-del').modal('show');
        })
        window.addEventListener('hide-del', event => {
            $('#modal-del').modal('hide');
        })
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\Project\Web\dms-2024\resources\views/livewire/document/secret/secret-teams-component.blade.php ENDPATH**/ ?>