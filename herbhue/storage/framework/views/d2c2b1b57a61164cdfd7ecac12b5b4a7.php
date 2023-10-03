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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

    <script src="<?php echo e(asset('admin_datas/assets/vendor/js/helpers.js')); ?>"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('admin_datas/assets/js/config.js')); ?>"></script>

     <!-- Data table cdn -->
     <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" />

     <style>
        .font-13{
            font-size:13px !important;
        }


        #filterwaladiv22 {
            position: absolute;
            width: 70%;
            margin-bottom: 20px;
        }

        .btn-check:checked+.btn{
            background-color: #0c2061 !important;
        }
     </style>

<script>
    $(document).ready(function() {
        new DataTable('#myTable', {
            dom: '<"toolbar">frtip',
            ordering: false,
            language: {
                search: "",
                searchPlaceholder: "Search...",
            }
        });

        $('div.toolbar').empty();
        $('#filterwaladiv22').appendTo('div.toolbar');
        $('.dataTables_filter input').css({
            'width': '200px',
            'height': '30px',
            'margin-bottom': '20px'
        });
    });
</script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" style="    width: 27vh;">
                <?php echo $__env->make('admin.layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">

                        <?php echo $__env->yieldContent('content'); ?>


                    </div>
                    <!-- / Content -->


                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


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
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <!-- Data table cdn -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name=csrf-token]').attr('content'),
            }
        });

        // Stay Open to Cliked Menu List (Only for one step)
        $(document).ready(function() {

          var activeItem = localStorage.getItem('activeItem');
          if (activeItem) {
            $('li').eq(activeItem).addClass('active');
          }

          // Handle click event
          $('li').click(function() {
            var index = $(this).index();
            $('li').removeClass('active');
            $(this).addClass('active');
            localStorage.setItem('activeItem', index);
          });
        });

        // Stay Open to Cliked Menu List (Only upto two step)
        // $(document).ready(function() {
        //     var savedMenuState = localStorage.getItem('menuState');
        //     if (savedMenuState) {
        //         $('ul').html(savedMenuState);
        //     }

        //     $('li').click(function(e) {
        //         e.stopPropagation();
        //         var $this = $(this);


        //         if ($this.find('ul > li').length === 0) {
        //             $('li').removeClass('active');
        //             $this.addClass('active');

        //         } else {
        //             $this.addClass('active');
        //             $('li').removeClass('active active open');
        //             $this.closest('li').addClass('active open');

        //         }
        //         // Save the updated menu state to local storage
        //         var updatedMenuState = $('ul').html();
        //         localStorage.setItem('menuState', updatedMenuState);
        //     });
        // });
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


</body>

</html>
<?php /**PATH C:\Users\Rahul\Downloads\kyc-app\kyc-app\resources\views/admin/layout/main.blade.php ENDPATH**/ ?>