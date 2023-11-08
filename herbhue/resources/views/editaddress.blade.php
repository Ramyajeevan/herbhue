@extends('layouts.app') 
@section('title')
<title>Herbhue - Edit Address</title>
@endsection
@section('css') 
@endsection
@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-4" data-aos="fade-up"
     data-aos-duration="2000">
            @include('includes.myaccountsidenav')
            </div>
            <div class="col-md-8"  data-aos="fade-up"
     data-aos-duration="2000">
            <div class="card rounded-0 p-3 mb-3"> 
                        <div class="card-body"> 
                            <h4>Edit Address</h4>
                            <div class="row">
                                <form method="post" action="{{route('updateaddress',$address->id)}}" >
                                    @csrf
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <input type="text" placeholder="First Name " class="form-control rounded-0 " value="{{ $address->firstname }}" id="firstname" name="firstname">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <input type="text" placeholder="Last Name " class="form-control rounded-0 " value="{{ $address->lastname }}" id="lastname" name="lastname">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <small>COUNTRY</small>
                                    <p class="py-0 m-0">United Kingdom (UK)</p>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <div class="form-group">
                                        <input type="text" placeholder="HOUSE NUMBER AND STREET NAME" class="form-control rounded-0 " value="{{ $address->street_address }}"  id="street_address" name="street_address">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <div class="form-group">
                                        <input type="text" placeholder="APARTMENT, SUITE" class="form-control rounded-0 " id="street_address2" value="{{ $address->street_address2 }}" name="street_address2">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <input type="text" placeholder="TOWN / CITY" class="form-control rounded-0 " id="city" name="city" value="{{ $address->city }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <input type="text" placeholder="POSTCODE" class="form-control rounded-0 "  id="pincode" name="pincode" value="{{ $address->pincode }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <input type="text" placeholder="COUNTRY " class="form-control rounded-0 ">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <div class="form-group">
                                        <input type="text" placeholder="COMPANY (OPTIONAL)" class="form-control rounded-0 " id="company_name" name="company_name" value="{{ $address->company_name }}">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <div class="form-group">
                                        <input type="text" placeholder="PHONE" class="form-control rounded-0 " id="phone" name="phone" value="{{ $address->phone }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                <button type="submit" class="btn btn-dark btn-lg rounded-0 px-3 mt-3 w-100"><span class="fs-6 me-2">Update Address</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
</div>
 
@endsection
  
