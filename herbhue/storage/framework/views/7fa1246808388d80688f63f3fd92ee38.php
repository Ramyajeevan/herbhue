<!DOCTYPE html>
<!-- beautify ignore:start -->
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Y-NOT</title>
    <meta name="description" content="" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- Favicon
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('admin_datas/assets/img/favicon/favicon.ico')); ?>" />-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo e(asset('admin_datas/assets/vendor/libs/animate.css')); ?>" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?php echo e(asset('admin_datas/assets/vendor/fonts/boxicons.css')); ?>" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('admin_datas/assets/vendor/css/core.css')); ?>" class="template-customizer-core-css" />
        <!-- <link rel="stylesheet" href="<?php echo e(asset('admin_datas/assets/vendor/css/cards_slider.css')); ?>" class="template-customizer-core-css" /> -->
    <link rel="stylesheet" href="<?php echo e(asset('admin_datas/assets/vendor/css/theme-default.css')); ?>" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?php echo e(asset('admin_datas/assets/css/demo.css')); ?>" />


    <link rel="stylesheet" href="<?php echo e(asset('admin_datas/assets/vendor/toast/dist/themes/toasteur-default.min.css')); ?>" />
    <script src="<?php echo e(asset('admin_datas/assets/vendor/toast/dist/toasteur.min.js')); ?>"></script>
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('admin_datas/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(asset('admin_datas/assets/vendor/libs/apex-charts/apex-charts.css')); ?>" />

    <script src="<?php echo e(asset('admin_datas/assets/vendor/js/helpers.js')); ?>"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('admin_datas/assets/js/config.js')); ?>"></script>





</head>

<body>
    <nav class="layout-navbar container-fluid navbar align-items-center position-sticky" id="layout-navbar" style="top:0px;">
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

                   <a href="<?php echo e(url('/')); ?>"><button type="button" class="btn btn-primary btn-sm"  ><i class="fa fa-home fs-5"></i></button></a>

                 </li><li class="nav-item me-3">

                    <button type="button" class="btn btn-primary btn-sm" onclick="printDiv('printableArea')"><i
                        class="fa fa-print me-1 fs-5"></i> </button>

                 </li>
                <li class="nav-item me-3">

                   <button type="button" class="btn btn-primary btn-sm" onclick="toggleFullScreen(documentElement)"><i class="fa fa-expand fs-5"></i></button>

                </li>

            </ul>
        </div>
    </nav>


        <?php echo $__env->yieldContent('content'); ?>





    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?php echo e(asset('admin_datas/assets/vendor/libs/jquery/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('admin_datas/assets/vendor/libs/popper/popper.js')); ?>"></script>
    <script src="<?php echo e(asset('admin_datas/assets/vendor/js/bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('admin_datas/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')); ?>"></script>

    <script src="<?php echo e(asset('admin_datas/assets/vendor/js/menu.js')); ?>"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="<?php echo e(asset('admin_datas/assets/vendor/libs/apex-charts/apexcharts.js')); ?>"></script>

    <!-- Main JS -->
    <script src="<?php echo e(asset('admin_datas/assets/js/main.js')); ?>"></script>

    <!-- Page JS -->
    <script src="<?php echo e(asset('admin_datas/assets/js/dashboards-analytics.js')); ?>"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name=csrf-token]').attr('content'),
            }
        });


    </script>
  <script>
    function toggleFullScreen(elem) {
        if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) ||
            (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) ||
            (document.mozFullScreen !== undefined && !document.mozFullScreen) ||
            (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {

            if (elem.requestFullScreen) {
                elem.requestFullScreen();
            } else if (elem.mozRequestFullScreen) {
                elem.mozRequestFullScreen();
            } else if (elem.webkitRequestFullScreen) {
                elem.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
            } else if (elem.msRequestFullscreen) {
                elem.msRequestFullscreen();
            }

            // Add overflow-y: hidden style after entering fullscreen
            elem.style.overflowY = 'hidden';

        } else {
            if (document.cancelFullScreen) {
                document.cancelFullScreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitCancelFullScreen) {
                document.webkitCancelFullScreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            }

            // Restore the overflow-y style when exiting fullscreen
            elem.style.overflowY = 'auto';
        }
    }
</script>
    <script>
        $(document).ready(function() {
            function updateClock() {
                var now = new Date();
                var day = now.getDate();
                var month = now.toLocaleString('default', {
                    month: 'long'
                });
                var year = now.getFullYear();
                var hours = now.getHours();
                var minutes = now.getMinutes();
                var seconds = now.getSeconds();
                var meridiem = hours >= 12 ? 'PM' : 'AM';

                // Format the time
                hours = hours % 12;
                hours = hours ? hours : 12;
                minutes = minutes < 10 ? '0' + minutes : minutes;
                seconds = seconds < 10 ? '0' + seconds : seconds;

                // Display the clock
                $('#clock').text(day + '-' + month + '-' + year);
                $('#time').text(hours + ':' + minutes + ':' + seconds + ' ' + meridiem);

                // Update the clock every second
                setTimeout(updateClock, 1000);
            }

            // Initial clock update
            updateClock();
        });
    </script>
 <script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
</body>

</html>
<?php /**PATH C:\xamppp\htdocs\kyc-app\resources\views/admin/application-detail/layout.blade.php ENDPATH**/ ?>