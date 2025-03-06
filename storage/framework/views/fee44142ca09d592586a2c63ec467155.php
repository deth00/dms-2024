<div>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ໜ້າຫຼັກ</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ແຜງຄວບຄຸມ</a></li>
                    </ol>
                </div>
                <h4 class="page-title">ໜ້າຫຼັກ</h4>
            </div>
        </div>
    </div>
    
    <!-- end page title -->
    <div class="row">
        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $doc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

        <div class="col-lg-6 col-xl-3">
            <div class="card widget-box-three">
                <div class="card-body">
                    <div class="float-right mt-2">
                        <i class="mdi mdi-file-document-outline display-3 m-0 text-primary"></i>
                    </div>
                    <div class="overflow-hidden">
                        <p class="text-uppercase font-weight-medium text-truncate mb-2"><?php echo e($item['name']); ?></p>
                        <h2 class="mb-0"><span data-plugin="counterup"><?php echo e($item['count']); ?></span> <i
                                class="mdi mdi-arrow-up text-success font-24"></i></h2>
                        <p class="text-muted mt-2 m-0"><span class="font-weight-medium">ລວມ:</span> <?php echo e($item['count']); ?>

                            ລາຍການ</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="col-lg-6 col-xl-3">
            <div class="card widget-box-three">
                <div class="card-body">
                    <div class="float-right mt-2">
                        <i class="mdi mdi-file-document-outline display-3 m-0 text-primary"></i>
                    </div>
                    <div class="overflow-hidden">
                        <p class="text-uppercase font-weight-medium text-truncate mb-2">ເອກະສານຂາເຂົ້າພາຍໃນ</p>
                        <h2 class="mb-0"><span data-plugin="counterup"></span> <i
                                class="mdi mdi-arrow-up text-success font-24"></i></h2>
                        <p class="text-muted mt-2 m-0"><span class="font-weight-medium">ລວມ:</span> 0 ລາຍການ</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->

        <div class="col-lg-6 col-xl-3">
            <div class="card widget-box-three">
                <div class="card-body">
                    <div class="float-right mt-2">
                        <i class="mdi mdi-file-document-outline display-3 m-0 text-warning"></i>
                    </div>
                    <div class="overflow-hidden">
                        <p class="text-uppercase font-weight-medium text-truncate mb-2">ເອກະສານຂາອອກພາຍໃນ</p>
                        <h2 class="mb-0"><span data-plugin="counterup"></span> <i
                                class="mdi mdi-arrow-down text-danger font-24"></i></h2>
                        <p class="text-muted mt-2 m-0"><span class="font-weight-medium">ລວມ:</span> 0 ລາຍການ</p>
                    </div>

                </div>
            </div>
        </div>
        <!-- end col -->

        <div class="col-lg-6 col-xl-3">
            <div class="card widget-box-three">
                <div class="card-body">
                    <div class="float-right mt-2">
                        <i class="mdi mdi-file-document-outline display-3 m-0 text-danger"></i>
                    </div>
                    <div class="overflow-hidden">
                        <p class="text-uppercase font-weight-medium text-truncate mb-2">ເອກະສານຂາເຂົ້າພາຍນອກ</p>
                        <h2 class="mb-0"><span data-plugin="counterup"></span><i
                                class="mdi mdi-arrow-down text-danger font-24"></i></h2>
                        <p class="text-muted mt-2 m-0"><span class="font-weight-medium">ລວມ:</span> 0 ລາຍການ</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->

        <div class="col-lg-6 col-xl-3">
            <div class="card widget-box-three">
                <div class="card-body">
                    <div class="float-right mt-2">
                        <i class="mdi mdi-file-document-outline display-3 m-0 text-success"></i>
                    </div>
                    <div class="overflow-hidden">
                        <p class="text-uppercase font-weight-medium text-truncate mb-2">ເອກະສານຂາອອກພາຍນອກ</p>
                        <h2 class="mb-0"><span data-plugin="counterup"></span> <i
                                class="mdi mdi-arrow-up text-success font-24"></i></h2>
                        <p class="text-muted mt-2 m-0"><span class="font-weight-medium">ລວມ:</span> 0 ລາຍການ</p>
                    </div>

                </div>
            </div>
        </div>
        <!-- end col -->
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>
    <!-- end row -->
</div><?php /**PATH D:\Project\Web\dms-2024\resources\views/livewire/dashboard-component.blade.php ENDPATH**/ ?>