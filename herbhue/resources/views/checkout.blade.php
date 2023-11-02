@extends('layouts.app') 
@section('title')
<title>Herbhue - Checkout Page</title>
@endsection
@section('css')
<style>
        .form-control {
    background-color: #f4f4f4;
    border: none;
    height: 40px;
}

.order-summary{
    background:#ACB69C2B;
    position: sticky; 
    top: 158px;
}
    </style>
@endsection
@section('content')
<div class="container-fluid mb-5">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                @if(Session::has('errors'))
                <div class="alert alert-danger alert-dismissible" style="marg">
                    <button type="button" style="width:1rem;padding-right:2rem;" class="close" data-dismiss="alert">×</button>
                    <strong>Error! </strong> <br><br><?php echo html_entity_decode(Session::get('errors')); ?>
                </div>
                @endif
                <form method="post" action="{{ route('placeorder') }}">
                @csrf
                    <div class="card rounded-0 p-3 mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <p class="fs-5">Select or Add a new address</p>
                                    @if(count($addresses)>0)
                                    @foreach($addresses as $address)
                                    <div class="row">
                                        <!-- take in to from here -->
                                        <div style="width: 100%; text-wrap: nowrap;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="address_id{{ $address->id }}" name="address_id" value="{{ $address->id }}">
                                                <label class="form-check-label"  for="address_id{{ $address->id }}">
                                                {{ $address->firstname }}&nbsp;{{ $address->lastname }}, <br>
                                                    <span> {{ $address->street_address }},<br>
                                                    @if($address->street_address2!="") {{ $address->street_address2 }}, <br>@endif</span> 
                                                    <span>{{ $address->city }}</span> <br>
                                                    <span>{{ $address->pincode }}</span><br>
                                                    <span>Mobile : {{ $address->phone }}</span>
                                                </label>
                                            </div>
                                        </div>
                                            <!-- take in to ends here -->
                                    </div>
                                    @endforeach
                                    
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="text-black text-center"> Or </h4><br> 

                    <div class="card rounded-0 p-3 mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <input type="text" placeholder="First Name " class="form-control rounded-0 " id="firstname" name="firstname">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <input type="text" placeholder="Last Name " class="form-control rounded-0 " id="lastname" name="lastname">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <small>COUNTRY</small>
                                    <p class="py-0 m-0">United Kingdom (UK)</p>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <input type="text" placeholder="HOUSE NUMBER AND STREET NAME" class="form-control rounded-0 "  id="street_address" name="street_address">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <input type="text" placeholder="APARTMENT, SUITE" class="form-control rounded-0 " id="street_address2" name="street_address2">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <input type="text" placeholder="TOWN / CITY" class="form-control rounded-0 " id="city" name="city">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <input type="text" placeholder="POSTCODE" class="form-control rounded-0 "  id="pincode" name="pincode">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <input type="text" placeholder="COUNTRY " class="form-control rounded-0 ">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <input type="text" placeholder="COMPANY (OPTIONAL)" class="form-control rounded-0 " id="company_name" name="company_name">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <input type="text" placeholder="PHONE" class="form-control rounded-0 " id="phone" name="phone">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <textarea class="form-control" placeholder="ORDER NOTES (OPTIONAL)" id="notes" name="notes"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                    <div class="card rounded-0 p-3 mb-3">
                        <div class="card-body">
                            <p class="fs-5">Billing details</p>
                            <div class="form-check">
                                <input class="form-check-input rounded-0" type="checkbox" value="different" name="billing_address" id="billingdetail">
                                <label class="form-check-label" for="billingdetail">
                                Billing to a different address?
                                </label>
                            </div>
                            <div class="row mt-4" id="billingdetailform">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <input type="text" placeholder="First Name " class="form-control rounded-0 "  name="billing_firstname" id="billing_firstname">  
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <input type="text" placeholder="Last Name "  name="billing_lastname" id="billing_lastname" class="form-control rounded-0 ">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <small>COUNTRY</small>
                                    <p class="py-0 m-0">United Kingdom (UK)</p>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <input type="text" placeholder="HOUSE NUMBER AND STREET NAME" class="form-control rounded-0 " name="billing_street_address" id="billing_street_address">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <input type="text" placeholder="APARTMENT, SUITE" class="form-control rounded-0 " name="billing_street_address2" id="billing_street_address2">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <input type="text" placeholder="TOWN / CITY" class="form-control rounded-0 " name="billing_city" id="billing_city">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <input type="text" placeholder="POSTCODE" class="form-control rounded-0 " name="billing_pincode" id="billing_pincode">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <input type="text" placeholder="COUNTRY " class="form-control rounded-0 ">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <input type="text" placeholder="COMPANY (OPTIONAL)" class="form-control rounded-0 " name="billing_company" id="billing_company">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <input type="text" placeholder="PHONE" class="form-control rounded-0 " name="billing_phone" id="billing_phone">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <textarea class="form-control" placeholder="ORDER NOTES (OPTIONAL)" id="billing_notes" name="billing_notes"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                
                                                        
                    <div class="card rounded-0 p-3 mb-3">
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="card_type" id="Credit" checked value="card">
                                <label class="form-check-label" for="Credit">
                                Credit or Debit Card
                                </label>
                                
                                    <img src="{{asset('img/american.svg')}}" width="20px" class="me-1" alt="American">
                                    <img src="{{asset('img/discover.svg')}}" width="20px" class="me-1" alt="Discover">
                                
                                <img src="{{asset('img/visa.svg')}}" width="20px" class="me-1" alt="Visa">
                                <img src="{{asset('img/mastercard.svg')}}" width="20px" class="me-1" alt="Mastercard">
                                
                            </div>
                            <div class="Credit my-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text rounded-0 border-0" id="basic-addon1"><i class="fa fa-credit-card text-muted"></i></span>
                                    <input type="text" class="form-control" placeholder="Card Number" id="cardnumber" name="cardnumber" aria-describedby="basic-addon1">
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="MM" id="expire_month" name="expire_month" aria-describedby="basic-addon1">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="YY" id="expire_year" name="expire_year" aria-describedby="basic-addon1">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="CVV" id="cvv" name="cvv" aria-describedby="basic-addon1"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <div class="card rounded-0 p-3 mb-3">
                        <div class="card-body">
                            <p class="fs-5 ">Confirmation</p>
                            <p class="small">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.</p>
                            <div class="form-check">
                                <input class="form-check-input rounded-0" type="checkbox" value="privacy" name="privacy" id="check1">
                                <label class="form-check-label" for="check1">
                                I have read and agree to the website Terms of Use and Privacy Policy.  </label>
                            </div>

                            <button type="submit" class="btn btn-dark btn-lg rounded-0 px-3 mt-3 w-100"><span class="fs-6 me-2">Place Order</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="card border-0  rounded-0 p-4 order-summary">
                    <p class="fs-5 ps-3 mt-1">Order Summary</p>
                    <p class="d-flex justify-content-between px-0 pb-2 mb-1">
                        <strong>Cart value</strong> 
                        <span class="text-muted">&pound; {{ $cart_total }}</span>
                    </p>    
                    <p class="d-flex justify-content-between border-bottom px-0 pb-2 mb-1">
                        <strong>Delivery Charges</strong> 
                        <span class="text-success">free</span>
                    </p>    
                    @php $coupon_amount=0; @endphp
                    @if(!empty(Session::get('coupon_code')))
                    @php $coupon_amount=Session::get('coupon_amount'); @endphp
                    
                    <p class="d-flex justify-content-between border-bottom px-0 pb-2 mb-1">
                        <strong>Coupon Charges</strong> 
                        <span  class="text-muted">&pound; {{ $coupon_amount }}</span>
                    </p>
                    @endif
                    <p class="d-flex justify-content-between border-bottom px-0 pb-2 mb-1">
                        <strong>Order Total</strong> 
                        <span class="text-success">&pound; {{ $cart_total-$coupon_amount }}</span>
                    </p> 

                    <p class="d-flex justify-content-between px-0 pb-2 mb-1">
                        <strong>Amount To be paid</strong> 
                        <span class="text-success">&pound; {{ $cart_total-$coupon_amount }}</span>
                    </p> 

                    <div class="card-footer bg-white border-0">
                           
                   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(function() {
        // Hide the form initially on page load
        $("#billingdetailform").hide();

        $("#billingdetail").click(function() {
            if ($(this).is(":checked")) {
                $("#billingdetailform").show();
            } else {
                $("#billingdetailform").hide();
            }
        });
    });
</script>

@endsection