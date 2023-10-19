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
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label h5" for="flexRadioDefault1">
                                Pay On Delivery
                            </label>
                            </div>
                            <hr class="p-0 m-0">
                            <div class="form-check my-3">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                            <label class="form-check-label h5" for="flexRadioDefault2">
                                Pay Online
                            </label>
                            </div>
                    </div>
                </div>


                
                <h4 class="text-black">Select a Billing Address</h4>

                <div class="card border-secondary mb-4">
                    <div class="card-body">
                        <div class="form-check mb-3 ">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                            <label class="form-check-label h5 sameadd " for="flexRadioDefault3">
                                Same as Shipping Address
                            </label>
                            </div>
                            <hr class="p-0 m-0">
                            <div class="form-check my-3">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4"  >
                            <label class="form-check-label h5 addother" for="flexRadioDefault4">
                                Use a different Billing Address
                            </label>
                            </div>
                            <div class="row add1">
                            <div class="col-md-12 mb-3">
                                <div class="form-floating">
                                    <select class="form-select border-secondary" id="floatingSelect"
                                        aria-label="Floating label select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <label for="floatingSelect">Works with selects</label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" class="form-control form-control-lg border-secondary" placeholder="First Name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" class="form-control form-control-lg border-secondary" placeholder="Last Name">
    
                            </div>
    
                            <div class="col-md-12 mb-3">
                                <input type="text" class="form-control form-control-lg border-secondary" placeholder="Address">
    
                            </div>
    
                            <div class="col-md-12 mb-3">
                                <input type="text" class="form-control form-control-lg border-secondary" placeholder="Apartment, suite, etc. (optional)">
    
                            </div>
    
                            <div class="col-md-4 mb-3"> <input type="text" class="form-control form-control-lg border-secondary"
                                    placeholder="City">
                            </div>
                            <div class="col-md-4 mb-3"> <input type="text" class="form-control form-control-lg border-secondary"
                                    placeholder="State">
                            </div>
    
                            <div class="col-md-4 mb-3"> <input type="text" class="form-control form-control-lg border-secondary"
                                    placeholder="Pincode">
                            </div>
    
        
                            <div class="col-md-12 mb-3"> <input type="text" class="form-control form-control-lg border-secondary"
                                    placeholder="Phone No.">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-success w-50 btn-lg">Complete Order</button>
                    <button type="button" class="btn bg-transparent border-0 w-50 btn-lg text-green">Return to shipping</button>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header bg-transparent p-3">
                        <h4>Cart total: <span class="fw-bold">£ 482.00</span> </h4>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-success w-100 btn-lg py-3 mb-3"> Proceed to
                            buy</button>
                        <h4 class="text-black mb-3">Bill Summary</h4>
                        <p class="d-flex justify-content-between text-secondary"> <span>Total MRP</span> <span>£
                                1448.00</span></p>
                        <p class="d-flex justify-content-between text-secondary"> <span>Discount on MRP</span> <span
                                class="text-green">-£ 458.50</span></p>
                        <hr class="m-0 p-0">
                        <p class="d-flex justify-content-between text-secondary"> <span>Cart Value</span> <span>£
                                989.00</span></p>

                        <p class="d-flex justify-content-between text-secondary"> <span>Delivery Charges</span>
                            <span class="text-green">Free</span></p>

                        <p class="d-flex justify-content-between text-secondary"> <span>Handling Charges</span>
                            <span>£ 19.00</span></p>
                        <hr class="m-0 p-0">
                        <p class="d-flex justify-content-between text-secondary"> <span>Order Total</span> <span>£
                                1008.00</span></p>

                        <hr class="m-0 p-0">
                        <p class="d-flex justify-content-between text-secondary"> <span>Amount to be paid</span>
                            <span>£ 482.00</span></p>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('script')

@endsection