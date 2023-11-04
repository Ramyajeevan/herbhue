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
           <div class="card border-0">
            <div class="card-body">
                <h5 class="card-tittle">My Addresses</h5> 
                <a href="{{ route('editaddress') }}" class="text-black"> <button type="button" class="btn btn-dark"><i class="fa fa-plus text-white fs-4"></i> Add a new Address </button> </a>
                <div class="bg-light py-2 mb-3">
                    <h5><i class="fa fa-home"></i> You Saved Two (2) Addresses</h5>
                </div>


                <div class="card rounded-0 p-3 mb-3 shadow">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                            <p>Shruti Singh</p>
                            <img src="{{ asset('img/delete_FILL0_wght400_GRAD0_opsz24.svg') }}" alt=""  style="width: 20px;">
                            </div>
                           <p class="py-0 my-0">Saket Vihar, Nagina Road Dhampur, Bijnor, Uttar Pradesh, 246761</p>
                           <p class="py-0 my-0">+44 0000 000 000</p>
                        </div>
                    </div>
            </div>
           </div>
        </div>
    </div>
</div>
 
@endsection
  
