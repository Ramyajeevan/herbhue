@extends('layouts.app') 
@section('title')
<title>Herbhue - My Account</title>
@endsection
@section('css')

@endsection
@section('content')
<div class="container-fluid my-5">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-4"  data-aos="fade-up"
     data-aos-duration="2000">
            @include('includes.myaccountsidenav')
            </div>
            <div class="col-md-8"  data-aos="fade-up"
     data-aos-duration="2000">
            <div class="card border-0 pt-0">
        <div class="card-body pt-0">
        <h5 class="card-tittle fw-bold">Edit Profile</h5>
        <form method="post" enctype="multipart/form-data" action="{{ route('myaccountsettings') }}">
        @csrf()
        <div class="row">
            <div class="col-3">
                <!--<img src="{{asset('img/editimg.png')}}" width="100px" height="100px" alt="">-->
                @if($user->photo=="")
                <img src="{{asset('img/editing.png')}}" width="100px" height="100px" style="clip-path:circle();" alt="">
                @else
                <img src="{{asset('images/')}}/{{ $user->photo }}" width="100px" height="100px" style="clip-path:circle();" alt="">
                @endif
                <img src="{{asset('img/upload.png')}}" alt="" style="position: absolute; left: 78px;  width: 35px;  top: 97px;  z-index: 9;">
            </div>
            <div class="col-9 pt-4">
            <input type="file" name="photo" id="photo" style="display: none;">
            <button type="button" class="btn btn-dark" onclick="document.getElementById('photo').click()">Change Profile Photo</button>

            </div>
        </div>


        <div class="form-group mb-4">
            <label for="name" class="fw-bold">Full Name</label>

            <input type="text" placeholder="Full Name " value="{{ $user->name }}" class="form-control rounded-0"  id="name" name="name" placeholder="Name" required>

        </div>

        <div class="form-group mb-4">
            <label for="email" class="fw-bold">Email</label>

            <input type="email" placeholder="abc@gmail.com " id="email" name="email" value="{{ $user->email }}" disabled class="form-control rounded-0 ">

        </div>

     
        <div class="form-group mb-4">
            <label for="password" class="fw-bold">Password</label>  
            <div class="d-flex">
            <input type="password" placeholder="abc@1234#"  id="password" name="password" value="{{ $user->password }}" required class="form-control rounded-0 border-end-0 ">
                <button class="btn bg-white toggle border rounded-0 border-start-0" type="button" id="btnToggle"><i id="eyeIcon" class="fa fa-eye"></i></button>
            </div>
                
           <label for="exampleInputEmail1">Minimum 6 characters required</label>
        </div>
        <label for="mobile" class="fw-bold">Mobile Number</label>
        <div class="input-group mb-4">
        <span class="input-group-text bg-white" id="basic-addon1"><img src="http://herbhue.azurewebsites.net/img/UK_flag.png" width="20px" alt="">+44</span>
        <input type="text" class="form-control" placeholder="1111111111" aria-label="Username" id="mobile" name="mobile" value="{{ $user->mobile }}" aria-describedby="basic-addon1">
        </div>

        <div class="d-flex justify-content-end mb-4">
              <button type="submit" class="btn btn-dark px-3">Save</button>
           
        </div>
        </form>
    </div>
    </div> 
            </div>
 
        </div>
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
        let passwordInput = document.getElementById('password'),
    toggle = document.getElementById('btnToggle'),
    icon =  document.getElementById('eyeIcon');

function togglePassword() {
  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    icon.classList.add("fa-eye-slash");
    //toggle.innerHTML = 'hide';
  } else {
    passwordInput.type = 'password';
    icon.classList.remove("fa-eye-slash");
    //toggle.innerHTML = 'show';
  }
}

function checkInput() {
  //if (passwordInput.value === '') {
  //toggle.style.display = 'none';
  //toggle.innerHTML = 'show';
  //  passwordInput.type = 'password';
  //} else {
  //  toggle.style.display = 'block';
  //}
}

toggle.addEventListener('click', togglePassword, false);
passwordInput.addEventListener('keyup', checkInput, false);
    </script>
@endsection
