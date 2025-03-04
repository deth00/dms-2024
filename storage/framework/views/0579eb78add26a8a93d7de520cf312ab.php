<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ໜ້າຫຼັກ</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ຂາເຂົ້າ-ຂາອອກ</a></li>
                        <li class="breadcrumb-item active"><?php echo e($typename['name']); ?></li>
                    </ol>
                </div>
                <h4 class="page-title"><?php echo e($typename['name']); ?></h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">

                <div class="row">
                    <!--[if BLOCK]><![endif]--><?php if(!empty($data_ho['Ho-add'])): ?>
                        <div class="col-md-3">
                            <a class="btn btn-primary" href="<?php echo e(route('document-hq-create', $hiddenId)); ?>">
                                <h5 class="card-title mb-0 text-white"><i class="mdi mdi-plus"></i>
                                    ເພີ່ມເອກະສານ </h5>
                            </a>
                            <hr>
                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>

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
                                            <th class="p-2">#</th>
                                            <th class="p-2">ລຳດັບ</th>
                                            <th class="p-2">ວັນທີ</th>
                                            <th class="p-2">ເລກທີ</th>
                                            <th class="p-2">ຫົວຂໍ້</th>
                                            <!--[if BLOCK]><![endif]--><?php if($hiddenId == 1 || $hiddenId == 3): ?>
                                                <th class="p-2">ວັນທີເອກະສານ</th>
                                                <th class="p-2">ເລກທີເອກະສານ</th>
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                            <th class="p-2">ປະເພດ</th>
                                            <th class="p-2">ໝາຍເຫດ</th>
                                            <!-- <th class="p-2">ການເຂົ້າເຖິງ</th> -->
                                            <!--[if BLOCK]><![endif]--><?php if(!empty($data_ho['Ho-edit']) || !empty($data_ho['Ho-del'])): ?>
                                                <th class="p-2">ປູ່ມຄຳສັ່ງ</th>
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr class="text-center">
                                                <td class="p-2">
                                                    <a class="btn btn-primary"
                                                        href="http://192.168.128.193:8080/<?php echo e($item['pathfile']); ?>"
                                                        target="_bank"><i class="mdi mdi-file-download-outline"></i></a>
                                                </td>
                                                <td class="p-2"><?php echo e($no++); ?></td>
                                                <td class="p-2"><?php echo e(date('d/m/Y', strtotime($item['doc_date']))); ?>

                                                </td>
                                                <td class="px-3"><?php echo e($item['doc_no']); ?></td>
                                                <td class="text-left px-3"><?php echo e($item['doc_title']); ?></td>
                                                <!--[if BLOCK]><![endif]--><?php if($hiddenId == 1 || $hiddenId == 3): ?>
                                                    <td class="p-2"><?php echo e(date('d/m/Y', strtotime($item['date_no']))); ?>

                                                    </td>
                                                    <td class="px-3"><?php echo e($item['no']); ?></td>
                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                <td class="px-3"><?php echo e($item['groupname']); ?></td>
                                                <td class="px-3"><?php echo e($item['note']); ?></td>
                                                <!-- <td class="p-2"></td> -->

                                                <!--[if BLOCK]><![endif]--><?php if(!empty($data_ho['Ho-edit']) || !empty($data_ho['Ho-del'])): ?>
                                                    <td class="p-2">
                                                        <div class="btn-group-vertical mb-2">
                                                            <div class="btn-group btn-group-justified text-white mb-2">
                                                                <?php if(!empty($data_ho['Ho-edit'])): ?>
                                                                    <a class="btn btn-warning waves-effect waves-light"
                                                                        wire:click="edit(<?php echo e($item['id']); ?>)"><i
                                                                            class="mdi mdi-pencil-remove-outline"></i></a>
                                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                                <!--[if BLOCK]><![endif]--><?php if(!empty($data_ho['Ho-del'])): ?>
                                                                    <a class="btn btn-danger waves-effect waves-light"
                                                                        wire:click="delete(<?php echo e($item['id']); ?>)"><i
                                                                            class="mdi mdi-window-close"></i></a>
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
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\Project\Web\Font-End\dms-2024\resources\views/livewire/document/h-q/hq-document-component.blade.php ENDPATH**/ ?>