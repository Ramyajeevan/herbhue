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
.top-desc{
        position: absolute;
        top:10px;

    }
    .desc-bottom{
        position: absolute;
        bottom:10px;
        right: 50px;
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
                                <img src="https://herbhue.azurewebsites.net/herbhue-admin/public/images/{{ $prod->image1 }}" class="w-75" alt="">
                                @else
                                <img src="{{ asset('img/no_image.svg') }}"  width="100%" height="285px" alt="">
                                @endif
                            </div>
                            <p class="small text-center text-secondary py-0 my-0">220 gm</p>
                            <h5 class="text-truncate text-center" style="max-width: 265px;">{{ $prod->name }}</h5>
                            <p class="text-secondary text-center pb-1 mb-1  text-truncate" style="max-width: 265px;">
                            {!! $prod->description !!}</p>
                            <p class="text-secondary p-0 m-0 text-center">{{ $prod->describe }}</p>
                            <span class="text-secondary ">M.R.P: <span
                                    class="text-decoration-line-through text-secondary"> &pound; {{ $prod->product_options->mrp_price }}</span> </span>
                            <p class="text-center">&pound; {{ $prod->product_options->price }}</p>

                            <a href="{{ route('productdetail', $prod->id) }}"  class="btn btn-success w-100">View Product</a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

        </div>         
</div>
<div class="container-fluid bg-secondary py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="d-flex justify-content-center">
                    <img src="{{asset('img/traceability-in.png')}}" class="w-50" alt="img">
                </div>
                <p class="text-center">
                We use the finest ingredients and the most sought-after suppliers in our products.
                </p>
            </div>
            <div class="col-md-4 mb-3"><div class="d-flex justify-content-center">
                    <img src="{{asset('img/tested-and-certified-in.png')}}" class="w-50"  alt="img">
                </div>
                <p class="text-center">
                We invest in the latest expertise, technology and facilities.
                </p></div>
            <div class="col-md-4 mb-3"><div class="d-flex justify-content-center">
                    <img src="{{asset('img/science--and-safety-in.png')}}" class="w-50"  alt="img">
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
            <div class="col-md-2">
                <img src="https://herbhue.azurewebsites.net/herbhue-admin/public/images/{{ $cat->image }}" class="w-100" alt="">
                <h5 class="text-center mt-2">{{ $cat->name }}</h5>
            </div>
            @endforeach
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card border-0">
                    <img src="{{asset('img/health.png')}}" class=" card-img-top mb-3" width="150px" alt="">
                    <div class="top-desc">
                        <h4>Root, Seed & Berry Powders</h4>
                        <p class="text-secondary">For your skin, gut and muscle health.</p>
                    </div>
                    <div class="desc-bottom">
                    <button type="button" class="btn btn-secondary rounded-pill ">LEARN MORE</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card border-0">
                    <img src="{{asset('img/health.png')}}" class=" card-img-top mb-3" width="150px"   alt="">
                    <div class="top-desc">
                        <h4>Root, Seed & Berry Powders</h4>
                        <p class="text-secondary">For your skin, gut and muscle health.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card border-0">
                    <img src="{{asset('img/health.png')}}" class=" card-img-top mb-3" width="150px"   alt="">
                    <div class="top-desc">
                        <h4>Root, Seed & Berry Powders</h4>
                        <p class="text-secondary">For your skin, gut and muscle health.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


  

    <!-- <div class="container-fluid bg-white py-3">
        <div class="container mt-3 mb-4">

            <h4>Our Top Brands</h4>

            <div class="cate-2 owl-carousel owl-theme">
                @foreach($brand as $brands)
                <div class="item">
                    <div class="card border-0">
                        <img src="https://herbhue.azurewebsites.net/herbhue-admin/public/images/{{ $brands->image }}" class="w-100" alt="">
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div> -->

    <div class="container-fluid bg-secondary py-4">
        <div class="container mt-3 mb-4">
            <div class="d-flex justify-content-between">
                <div>
                <h2>Wellness Essentials of the Week </h2>
                <p class="text-muted fs-5">Super charge your immunity with us</p>
                </div>

                <p class="text-green">View All</p>
            </div>
            <div class="cate-3 owl-carousel owl-theme">
                @foreach($wellproduct as $wellprod)
                <div class="item">
                    <div class="card border-secondary">
                        <div class="card-body">
                            <div class="row  pb-2">
                                <div class="col-3">
                                    @if($wellprod->image1!="")
                                    <img src="https://herbhue.azurewebsites.net/herbhue-admin/public/images/{{ $wellprod->image1 }}" class="w-100" alt="">
                                    @else
                                    <img src="{{ asset('img/no_image.svg') }}"  class="w-75" alt="">
                                    @endif
                                </div>
                                
                                <div class="col-9">
                                    <h6 class="fw-bold mb-0 pb-0">{{ $wellprod->name }}</h6>
                                    <p class="text-secondary mb-0 pb-0 text-truncate" style="max-width: 265px;">{!! $wellprod->description !!}</p>
                                    <p class="text-secondary py-0 my-0">{{ $wellprod->describe }}</p>
                                    <span class="text-secondary">M.R.P: <span
                                            class="text-decoration-line-through text-secondary">&pound; {{ $wellprod->product_options->mrp_price }}</span><br><span
                                            class="fw-bold text-black">&pound; {{ $wellprod->product_options->price }}</span></span>
                                </div>
 
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
           
            </div>

        </div>


    </div>


    
    <div class="container-fluid   py-5 ">
            <div class="row">
                <div class="col-md-4 bg-green py-5">
                        <img src="{{asset('img/inverted-quote.png')}}" width="100px" class="mt-4" alt="">

                        <h2 class="text-white mt-4">What Our Customers <br> have to Say</h2>
                </div>
                <div class="col-md-8">

                <div class="testimonial owl-carousel owl-theme">
                <div class="item">
                    <div class="card border-0 shadow my-5 pb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4"> <img src="{{asset('img/testimonial.png')}}" alt="" width="400px" style="margin-top: -70px;"></div>
                                <div class="col-md-8"> <h5 class="text-black">Rohit Kumar</h5> <h5 class="text-muted">02 Sep, 2023</h5></div>
                                <div class="col-12 ">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
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
                    items: 1,
                    nav: true,
                },
                1000: {
                    items: 2,
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
