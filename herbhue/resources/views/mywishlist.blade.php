@extends('layouts.app') 
@section('title')
<title>Herbhue - My Wishlist</title>
@endsection
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css"
        integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
<link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
@endsection
@section('content')
<div class="container-fluid my-5">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-4">
            @include('includes.myaccountsidenav')
            </div>
            <div class="col-md-8">
                <div class="card rounded-2 border-secondary">
                    <div class="card-header bg-transparent d-flex justify-content-between ">
                        <h5>{{ count($wishlist) }} Item in your Wishlist</h5>
                    </div>
                    <div class="card-body">
                        @if(count($wishlist)>0)
                        @foreach($wishlist as $wish)
                        <div class="row border-bottom pb-2">
                            <div class="col-2">
                                <img src="https://herbhue.azurewebsites.net/herbhue-admin/public/images/{{ $wish->product_image }}" class="w-75" alt="">
                            </div>
                            <div class="col-5">
                                <h5>{{ $wish->product_name }}</h5>
                                <p class="text-secondary p-0 m-0">{{ $wish->describe }}</p>
                                <span class="text-secondary">M.R.P: 
                                    <span class="text-decoration-line-through text-secondary"> &pound; {{ $wish->mrp_price }}</span>
                                    <span class="fw-bold text-black ms-3"> &pound; {{ $wish->price }}</span>
                                </span>

                            </div>
                            <div class="col-5 d-flex justify-content-between">
                                <p class="text-end">
                                    <a href="javascript:void(0);" onclick="deletewishlist({{ $wish->id }});">
                                        <img src="{{ asset('img/delete_FILL0_wght400_GRAD0_opsz24.svg') }}" alt=""  style="width: 20px;">
                                    </a>
                                </p>
                                <div class="text-end mt-5">
                                    <button type="button"  onclick="movetocart({{ $wish->id }});" class="btn btn-dark text-white w-50 py-2 h5 fw-bold"> Move to Cart  
                                        <!-- <img src="{{ asset('img/add_circle_FILL1_wght400_GRAD0_opsz48 (1).svg') }}" style="width: 25px; position: relative; top: -3px;left: 3px;" alt=""> -->
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="row border-bottom pb-2">
                            <p align="center">No items found in wishlist</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
 
        </div>
    </div>

</div>

<!-- <div class="container-fluid bg-light-blue py-5 mt-5">
    <div class="container">
        <h4 class="text-black">Before you check out</h4>
        <div class="cate-1 owl-carousel owl-theme">
            @foreach($related_products as $related)
            <div class="item">
                <div class="card border-secondary">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <img src="https://herbhue.azurewebsites.net/herbhue-admin/public/images/{{ $related->image1 }}" style="width:100%; height:250px;" alt="">
                        </div>
                        <h5>{{ $related->name }}</h5>
                        <p class="text-secondary p-0 m-0">{{ $related->describe }}</p>
                        <span class="text-secondary">M.R.P: <span
                                class="text-decoration-line-through text-secondary">&pound; {{ $related->mrp_price }}</span> </span>
                        <p>&pound; {{ $related->price }}</p>

                        <a href="{{ route('productdetail', $related->id) }}" class="btn btn-success w-100">View Product</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div> -->
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
</script>
<script>
function deletewishlist(id)
{
    if(confirm("Are you sure want to delete from wishlist?"))
    {
    var url="{{URL('deletewishlist')}}";
        $.ajax(
        {
            url: url,
            method: 'post', 
            data:{"id":id, "_token": "{{ csrf_token() }}" },
            success: function (response)
            {
                alert(response);
                window.location.reload();
            }
        });
    }
}
function movetocart(wishlist_id)
{
    //alert(optionid);
    var url="{{URL('movetocart')}}";
    $.ajax(
    {
        url: url,
        method: 'POST', 
        data:{"wishlist_id":wishlist_id,"_token": "{{ csrf_token() }}" },
        success: function (response)
        {
            alert(response);
            window.location.reload();
        }
    });
    }
</script>
@endsection
