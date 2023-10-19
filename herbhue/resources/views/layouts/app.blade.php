<!DOCTYPE html>
<!-- beautify ignore:start -->
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-template="vertical-menu-template-free">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @yield('title')
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href=" {{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css"
        integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    @yield('css')
    <style>
    .z-99{ 
        z-index: 99 !important;
    }
    </style>
</head>
<body>

	@include('includes.header')
      @yield('content')
      @include('includes.footer')

	<!-- -------------------------------------------------------------- -->
    <!-- Required Js files -->
    <!-- -------------------------------------------------------------- -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
        
@yield('script')
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
function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}
  function subscribe()
  {
    var email=$("#subscribeEmail").val();
    if(!isEmail(email))
    {
    	alert("Enter valid email");
    	return false;
  	}
    else
    {
      var url="{{URL('subscribe')}}";
      $.ajax(
        {
          url: url,
          method: 'post', 
          data:{"email":email, "_token": "{{ csrf_token() }}" },
          success: function (response)
          {
             alert(response);
             //window.location.reload();
          }
        });
      return false;
    }
}
    </script>

</body>
</html>
