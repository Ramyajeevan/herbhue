<!DOCTYPE html>
<!-- beautify ignore:start -->
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-template="vertical-menu-template-free">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
  @yield('title')
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href=" {{asset('css/style.css')}}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{asset('img/favicon.png')}}">
    @yield('css')
    <style>
    .z-99{ 
        z-index: 99 !important;
    }
    </style>
    <style>
      body{
        overflow-x: hidden !important;
      }
  .btn-check:checked+.btn {
    background-color: #ffffff !important;
    border-color: black !important;
}

.bg-light-green {
    background-color: #ACB69C !important;
  }

  .btn-secondary , .bg-secondary{
    background-color: #ACB69C !important;
    border-color: #ACB69C !important;
  }

  .bg-light{
    background:#F6F6F6 !important;
  }

  .pd-icon{
  clip-path: circle();
  width: 40px;
}
.top-desc{
        position: absolute;
        top:10px;
        left: 25px;
    }
    .desc-bottom{
        position: absolute;
        bottom: 30px;
        right: 35%;
    }
    .btn-success {
    background-color: #ACB69C !important;
    color: white;
  }
  .mob-view{
    display: none ;
  }
  @media only screen and (max-width: 600px) {
    .mob-view{
    display: block !important;
  } 
  .web-view{
    display:none !important;
  }
  }
  /* .owl-carousel .owl-nav button.owl-next {
            position: absolute !important;
            top: -40px;
            right: 0 !important;
            font-size: 40px !important;
        }

        .owl-carousel .owl-nav button.owl-prev {
            position: absolute !important;
            top: -40px;
            right: 25px !important;
            font-size: 40px !important;
           
        }

        .owl-carousel .owl-nav button.owl-prev,
        .owl-carousel .owl-nav button.owl-next:hover {
            background-color: transparent !important;
            color: black !important;
        } */
</style>
<style>
    .rounded-start-pill{
        border-radius: 37px 0px 0px 35px !important;
    }
.rounded-end-circle{
    border-radius: 0px 32px 32px 0px !important;
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
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
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
