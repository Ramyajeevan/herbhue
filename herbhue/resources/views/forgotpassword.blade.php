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
            @if(Session::has('success'))
                            <div class="alert customize-alert alert-dismissible text-success  alert-success fade show remove-close-icon" role="alert">
                                <span class="side-line bg-success"></span>
                                <div class="d-flex align-items-center font-weight-medium">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info text-success feather-sm me-2 flex-shrink-0">
                                        <circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="8"></line>
                                    </svg>
                                    <span class="text-truncate"> {{Session::get('success')}}</span>
                                    <div class="ms-auto d-flex justify-content-end">
                                    <a href="javascript:void(0)" class="px-2 btn" data-bs-dismiss="alert" aria-label="Close">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 fill-white text-success feather-sm">
                                            <polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line>
                                        </svg>
                                    </a>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if(Session::has('errors'))
                            <div class="alert customize-alert alert-dismissible text-danger  alert-danger fade show remove-close-icon" role="alert">
                                <span class="side-line bg-danger"></span>
                                <div class="d-flex align-items-center font-weight-medium">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info text-danger feather-sm me-2 flex-shrink-0"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="8"></line></svg>
                                    <span class="text-truncate">{{Session::get('errors')}}</span>
                                    <div class="ms-auto d-flex justify-content-end">
                                    <a href="javascript:void(0)" class="px-2 btn" data-bs-dismiss="alert" aria-label="Close">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 fill-white text-danger feather-sm"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                    </a>
                                    </div>
                                </div>
                            </div>
                            @endif
            <form method="post" action="{{ route('forgotpasswordlink') }}">
                @csrf
                <div class="form-container">
                    <div class="text-center mb-5">
                        <div class="underline-text-center">
                            <h2>Forgot Password</h2>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="email" placeholder=" " id="email" name="email" required>
                        <label for="email">Email Address</label>
                    </div>

                    <button class="submit-button" type="submit">Forgot Password</button>
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