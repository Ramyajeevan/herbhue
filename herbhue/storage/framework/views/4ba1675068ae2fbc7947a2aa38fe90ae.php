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
    <link rel="stylesheet" href=" <?php echo e(asset('css/style.css')); ?>">
</head>

<body> 
<div class="container-fluid">
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
                        <input type="text" placeholder=" "  id="password" >
                        <label for="password">Name</label>
                    </div>
                    
                    <div class="form-group">
                        <input type="text" placeholder=" "  id="password" >
                        <label for="password">Password</label>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder=" "  id="password" >
                        <label for="password">Password</label>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder=" "  id="password" >
                        <label for="password">Password</label>
                    </div>
                    
<p class="text-center">Already have an account? <a href="<?php echo e(('/login')); ?>" class="text-green text-decoration-none">Login</a> </p>
                    <button class="submit-button" type="submit">Sign In</button>
                </div>
            </div>
            <div class="col-lg-5 text-end pe-0">
                <img src="img/login-img.png" class="w-75 h-75" alt="">
            </div>
        </div>
    </div>

    
</body>

</html><?php /**PATH C:\xampp\htdocs\hurbhue\resources\views/signup.blade.php ENDPATH**/ ?>