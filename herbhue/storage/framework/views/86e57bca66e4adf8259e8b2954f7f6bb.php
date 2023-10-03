<nav class="layout-navbar container-xxl navbar align-items-center position-sticky" id="layout-navbar" style="top:0px;">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        <div class="navbar-nav align-items-center">
            <div class="nav-item d-flex align-items-center">
                <i class="bx bx-timer fs-4 lh-0"></i><span class="p-1 text-primary" id="clock"></span><span id="time" class="text-success"></span>
                
            </div>
        </div>
        <!-- /Search -->

        <ul class="navbar-nav flex-row align-items-center ms-auto">

            <li class="nav-item me-3">

               <button type="button" class="btn btn-primary btn-sm" onclick="toggleFullScreen(documentElement)"><i class="fa fa-expand fs-5"></i></button>

            </li>
        <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                <div class="avatar avatar-online">
                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt class="w-px-40 h-auto rounded-circle" />
                </div>
            </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img src="<?php echo e(asset('admin_datas/assets/img/avatars/1.png')); ?>" alt class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block">Company Name</span>
                                    <small class="text-muted">Admin</small>
                                </div>
                            </div>
                        </a>
                    </li>

                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="<?php echo e(url('/admin_logout')); ?>">
                            <i class="bx bx-power-off me-2"></i>
                            <span class="align-middle">Log Out</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>
<?php /**PATH C:\Users\Rahul\Downloads\kyc-app\kyc-app\resources\views/admin/layout/header.blade.php ENDPATH**/ ?>