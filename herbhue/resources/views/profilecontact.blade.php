@extends('layouts.app') 
@section('title')
<title>Herbhue - Edit Profile</title>
@endsection
@section('css') 
<style>
    ::placeholder {
   font-size:12px;
}
</style>
@endsection
@section('content')
<div class="container-fluid my-4">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-4 mb-4"  data-aos="fade-up"
     data-aos-duration="2000">
            @include('includes.myaccountsidenav')
            </div>
            <div class="col-md-8 mb-4"  data-aos="fade-up"
     data-aos-duration="2000">
            <div class="card shadow border-0 rounded-0 p-3">
                    <div class="card-body">
                        <h3 class=" text-black">Contact Us</h4>
                        <p class="small text-black">For Any Query, Related To Any Product. Drop Your Details Below</p>
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
                                <label for="" class="fw-bold">Name</label>
                                <input type="text" class="form-control form-control-lg  rounded-0" id="name" name="name" required placeholder="Enter your name">
                            </div>
                            <div class="mb-3">
                            <label for="" class="fw-bold">Email ID</label>
                                <input type="email" class="form-control form-control-lg  rounded-0" id="email" name="email" required placeholder="Enter your email address">
                            </div>
                            <div class="mb-3"> 
                            <label for="" class="fw-bold">Message</label>
                                 <textarea class="form-control form-control-lg  rounded-0" id="message" name="message" rows="3" placeholder="Go ahead, we are listing..." required></textarea>
                            </div>
                             
                            <div class="text-end">
                                <button type="submit" class="btn btn-dark text-white   rounded-0">Submit</button>
                            </div>
                           
                        </form>
                    </div>
                </div>   
            </div>
        </div>
    </div>
</div>
 
@endsection
  
