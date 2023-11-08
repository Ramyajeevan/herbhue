@extends('layouts.app') 
@section('title')
<title>Herbhue - Contact Us</title>
@endsection
@section('css')
 <style>
    body{
        background:#F8F8F8 !important;
    }
    ::placeholder {
   font-size:12px;
}
 </style>
@endsection
@section('content')
<!-- <div class="container-fluid bg-green py-5">
    <div class="container py-5">
        <h1 class="text-white">
            Contact Us
        </h1>
        <p class="text-white">For Any Query, Related To Any Product. Drop Your Details Below</p>
    </div>
</div> -->

<div class="container-fluid py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card shadow border-0 rounded-0 p-3">
                    <div class="card-body">
                        <h4 class="text-center text-black">Contact Us</h4>
                        <p class="text-center text-black">For Any Query, Related To Any Product. <br> Drop Your Details Below</p>
                        <form method="post" action="{{ route('contactus') }}">
                            @csrf
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
                            <div class="mb-3">
                                <input type="text" class="form-control form-control-lg  rounded-0" id="name" name="name" required placeholder="Enter your name">
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control form-control-lg  rounded-0" id="email" name="email" required placeholder="Enter your email address">
                            </div>
                            <div class="mb-3"> 
                                 <textarea class="form-control form-control-lg  rounded-0" id="message" name="message" rows="3" placeholder="Go ahead, we are listing..." required></textarea>
                            </div>
                             
                            
                            <button type="submit" class="btn btn-dark text-white w-100 btn-lg rounded-0">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-3"></div>

        </div>


    </div>
    <div class="row my-5">
            <div class="col-md-5 p-3 bg-white">
                <h4 class="text-black fw-bold ">HERBHUE</h4>
                <ul class="list-unstyled">
                    <li class="fs-5 mb-4"><img src="{{asset('img/location-pin.png')}}" width="30px" class="me-2" alt="">Address: Lorem Ipsum is simply dummy text of the prin.</li>
                    <li class="fs-5 mb-4"><img src="{{asset('img/phone-icon.png')}}" width="30px" class="me-2" alt="">For Queries: +44 0000 000 000</li>
                    <li class="fs-5 mb-4"> For Complaint Email To: <br> @herbhue.azurewebsite.net

                    </li>

                    <li class="fs-5 mb-4"><img src="{{asset('img/calender-icon.png')}}" width="30px" class="me-2" alt="">Hours of operation <br> Open all 7 days 9 am to 6 pm</li>

                </ul>
            </div>
            <div class="col-md-7">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3430.531051086104!2d76.1630202!3d30.70346785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39100df6ef058c13%3A0xc69b00abb0d0653!2sIkolahi%2C%20Punjab%20141401!5e0!3m2!1sen!2sin!4v1697653701128!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
</div>
@endsection
@section('script')

@endsection