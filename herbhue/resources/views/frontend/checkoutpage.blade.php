@extends('frontend.layout.main')

@section('content')
 
<div class="container-fluid">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-7">
                    <h4 class="text-black">Add a new address</h4>
                    <div class="row">
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
                        <div class="col-md-12 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Save this information for next time
                                </label>
                              </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="button" class="btn btn-success w-50 btn-lg">Save & Continue</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-black mb-3">Bill Summary</h4>
                            <p class="d-flex justify-content-between text-secondary"> <span>Total MRP</span> <span>£
                                    1448.00</span></p>
                            <p class="d-flex justify-content-between text-secondary"> <span>Discount on MRP</span> <span
                                    class="text-green">-£ 458.50</span></p>
                            <hr class="m-0 p-0">
                            <p class="d-flex justify-content-between text-secondary"> <span>Cart Value</span> <span>£
                                    989.00</span></p>

                            <p class="d-flex justify-content-between text-secondary"> <span>Delivery Charges</span>
                                <span class="text-green">Free</span>
                            </p>

                            <p class="d-flex justify-content-between text-secondary"> <span>Handling Charges</span>
                                <span>£ 19.00</span>
                            </p>
                            <hr class="m-0 p-0">
                            <p class="d-flex justify-content-between text-secondary"> <span>Order Total</span> <span>£
                                    1008.00</span></p>

                            <hr class="m-0 p-0">
                            <p class="d-flex justify-content-between text-secondary"> <span>Amount to be paid</span>
                                <span>£ 482.00</span>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection