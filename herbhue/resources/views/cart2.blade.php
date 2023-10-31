 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>new cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href=" {{asset('css/style.css')}}">
    <style>
        .form-control {
    background-color: #f4f4f4;
    border: none;
    height: 40px;
}
    </style>
 </head>
 <body>
 <div id="overlay"></div>
<nav class="navbar bg-light border-bottom pb-3">
  <div class="container d-flex justify-content-center">
    <a class="navbar-brand" href="#">
    <img src="{{asset('img/logo.png')}}" alt="" width="195px" height="24px">
    </a>
  </div>
</nav>
     
<div class="container-fluid">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                
                <div class="card rounded-0 p-3 mb-3">
                    <div class="card-body">
                        <div class="row">
                                            
                                                <div class="col-md-6 mb-3"><div class="form-group">
                                            <input type="text" placeholder="First Name " class="form-control rounded-0 ">
                                            
                                        </div></div>
                                        <div class="col-md-6 mb-3"><div class="form-group">
                                            <input type="text" placeholder="Last Name " class="form-control rounded-0 ">
                                            
                                        </div></div>
                                                <div class="col-md-12 mb-3">
                                                    <small>COUNTRY</small>
                                                    <p class="py-0 m-0">United Kingdom (UK)</p>
                                                </div>
                                                
                                        <div class="col-md-12 mb-3"><div class="form-group">
                                            <input type="text" placeholder="HOUSE NUMBER AND STREET NAME" class="form-control rounded-0 ">
                                            
                                        </div></div>
                                        
                                        <div class="col-md-12 mb-3"><div class="form-group">
                                            <input type="text" placeholder="APARTMENT, SUITE" class="form-control rounded-0 ">
                                            
                                        </div></div>
                                        <div class="col-md-4 mb-3"><div class="form-group">
                                            <input type="text" placeholder="TOWN / CITY" class="form-control rounded-0 ">
                                            
                                        </div></div>
                                        
                                        <div class="col-md-4 mb-3"><div class="form-group">
                                            <input type="text" placeholder="POSTCODE" class="form-control rounded-0 ">
                                            
                                        </div></div>
                                        
                                        <div class="col-md-4 mb-3"><div class="form-group">
                                            <input type="text" placeholder="COUNTRY " class="form-control rounded-0 ">
                                            
                                        </div></div>
                                        
                                        <div class="col-md-12 mb-3"><div class="form-group">
                                            <input type="text" placeholder="COMPANY (OPTIONAL)" class="form-control rounded-0 ">
                                            
                                        </div></div>

                                        
                                        <div class="col-md-12 mb-3"><div class="form-group">
                                            <input type="text" placeholder="PHONE" class="form-control rounded-0 ">
                                            
                                        </div></div>
                                                <div class="col-md-12">
                                                <textarea class="form-control" placeholder="ORDER NOTES (OPTIONAL)"></textarea>

                                                </div>
                                            </div>
                    
                    </div>
                </div>
                <div class="card rounded-0 p-3 mb-3">
                    <div class="card-body">
                        <p class="fs-5">Billing details</p>
                        <div class="form-check">
                            <input class="form-check-input rounded-0" type="checkbox" value="" id="billingdetail">
                            <label class="form-check-label" for="billingdetail">
                            Billing to a different address?
                            
                            </label>
                            </div>
                            <div class="row mt-4" id="billingdetailform">
                                            
                                            <div class="col-md-6 mb-3"><div class="form-group">
                                        <input type="text" placeholder="First Name " class="form-control rounded-0 ">
                                        
                                    </div></div>
                                    <div class="col-md-6 mb-3"><div class="form-group">
                                        <input type="text" placeholder="Last Name " class="form-control rounded-0 ">
                                        
                                    </div></div>
                                            <div class="col-md-12 mb-3">
                                                <small>COUNTRY</small>
                                                <p class="py-0 m-0">United Kingdom (UK)</p>
                                            </div>
                                            
                                    <div class="col-md-12 mb-3"><div class="form-group">
                                        <input type="text" placeholder="HOUSE NUMBER AND STREET NAME" class="form-control rounded-0 ">
                                        
                                    </div></div>
                                    
                                    <div class="col-md-12 mb-3"><div class="form-group">
                                        <input type="text" placeholder="APARTMENT, SUITE" class="form-control rounded-0 ">
                                        
                                    </div></div>
                                    <div class="col-md-4 mb-3"><div class="form-group">
                                        <input type="text" placeholder="TOWN / CITY" class="form-control rounded-0 ">
                                        
                                    </div></div>
                                    
                                    <div class="col-md-4 mb-3"><div class="form-group">
                                        <input type="text" placeholder="POSTCODE" class="form-control rounded-0 ">
                                        
                                    </div></div>
                                    
                                    <div class="col-md-4 mb-3"><div class="form-group">
                                        <input type="text" placeholder="COUNTRY " class="form-control rounded-0 ">
                                        
                                    </div></div>
                                    
                                    <div class="col-md-12 mb-3"><div class="form-group">
                                        <input type="text" placeholder="COMPANY (OPTIONAL)" class="form-control rounded-0 ">
                                        
                                    </div></div>

                                    
                                    <div class="col-md-12 mb-3"><div class="form-group">
                                        <input type="text" placeholder="PHONE" class="form-control rounded-0 ">
                                        
                                    </div></div>
                                            <div class="col-md-12">
                                            <textarea class="form-control" placeholder="ORDER NOTES (OPTIONAL)"></textarea>

                                            </div>
                                        </div>
                

                    </div>
                </div>
              
                                                    
            <div class="card rounded-0 p-3 mb-3">
                                                        <div class="card-body">
                                                   
                                                    
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="Credit">
                                    <label class="form-check-label" for="Credit">
                                    Credit or Debit Card
                                    </label>
                                    <label for=""><img src="{{asset('img/american.svg')}}" width="20px" class="me-1" alt="">
                                    <img src="{{asset('img/discover.svg')}}" width="20px" class="me-1" alt=""></label>
                                    <img src="{{asset('img/visa.svg')}}" width="20px" class="me-1" alt="">
                                    <img src="{{asset('img/mastercard.svg')}}" width="20px" class="me-1" alt="">
                                    </div>
                                    <div class="Credit my-3">
                                    <div class="input-group mb-3">
                                    <span class="input-group-text rounded-0 border-0" id="basic-addon1"><i class="fa fa-credit-card text-muted"></i></span>
                                    <input type="text" class="form-control" placeholder="Card Number" aria-label="Username" aria-describedby="basic-addon1">
                                    

                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                    <input type="text" class="form-control" placeholder="MM" aria-label="Username" aria-describedby="basic-addon1">

                                        </div>
                                        <div class="col-md-4">
                                    <input type="text" class="form-control" placeholder="YY" aria-label="Username" aria-describedby="basic-addon1">

                                        </div>
                                        <div class="col-md-4">
                                    <input type="text" class="form-control" placeholder="CVV" aria-label="Username" aria-describedby="basic-addon1"> 

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
  <input class="form-check-input rounded-0" type="checkbox" value="" id="check1">
  <label class="form-check-label" for="check1">
  I have read and agree to the website Terms of Use and Privacy Policy.  </label>
</div>

 

<button type="button" class="btn btn-dark btn-lg rounded-0 px-3 mt-3 w-100"><span class="fs-6 me-2">Place Order</button>



                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="card bg-light-green  rounded-0 p-4 sticky-top">
                    <p class="fs-5 ps-3 mt-1">Order Summary</p>
                    <p class="d-flex justify-content-between px-0 pb-2 mb-1"><strong>Cart value</strong> <span class="text-muted">£35.99</span></p>    
                    <p class="d-flex justify-content-between border-bottom px-0 pb-2 mb-1"><strong>Delivery Charges</strong> <span class="text-success">free</span></p>    
                     
                    <p class="d-flex justify-content-between border-bottom px-0 pb-2 mb-1"><strong>Order Total</strong> <span class="text-success">15452</span></p> 

                    <p class="d-flex justify-content-between px-0 pb-2 mb-1"><strong>Amount To be paid</strong> <span class="text-success">15452</span></p> 

                    <div class="card-footer bg-white border-0">
                           
                   
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script src="https://code.jquery.com/jquery-3.5.1.js"></script>


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
 </body>
 </html>