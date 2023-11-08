<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
    <title>HERBHUE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href=" {{asset('css/style.css')}}">
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        .form-check-input:checked {
    background-color: black !important;
    border-color: black !important;
}
    </style>
</head>

<body> 
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4" data-aos="zoom-in"
     data-aos-duration="2000">
                <form method="post" action="{{ route('register') }}">
                @csrf
                <div class="form-container">
                <div class="text-center mb-5">
                          <a href="{{url('/')}}"><img src="{{ asset('img/logo.png') }}" alt=""   style="width: 170px;"></a>  
                        <h3 class="text-center" style="color:#ACB69C;">Create Your Account</h3>
                        <p class="text-center">Welcome to the world of HerbHue</p>
                    </div>
                    <div class="form-group">
                        <input type="text"  id="name" name="name" required placeholder="Full Name">
                       
                    </div>
                    
                    <div class="form-group">
                        <input type="email"  id="email"  name="email" required placeholder="Email ID">
                        
                    </div>
                    <div class="input-group mb-3">
                    <span class="input-group-text bg-white" id="basic-addon1"><img src="{{ asset('img/UK_flag.png') }}"
                   width="15px" alt=""> +44</span> 
                    <input type="text" class="form-control py-2"  id="mobile" name="mobile" onkeypress="return onlyNumberKey(event);" maxlength = "10" aria-describedby="basic-addon1" required placeholder="Phone No.">
                    </div>
                    <!-- <div class="form-group">
                        <input type="text"  id="mobile" name="mobile" onkeypress="return onlyNumberKey(event);" maxlength = "10"  required>
                        <label for="mobile">Mobile</label>
                    </div> -->
                    <div class="form-group">
                        <input type="password"  id="password" name="password" required placeholder="Password">
                         
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                    I agree to the <a href="#" class="fw-bold text-black">Terms & Conditions</a>  & <a href="#" class="fw-bold text-black"></a> Privacy Policy
                    </label>
                    </div>
                    <p class="text-center">Already have an account? <a href="{{ route('login') }}" class="text-black text-decoration-none">Login</a> </p>
                    <button class=" btn btn-dark btn-lg w-100" type="submit">Register</button>
                </div>
                </form>
            </div>
            <div class="col-lg-4"></div>
            <!-- <div class="col-lg-5 text-end pe-0">
                <img src="{{ asset('img/login-img.png') }}" class="w-75 h-75" alt="">
            </div> -->
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
    <script>
        function onlyNumberKey(evt) {
            // Only ASCII character in that range allowed
            var keyCode = evt.which ? evt.which : evt.keyCode

                if (!(keyCode >= 48 && keyCode <= 57)) {
                //alert("Only numbers are allowed!");
                return false;
            }
            
        }
    </script>
        
</body>

</html>