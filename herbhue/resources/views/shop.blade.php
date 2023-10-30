@extends('layouts.app')
@section('title')
<title>Herbhue Personalization Page</title>
@endsection
@section('content')
<div class="container-fluid mb-5">
    <img src="{{asset('img/shop-banner.png')}}" class="w-100" height="300px" alt="">
       <div class="container mt-5">
       <div class="row">
        <div class="col-md-3">
            <div class="card border-secondary shadow">

                        <div class="card-body">
                            <div class="text-center mb-3">
                            <img src="{{asset('img/medicine.png')}}" style="width:100%; height:230px;" alt="">
                            </div>
                            <p class="small text-center text-secondary py-0 my-0">220 gm</p>
                            <h5 class="text-truncate text-center" style="max-width: 265px;">Glucosamine HCL 1500 mg Tablet</h5>
                            <p class="text-secondary text-center pb-1 mb-1  text-truncate" style="max-width: 265px;">
                            Glucosamine HCL 1500 mg Tablet...</p>
                            
                            <a href="#" class="btn btn-outline-dark text-black fw-bold w-100 text-black">Buy <span class="text-decoration-line-through text-muted mx-1"> £ 260</span> <span class="text-black"> £ 260</span></a>
                        </div>
                 
            </div>
        </div>
       </div>
        </div>
</div>

 
@endsection