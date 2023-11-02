@extends('layouts.app') 
@section('title')
<title>Herbhue - Shop Products</title>
@endsection
@section('css')

@endsection
@section('content')
<div class="container-fluid mb-5">
    <img src="{{asset('img/shop-banner.png')}}" class="w-100" height="300px" alt="">
    <div class="container my-5">
        <div class="row">
            @foreach($products as $prod)
            <div class="col-md-3">
                <div class="card border-secondary shadow">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            @if($prod->image1!="")
                            <img src="https://herbhue.azurewebsites.net/herbhue-admin/public/images/{{ $prod->image1 }}" style="width:100%; height:230px;" alt="">
                            @else
                            <img src="{{ asset('img/no_image.svg') }}" style="width:100%; height:230px;" alt="">
                            @endif
                        </div>
                        <p class="small text-center text-secondary py-0 my-0">220 gm</p>
                        <h5 class="text-truncate text-center" style="max-width: 265px;">{{ $prod->name }}</h5>
                        <p class="text-secondary text-center pb-1 mb-1  text-truncate" style="max-width: 265px;">
                        {!! $prod->description !!}</p>
                        
                        <a href="{{ route('productdetail', $prod->id) }}" class="btn btn-outline-dark text-black bg-white fw-bold w-100 text-black">Buy 
                            <span class="text-decoration-line-through text-muted mx-1"> &pound; {{ $prod->product_options->mrp_price }}</span> 
                            <span class="text-black"> &pound; {{ $prod->product_options->price }}</span>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="container">
        <div class="row">
            @foreach($category as $cat)
            <div class="col-md-4 mb-3">
                <div class="card border-0">
                    <img src="https://herbhue.azurewebsites.net/herbhue-admin/public/images/{{ $cat->image }}" class=" card-img-top mb-3" width="150px" alt="">
                    <div class="top-desc">
                        <h4>{{ $cat->name }}</h4>
                        <!-- <p class="text-secondary">For your skin, gut and muscle health.</p> -->
                    </div>
                    <div class="desc-bottom">
                        <a href="{{ route('products')}}?category_id={{ $cat->id}}" class="btn btn-secondary rounded-pill ">LEARN MORE</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endsection
@section('script')

@endsection
