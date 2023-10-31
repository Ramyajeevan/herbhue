@extends('layouts.app') 
@section('title')
<title>Herbhue Home Page</title>
@endsection
@section('css')
<style>
    #owl-demo .item img{
    display: block;
    width: 100%;
    height: auto;
}
.review{
    background:#00B67A !important;
    color:white;
    width: 22px;
    height: 23px; 
    padding: 3px;
}

</style>
@endsection
@section('content')
<div class="container-fluid px-0">
    <div class="row">
        <div class="col-md-12">
            <div id="owl-demo" class="owl-carousel  owl-theme">
                @foreach($banner as $ban)
                <div class="item">
                    <img src="https://herbhue.azurewebsites.net/herbhue-admin/public/images/{{ $ban->image }}" alt="">
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


<div class="container-fluid bg-white">
    <div class="container mt-3 mb-4">
        <div class="d-flex justify-content-between pt-4">
            <div>
                <h2 class="pb-1 mb-1">Popular Combo Deals</h2>
                <p>New wellness range just for you!</p>
            </div>
            <p class="text-black fs-4 fw-bold pt-2">View All</p>
        </div>
        <div class="cate-1 owl-carousel owl-theme">
            @foreach($product as $prod)
            <div class="item">
                <div class="card border-secondary">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            @if($prod->image1!="")
                            <img src="https://herbhue.azurewebsites.net/herbhue-admin/public/images/{{ $prod->image1 }}"style="width:100%; height:230px;" alt="">
                            @else
                            <img src="{{ asset('img/no_image.svg') }}" style="width:100%; height:230px;" alt="">
                            @endif
                        </div>
                        <p class="small text-center text-secondary py-0 my-0">220 gm</p>
                        <h5 class="text-truncate text-center" style="max-width: 265px;">{{ $prod->name }}</h5>
                        <p class="text-secondary text-center pb-1 mb-1  text-truncate" style="max-width: 265px;">
                        {!! $prod->description !!}</p>
                        <p class="text-secondary p-0 m-0 text-center">{{ $prod->describe }}</p>
                        <p class="text-secondary text-center pb-0 mb-0">M.R.P: <span
                                class="text-decoration-line-through text-secondary"> &pound; {{ $prod->product_options->mrp_price }}</span> </p>
                        <p class="text-center">&pound; {{ $prod->product_options->price }}</p>
                        <a href="{{ route('productdetail', $prod->id) }}" class="btn btn-secondary text-black fw-bold w-100">View Product</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>         
</div>


<div class="container-fluid bg-light py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="d-flex justify-content-center">
                    <img src="{{asset('img/traceability-in.png')}}" style="width:150px" alt="img">
                </div>
                <p class="text-center">
                We use the finest ingredients and the most sought-after suppliers in our products.
                </p>
            </div>
            <div class="col-md-4 mb-3"><div class="d-flex justify-content-center">
                    <img src="{{asset('img/tested-and-certified-in.png')}}" style="width:150px"  alt="img">
                </div>
                <p class="text-center">
                We invest in the latest expertise, technology and facilities.
                </p></div>
            <div class="col-md-4 mb-3"><div class="d-flex justify-content-center">
                    <img src="{{asset('img/science--and-safety-in.png')}}" style="width:150px"  alt="img">
                </div>
                <p class="text-center">
                Experiential scientists put product quality, safety and excellence above all.
                </p></div>
                <div class="col-md-12 text-center">
                <button type="button" class="btn btn-secondary rounded-pill ">LEARN MORE</button>
                </div>
        </div>
    </div>
</div>


<div class="container-fluid bg-white py-2">
    <div class="container mt-3 mb-4">
        <h3>Shop by Health Concerns</h3>
        <div class="row mt-3">
            @foreach($category as $cat)
            <div class="col-md-2 col-6">
                <img src="https://herbhue.azurewebsites.net/herbhue-admin/public/images/{{ $cat->image }}" class="w-100" alt="">
                <h5 class="text-center mt-2">{{ $cat->name }}</h5>
            </div>
            @endforeach
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
             @foreach($category as $cat)
                @if($loop->index<3)
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
                @endif
             @endforeach
          
        </div>
    </div>
</div>


<div class="container-fluid mb-4">
    <div class="container">
        <h3 class=" text-black mb-4">Trending Now</h5>
        <div class="cate-3 owl-carousel owl-theme">
            @foreach($wellproduct as $wellprod)
            <div class="item">
                <div class="card border-secondary">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            @if($wellprod->image1!="")
                            <img src="https://herbhue.azurewebsites.net/herbhue-admin/public/images/{{ $wellprod->image1 }}" style="width:100%; height:230px;" alt="">
                            @else
                            <img src="{{ asset('img/no_image.svg') }}"  class="w-75" alt="">
                            @endif
                        </div>
                        <p class="small text-center text-secondary py-0 my-0">220 gm</p>
                        <h5 class="text-truncate text-center" style="max-width: 265px;">{{ $wellprod->name }}</h5>  
                        <p class="text-secondary text-center pb-1 mb-1  text-truncate" style="max-width: 265px;">
                        {{ $wellprod->describe }}</p>
                        <a href="{{ route('productdetail', $wellprod->id) }}" class="btn btn-outline-dark text-black bg-white fw-bold w-100 text-black">Buy 
                            <span class="text-decoration-line-through text-muted mx-1"> &pound; {{ $wellprod->product_options->mrp_price }}</span> 
                            <span class="text-black"> &pound; {{ $wellprod->product_options->price }}</span>
                        </a>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="container">
        <h3 class=" text-black mb-4">Our Top Brands</h3>
        <div class="cate-4 owl-carousel owl-theme">
            @foreach($brand as $bran)
            <div class="item">
                <div class="card border-secondary">
                    <img src="https://herbhue.azurewebsites.net/herbhue-admin/public/images/{{ $bran->image }}" class="w-100" alt="">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
                

<div class="container-fluid mb-4">
    <div class="container">
        <h3 class=" text-black text-center mb-4">Recommended by you</h3>
        <p class="text-center">Discover their stories and why they recommend HerbHue.</p>
        <div class="testimonial owl-carousel owl-theme">
            @foreach($ratings as $rat)
            <div class="item">
                <div class="card border-secondary"> 
                    <div class="card-body">
                        <p>
                            @for($i=1;$i<=5;$i++)
                            <i class="fa fa-star review me-1 @if($i>$rat->rating) text-secondary @endif"></i>
                            @endfor
                        </p>

                        <span class="fs-4 fw-bold">{{ $rat->user_name }}</span>
                        <small class="text-muted">{{ $rat->days }} ago</small>
                        <h5>{{ $rat->product_name }}</h5>
                        <p class="pt-0 mt-0">{{ $rat->review }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>   
    </div>
</div>
               

@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script async="" defer="" src="https://buttons.github.io/buttons.js"></script>
    <script>
        $(".cate-1").owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            autoplay: false,
            dots: false,
            responsive: {
                0: {
                    items: 1,
                    nav: true,
                },
                600: {
                    items: 2,
                    nav: true,
                },
                1000: {
                    items: 4,
                    nav: true,
                },
            },
        });


        $(".cate-2").owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            autoplay: false,
            dots: false,
            responsive: {
                0: {
                    items: 1,
                    nav: true,
                },
                600: {
                    items: 3,
                    nav: true,
                },
                1000: {
                    items: 6,
                    nav: true,
                },
            },
        });




        $(".cate-3").owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            autoplay: false,
            dots: false,
            responsive: {
                0: {
                    items: 1,
                    nav: true,
                },
                600: {
                    items: 2,
                    nav: true,
                },
                1000: {
                    items: 3,
                    nav: true,
                },
            },
        });

        $(".cate-4").owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            autoplay: false,
            dots: false,
            responsive: {
                0: {
                    items: 1,
                    nav: true,
                },
                600: {
                    items: 3,
                    nav: true,
                },
                1000: {
                    items: 5,
                    nav: true,
                },
            },
        });



        $(".testimonial").owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            autoplay: false,
            dots: false,
            responsive: {
                0: {
                    items: 1,
                    nav: true,
                },
                600: {
                    items: 2,
                    nav: true,
                },
                1000: {
                    items: 4,
                    nav: true,
                },
            },
        });


    </script>
    <script>

 $("#owl-demo").owlCarousel({

     navigation : true, // Show next and prev buttons
     items : 1,
     itemsDesktop : false,
      itemsDesktopSmall : false,
      itemsTablet: false,
      itemsMobile : false, 
     autoplay: true

 });


    </script>
   
@endsection
