@extends('layouts.app')
@section('content')
<div class="row clearfix">
  <!-- Basic Examples -->
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <ol class="breadcrumb breadcrumb-bg-amber">        
          <li><a href="#">Home</a></li>
          <li><a href="#">User</a></li>
       		<li class="active">Edit User</li>
        </ol>
  </div>
  <!-- #END# Basic Examples -->
</div>

<!-- Vertical Layout -->
<div class="row clearfix">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="header">
        <h2>
          Edit User
        </h2>
      </div>
      <div class="body">
         @if(Session::has('errors'))
        <div class="alert bg-red alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
         {{Session::get('errors')->first()}}
        </div>
         @endif
        <form enctype="multipart/form-data" action="{{route('user.update',$user->id)}}" method="post"  class="form-horizontal">
          @csrf
          <div class="row">
            <div class="col-sm-6"><label>User Name</label></div>
            <div class="col-sm-6">{{$user->name}}</div>
          </div>
          <div class="row">
            <div class="col-sm-6"><label>E-mail</label></div>
            <div class="col-sm-6">{{$user->email}}</div>
          </div>
          <div class="row">
            <div class="col-sm-6"><label>Password</label></div>
            <div class="col-sm-6">{{$user->password}}</div>
          </div>
          <div class="row">
            <div class="col-sm-6"><label>Address</label></div>
            <div class="col-sm-6">{{$user->address}}</div>
          </div>
          <div class="row">
            <div class="col-sm-6"><label>City</label></div>
            <div class="col-sm-6">{{$user->city}}</div>
          </div>
          <div class="row">
            <div class="col-sm-6"><label>Pincode</label></div>
            <div class="col-sm-6">{{$user->pincode}}</div>
          </div>
          <div class="row">
            <div class="col-sm-6"><label>Mobile</label></div>
            <div class="col-sm-6">{{$user->mobile}}</div>
          </div>
          <div class="row">
            <div class="col-sm-6"><label>Date Of Birth</label></div>
            <div class="col-sm-6">{{$user->dob}}</div>
          </div>
        
          <div class="row">
            <div class="col-sm-6"><label>Added Date</label></div>
            <div class="col-sm-6">{{$user->added_date}}</div>
          </div>
          <div class="row">
            <div class="col-sm-6"><label for="status">Status</label></div>
            <div class="col-sm-6">
              <select id="status" name="status" class="form-control show-tick" required>
                <option value="">Select Status</option> 
                <option value="waiting"<?php if($user->status=="waiting"){ ?> selected<?php } ?>>Waiting</option>
                <option value="approved" <?php if($user->status=="approved"){ ?> selected<?php } ?>>Approved</option>
                <option value="cancelled" <?php if($user->status=="cancelled"){ ?> selected<?php } ?>>Cancelled</option>
                <option value="closed" <?php if($user->status=="closed"){ ?> selected<?php } ?>>Closed</option>
              </select>
            </div>
          </div>
          <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- #END# Vertical Layout -->

@endsection
