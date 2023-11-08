@extends('layouts.app') 
@section('title')
<title>Herbhue - Add Address</title>
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
            <div class="card rounded-0 p-3 mb-3"> 
                        <div class="card-body"> 
                            <h4>Add New Address</h4>
                            <form method="post" action="{{ route('addnewaddress') }}">
                                    @csrf
                            <div class="row mt-3"> 
                                <div class="col-md-6 mb-1">
                                    <div class="form-group">
                                        <input type="text" placeholder="First Name " class="form-control rounded-0 " id="firstname" name="firstname" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-1">
                                    <div class="form-group">
                                        <input type="text" placeholder="Last Name " class="form-control rounded-0 " id="lastname" name="lastname">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-1">
                                    <small>COUNTRY</small>
                                    <p class="py-0 m-0" > <img src="http://herbhue.azurewebsites.net/img/UK_flag.png" width="20px" alt="" class="me-1"> United Kingdom (UK)</p>
                                </div>
                                <div class="col-md-12 mb-1">
                                    <div class="form-group">
                                        <input type="text" placeholder="HOUSE NUMBER AND STREET NAME" class="form-control rounded-0 "  id="street_address" name="street_address" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-1">
                                    <div class="form-group">
                                        <input type="text" placeholder="APARTMENT, SUITE" class="form-control rounded-0 " id="street_address2" name="street_address2">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-1">
                                    <div class="form-group">
                                        <input type="text" placeholder="TOWN / CITY" class="form-control rounded-0 " id="city" name="city" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-1">
                                    <div class="form-group">
                                        <input type="text" placeholder="POSTCODE" class="form-control rounded-0 "  id="pincode" name="pincode" required>
                                    </div>
                                </div>
                                <!-- <div class="col-md-4 mb-1">
                                    <div class="form-group">
                                        <input type="text" placeholder="COUNTRY " class="form-control rounded-0 ">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-1">
                                    <div class="form-group">
                                        <input type="text" placeholder="COMPANY (OPTIONAL)" class="form-control rounded-0 " id="company_name" name="company_name">
                                    </div>
                                </div> -->
                                <div class="col-md-12 mb-1">
                                    <div class="form-group">
                                        <input type="text" placeholder="PHONE" class="form-control rounded-0 " id="phone" name="phone" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-1">
                                <button type="submit" class="btn btn-dark btn-lg rounded-0 px-3 mt-3 w-100"><span class="fs-6 me-2">Add Address</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
</div>
 
@endsection
  
