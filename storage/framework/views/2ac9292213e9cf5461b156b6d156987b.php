<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ໜ້າຫຼັກ</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ເອກະສານທົ່ວລະບົບ</a></li>
                        <li class="breadcrumb-item active">ເອກະສານແຈ້ງການ</li>
                    </ol>
                </div>
                <h4 class="page-title">ເອກະສານແຈ້ງການ</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-3">
                        <table width="100%">
                            <tr>
                                <td style="vertical-align: center;" class="text-right">ສະແດງ &emsp;</td>
                                <td>
                                    <select wire:model="dataQ" wire:click="dataQS" name="Q" id="Q" class="form-control">
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
                        <input type="text" name="search" id="search" wire:model="search" wire:keydown.enter="searchData"
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
                                <table border="1" width="100%">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="p-2">ລຳດັບ</th>
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
                                            <td class="p-2"><?php echo e(date('d/m/Y',strtotime($item['date']))); ?></td>
                                            <td class="p-2"><?php echo e($item['title']); ?></td>
                                            <td class="p-2"><?php echo e($item['departname']); ?></td>
                                            <td class="p-2">
                                            <!--[if BLOCK]><![endif]--><?php if($item['del'] == 0): ?>
                                                <span class="badge badge-danger">ຍັງບໍ່ທັນດາວໂຫຼດ</span>  
                                            <?php else: ?>
                                                <span class="badge badge-success">ດາວໂຫຼດສຳເລັດ</span> 
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                            </td>
                                            <td class="p-2">
                                            <a class="btn btn-primary" wire:click="view(<?php echo e($item['id']); ?>)" href="http://192.168.128.193:8080/<?php echo e($item['pathfile']); ?>" target="_bank"><i
                                            class="mdi mdi-file-download-outline"></i></a>
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
</div><?php /**PATH D:\Project\Web\Font-End\dms-2024\resources\views/livewire/log-docc-component.blade.php ENDPATH**/ ?>