@extends('layouts.app') 
@section('title')
<title>Herbhue - Checkout Page</title>
@endsection
@section('css')

@endsection
@section('content')
<div class="container-fluid">
<form method="post" action="{{ route('placeorder') }}">
@csrf
    <div class="container mt-5">
        <div class="row">
        <div class="col-md-7">
            <h4>Select or Add a new address</h4>
            @if(Session::has('errors'))
    <div class="alert alert-danger alert-dismissible" style="marg">
        <button type="button" style="width:1rem;padding-right:2rem;" class="close" data-dismiss="alert">×</button>
        <strong>Error! </strong> <br><br><?php echo html_entity_decode(Session::get('errors')); ?>
    </div>
    @endif
            @if(count($addresses)>0)
                @foreach($addresses as $address)
            <div class="row">
                <!-- take in to from here -->
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="address_id{{ $address->id }}" name="address_id" value="{{ $address->id }}">
                        <label class="form-check-label"  for="address_id{{ $address->id }}">
                        {{ $address->firstname }}&nbsp;{{ $address->lastname }}, <br>
                            <span> {{ $address->street_address }},{{ $address->street_address2 }},</span> <br>
                            <span>{{ $address->city }}</span> <br>
                            <span>{{ $address->state }} - {{ $address->pincode }}</span><br>
                            <span>Email : {{ $address->email }}</span> <br>
                            <span>Mobile : {{ $address->phone }}</span>
                        </label>
                    </div>
                </div>
                    <!-- take in to ends here -->
            </div>
                @endforeach
            <h4 class="text-black text-center"> Or </h4><br> 
            @endif
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="form-floating">
                        <select class="form-select border-secondary" id="country" name="country" aria-label="Floating label select example" disabled>
                            <option value="United Kingdom" selected>United Kingdom</option>
                        </select>
                        <label for="country">Country / Region</label>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <input type="text" class="form-control form-control-lg border-secondary" placeholder="First Name" id="firstname" name="firstname">
                </div>
                <div class="col-md-6 mb-3">
                    <input type="text" class="form-control form-control-lg border-secondary" placeholder="Last Name" id="lastname" name="lastname">
                </div>
                <div class="col-md-12 mb-3">
                    <input type="text" class="form-control form-control-lg border-secondary" placeholder="Address" id="street_address" name="street_address">
                </div>
                <div class="col-md-12 mb-3">
                    <input type="text" class="form-control form-control-lg border-secondary" placeholder="Apartment, suite, etc. (optional)"  id="street_address2" name="street_address2">
                </div>
                <div class="col-md-4 mb-3">
                    <input type="text" class="form-control form-control-lg border-secondary" placeholder="City"  id="city" name="city">
                </div>
                <div class="col-md-4 mb-3">
                    <input type="text" class="form-control form-control-lg border-secondary" placeholder="State"  id="state" name="state">
                </div>
                <div class="col-md-4 mb-3">
                    <input type="text" class="form-control form-control-lg border-secondary" placeholder="Pincode"  id="pincode" name="pincode">
                </div>
                <div class="col-md-12 mb-3">
                    <input type="text" class="form-control form-control-lg border-secondary"  id="phone" name="phone" placeholder="Mobile No">
                </div>
                <div class="col-md-12 mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="shipto" id="shipto">
                        <label class="form-check-label" for="shipto">
                            Save this information for next time
                        </label>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <button type="submit" class="btn btn-success w-50 btn-lg">Save & Continue</button>
                </div>
            </div>
        </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-black mb-3">Bill Summary</h4>
                        <p class="d-flex justify-content-between text-secondary"> 
                            <span>Total MRP</span> <span>&pound; {{ $cart_total_mrp }}</span>
                        </p>
                        <p class="d-flex justify-content-between text-secondary"> 
                            <span>Discount on MRP</span> <span class="text-green">-&pound; {{ $cart_total_mrp - $cart_total }}</span>
                        </p>
                        <hr class="m-0 p-0">
                        <p class="d-flex justify-content-between text-secondary"> 
                            <span>Cart Value</span> <span>&pound; {{ $cart_total }}</span>
                        </p>
                        <p class="d-flex justify-content-between text-secondary"> 
                            <span>Delivery Charges</span>
                            <span class="text-green">Free</span>
                        </p>

                        @php $coupon_amount=0; @endphp
                        @if(!empty(Session::get('coupon_code')))
                        @php $coupon_amount=Session::get('coupon_amount'); @endphp
                      
                        <p class="d-flex justify-content-between text-secondary"> <span>Coupon Charges</span> <span>&pound; {{ $coupon_amount }}</span></p>
                        @endif
                        
                        <hr class="m-0 p-0">
                        <p class="d-flex justify-content-between text-secondary"> 
                            <span>Order Total</span> <span>&pound; {{ $cart_total-$coupon_amount }}</span>
                        </p>

                        <hr class="m-0 p-0">
                        <p class="d-flex justify-content-between text-secondary">
                            <span>Amount to be paid</span>
                            <span>&pound; {{ $cart_total-$coupon_amount }}</span>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@endsection
@section('script')


@endsection