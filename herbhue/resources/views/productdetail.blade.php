@extends('layouts.app') 
@section('title')
<title>Herbhue - {{ $products->name }}</title>
@endsection
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css"
        integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
<style>
    .rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    visibility:hidden;
    left:0px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #3038AC;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #3038AC;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #3038AC;
}


.progress{
	width: 80%;
	height: 10px;
    position: relative;
    top: 5px;
}
.skill-wrapper{
  margin-bottom:30px;
}
.skill-wrapper span {
    font-size: 18px;
    line-height: 20px;
    text-transform: uppercase;
    font-family: Inconsolata,monospace;
    margin-bottom: 10px;
}
.progress-bar {
    background: #01A10B;
}
.progressbar-active{
	animation-name: progress;
	animation-duration: 1s;
	animation-fill-mode: forwards;
	animation-delay: 0.4s;
}
@keyframes progress{
	0%{
		width:0;
	}
	100%{
		width:100%;
	}
}
</style>
@endsection
@section('content')
<div class="container-fluid">
        <div class="container mt-5">
            <div class="row mb-4">
                <div class="col-md-6">
                   <div class="row">
                    <div class="col-3"> 
                    <div id="thumbs" class=" text-center">
                        @if(!empty($products->image1))
                        <img src="https://herbhue.azurewebsites.net/herbhue-admin/public/images/{{ $products->image1 }}" alt="1st image  " class="mb-2" />
                        @endif
                        @if(!empty($products->image2))
                        <img src="https://herbhue.azurewebsites.net/herbhue-admin/public/images/{{ $products->image2 }}" alt="2nd image  "class="mb-2" />
                        @endif
                        @if(!empty($products->image3))
                        <img src="https://herbhue.azurewebsites.net/herbhue-admin/public/images/{{ $products->image3 }}" alt="3rd image  " class="mb-2" />
                        @endif
                        @if(!empty($products->image4))
                        <img src="https://herbhue.azurewebsites.net/herbhue-admin/public/images/{{ $products->image4 }}" alt="4th image  " class="mb-2" />
                        @endif
                        @if(!empty($products->image5))
                        <img src="https://herbhue.azurewebsites.net/herbhue-admin/public/images/{{ $products->image5 }}" alt="5th image  "  class="mb-2" />
                        @endif
                    </div>
                    </div>
                    <div class="col-9">
                    <div class="productImage text-center">
                      @if($products->image1!="")
                      <img id="largeImage" class="w-100" src="https://herbhue.azurewebsites.net/herbhue-admin/public/images/{{ $products->image1 }}" alt="Default Image">
                      @else
                      <img src="{{ asset('img/no_image.svg') }}" class="w-100" alt="">
                      @endif
                    </div>
                    <button type="button" class="btn bg-black text-white w-100 btn-lg" onclick="addtocart();">Add to cart</button>
                    </div>
                   </div>
                </div>
                <div class="col-md-6">
                    <h6 class="text-green">{{ $products->category_name }}</h6>
                    <h3 class="text-black">{{ $products->name }}</h3>
                   <p>
                    <?php for($k=1;$k<=5;$k++) { 
    						if($k<=$stars){ ?>
                          <i class="fa fa-star text-green fs-5 me-2"></i>
                          <?php } else { ?>
                          <i class="fa fa-star-o text-green fs-5 me-2"></i>
                          <?php } } ?>
                         <span class="text-secondary">({{ $totalusers }} Customer Reviews)</span>
                    </p>
                    <h5 class="fw-bold">&pound; <span id="price">{{ $products->product_options[0]->price }}</span>
                        <span class="fav">
                        @if($wishlist_user==0)
                        <a href="javascript:void(0);" @if(!empty(Session::get('username'))) onclick="addtowishlist({{ $products->id }});" @else onclick="showalert();" @endif>
                        <i class="fa fa-heart @if($wishlist_user==0) text-secondary @endif"></i>
                        </a>
                        @else
                        <i class="fa fa-heart text-primary"></i>
                        @endif
                        </span>
                    </h5>
                    <p class="fs-5">M.R.P: <strong class="text-decoration-line-through">&pound; 
                    <span id="mrp_price">{{ $products->product_options[0]->mrp_price }}</span></strong> </p>

                    <div class="mb-4">
                    <p class="small text-black fw-bold">Size</p>
                        <!-- @if($products->product_options[0]->stock > 0)
                        <p class="fs-5 text-light-green fw-bold">In Stock</p>
                        @else
                        <p class="fs-5 text-light-red fw-bold">Out of Stock</p>
                        @endif -->
                        @php
                        $productoptions=$products->product_options;
                        @endphp
                        @foreach($productoptions as $options)
                            <input type="radio" class="btn-check" name="option_id" id="option_id_{{$options->id}}" 
                            autocomplete="off" value="{{$options->id}}" 
                            @if(count($productoptions)>1) onclick="showprice({{ $options->id }},{{ $options->price }},{{ $options->mrp_price }});" @endif
                            @if($loop->index==0) checked @endif>
                            <label class="btn btn-outline-light text-black border-secondary px-4 py-2  text-start"
                            for="option_id_{{$options->id}}"> {{$options->quantity}} {{$options->quantitytype}} 
                            <strong>&pound; {{$options->price}}</strong> </label>
                        @endforeach
                      
                    </div>
                    <!-- <div class="d-flex mb-3">
                        <p class="fs-5 text-secondary me-2">Quantity</p>
                        <span class="minus btn btn-success btn-sm shadow  " style="height: 35px;">-</span>
                        <input type="number" class="count shadow border-0 border-top border-bottom " id="quantity" name="qty"
                            value="1" style="width: 40px; height: 35px;" readonly>
                        <span class="plus btn btn-success btn-sm   shadow" style="height: 35px;">+</span>
                    </div> -->
                    <!-- <div class="d-flex">
                        <p class="fs-5 text-secondary me-2">Delivery</p>
                        <div class="input-group mb-3 pe-5 me-5">
                            <span class="input-group-text border-0 border-bottom bg-transparent rounded-0 border-3"
                                id="basic-addon1"><img src="{{ asset('img/pin_drop_FILL1_wght400_GRAD0_opsz48 (1).svg') }}"
                                    style="width: 20px;" alt=""></span>
                            <input type="text" class="form-control border-0 border-bottom border-3 w-50"
                                placeholder="Enter Pincode" name="pincode" id="pincode">
                            <span class="input-group-text border-0 border-bottom border-3 bg-transparent rounded-0 text-green fw-bold"
                                id="basic-addon1"><a href="javascript:void(0);" onclick="checkpincode({{ $products->id }});">Check</a></span>

                        </div>
                    </div> -->

                  


                </div>
            </div>

            <h3 class="text-black">Description</h3>
            <p class="text-secondary fs-5 border-bottom pb-4 mb-5 border-3">
            {!! $products->description !!}
            </p>

            <div class="row border">
            <div class="col-md-7">
            <div class="card border-0">
                    <div class="card-header border-0 bg-white d-flex justify-content-between">
                        <h5 class="pt-1">Reviews &amp; Ratings</h5>
                       
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 pt-4">
                                <h3 class="text-center mb-0 pb-0">4.5</h3>
                                <p class="py-0 my-0 fs-5 text-center"><i class="fa fa-star green me-2"></i> <i class="fa fa-star green me-2"></i> <i class="fa fa-star green me-2"></i> <i class="fa fa-star green me-2"></i><i class="fa fa-star-half-full green "></i></p>
                                <p class="py-1 my-1 text-center">Total Ratings : 1,050</p>
                            </div>
                            <div class="col-8">
                                <div class="skill-wrapper d-flex justify-content-center mb-2">
                                    <span class="float-left me-3 text-nowrap h4">5 <i class="fa fa-star text-secondary"></i></span>
                                    <div class="progress me-3">
                                        <div class="progress-bar progressbar-active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="max-width:100%;"></div>
                                    </div>
                                    <span class="d-block float-right h4">856</span>

                                </div>
                                <div class="skill-wrapper d-flex justify-content-center mb-2">
                                    <span class="float-left me-3 text-nowrap h4">4 <i class="fa fa-star text-secondary"></i></span>
                                    <div class="progress me-3">
                                        <div class="progress-bar progressbar-active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="max-width:85%;"></div>
                                    </div>
                                    <span class="d-block float-right h4">135</span>

                                </div>
                                <div class="skill-wrapper d-flex justify-content-center mb-2">
                                    <span class="float-left me-3 text-nowrap h4">3 <i class="fa fa-star text-secondary"></i></span>
                                    <div class="progress me-3">
                                        <div class="progress-bar progressbar-active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="max-width:75%;"></div>
                                    </div>
                                    <span class="d-block float-right h4">45</span>

                                </div>
                                <div class="skill-wrapper d-flex justify-content-center mb-2">
                                    <span class="float-left me-3 text-nowrap h4">2 <i class="fa fa-star text-secondary"></i></span>
                                    <div class="progress me-3">
                                        <div class="progress-bar progressbar-active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="max-width:60%;"></div>
                                    </div>
                                    <span class="d-block float-right h4">15</span>

                                </div>
                                <div class="skill-wrapper d-flex justify-content-center mb-2">
                                    <span class="float-left me-3 text-nowrap h4">1 <i class="fa fa-star text-secondary"></i></span>
                                    <div class="progress me-3">
                                        <div class="progress-bar progressbar-active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="max-width:30%;"></div>
                                    </div>
                                    <span class="d-block float-right h4">5</span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">

            </div>
        </div>










            @if(!empty(Session::get('username')))
            <form method="post" action="{{ route('addrating') }}">
                @csrf
                <input type="hidden" name="product_id" id="product_id" value="{{  $products->id }}">
            <h3 class="text-black">Reviews & Ratings</h3>
            <div class="rate">
            <input type="radio" id="star5" name="rate" value="5" />
            <label for="star5" title="text">5 stars</label>
            <input type="radio" id="star4" name="rate" value="4" />
            <label for="star4" title="text">4 stars</label>
            <input type="radio" id="star3" name="rate" value="3" />
            <label for="star3" title="text">3 stars</label>
            <input type="radio" id="star2" name="rate" value="2" />
            <label for="star2" title="text">2 stars</label>
            <input type="radio" id="star1" name="rate" value="1" />
            <label for="star1" title="text">1 star</label>
            </div>
            <br><br>
            <textarea class="form-control w-25" placeholder="Your Message" name="review" id="review" required></textarea>
            <button type="submit" class="btn btn-primary mt-3">Add Review</button>
            </form>
            @endif
            <div class="card my-5">
            <div class="card-header bg-white">
            <h4 class="text-black">Reviews by customers</h4>
            </div>
            <ul class="list-group list-group-flush">
                @if(count($rating_products)>0)
                @foreach($rating_products as $rating_product)
                <li class="list-group-item">
                    <div class="mb-3">
                        <span class="badge bg-primary p-2 fs-5 px-3"><span>{{ $rating_product->rating }}</span> <i class="fa fa-star"></i></span>
                    </div>
                    <h5>{{ $rating_product->review }}</h5>
                    <p class="text-secondary pb-1 mb-1">{{ $rating_product->user_name }}, {{ $rating_product->days }} Ago </p> 
                </li> 
                @endforeach
                @else
                <li class="list-group-item">No reviews found</li>
                @endif
            </ul>
        </div>
        </div>
    </div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('#thumbs img').click(function () {
        $('#largeImage').attr('src', $(this).attr('src').replace('thumb', 'large'));
        $('#description').html($(this).attr('alt'));
    });
</script>
<script>
    $(document).ready(function () {
        $('.count').prop('disabled', true);

        $(document).on('click', '.plus', function () {
            $('.count').val(parseInt($('.count').val()) + 1);
        });

        $(document).on('click', '.minus', function () {
            var count = parseInt($('.count').val());
            if (count > 1) {  // Make sure count doesn't go below 1
                $('.count').val(count - 1);
            }
        });
    });

</script>
<script>
    function showalert()
    {
        alert('You are not Logged In. Please Register/LogIn yourself !');
        window.location.href="{{route('login') }}";
    }
    function addtowishlist(product_id)
    {
    //alert(product_id);
        var url="{{URL('addtowishlist')}}";
        $.ajax(
        {
            url: url,
            method: 'post', 
            data:{"product_id":product_id, "_token": "{{ csrf_token() }}" },
            success: function (response)
            {
                alert(response);
                window.location.reload();
            }
        });
    }
    function showprice(id,price,mrp_price)
    {
        $("#price").html(price);
        $("#mrp_price").html(mrp_price);
    }
    function checkpincode(product_id)
    {
        var pincode=$("#pincode").val();
        var url="{{URL('checkpincode')}}";
        $.ajax(
        {
            url: url,
            method: 'post', 
            data:{"product_id":product_id,'pincode':pincode, "_token": "{{ csrf_token() }}" },
            success: function (response)
            {
                alert(response);

            }
        });
    }
    function addtocart()
    {
      var option_id = $("input[name='option_id']:checked").val();
      var quantity=$("#quantity").val();
      var url="{{URL('addtocart')}}";
      $.ajax(
        {
          url: url,
          method: 'post', 
          data:{"option_id":option_id,"quantity":quantity, "_token": "{{ csrf_token() }}" },
          success: function (response)
          {
            alert(response);
            window.location.href="{{ route('viewcart') }}";
          }
        });
    }
</script>
<script>
    $(window).on('scroll',function(){
			let scroll = $(window).scrollTop();
			let oTop = $('.progress-bar').offset().top - window.innerHeight;
			if(scroll>oTop){
				$(".progress-bar").addClass("progressbar-active");
			}
			else{
				$(".progress-bar").removeClass("progressbar-active");
			}
		});
</script>
@endsection
