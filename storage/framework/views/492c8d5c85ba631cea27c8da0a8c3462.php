<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>ເກັບກຳເອກະສານອອນລາຍ</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Responsive bootstrap 4 admin template" name="description">
        <meta content="Coderthemes" name="author">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo e(asset('backend/assets/images/favicon.ico')); ?>">

        <!-- App css -->
        <link href="<?php echo e(asset('backend/assets/css/style.css')); ?>" rel="stylesheet" type="text/css" id="style-stylesheet">
        <link href="<?php echo e(asset('backend/assets/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
        <link href="<?php echo e(asset('backend/assets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo e(asset('backend/assets/css/app.min.css')); ?>" rel="stylesheet" type="text/css" id="app-stylesheet">
        <link href="<?php echo e(asset('backend/assets/libs/select2/select2.min.css')); ?>" rel="stylesheet" type="text/css">
        <!-- Notification css (Toastr) -->
        <link href="<?php echo e(asset('backend/assets/libs/toastr/toastr.min.css')); ?>" rel="stylesheet" type="text/css">

        <link href="<?php echo e(asset('backend/assets/libs/custombox/custombox.min.css')); ?>" rel="stylesheet" type="text/css">

        <style>
            .bigdrop {
                width: 100% !important;
            }
            @font-face {
                    font-family: 'Phetsarath OT';
                    font-weight: normal;
                    font-style: normal;
                    font-variant: normal;
                    src: "<?php echo e(asset('fonts/PhetsarathOT.ttf')); ?>" format('truetype');
            }
            * {
                font-family: 'Phetsarath OT';
            }
        </style>
        <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

    </head>

    <body data-layout="horizontal">

        <!-- Begin page -->
        <div id="wrapper">

            <?php echo $__env->make('components.layouts.headbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">

                       <?php echo e($slot); ?>


                    </div>
                </div>
                <?php echo $__env->make('components.layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
        </div>
        <!-- END wrapper -->

        <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

        <!-- Vendor js -->
        <script src="<?php echo e(asset('backend/assets/js/vendor.min.js')); ?>"></script>

        <!-- <script src="<?php echo e(asset('backend/assets/libs/morris-js/morris.min.js')); ?>"></script> -->
        <script src="<?php echo e(asset('backend/assets/libs/raphael/raphael.min.js')); ?>"></script>

        <!-- <script src="<?php echo e(asset('backend/assets/js/pages/dashboard.init.js')); ?>"></script> -->
        <script src="<?php echo e(asset('backend/assets/libs/select2/select2.min.js')); ?>"></script>
        <!-- App js -->
        <script src="<?php echo e(asset('backend/assets/js/app.min.js')); ?>"></script>
        <!-- Toastr js -->
        <script src="<?php echo e(asset('backend/assets/libs/toastr/toastr.min.js')); ?>"></script>
        <script src="<?php echo e(asset('backend/assets/js/pages/toastr.init.js')); ?>"></script>
        <script src="<?php echo e(asset('backend/assets/js/money.format.js')); ?>"></script>
        <!-- Modal -->
        <script src="<?php echo e(asset('backend/assets/libs/custombox/custombox.min.js')); ?>"></script>

        <script src="<?php echo e(asset('backend/assets/libs/bootstrap-filestyle2/bootstrap-filestyle.min.js')); ?>"></script>
        <!-- Init js-->
        <!-- <script src="<?php echo e(asset('backend/assets/js/pages/form-advanced.init.js')); ?>"></script> -->
        

        <script>
        window.Livewire.on('alert', param => {
            toastr.options.positionClass = 'toast-bottom-right';
            toastr[param['type']](param['message'],param['type']);
        });

        <?php if(Session::has('success')): ?>
            toastr.options.positionClass = 'toast-bottom-right';
            toastr.success("<?php echo e(Session::get('success')); ?>")
        <?php elseif(Session::has('warning')): ?>
            toastr.options.positionClass = 'toast-bottom-right';
            toastr.warning("<?php echo e(Session::get('warning')); ?>")
        <?php elseif(Session::has('error')): ?>
            toastr.options.positionClass = 'toast-bottom-right';
            toastr.error("<?php echo e(Session::get('error')); ?>")
        <?php endif; ?>

    </script>

        <?php echo $__env->yieldPushContent('scripts'); ?>
    </body>

</html><?php /**PATH D:\Project\Web\dms-2024\resources\views/components/layouts/app.blade.php ENDPATH**/ ?>