@extends('layouts.app')
@section('content')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">Home</div>
	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="#"><i class="bx bx-home-alt"></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Customers List</li>
			</ol>
		</nav>
	</div>
</div>
<!--end breadcrumb-->
<h6 class="mb-0 text-uppercase">Customers List</h6>
<hr/>
@if(Session::has('success'))
    <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
		<div class="d-flex align-items-center">
			<div class="font-35 text-white"><i class="bx bxs-check-circle"></i>
			</div>
			<div class="ms-3">
				<h6 class="mb-0 text-white">Success</h6>
				<div class="text-white">{{Session::get('success')}}</div>
			</div>
		</div>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	 </div>
   @endif
<div class="card">
  <div class="card-body">
    <div class="table-responsive">
      <table id="example2" class="table table-striped table-bordered">
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
          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>
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