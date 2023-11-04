@extends('layouts.app') 
@section('title')
<title>Herbhue - My Account</title>
@endsection
@section('css')

@endsection
@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-4">
            @include('includes.myaccountsidenav')
            </div>
            <div class="col-md-8">
            <div class="card border-0 pt-0">
        <div class="card-body pt-0">
        <h5 class="card-tittle fw-bold">Edit Profile</h5>
        <form method="post" action="{{ route('myaccountsettings') }}">
                    @csrf()
        <div class="row">
            <div class="col-3">
                <img src="{{asset('img/editimg.png')}}" width="100px" height="100px" alt="">
                <img src="{{asset('img/upload.png')}}" alt="" style="position: absolute; left: 78px;  width: 35px;  top: 97px;  z-index: 9;">
            </div>
            <div class="col-9 pt-4">

                <button type="button" class="btn btn-dark">Change Profile Photo</button>
            </div>
        </div>


        <div class="form-group mb-3">
            <label for="name" class="fw-bold">Full Name</label>

            <input type="text" placeholder="Full Name " value="{{ $user->name }}" class="form-control rounded-0"  id="name" name="name" placeholder="Name" required>

        </div>

        <div class="form-group mb-3">
            <label for="email" class="fw-bold">Email</label>

            <input type="email" placeholder="shruti94580@gmail.com " id="email" name="email" value="{{ $user->email }}" disabled class="form-control rounded-0 ">

        </div>


        <div class="form-group mb-3">
            <label for="password">Password</label>

            <input type="password" placeholder="Shruti@1234#"  id="password" name="password" value="{{ $user->password }}" required class="form-control rounded-0 ">
           <!-- <label for="exampleInputEmail1">Minimum 6 characters required</label>-->
        </div>
        </form>
    </div>
    </div> 
            </div>
 
        </div>
    </div>

</div>
 
@endsection
