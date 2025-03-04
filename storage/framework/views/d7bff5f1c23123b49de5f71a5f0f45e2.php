<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ໜ້າຫຼັກ</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ເອກະສານທົ່ວລະບົບ</a></li>
                        <li class="breadcrumb-item active">ແຈ້ງການທົ່ວລະບົບ</li>
                    </ol>
                </div>
                <h4 class="page-title">ແຈ້ງການທົ່ວລະບົບ</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <!--[if BLOCK]><![endif]--><?php if(!empty($data_role['ViewWide2-add'])): ?>
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
                                            <th class="p-2">ລຳດັບ123</th>
                                            <th class="p-2">ວັນທີ</th>
                                            <th class="p-2">ຫົວຂໍ້</th>
                                            <th class="p-2">ຈາກພາກສ່ວນ</th>
                                            <th class="p-2">ການເຂົ້າເຖິງ</th>
                                            <th class="p-2">ປູ່ມຄຳສັ່ງ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr class="text-center">
                                                <td class="p-2"><?php echo e($no++); ?></td>
                                                <td class="p-2"><?php echo e(date('d/m/Y', strtotime($item['date']))); ?></td>
                                                <td class="text-left px-3"><?php echo e($item['title']); ?></td>
                                                <td class="p-2"><?php echo e($item['name']); ?></td>
                                                <td class="p-2"><button class="btn btn-primary"
                                                        wire:click="view(<?php echo e($item['id']); ?>)"><i
                                                            class="mdi mdi-eye-circle-outline"></i></button></td>
                                                <td class="p-2">
                                                    <div class="btn-group btn-group-justified text-white mb-2">
                                                        <!--[if BLOCK]><![endif]--><?php if(!empty($data_role['ViewWide2-edit'])): ?>
                                                            <a class="btn btn-warning waves-effect waves-light"
                                                                wire:click="edit(<?php echo e($item['id']); ?>)"><i
                                                                    class="mdi mdi-pencil-remove-outline"></i></a>
                                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                        <!--[if BLOCK]><![endif]--><?php if(!empty($data_role['ViewWide2-del'])): ?>
                                                            <a class="btn btn-danger waves-effect waves-light"
                                                                wire:click="delete(<?php echo e($item['id']); ?>)"><i
                                                                    class="mdi mdi-window-close"></i></a>
                                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                        <a class="btn btn-info waves-effect waves-light"><i
                                                                class="mdi mdi-send-circle"></i></a>
                                                    </div>
                                                </td>
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
                        <span><br> ລວມຫຼັກຊັບທັງໝົດ <span class="text-danger"><?php echo e($count); ?></span> ລາຍການ</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- add -->
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
                            <div class="form-group" wire:ignore>
                                <p>ປະເພດເອກະສານ</p>
                                <select class="form-control" id="docgroup" width="100%" style="width: 100%;"
                                    wire:model="docgroup_id">
                                    <option>ເລືອກປະເພດ</option>
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $docgroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                        <div class="col-md-12 my-2">
                            <p>ເລກທີເອກະສານ</p>
                            <input type="text" class="form-control" placeholder="ເລກທີເອກະສານ"
                                wire:model="doc_no">
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['doc_no'];
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
                        <div class="col-md-12 my-2">
                            <p>ວັນທີເອກະສານ</p>
                            <input type="date" class="form-control" wire:model="valuedt">
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['valuedt'];
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
                        <div class="col-md-12 my-2">
                            <div class="form-group" wire:ignore>
                                <form wire:submit.prevent="store" method="post">
                                    <p>ຟາຍເອກະສານ</p>
                                    <input type="file" class="filestyle" wire:model="file">
                                    <div wire:loading wire:target="file">ອັບໂຫຼດ...</div>
                                </form>
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
                <div class="modal-header bg-warning">
                    <h5 class="modal-title mt-0 text-white">ແກ້ໄຂຂໍ້ມູນ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 my-2">
                            <div class="form-group" wire:ignore>
                                <p>ປະເພດເອກະສານ</p>
                                <select class="form-control" id="docgroup-edit" width="100%" style="width: 100%;"
                                    wire:model="docgroup_id">
                                    <option>ເລືອກປະເພດ</option>
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $docgroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                        <div class="col-md-12 my-2">
                            <p>ເລກທີເອກະສານ</p>
                            <input type="text" class="form-control" placeholder="ເລກທີເອກະສານ"
                                wire:model="doc_no">
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['doc_no'];
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
                        <div class="col-md-12 my-2">
                            <p>ວັນທີເອກະສານ</p>
                            <input type="date" class="form-control" wire:model="valuedt">
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['valuedt'];
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
                        <div class="col-md-12 my-2">
                            <div class="form-group" wire:ignore>
                                <form wire:submit.prevent="store" method="post">
                                    <p>ຟາຍເອກະສານ</p>
                                    <input type="file" class="filestyle" wire:model="file">
                                    <div wire:loading wire:target="file">ອັບໂຫຼດ...</div>
                                </form>
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
                    <div class="form-group" wire:ignore>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">ປິດ</button>
                    <button type="button" class="btn btn-warning waves-effect waves-light"
                        wire:click="update">ອັບເດດຂໍ້ມູນ</button>
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


    <div wire:ignore.self class="modal fade" id="modal-view" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="exampleModalLabel">ຂໍ້ມູນຜູ້ຮັບເອກະສານ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr style="text-align: center">
                                    <th>ລະດັບ</th>
                                    <th>ວັນທີສ້າງ</th>
                                    <th>ຊື່ເອກະສານ</th>
                                    <th>ຊື່ຜູ້ຮັບເອກະສານ</th>
                                    <th>ວັນທີໂຫຼດລ່າສຸດ</th>
                                    <th>ຈຳນວນດາວໂຫຼດ</th>
                                    <th>ສະຖານະ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $stt = 1; ?>
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $arr_view_docc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td style="text-align: center"><?php echo e($stt++); ?></td>
                                        <td style="text-align: center">
                                            <?php echo e(date('d/m/Y H:i:s', strtotime($item['create_data']))); ?></td>
                                        <td style="text-align: center"><?php echo e($item['title']); ?></td>
                                        <td style="text-align: center"><?php echo e($item['username']); ?></td>
                                        <td style="text-align: center">
                                            <!--[if BLOCK]><![endif]--><?php if($item['del'] == 1): ?>
                                                <?php echo e(date('d/m/Y H:i:s', strtotime($item['update_data']))); ?>

                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                        </td>
                                        <td style="text-align: center"><?php echo e($item['count']); ?></td>
                                        <td style="text-align: center">
                                            <!--[if BLOCK]><![endif]--><?php if($item['del'] == 0): ?>
                                                <span class="badge badge-danger">ຍັງບໍ່ທັນດາວໂຫຼດ</span>
                                            <?php else: ?>
                                                <span class="badge badge-success">ດາວໂຫຼດສຳເລັດ</span>
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                        </td>

                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ປິດ</button>
                    <!-- <button wire:click="destroy" type="button" data-dismiss="modal" class="btn btn-danger">ຕົກລົງ</button> -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        window.addEventListener('show-view', event => {
            $('#modal-view').modal('show');
        })
        window.addEventListener('show-add', event => {
            $('#modal-add').modal('show');
        })
        window.addEventListener('hide-add', event => {
            $('#modal-add').modal('hide');
        })
        window.addEventListener('show-edit', event => {
            $('#modal-edit').modal('show');

            jQuery(document).ready(function() {
                $('#docgroup-edit').select2();
                $('#docgroup-edit').on('change', function(e) {
                    var data = $('#docgroup-edit').select2("val");
                    window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('docgroup_id', data);
                });
            });
        })
        window.addEventListener('hide-edit', event => {
            $('#modal-edit').modal('hide');
        })
        window.addEventListener('show-del', event => {
            $('#modal-del').modal('show');
        })
        window.addEventListener('show-del', event => {
            $('#modal-del').modal('hide');
        })

        $(document).ready(function() {
            $('#docgroup').select2();
            $('#docgroup').on('change', function(e) {
                var data = $('#docgroup').select2("val");
                window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('docgroup_id', data);
            });
        });

        Livewire.on('g_id', postId => {
            jQuery(document).ready(function() {
                $('#docgroup').select2();
                $('#docgroup').on('change', function(e) {
                    var data = $('#docgroup').select2("val");
                    window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('docgroup_id', data);
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\Project\Web\Font-End\dms-2024\resources\views/livewire/docc-component.blade.php ENDPATH**/ ?>