
<section class="sticky-top bg-white">
<div class="container-fluid web-view  border-bottom pb-1">
    <div class="container d-flex justify-content-between">
      <!-- <a href="{{url('/')}}"><img src="{{ asset('img/logo.png') }}" alt="" class="main-logo" style="width: 170px;"></a>  -->
      <div class="pt-3">
            <ul class="  d-flex ul pb-0 mb-0"> 
                <li class="me-3">
                    <a class="nav-link text-nowrap" href="javascript:void(0);">24/7 Free Support</a>
                </li>
                <li class="me-3">
                    <a class="nav-link text-nowrap" href="javascript:void(0);">Offers </a>
                </li>
                 <li class="me-3">
                    <a class="nav-link text-nowrap" href="javascript:void(0);">Need Help ?</a>
                </li> 
            </ul>
        </div>
        <div class="pt-3">
            <ul class="  d-flex ul pb-1 mb-1">
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
<div class="container-fluid bg-white  pt-1">
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

    <div class="container web-view">
        <div class="row pb-2">
            <div class="col-9 text-center">
                <div class="pt-3 mob-view">
                    <ul class="  d-flex ul2">
            
                        <li class="">
                            <a class="nav-link text-nowrap small" href="{{ route('login') }}"> 
                                <span class="me-3"> <img src="{{ asset('img/login.svg') }}" alt="" class="nav-icon me-1"> Login </span>
                            </a>
                        </li>
                        <li class="">
                            <a class="nav-link text-nowrap small" href="{{ route('register') }}"> 
                                <span> <img src="{{ asset('img/register.svg') }}" alt="" class="nav-icon me-1"> Sign Up</span> 
                            </a>
                        </li>
                               
                    </ul>
                </div>
                 <a  href="{{ route('home') }}" class="web-view"><img src="{{ asset('img/logo.png') }}" alt="" class="main-logo" style="width: 170px;position: relative;left: 57%; top: 0px;"></a>   
            </div>
            <div class="col-3">
                <ul class="d-flex ul2 justify-content-end" style="position: relative;top: 13px;  ">
                    <li class="">
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
                    <li class="me-1">
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
                    <li class="">
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

    <div class="container mob-view">
        <div class="d-flex justify-content-between pb-2">
            <div class="text-center">
                <div class="pt-3 ">
                    <ul class="  d-flex list-unstyled">
            
                        <li class="">
                            <a class="nav-link text-nowrap small" href="{{ route('login') }}"> 
                                <span class="me-3"> <img src="{{ asset('img/login.svg') }}" alt="" class="nav-icon me-1"> Login </span>
                            </a>
                        </li>
                        <li class="">
                            <a class="nav-link text-nowrap small" href="{{ route('register') }}"> 
                                <span> <img src="{{ asset('img/register.svg') }}" alt="" class="nav-icon me-1"> Sign Up</span> 
                            </a>
                        </li>
                               
                    </ul>
                </div>
                 
            </div>
            <div class="me-3">
                <ul class="d-flex list-unstyled" style="position: relative;top: 13px;  ">
                <li class="">
                     <div class="input-group rounded-0">
                        <input type="search" class="form-control rounded-0 border-0 border-bottom" placeholder="Search" aria-label="Search" aria-describedby="search-addon">
                        <span class="input-group-text bg-white border-0" id="search-addon">
                        <i class="fa fa-search"></i>
                        </span>
                    </div>
        
                    </li>
                    @php
                    $cart_items=0;
                    $session_id=Session::getId();
                    $cart_items=DB::table('tbl_cart')->where("session_id",$session_id)->sum("quantity");
                    @endphp
                    <li class="me-1">
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
                    <li class="">
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
</section>

<header class="px-2 py-3 py-lg-0 px-sm-0 category-header border-top">
    <div class="container">
        <div class="d-flex  align-items-center justify-content-between">
            <img src="{{ asset('img/logo.png') }}" alt="" class="site-logo" style="width: 105px;">
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