@extends('layouts.app')
@section('content')
<div class="conatiner-fluid content-inner mt-n5 py-0">
  <div class="bd-example">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Customers</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Customer</li>
        </ol>
    </nav>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between">
          <div class="header-title">
            <h4 class="card-title">Edit Customer</h4>
          </div>
        </div>
        <div class="card-body">
            @if(Session::has('errors'))
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24">
                    <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                <div>
                {{Session::get('errors')}}
                </div>
            </div>
            @endif
             <form class="mt-3" enctype="multipart/form-data" action="{{route('customer.update',$customer->id)}}" method="post">
            @csrf
            
            <div class="form-group row">
                  <label class="control-label col-sm-3 align-self-center mb-0" for="name">Name:</label>
                  <div class="col-sm-9">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" value="{{ $customer->name }}" required>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="control-label col-sm-3 align-self-center mb-0" for="email">Email:</label>
                  <div class="col-sm-9">
                  <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" value="{{ $customer->email }}" required>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="control-label col-sm-3 align-self-center mb-0" for="mobile">Mobile:</label>
                  <div class="col-sm-9">
                  <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Enter Mobile" value="{{ $customer->mobile }}" readonly>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="control-label col-sm-3 align-self-center mb-0" for="name">Password:</label>
                  <div class="col-sm-9">
                  <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" value="{{ $customer->password }}" required>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="control-label col-sm-3 align-self-center mb-0" for="image">Image:</label>
                  <div class="col-sm-9">
                  <input class="form-control" type="file" id="image" name="image">
                  </div>
              </div>
              <div class="form-group row">
                  <label class="control-label col-sm-3 align-self-center mb-0"></label>
                  <div class="col-sm-9">
                  <button type="submit" class="btn btn-primary">Update</button>
                  </div>
              </div>

            </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
