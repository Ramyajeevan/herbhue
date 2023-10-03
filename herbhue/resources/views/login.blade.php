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
            <div class="col-lg-2"></div>
            <div class="col-lg-5">
                <div class="form-container">
                    <div class="text-center mb-5">
                        <div class="underline-text-center">
                            <h2>Sign in to Account</h2>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="email" placeholder=" " id="inputField">
                        <label for="inputField">Email Address</label>
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder=" " id="password">
                        <label for="password">Password</label>
                    </div>
                    <div class="d-flex justify-content-between mb-4">
                        <div class="form-check ">
                            <input class="form-check-input" type="checkbox" value="" id="showPassword">
                            <label class="form-check-label" for="showPassword">
                                Show Password
                            </label>
                        </div>
                        <p><a href="#" class="text-green text-decoration-none">Forgot Password ?</a></p>
                    </div>

                    <button class="submit-button" type="submit">Sign In</button>
                    <p class="text-center mt-4">Have a query?  <a href="{{('/contact-us')}}" class="text-green text-decoration-none">Contact Us</a> </p>
                    
                    <p class="text-center p-0 m-0">Don't have an account?<a href="{{('/signup')}}" class="text-green text-decoration-none"> Register Now</a> </p>
                </div>
            </div>
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