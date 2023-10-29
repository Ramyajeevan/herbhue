<div class="container-fluid bg-light-green ">
    <div class="container d-flex justify-content-between">
       <!-- <a href="{{url('/')}}"><img src="{{ asset('img/logo.png') }}" alt="" class="main-logo" style="width: 170px;"></a>-->
       <a href="#" class="nav-link text-nowrap"> 24/7 Free Support </a> <span class="mx-2">|</span>   <a href="#" class="nav-link text-nowrap"> Offers</a><span class="mx-2">|</span> <a href="#" class="nav-link text-nowrap">Need Help ? </a>
        <div class="pt-3">
            <ul class="  d-flex ul">
                <li class="me-3">
                    @if(empty(Session::get('username')))
                    <a class="nav-link text-nowrap" href="{{ route('login') }}">Login | Sign Up</a>
                    @else
                    <a class="nav-link text-nowrap" href="{{ route('myaccount') }}">My Account</a>
                    @endif
                </li>
                <li class="me-3">
                    <a class="nav-link" href="javascript:void(0);">Offers</a>
                </li>

                @php
                $cart_items=0;
                $session_id=Session::getId();
                $cart_items=DB::table('tbl_cart')->where("session_id",$session_id)->sum("quantity");
                @endphp
                <li class="me-3">
                    <a class="nav-link" href="{{ route('viewcart') }}">
                    <button type="button" class="btn bg-transparent border-0 position-relative">
                        <img src="{{ asset('img/shopping_cart_FILL1_wght400_GRAD0_opsz48 (3).svg') }}" alt="" class="nav-icon">
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ $cart_items }}
                        </span>
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
                        <img src="{{ asset('img/favorite_FILL1_wght400_GRAD0_opsz48 (2).svg') }}" alt="" class="nav-icon">
                        {{ $wishlist_count }}
                    </a>
                </li>
                <li class="me-3">
                    <a class="nav-link text-nowrap" href="javascript:void(0);">Need Help ?</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="container-fluid bg-green  pt-3">
    <div class="container nav2">
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
    </div>
</div>

<header class="px-2 py-3 py-lg-0 px-sm-0 category-header">
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

