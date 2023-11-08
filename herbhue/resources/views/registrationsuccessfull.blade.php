<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HERBHUE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href=" {{asset('css/style.css')}}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> 
    
</head>

<body> 
    <div class="container-fluid pb-0">
        <div class="row">
        <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <div class="card border-0">
                <div class="text-center my-4">
                          <a href="{{url('/')}}"><img src="{{ asset('img/logo.png') }}" alt=""   style="width: 170px;"></a>  
                        <p class="text-center">Login to your HerbHue account</p>
                    </div>
                    <img src="{{asset('img/Successful Registration Page.png')}}" width="100%" alt="">
                    <h2 class="text-black mt-4">Congratulations !</h2>
                    <p class="fs-5 mt-4 ">Thanks for registering your account on Herb Hue. You should have received an email from us.</p>
                    <a class="btn btn-outline-dark bg-white btn-lg border-3 px-3" href="{{ route('login') }}">Continue</a>
                </div>
            </div>
            <div class="col-lg-4"></div>
            <!-- <div class="col-lg-5 text-end pe-0">
                <img src="{{asset('img/login-img.png') }}" class="w-75 h-75" alt="">
            </div> -->
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
</body>

</html>