<div>
    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                    aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    
                    <img class="img-profile rounded-circle" src="<?php echo e(asset('backend/assets/images/user-icon.png')); ?>"
                        alt="User Image">
                    
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    
                    
                    
                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        ອອກຈາກລະບົບ
                    </a>
                </div>
            </li>

        </ul>

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">ລາຍການໂປຣແກຣມ</h1>
        </div>

        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <a href="<?php echo e(route('dashboard')); ?>" target="_blank">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">ລະບົບເອກະສານ</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <a data-link="<?php echo e($item['link']); ?>" class="go-to-app3">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e($item['name']); ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>

                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            

            

        </div>

    </div>
    <!-- /.container-fluid -->
</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        let app3Window = null;
        let token = localStorage.getItem('token');
        let id = localStorage.getItem('id');
        let openedWindows = {}; // Object to track opened windows by their link

        function openApp3AndSendToken(link) {

            // Extract the origin from the link
            const url = new URL(link);
            const origin = url.origin;

            // Check if the link is already open
            if (!openedWindows[link] || openedWindows[link].closed) {
                // Open a new window if it doesn't exist or is closed
                openedWindows[link] = window.open(link, '_blank');
            } else {
                // Focus the existing window
                openedWindows[link].focus();
            }

            // Wait a moment to let it load
            setTimeout(() => {
                sendTokenToApp3(origin);
            }, 1000);
        }

        function sendTokenToApp3(origin) {
            if (app3Window && !app3Window.closed && token && id) {
                console.log('Sending token to App 3 ===>', token, id);
                app3Window.postMessage({
                    token,
                    id
                }, origin);
            } else {
                console.warn('Cannot send token: no window or no token');
            }
        }

        // Button handler
        // document.getElementById('go-to-app3').addEventListener('click', openApp3AndSendToken);

        // Attach event listeners to all buttons
        document.querySelectorAll('.go-to-app3').forEach(button => {
            button.addEventListener('click', function() {
                const link = this.getAttribute('data-link'); // Get the link from the data-link attribute
                openApp3AndSendToken(link);
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\Project\Web\dms-2024\resources\views/livewire/web-deshboard-component.blade.php ENDPATH**/ ?>