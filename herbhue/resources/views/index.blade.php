@extends('layouts.app') 
@section('title')
<title>Herbhue Home Page</title>
@endsection
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css"
        integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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


<div class="container-fluid bg-white" data-aos="fade-up"
     data-aos-duration="2000">
    <div class="container mt-3 mb-4">
        <div class="d-flex justify-content-between pt-4">
            <div>
                <h2 class="pb-1 mb-1">Popular Combo Deals</h2>
                <p>New wellness range just for you!</p>
            </div>
            <!-- <p class="text-black fs-4 fw-bold pt-2">View All</p> -->
        
      
        </div>
        <div class="row">
            @foreach($product as $prod)
            <div class="col-md-3 mb-3">
                <!--new ui   -->

                <div class="card border-secondary shadow">

            <div class="card-body">
                <div class="text-center mb-3">
                @if($prod->image1!="")
                <img src="https://herbhue.azurewebsites.net/herbhue-admin/public/images/{{ $prod->image1 }}" style="width:100%; height:230px;" alt="">
                @else
                <img src="{{ asset('img/no_image.svg') }}" style="width:100%; height:230px;" alt="">
                @endif
                </div>
                <p class="small text-center text-secondary py-0 my-0">{{ $prod->product_options->quantity }} {{ $prod->product_options->quantitytype }}</p>
                <div class="d-flex justify-content-center">
                <h5 class="text-truncate text-center" style="max-width: 265px;">{{ $prod->name }}</h5>
                </div>
                <div class="d-flex justify-content-center">
                <p class="text-secondary text-center pb-1 mb-1  text-truncate" style="max-width: 265px;">
                {!! $prod->description !!}</p></div>
                
                <a href="{{ route('productdetail', $prod->id) }}" class="btn btn-outline-dark text-black bg-white fw-bold w-100 text-black">Buy <span class="text-decoration-line-through text-muted mx-1"> &pound; {{ $prod->product_options->mrp_price }}</span> <span class="text-black"> &pound; {{ $prod->product_options->price }}</span></a>
            </div>

         </div>
                <!--                 end  -->

            </div>
            @endforeach
        </div> 
        <div class="text-center my-3">
          <a href="{{ route('products') }}" class="btn btn-outline-dark btn-lg ">View More</a>
            </div>
    </div>         
</div>


<div class="container-fluid bg-light py-4" >
    <div class="container"> 
    <h3 class="text-center">HerbHue Promise</h3>
        <div class="row">
            <div class="col-md-4 mb-3" data-aos="zoom-in"
     data-aos-duration="1000">
                <div class="d-flex justify-content-center">
                    <img src="{{asset('img/traceability-in.png')}}" style="width:150px" alt="img">
                </div>
                <p class="text-center">
                We use the finest ingredients and the most sought-after suppliers in our products.
                </p>
            </div>
            <div class="col-md-4 mb-3" data-aos="zoom-in"
     data-aos-duration="2000"><div class="d-flex justify-content-center">
                    <img src="{{asset('img/tested-and-certified-in.png')}}" style="width:150px"  alt="img">
                </div>
                <p class="text-center">
                We invest in the latest expertise, technology and facilities.
                </p></div>
            <div class="col-md-4 mb-3" data-aos="zoom-in"
     data-aos-duration="3000"><div class="d-flex justify-content-center">
                    <img src="{{asset('img/science--and-safety-in.png')}}" style="width:150px"  alt="img">
                </div>
                <p class="text-center">
                Experiential scientists put product quality, safety and excellence above all.
                </p></div>
                <div class="col-md-12 text-center">
                <button type="button" class="btn btn-secondary rounded-pill text-black  py-3 ">LEARN MORE</button>
                </div>
        </div>
    </div>
</div>
<div class="container-fluid my-5" data-aos="fade-up"
     data-aos-duration="2000">
<div class="cate-10 owl-carousel owl-theme">
        @foreach($product as $prod)
            <div class="item">
                 <div class="card  border-0 py-3" style="background:#E7EEE4;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-7">
                            <p class="py-0 my-0">{{ $prod->category_name }}</p>
                            <h4 class="py-0 my-0">{{ $prod->name }}</h4>
                            <p class="small py-0 my-0">{!! $prod->description !!}</p> <br>

                            <p class=" text-black fw-bold mb-1 pb-0">MRP:  &pound; {{ $prod->product_options->mrp_price }}</p>
                            <a href="{{ route('productdetail', $prod->id) }}" class="btn mt-4 btn-dark rounded-pill">Shop Now</a>
                            </div>
                            <div class="col-5">
                            @if($prod->image1!="")
                            <img src="https://herbhue.azurewebsites.net/herbhue-admin/public/images/{{ $prod->image1 }}"  class="cat-img" alt="">
                            @else
                            <img src="{{ asset('img/no_image.svg') }}" class="cat-img" alt="">
                            @endif
                             </div>
                        </div>
                    </div>
                 </div>
            </div>
        @endforeach
        </div>
</div>

<div class="container-fluid bg-white py-2 my-5" data-aos="fade-up"
     data-aos-duration="2000">
    <div class="container mt-3 mb-4">
        <h3>Shop by Health Concerns</h3>
        <div class="cate-1 owl-carousel owl-theme">
        @foreach($category as $cat)
            <div class="item">
                <div class="card border-0">
                     <img src="https://herbhue.azurewebsites.net/herbhue-admin/public/images/{{ $cat->image }}" class="w-100 card-img-top" alt="">
                <h5 class="text-center mt-2">{{ $cat->name }}</h5>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
</div>
<div class="container-fluid mt-5" data-aos="fade-up"
     data-aos-duration="2000">
        <div class="row">
             @foreach($category as $cat)
                @if($loop->index<3)
                     <div class="col-md-4 mb-3">
                        <div class="card border-0">
                            <img src="https://herbhue.azurewebsites.net/herbhue-admin/public/images/{{ $cat->image }}" class=" card-img-top mb-3" width="150" alt="">
                            <div class="top-desc">
                                <h4>{{ $cat->name }}</h4>
                                 <p class="text-secondary">{{ $cat->description }}</p>
                            </div>
                            <div class="desc-bottom">
                            <a href="{{ route('products')}}?category_id={{ $cat->id}}" class="btn btn-secondary text-black rounded-pill ">LEARN MORE</a>
                            </div>
                        </div>
                    </div>
                @endif
             @endforeach
          
        </div>
    </div>

<div class="container-fluid my-5" data-aos="fade-up"
     data-aos-duration="2000">
    <div class="container">
        <h2 class=" text-black mb-4">Trending Now</h2> 
        <div class="cate-3 owl-carousel owl-theme">
            @foreach($wellproduct as $wellprod)
            <div class="item">
                <div class="card border-secondary">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            @if($wellprod->image1!="")
                            <img src="https://herbhue.azurewebsites.net/herbhue-admin/public/images/{{ $wellprod->image1 }}" class="w-100" style="height:220px;" alt="">
                            @else
                            <img src="{{ asset('img/no_image.svg') }}"  class="w-100" alt="" style="height:220px;">
                            @endif
                        </div>
                       <p class="small text-center text-secondary py-0 my-0">{{ $wellprod->product_options->quantity }} {{ $wellprod->product_options->quantitytype }}</p>
                        <div class="d-flex justify-content-center">
                            <h5 class="text-truncate text-center" style="max-width: 265px;">{{ $wellprod->name }}</h5> 
                        </div>
                     
                        <div class="d-flex justify-content-center">
                               <p class="text-secondary text-center pb-1 mb-1  text-truncate" style="max-width: 265px;">
                        {{ $wellprod->describe }}</p>
                            </div> 
                     
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
<div class="container-fluid my-5" data-aos="fade-up"
     data-aos-duration="2000">
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
                

<div class="container-fluid my-5" data-aos="fade-up"
     data-aos-duration="2000">
    <div class="container">
        <h3 class=" text-black text-center ">Recommended by you</h3>
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

                        <span class="fs-6 fw-bold">{{ $rat->user_name }}</span>
                        <small class="text-muted fs-10">{{ $rat->days }} ago</small>
                        <p class="py-0 my-0">{{ $rat->product_name }}</p>
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
      
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
    <script>
        $(".cate-1").owlCarousel({
            loop: true,
            margin: 20,
            nav: false,
            autoplay: false,
            dots: false,
            responsive: {
                0: {
                    items: 1, 
                },
                600: {
                    items: 3, 
                },
                1000: {
                    items: 6, 
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
            nav: false,
            autoplay: false,
            dots: false,
            navText: ['<img src="{{ asset('img/owl-arrow.png') }}">', '<img src="{{ asset('img/owl-arrow.png') }}">'], // Add your image paths here
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 2,
                },
                1000: {
                    items: 4,
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
                    items: 2,
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



        $(".testimonial").owlCarousel({
            loop: true,
            margin: 20,
            nav: false,
            autoplay:true,
            autoplayTimeout:1500,
            autoplayHoverPause:true,
            dots: false,
            responsive: {
                0: {
                    items: 1, 
                },
                600: {
                    items: 2, 
                },
                1000: {
                    items: 4, 
                },
            },
        });

        $(".cate-10").owlCarousel({
            loop: true,
            margin: 20,
            nav: false,
            autoplay: true,
            dots: false,
            responsive: {
                0: {
                    items: 1,
                    
                },
                600: {
                    items: 1,
                     
                },
                1000: {
                    items: 2,
                    
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
     autoplay: true,
     dots: false

 });


    </script>
   
@endsection
