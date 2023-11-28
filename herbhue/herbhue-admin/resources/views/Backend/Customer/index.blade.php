@extends('layouts.app')
@section('css')
    <!-- This page plugin CSS -->
    <link rel="stylesheet" href="{{ asset('dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
@endsection
@section('content')
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
<!-- -------------------------------------------------------------- -->
<!-- Start Page Content -->
<!-- -------------------------------------------------------------- -->
<!-- File export -->
<div class="row">
  <div class="col-12">
    <!-- ---------------------
                  start File export
              ---------------- -->
    <div class="card">
      <div class="border-bottom title-part-padding">
        <h4 class="card-title mb-0">Customers List</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="file_export" class="table table-striped table-bordered display text-nowrap">
            <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Date-Of-Birth</th>
            <th>Marriage Date</th>
            <th>Address</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Call Button</th>
            <th>Designation</th>
            <th>Image</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @if(count($customers)>0)
          @foreach ($customers as $customer)
            <tr>
              <td>{{ $customer->id }}</td>
              <td>{{ $customer->name }}</td>
              <td>{{ $customer->dob }}</td>
              <td>{{ $customer->dom }}</td>
              <td>
                {{ $customer->address1 }}<br>
                {{ $customer->address2 }}<br>
                {{ $customer->landmark }}<br>
                {{ $customer->city }}<br>
                {{ $customer->state }}<br>
                {{ $customer->pincode }}
              </td>
              <td>{{ $customer->email}}</td>
              <td>{{ $customer->mobile}}</td>
             
              <td align="center" style="vertical-align: middle;">
                <a href="tel:+91{{ $customer->mobile }}" style="text-decoration:none;"><img style="border: 3px solid #52c41a;border-radius: 50%;padding: 3px;" src="{{ asset('images/callbutton.png') }}" >
                </a>
              </td>
               <td>{{ $customer->designation}}</td>
               <td align="center" style="vertical-align: middle;">
                  <?php
                  if(is_null($customer->image) || $customer->image=="")
                  {
                  ?>
                  <img src="{{ asset('images/noimage.png') }}" >
                  <?php
                  }
                  else
                  {
                  ?>
                  <img src="{{ asset('images/'.$customer->image) }}" width="70" height="70">
                  <?php
                  }
                  ?>
              </td>
             
              <td>
               <!-- <a href="{{route('customer.edit',$customer->id)}}"  class="btn btn-primary btn-xs" title="Edit Customer"><i class="lni lni-pencil"></i></a> -->
                <a href="javascript:void(0);" onclick="deletecustomer({{$customer->id}})" class="btn btn-danger btn-xs" title="Delete"><i class="lni lni-trash"></i></a>
              </td>
            </tr>
          @endforeach
          @else
          <tr>
              <td colspan='9' align="center">No Customer Found</td>
          </tr>
          </tbody>

</table>
</div>
</div>
</div>
<!-- ---------------------
        end File export
    ---------------- -->
</div>
</div>

@endsection
@if(count($customers)>0)
@section('script')
<script>
  function deletecustomer(id)
  {
    if(confirm("Are you sure want to delete this customer?"))
    {
      var url="{{URL('customer')}}/"+id;
        $.ajax(
        {
            url: url,
            method: 'delete', 
            data:{"id":id, "_token": "{{ csrf_token() }}" },
            success: function (response)
            {
                alert(response); // see the reponse sent
                window.location.reload();
            }
        });
    }
  }  
</script>
@endsection
@endif