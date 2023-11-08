<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script async="" defer="" src="https://buttons.github.io/buttons.js"></script>
        
    <script>
        $(".cate-1").owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            autoplay: false,
            dots: false,
            responsive: {
                0: {
                    items: 1,
                    nav: true,
                },
                600: {
                    items: 2,
                    nav: true,
                },
                1000: {
                    items: 4,
                    nav: true,
                },
            },
        });


        $(".cate-2").owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            autoplay: false,
            dots: false,
            responsive: {
                0: {
                    items: 1,
                    nav: true,
                },
                600: {
                    items: 3,
                    nav: true,
                },
                1000: {
                    items: 6,
                    nav: true,
                },
            },
        });




        $(".cate-3").owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            autoplay: false,
            dots: false,
            responsive: {
                0: {
                    items: 1,
                    nav: true,
                },
                600: {
                    items: 2,
                    nav: true,
                },
                1000: {
                    items: 3,
                    nav: true,
                },
            },
        });




       


    </script>
 



    <script>
        var topHeaderMenu = $('header nav > ul').clone();
        var sideMenu = $('.side-menu-wrap nav');
        sideMenu.append(topHeaderMenu);
        if ($(sideMenu).find('.sub-menu').length != 0) {
            $(sideMenu).find('.sub-menu').parent().append('<i class="fa fa-angle-down d-flex align-items-center"></i>');
        }

        var sideMenuList = $('.side-menu-wrap nav > ul > li > i');
        $(sideMenuList).on('click', function () {
            if (!($(this).siblings('.sub-menu').hasClass('d-block'))) {
                $(this).siblings('.sub-menu').addClass('d-block');
            } else {
                $(this).siblings('.sub-menu').removeClass('d-block');
            }
        });
        $('.side-menu-close').on('click', function () {
            if (!($('.side-menu-close').hasClass('closed'))) {
                $('.side-menu-close').addClass('closed');
            } else {
                $('.side-menu-close').removeClass('closed');
            }
        });
        $('.wrapper').append('<div class="custom-overlay h-100 w-100"></div>');
        $('.side-menu-close').on('click', function () {
            if (!($('.side-menu-wrap').hasClass('opened')) && !($('.custom-overlay').hasClass('show'))) {
                $('.side-menu-wrap').addClass('opened');
                $('.custom-overlay').addClass('show');
            } else {
                $('.side-menu-wrap').removeClass('opened');
                $('.custom-overlay').removeClass('show');
            }
        })
        $('.custom-overlay').on('click', function () {
            sideMenuCloseAction();
        });
        var isDragging = false,
            initialOffset = 0,
            finalOffset = 0;
        $(".side-menu-wrap")
            .mousedown(function (e) {
                isDragging = false;
                initialOffset = e.offsetX;
            })
            .mousemove(function () {
                isDragging = true;
            })
            .mouseup(function (e) {
                var wasDragging = isDragging;
                isDragging = false;
                finalOffset = e.offsetX;
                if (wasDragging) {
                    if (initialOffset > finalOffset) {
                        sideMenuCloseAction();
                    }
                }
            });


        function sideMenuCloseAction() {
            $('.side-menu-wrap').addClass('open');
            $('.wrapper').addClass('freeze');
            $('.custom-overlay').removeClass('show');
            $('.side-menu-wrap').removeClass('opened');
            $('.side-menu-close').removeClass('closed');
            $(sideMenuList).siblings('.sub-menu').removeClass('d-block');
        }
        $(window).on('resize', function () {
            if ($(window).width() >= 992) {
                sideMenuCloseAction();
            }
        })
    </script>
    <script>
        $('#thumbs img').click(function () {
            $('#largeImage').attr('src', $(this).attr('src').replace('thumb', 'large'));
            $('#description').html($(this).attr('alt'));
        });
    </script>

    <script>
        $(document).ready(function () {
            $('.count').prop('disabled', true);

            $(document).on('click', '.plus', function () {
                $('.count').val(parseInt($('.count').val()) + 1);
            });

            $(document).on('click', '.minus', function () {
                var count = parseInt($('.count').val());
                if (count > 1) {  // Make sure count doesn't go below 1
                    $('.count').val(count - 1);
                }
            });
        });

    </script>

