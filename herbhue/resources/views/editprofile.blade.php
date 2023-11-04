@extends('layouts.app') 
@section('title')
<title>Herbhue - Edit Profile</title>
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
        <div class="row">
            <div class="col-3">
                <img src="{{asset('img/editimg.png')}}" width="100px" height="100px" alt="">
                <img src="{{asset('img/upload.png')}}" alt="" style="    position: absolute; left: 78px;  width: 35px;  top: 97px;  z-index: 9;">
            </div>
            <div class="col-9 pt-4">

                <button type="button" class="btn btn-dark">Change Profile Photo</button>
            </div>
        </div>


        <div class="form-group mb-3">
            <label for="exampleInputEmail1" class="fw-bold">First Name</label>

            <input type="text" placeholder="First Name " class="form-control rounded-0 ">

        </div>

        <div class="form-group mb-3">
            <label for="exampleInputEmail1" class="fw-bold">Email</label>

            <input type="email" placeholder="shruti94580@gmail.com " class="form-control rounded-0 ">

        </div>


        <div class="form-group mb-3">
            <label for="exampleInputEmail1">Password</label>

            <input type="text" placeholder="Shruti@1234# " class="form-control rounded-0 ">
            <label for="exampleInputEmail1">Minimum 6 characters required</label>
        </div>
    </div>
    </div> 
            </div>
 
        </div>
    </div>

</div>
 
@endsection
  
