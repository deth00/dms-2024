<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link href="<?php echo e(asset('login/css-1?family=Roboto:300,400&display=swap')); ?>" rel="stylesheet"> -->
    <link rel="stylesheet" href="<?php echo e(asset('login/fonts/icomoon/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('login/css/owl.carousel.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('login/css/bootstrap.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('login/css/style.css')); ?>">

    <!-- Notification css (Toastr) -->
    <link href="<?php echo e(asset('backend/assets/libs/toastr/toastr.min.css')); ?>" rel="stylesheet" type="text/css">
    <title>DMS</title>
        <style>
            @font-face {
                    font-family: 'Phetsarath OT';
                    font-weight: normal;
                    font-style: normal;
                    font-variant: normal;
                    src: url("fonts/PhetsarathOT.ttf") format('truetype');
            }
            * {
                font-family: 'Phetsarath OT';
            }
        </style>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

</head>

<body>
    <div class="content">
        <div class="container">
            <?php echo e($slot); ?>

        </div>
    </div>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

    <script src="<?php echo e(asset('login/js/jquery-3.3.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('login/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('login/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('login/js/main.js')); ?>"></script>
    <!-- Toastr js -->
    <script src="<?php echo e(asset('backend/assets/libs/toastr/toastr.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/js/pages/toastr.init.js')); ?>"></script>
    
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

</html><?php /**PATH D:\Project\Web\dms-2024\resources\views/components/layouts/login/app.blade.php ENDPATH**/ ?>