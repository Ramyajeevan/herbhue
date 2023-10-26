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
</head>

<body> 
    <div class="container-fluid pb-0">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-5">
            <form method="post" action="{{ route('updatepassword') }}">
                @csrf
                
                <input type="hidden" name="email" id="email" value="{{Session::get('email')}}">
                <div class="form-container">
                    <div class="text-center mb-5">
                        <div class="underline-text-center">
                            <h2>Reset Password</h2>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="password" placeholder="" id="password" name="password" required>
                        <label for="password">Password</label>
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="" id="confirm_password" name="confirm_password" required>
                        <label for="confirm_password">Confirm Password</label>
                    </div>
                    <button class="submit-button" type="submit">Update Password</button>
                    <p class="text-center mt-4">Have a query?  <a href="{{ route('contact') }}" class="text-green text-decoration-none">Contact Us</a> </p>
                    
                    <p class="text-center p-0 m-0">Don't have an account?<a href="{{ route('register') }}" class="text-green text-decoration-none"> Register Now</a> </p>
                </div>
            </form>
            </div>
            <div class="col-lg-5 text-end pe-0">
                <img src="{{ asset('img/login-img.png') }}" class="w-75 h-75" alt="">
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</body>

</html>