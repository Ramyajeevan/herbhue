<style>
      body{
        overflow-x: hidden !important;
      }
  .btn-check:checked+.btn {
    background-color: #ffffff !important;
    border-color: black !important;
}

.bg-light-green {
    background-color: #ACB69C !important;
  }

  .btn-secondary , .bg-secondary{
    background-color: #ACB69C !important;
    border-color: #ACB69C !important;
  }

  .bg-light{
    background:#F6F6F6 !important;
  }

  .pd-icon{
  clip-path: circle();
  width: 40px;
}
.top-desc{
        position: absolute;
        top:10px;
        left: 25px;
    }
    .desc-bottom{
        position: absolute;
        bottom: 30px;
        right: 35%;
    }
    .btn-success {
    background-color: #ACB69C !important;
    color: white;
  }
  .mob-view{
    display: none ;
  }
  @media only screen and (max-width: 600px) {
    .mob-view{
    display: block !important;
  } 
  .web-view{
    display:none !important;
  }
  }
  .owl-carousel .owl-nav button.owl-next {
            position: absolute !important;
            top: -60px;
            right: 0 !important;
            font-size: 40px !important;
        }

        .owl-carousel .owl-nav button.owl-prev {
            position: absolute !important;
            top: -60px;
            right: 15px !important;
            font-size: 40px !important;
        }

        .owl-carousel .owl-nav button.owl-prev,
        .owl-carousel .owl-nav button.owl-next:hover {
            background-color: transparent !important;
            color: black !important;
        }
</style>
<div class="container-fluid web-view  border-bottom pb-1">
    <div class="container d-flex justify-content-between">
      <!-- <a href="{{url('/')}}"><img src="{{ asset('img/logo.png') }}" alt="" class="main-logo" style="width: 170px;"></a>  -->
      <div class="pt-3">
            <ul class="  d-flex ul"> 
            <li class="me-3">
            <a class="nav-link text-nowrap" href="javascript:void(0);">24/7 Free Support</a>
        </li>
            <li class="me-3">
                    <a class="nav-link text-nowrap" href="javascript:void(0);">Offers </a></li>
                 <li class="me-3">
                    <a class="nav-link text-nowrap" href="javascript:void(0);">Need Help ?</a>
                </li> 
            </ul>
        </div>
         <div class="pt-3">
            <ul class="  d-flex ul">
            <li class="me-3">
                   
                   <a class="nav-link" href="javascript:void(0);"><img src="{{ asset('img/UK_flag.png') }}"
                   width="20px" alt=""> <span class="ms-2">United Kingdom</span> </a>
               </li>
               @if(empty(Session::get('username')))
                 <li class="me-3">
                      <a class="nav-link text-nowrap" href="{{ route('login') }}"> 
                        <span class="me-3"> <img src="{{ asset('img/login.svg') }}" alt="" class="nav-icon me-1"> Login |</span>
                      </a>
                 </li>
                 <li class="me-3">
                      <a class="nav-link text-nowrap" href="{{ route('register') }}"> 
                        <span> <img src="{{ asset('img/register.svg') }}" alt="" class="nav-icon me-1"> Sign Up</span> 
                      </a>
                 </li>
                @else
                  <li class="me-3">
                      <a class="nav-link text-nowrap" href="{{ route('myaccount') }}">
                           <span> <img src="{{ asset('img/register.svg') }}" alt="" class="nav-icon me-1"> My Account</span>
                      </a>
                  </li>
                @endif
               
            </ul>
        </div>
    </div>
</div>
<div class="container-fluid bg-white  pt-3">
    <!-- <div class="container nav2">
        <div class="input-group mb-3 w-25 flex-nowrap">
            <span class="input-group-text bg-white border-0" id="basic-addon2"><img src="{{ asset('img/location.png') }}"
                    width="15px" alt=""></span>
            <span class="input-group-text bg-white border-0" id="basic-addon2"><img src="{{ asset('img/UK_flag.png') }}"
                    width="20px" alt=""></span>
            <span class="input-group-text bg-white border-0" id="basic-addon2">
                <h6 class="pt-1">United Kingdom</h6>
            </span>
            <span class="input-group-text bg-white border-0" id="basic-addon2"><img src="{{ asset('img/map.png') }}" width="17px"
                    alt=""></span>
        </div>
        <div class="input-group mb-3 text-center  w-50 pe-5">
            <input type="text" class="form-control border-0" placeholder="Recipient's username"
                aria-label="Recipient's username " aria-describedby="basic-addon2">
            <span class="input-group-text bg-white border-0" id="basic-addon2"><i
                    class="fa fa-search text-secondary"></i></span>
        </div>
        <div class="w-25 px-4"><button type="button" class="btn btn-primary-light w-100 text-nowrap btn-lg">Quick Order</button></div>
    </div> -->

    <div class="container">
        <div class="row">
            <div class="col-md-9 text-center">
            <div class="pt-3 mob-view">
            <ul class="  d-flex ul">
            <li class="me-3">
                   
                   <a class="nav-link small" href="javascript:void(0);"><img src="{{ asset('img/UK_flag.png') }}"
                   width="20px" alt=""> <span class="ms-2">United Kingdom</span> </a>
               </li>
               @if(empty(Session::get('username')))
                 <li class="me-3">
                      <a class="nav-link text-nowrap small" href="{{ route('login') }}"> 
                        <span class="me-3"> <img src="{{ asset('img/login.svg') }}" alt="" class="nav-icon me-1"> Login |</span>
                      </a>
                 </li>
                 <li class="me-3">
                      <a class="nav-link text-nowrap small" href="{{ route('register') }}"> 
                        <span> <img src="{{ asset('img/register.svg') }}" alt="" class="nav-icon me-1"> Sign Up</span> 
                      </a>
                 </li>
                @else
                  <li class="me-3">
                      <a class="nav-link text-nowrap small" href="{{ route('myaccount') }}">
                           <span> <img src="{{ asset('img/register.svg') }}" alt="" class="nav-icon me-1"> My Account</span>
                      </a>
                  </li>
                @endif
               
            </ul>
        </div>
                 <a href="{{url('/')}}" class="web-view"><img src="{{ asset('img/logo.png') }}" alt="" class="main-logo" style="width: 170px;position: relative;left: 57%; top: -10px;"></a>   
            </div>
            <div class="col-md-3">
                <ul class="d-flex ul justify-content-end">
                <li class="me-3">
                    <a class="nav-link" href="javascript:void(0);">
                    <button type="button" class="btn bg-transparent border-0 position-relative">
                        <img src="{{ asset('img/search icon (2).svg') }}" alt="" class="nav-icon">
                         
                    </button>
                    </a>
                </li>
                @php
                $cart_items=0;
                $session_id=Session::getId();
                $cart_items=DB::table('tbl_cart')->where("session_id",$session_id)->sum("quantity");
                @endphp
                <li class="me-3">
                    <a class="nav-link" href="{{ route('viewcart') }}">
                    <button type="button" class="btn bg-transparent border-0 position-relative">
                        <img src="{{ asset('img/Cart Icon (1).svg') }}" alt="" class="nav-icon">
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ $cart_items }}
                        </span>
                    </button>
                    </a>
                </li>
                @php
                $wishlist_count=0;
                if(!empty(Session::get('username')))
                {
                    $email=Session::get('username');
                        $user=DB::table("tbl_user")->where("email",$email)->first();
                        $wishlist_count=DB::table("tbl_wishlist")->where("user_id",$user->id)->count();
                    // $wishlist_count=1;
                }
                @endphp
                <li class="me-3">
                    <a class="nav-link" href="{{ route('mywishlist') }}">
                    <button type="button" class="btn bg-transparent border-0 position-relative">
                        <img src="{{ asset('img/Wishlist Icon (1).svg') }}" alt="" class="nav-icon">
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ $wishlist_count }}
                        </span>
                    </button>
                        
                    </a>
                </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<header class="px-2 py-3 py-lg-0 px-sm-0 category-header border-top">
    <div class="container">
        <div class="d-flex  align-items-center justify-content-between">
            <img src="{{ asset('img/logo.png') }}" alt="" class="site-logo" style="width: 170px;">
            <nav class="d-none d-lg-block">
                <ul class="main-menu d-flex flex-column flex-lg-row align-items-lg-center list-unstyled p-0 m-0">
                @php
                $category = DB::table('tbl_category')->select("id","name")->take(10)->get();
                @endphp
                @foreach($category as $cat)
                    <li>
                        @php
                            $subcategory=DB::table('tbl_subcategory')->select("id","name")->where("category_id",$cat->id)->get();
                        @endphp
                        <a  href="{{ route('products')}}?category_id={{ $cat->id}}" class="d-block">
                            <span class="text-nowrap">{{ $cat->name }} <i class="fa fa-angle-down ms-1 fs-5"></i></span>
                        </a>
                        <ul class="sub-menu list-unstyled p-0 m-0">
                            @foreach($subcategory as $subcat)
                            <li>
                                <a href="{{ route('products')}}?category_id={{ $cat->id}}&subcategory_id={{$subcat->id}}" class="d-block">
                                    <span>{{ $subcat->name }} </span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
                    



                </ul>
            </nav>

            <div
                class="side-menu-close d-flex d-lg-none flex-wrap flex-column align-items-center justify-content-end ml-auto">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
</header>



<!-- side menu start -->
<div class="side-menu-wrap">
    <a href="{{url('/')}}" title="Site Logo" class="side-menu-logo d-block p-2">
        <img src="{{ asset('img/logo.png') }}" alt="" width="80px">
    </a>
    <nav class="side-menu-nav">
        <!-- auto generated side menu from top header menu -->
    </nav>
    <div class="side-menu-close d-flex flex-wrap flex-column align-items-center justify-content-center">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<!-- side menu end -->

