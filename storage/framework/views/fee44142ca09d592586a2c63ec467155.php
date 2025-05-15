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
                            <p class="text-muted mt-2 m-0"><span class="font-weight-medium">ລວມ:</span>
                                <?php echo e($item['count']); ?>

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
</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        // document.getElementById('go-to-app3').addEventListener('click', async () => {
        //     const res = await fetch('/get-token');
        //     const data = await res.json();
        //     const token = data.token;

        //     // ✅ Log token before sending
        //     console.log('Sending token to App 3:', data.token);

        //     // Open App 3
        //     const app3 = window.open('http://127.0.0.1:8800', '_blank');


        //     // Send token using postMessage
        //     const sendToken = () => {
        //         app3.postMessage({
        //             token
        //         }, 'http://127.0.0.1:8800');
        //     };

        //     // Retry sending until App 3 is ready
        //     const interval = setInterval(() => {
        //         try {
        //             sendToken();
        //             clearInterval(interval);
        //         } catch (e) {}
        //     }, 500);
        // });
        let app3Window = null;
        let token = localStorage.getItem('token');
        let id = localStorage.getItem('id');

        function openApp3AndSendToken() {
            // If already open, focus the window
            if (app3Window && !app3Window.closed) {
                app3Window.focus();
            } else {
                // Open new window if it's not open
                app3Window = window.open('http://127.0.0.1:8800', '_blank');
            }

            // Wait a moment to let it load
            setTimeout(() => {
                sendTokenToApp3();
            }, 1000);
        }

        function sendTokenToApp3() {
            if (app3Window && !app3Window.closed && token && id) {
                console.log('Sending token to App 3 ===>', token, id);
                app3Window.postMessage({
                    token,
                    id
                }, 'http://127.0.0.1:8800');
            } else {
                console.warn('Cannot send token: no window or no token');
            }
        }

        // Button handler
        document.getElementById('go-to-app3').addEventListener('click', openApp3AndSendToken);
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\Project\Web\dms-2024\resources\views/livewire/dashboard-component.blade.php ENDPATH**/ ?>