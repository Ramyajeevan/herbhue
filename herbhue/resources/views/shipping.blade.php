@extends('layouts.app') 
@section('title')
<title>Herbhue - shipping</title>
@endsection
@section('css')

@endsection
@section('content')
<div class="container-fluid mb-5">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-7">
                <div class="card mb-4 border-0 border-radius-20 " style="background-color: #E0E6EE ;;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9 pt-2">
                                <h5 class="text-secondary">Hey!</h5>
                                <h5 class="text-secondary">Your order will be delivered soon</h5>
                            </div>
                            <div class="col-3"><img src="{{ asset('img/delivery_dweb.png') }}" class="w-100" alt=""></div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4  ">
                    <div class="card-body">
                        <div class="row py-0">
                            <div class="col-3">
                                <p class="text-secondary text-center fw-bold">Ship to</p>
                            </div>
                            <div class="col-6">
                                <p class="text-black text-center fw-bold">{{ $address->firstname }}  {{ $address->lastname }}<br>
                                              {{ $address->street_address }} <br>
                                              {{ $address->street_address2 }} <br>
                                              {{ $address->city }}<br>
                                              {{ $address->state }}-{{ $address->pincode }}<br>
                                              {{ $address->phone }}</p>
                            </div>
                            <div class="col-3">
                                <a href="{{ route('checkout') }}" class="text-green text-center fw-bold">Change</a>
                            </div>
                        </div>
                    </div>
                </div>
                <h4 class="text-black">Select a payment method</h4>
                <div class="card border-secondary mb-4">
                    <div class="card-body">
                        <div class="form-check mb-3 ">
                            <input class="form-check-input" type="radio"  name="payment_method" id="cod" value="cod" checked>
                            <label class="form-check-label h5" for="cod">
                                Pay On Delivery
                            </label>
                            </div>
                            <hr class="p-0 m-0">
                            <div class="form-check my-3">
                            <input class="form-check-input" type="radio" name="payment_method" id="others" value="others">
                            <label class="form-check-label h5" for="others">
                                Pay Online
                            </label>
                            </div>
                    </div>
                </div>
                <h4 class="text-black">Select a Billing Address</h4>
                <div class="card border-secondary mb-4">
                    <div class="card-body">
                        <div class="form-check mb-3 ">
                            <input class="form-check-input" type="radio" id="same" value="same" name="billing_address" onclick="showshipping();" checked>
                            <label class="form-check-label h5 sameadd " for="same">
                                Same as Shipping Address
                            </label>
                        </div>
                        <hr class="p-0 m-0">
                        <div class="form-check my-3">
                        <input class="form-check-input" type="radio" id="differ" value="differ" name="billing_address" onclick="showshipping();" >
                        <label class="form-check-label h5 addother" for="differ">
                            Use a different Billing Address
                        </label>
                        </div>
                        <div id="billing_address" class="d-none">
                            <div class="row add1">
                                <div class="col-md-12 mb-3">
                                    <div class="form-floating">
                                        <select class="form-select border-secondary" id="country" name="country" aria-label="Floating label select example" diabled>
                                            <option value="United Kingdom" selected>United Kingdom</option>
                                        </select>
                                        <label for="country">Country / Region</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control form-control-lg border-secondary" name="billing_firstname" id="billing_firstname" placeholder="First Name">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control form-control-lg border-secondary" name="billing_lastname" id="billing_lastname" placeholder="Last Name"> 
                                </div>
                                <div class="col-md-12 mb-3">
                                    <input type="text" class="form-control form-control-lg border-secondary" name="billing_street_address" id="billing_street_address" placeholder="Address">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <input type="text" class="form-control form-control-lg border-secondary" name="billing_street_address2" id="billing_street_address2" placeholder="Apartment, suite, etc. (optional)">
                                </div>
                                <div class="col-md-4 mb-3"> 
                                    <input type="text" class="form-control form-control-lg border-secondary" name="billing_city" id="billing_city" placeholder="City">
                                </div>
                                <div class="col-md-4 mb-3"> 
                                    <input type="text" class="form-control form-control-lg border-secondary" name="billing_state" id="billing_state" placeholder="State">
                                </div>
                                <div class="col-md-4 mb-3"> 
                                    <input type="text" class="form-control form-control-lg border-secondary" name="billing_pincode" id="billing_pincode" placeholder="Pincode">
                                </div>
                                <div class="col-md-12 mb-3"> 
                                    <input type="text" class="form-control form-control-lg border-secondary" name="billing_phone" id="billing_phone" placeholder="Phone No.">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success w-50 btn-lg">Complete Order</button>
                    <a href="{{ route('checkout') }}" class="btn bg-transparent border-0 w-50 btn-lg text-green">Return to shipping</a>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header bg-transparent p-3">
                        <h4>Cart total: <span class="fw-bold">&pound; {{ $cart_total }}</span> </h4>
                    </div>
                    <div class="card-body">
                       <!-- <button type="button" class="btn btn-success w-100 btn-lg py-3 mb-3"> Proceed to
                            buy</button>
-->
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
</div>
@endsection
@section('script')
<script>
    function showshipping()
    {
      if(document.getElementById("same").checked==true)
      {
         $("#billing_address").addClass("d-none");
        $("#billing_address").removeClass("d-block");
      }
      else
      {
        $("#billing_address").removeClass("d-none");
        $("#billing_address").addClass("d-block");
      
      }
    }
</script>
@endsection