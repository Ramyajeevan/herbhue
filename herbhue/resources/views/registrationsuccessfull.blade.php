<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HERBHUE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href=" {{asset('css/style.css')}}">
</head>

<body> 
    <div class="container-fluid pb-0">
        <div class="row">
          
            <div class="col-lg-5">
                <div class="form-container">
                    <img src="{{asset('img/Successful Registration Page.png')}}" width="350px" alt="">
                <h2 class="text-green mt-4">Sign in to Account</h2>
                   
                    <p class="fs-5 mt-4 ">Thanks for registering your account on Herb Hue. You should have received an email from us.</p>
 
                    <button class="btn btn-outline-primary btn-lg px-3" type="submit">Continue</button>
                   
                    
                    
                </div>
            </div>
            <div class="col-lg-2"></div>
            <div class="col-lg-5 text-end pe-0">
                <img src="img/login-img.png" class="w-75 h-75" alt="">
            </div>
        </div>
    </div>
  
    <script>
        document.getElementById('showPassword').onclick = function () {
            if (this.checked) {
                document.getElementById('password').type = "text";
            } else {
                document.getElementById('password').type = "password";
            }
        };
    </script>
    
</body>

</html>