@extends('layouts.app')
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

  <!-- .row -->
  <div class="row">
    <div class="col-sm-12">
      <!-- ---------------------
                    start Default Basic Forms
                ---------------- -->
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Edit Order</h4>
          <form class="form" enctype="multipart/form-data"  action="{{route('order.update',$order->id)}}" method="post">
          @csrf

            <div class="mb-3 row">
              <label class="col-md-2 col-form-label">Order Id</label>
              <div class="col-md-10">
              {{ $order->order_id }}
              </div>
            </div>
            
            <div class="mb-3 row">
              <label class="col-md-2 col-form-label">User Name</label>
              <div class="col-md-10">
              {{ $order->user_name }}
              </div>
            </div>

            <div class="mb-3 row">
              <label class="col-md-2 col-form-label">Order Products</label>
              <div class="col-md-10">
                    <table class="table table-bordered table-striped table-hover">
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                    <input type="hidden" name="orderid" value="{{ $order->order_id }}" >
                    @foreach($orderproducts as $orderproduct)
                  <tr>
                      <input type="hidden" name="id[]" value="{{ $orderproduct->id }}" >
                      <td>{{ $orderproduct->product_name }} </td>
                      <td>{{ $orderproduct->quantity }} </td>
                      <td>&pound; {{ $orderproduct->price }}</td>
                      <td>&pound; {{ $orderproduct->total }}</td>
                  </tr>
                    @endforeach
                  <tr>
                    <th>SubTotal</th>
                    <td colspan="3">&pound; {{ $order->subtotal }} </td>
                  </tr>
                  <tr>
                    <th>Coupon Amount</th>
                    <td colspan="3">&pound; {{ $order->coupon_amount }}</td>
                  </tr>
                  <tr>
                    <th>Delivery Charge</th>
                    <td colspan="3">&pound; {{ $order->delivery_charge }}</td>
                  </tr>
                  <tr>
                    <th>Payment Method</th>
                    <td colspan="3">{{ $order->payment_method }}</td>
                  </tr>
                  <tr>
                    <th>Net Total</th>
                    <td colspan="3">&pound; {{ $order->total }}</td>
                  </tr>
                </table>
              </div>
            </div>

            <div class="mb-3 row">
              <label class="col-md-2 col-form-label">Billing Details</label>
              <div class="col-md-10">
                  <table class="table table-bordered table-striped table-hover">
                      <tr>
                        <td>{{ $address->firstname }} {{ $address->lastname }}<br>
                          {{ $address->street_address }}, {{ $address->street_address2 }}<br>
                            {{ $address->pincode }}<br>
                            {{ $address->phone }}
                        </td>
                    </tr>
                  </table>
              </div>
            </div>
            
            <div class="mb-3 row">
              <label class="col-md-2 col-form-label">Shipping Details</label>
              <div class="col-md-10">
                  <table class="table table-bordered table-striped table-hover">
                      <tr>
                        <td>{{ $address->firstname }} {{ $address->lastname }}<br>
                          {{ $address->street_address }}, {{ $address->street_address2 }}<br>
                            {{ $address->pincode }}<br>
                            {{ $address->phone }}
                        </td>
                    </tr>
                  </table>
              </div>
            </div>

            <div class="mb-3 row">
              <label class="col-md-2 col-form-label">Status</label>
              <div class="col-md-10">
              <select id="status" name="status" class="form-select" required>
                  <option value="">Select Status</option> 
                  <option value="waiting" <?php if($order->status=="waiting"){ ?> selected<?php } ?>>Waiting</option>
                  <option value="ordered" <?php if($order->status=="ordered"){ ?> selected<?php } ?>>Ordered</option>
                  <option value="dispatched" <?php if($order->status=="dispatched"){ ?> selected<?php } ?>>Dispatched</option>
                  <option value="delivered" <?php if($order->status=="delivered"){ ?> selected<?php } ?>>Delivered</option>
                </select>
              </div>
            </div>

            <div class="mb-3 row">
              <label class="col-md-2 col-form-label">&nbsp;</label>
              <div class="col-md-10">
                
                <button type="submit" class="btn btn-success rounded-pill px-4">
                    <div class="d-flex align-items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save feather-sm me-1 fill-icon"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                      Update
                    </div>
                  </button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- ---------------------
                    end Default Basic Forms
                ---------------- -->
    </div>
  </div>
  <!-- /.row -->
  <!-- -------------------------------------------------------------- -->
  <!-- End PAge Content -->
  <!-- -------------------------------------------------------------- -->
@endsection