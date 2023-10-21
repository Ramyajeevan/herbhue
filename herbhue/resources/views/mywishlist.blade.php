@extends('layouts.app') 
@section('title')
<title>Herbhue - My Wishlist</title>
@endsection
@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card rounded-2 border-secondary">
                    <div class="card-header bg-transparent d-flex justify-content-between ">
                        <h3>{{ count($wishlist) }} Item in your Wishlist</h3>
                    </div>
                    <div class="card-body">
                        @if(count($wishlist)>0)
                        @foreach($wishlist as $wish)
                        <div class="row border-bottom pb-2">
                            <div class="col-2">
                                <img src="http://localhost/herbhue/herbhue-admin/public/images/{{ $wish->product_image }}" class="w-75" alt="">
                            </div>
                            <div class="col-7">
                                <h5>{{ $wish->product_name }}</h5>
                                <p class="text-secondary p-0 m-0">{{ $wish->describe }}</p>
                                <span class="text-secondary">M.R.P: 
                                    <span class="text-decoration-line-through text-secondary"> &pound; {{ $wish->mrp_price }}</span>
                                    <span class="fw-bold text-black ms-3"> &pound; {{ $wish->price }}</span>
                                </span>

                            </div>
                            <div class="col-3">
                                <p class="text-end">
                                    <a href="javascript:void(0);" onclick="deletewishlist({{ $wish->id }});">
                                        <img src="{{ asset('img/delete_FILL0_wght400_GRAD0_opsz24.svg') }}" alt=""  style="width: 20px;">
                                    </a>
                                </p>
                                <div class="text-end mt-5">
                                    <button type="button"  onclick="movetocart({{ $wish->id }});" class="btn btn-success w-50 py-2 h5 fw-bold"> Add  
                                        <img src="{{ asset('img/add_circle_FILL1_wght400_GRAD0_opsz48 (1).svg') }}" style="width: 25px; position: relative; top: -3px;left: 3px;" alt="">
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

    <div class="container-fluid bg-light-blue py-5 mt-5">
        <div class="container">
            <h4 class="text-black">Before you check out</h4>

            <div class="cate-1 owl-carousel owl-theme">
                <div class="item">
                    <div class="card border-secondary">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <img src="img/medicine.png" class="w-75" alt="">
                            </div>
                            <h5>Glucosamine HCL 1500 mg Tablet Joint Health with...</h5>
                            <p class="text-secondary p-0 m-0">Bottle of 30 Tablets</p>
                            <span class="text-secondary">M.R.P: <span
                                    class="text-decoration-line-through text-secondary">₹535.00</span> </span>
                            <p>₹241.00</p>

                            <button type="button" class="btn btn-success w-100">Add to cart</button>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card border-secondary">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <img src="img/medicine.png" class="w-75" alt="">
                            </div>
                            <h5>Glucosamine HCL 1500 mg Tablet Joint Health with...</h5>
                            <p class="text-secondary p-0 m-0">Bottle of 30 Tablets</p>
                            <span class="text-secondary">M.R.P: <span
                                    class="text-decoration-line-through text-secondary">₹535.00</span> </span>
                            <p>₹241.00</p>

                            <button type="button" class="btn btn-success w-100">Add to cart</button>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card border-secondary">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <img src="img/medicine.png" class="w-75" alt="">
                            </div>
                            <h5>Glucosamine HCL 1500 mg Tablet Joint Health with...</h5>
                            <p class="text-secondary p-0 m-0">Bottle of 30 Tablets</p>
                            <span class="text-secondary">M.R.P: <span
                                    class="text-decoration-line-through text-secondary">₹535.00</span> </span>
                            <p>₹241.00</p>

                            <button type="button" class="btn btn-success w-100">Add to cart</button>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card border-secondary">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <img src="img/medicine.png" class="w-75" alt="">
                            </div>
                            <h5>Glucosamine HCL 1500 mg Tablet Joint Health with...</h5>
                            <p class="text-secondary p-0 m-0">Bottle of 30 Tablets</p>
                            <span class="text-secondary">M.R.P: <span
                                    class="text-decoration-line-through text-secondary">₹535.00</span> </span>
                            <p>₹241.00</p>

                            <button type="button" class="btn btn-success w-100">Add to cart</button>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card border-secondary">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <img src="img/medicine.png" class="w-75" alt="">
                            </div>
                            <h5>Glucosamine HCL 1500 mg Tablet Joint Health with...</h5>
                            <p class="text-secondary p-0 m-0">Bottle of 30 Tablets</p>
                            <span class="text-secondary">M.R.P: <span
                                    class="text-decoration-line-through text-secondary">₹535.00</span> </span>
                            <p>₹241.00</p>

                            <button type="button" class="btn btn-success w-100">Add to cart</button>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card border-secondary">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <img src="img/medicine.png" class="w-75" alt="">
                            </div>
                            <h5>Glucosamine HCL 1500 mg Tablet Joint Health with...</h5>
                            <p class="text-secondary p-0 m-0">Bottle of 30 Tablets</p>
                            <span class="text-secondary">M.R.P: <span
                                    class="text-decoration-line-through text-secondary">₹535.00</span> </span>
                            <p>₹241.00</p>

                            <button type="button" class="btn btn-success w-100">Add to cart</button>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card border-secondary">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <img src="img/medicine.png" class="w-75" alt="">
                            </div>
                            <h5>Glucosamine HCL 1500 mg Tablet Joint Health with...</h5>
                            <p class="text-secondary p-0 m-0">Bottle of 30 Tablets</p>
                            <span class="text-secondary">M.R.P: <span
                                    class="text-decoration-line-through text-secondary">₹535.00</span> </span>
                            <p>₹241.00</p>

                            <button type="button" class="btn btn-success w-100">Add to cart</button>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card border-secondary">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <img src="img/medicine.png" class="w-75" alt="">
                            </div>
                            <h5>Glucosamine HCL 1500 mg Tablet Joint Health with...</h5>
                            <p class="text-secondary p-0 m-0">Bottle of 30 Tablets</p>
                            <span class="text-secondary">M.R.P: <span
                                    class="text-decoration-line-through text-secondary">₹535.00</span> </span>
                            <p>₹241.00</p>

                            <button type="button" class="btn btn-success w-100">Add to cart</button>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card border-secondary">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <img src="img/medicine.png" class="w-75" alt="">
                            </div>
                            <h5>Glucosamine HCL 1500 mg Tablet Joint Health with...</h5>
                            <p class="text-secondary p-0 m-0">Bottle of 30 Tablets</p>
                            <span class="text-secondary">M.R.P: <span
                                    class="text-decoration-line-through text-secondary">₹535.00</span> </span>
                            <p>₹241.00</p>

                            <button type="button" class="btn btn-success w-100">Add to cart</button>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
@section('script')
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