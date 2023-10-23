@extends('layouts.app') 
@section('title')
<title>Herbhue - Shop Products</title>
@endsection
@section('css')
<style>
    input[type=range]{-webkit-appearance:none;border:1px solid #fff;width:300px;position:absolute;left:0}input[type=range]::-webkit-slider-runnable-track{width:300px;height:5px;background:#ddd;border:none;border-radius:3px}input[type=range]::-webkit-slider-thumb{-webkit-appearance:none;border:none;height:16px;width:16px;border-radius:50%;background:#3038ac;margin-top:-4px;cursor:pointer;position:relative;z-index:1}input[type=range]:focus{outline:0}input[type=range]:focus::-webkit-slider-runnable-track{background:#ccc}input[type=range]::-moz-range-track{width:300px;height:5px;background:#ddd;border:none;border-radius:3px}input[type=range]::-moz-range-thumb{border:none;height:16px;width:16px;border-radius:50%;background:#3038ac}input[type=range]:-moz-focusring{outline:white solid 1px;outline-offset:-1px}input[type=range]::-ms-track{width:300px;height:5px;background:0 0;border-color:transparent;border-width:6px 0;color:transparent;z-index:-4}input[type=range]::-ms-fill-lower{background:#777;border-radius:10px}input[type=range]::-ms-fill-upper{background:#ddd;border-radius:10px}input[type=range]::-ms-thumb{border:none;height:16px;width:16px;border-radius:50%;background:#21c1ff}input[type=range]:focus::-ms-fill-lower{background:#888}input[type=range]:focus::-ms-fill-upper{background:#ccc}  
</style>
@endsection
@section('content')
<div class="container-fluid mb-5">
    <div class="row mt-3">
        <div class="col-md-3">
            <div class="card border-radius-20 border-3 border-secondary">
                <div class="card-header pt-3 bg-transparent">
                    <h2 class="text-black text-center">Filters</h2>
                </div>
                <p class="text-black fs-3 fw-bold text-center mt-2">Price</p>
                <hr class="m-0 p-0">
                <div class="card-body">
                    <form method="get">

                        <input type="hidden" name="category_id" value="{{ $category_id }}">
                        <input type="hidden" name="subcategory_id" value="{{ $subcategory_id }}">
                    <div class="range-slider mb-3"> 
                        <input name="min_price" value="{{ $min_price }}" min="0" max="1000" step="10" type="range">
                        <input name="max_price" value="{{ $max_price }}" min="0" max="1000" step="10" type="range">
                        <p class="text-start pt-3">Price <span class="filterrange pt-3 ms-1"></span></p>
                        
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm text-end">Filter</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                @foreach($products as $prod)
                <div class="col-md-4 mb-4">
                    <div class="card border-secondary">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                  @if($prod->image1!="")
                                <img src="https://herbhue.azurewebsites.net/herbhue-admin/public/images/{{ $prod->image1 }}" class="w-75" alt="">
                                @else
                                <img src="{{ asset('img/no_image.svg') }}"  class="w-75" alt="">
                                @endif
                            </div>
                            <h5>{{ $prod->name }}</h5>
                            <p class="text-secondary pb-1 mb-1 d-inline-block text-truncate" style="max-width: 265px;">
                            {!! $prod->description !!}</p>
                            <p class="text-secondary p-0 m-0">{{ $prod->describe }}</p>
                            <span class="text-secondary">M.R.P: <span class="text-decoration-line-through text-secondary"> &pound; {{ $prod->product_options->mrp_price }}</span> </span>
                            <p>&pound; {{ $prod->product_options->price }}</p>

                            <a href="{{ route('productdetail', $prod->id) }}" class="btn btn-success w-100">View Product</a>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
function getVals(){ 
  let parent = this.parentNode;
  let slides = parent.getElementsByTagName("input");
    let slide1 = parseFloat( slides[0].value );
    let slide2 = parseFloat( slides[1].value ); 
  if( slide1 > slide2 ){ let tmp = slide2; slide2 = slide1; slide1 = tmp; }
  
  let displayElement = parent.getElementsByClassName("filterrange")[0];
      displayElement.innerHTML = "&pound;" + slide1 + " - &pound;" + slide2;
}

window.onload = function(){ 
  let sliderSections = document.getElementsByClassName("range-slider");
      for( let x = 0; x < sliderSections.length; x++ ){
        let sliders = sliderSections[x].getElementsByTagName("input");
        for( let y = 0; y < sliders.length; y++ ){
          if( sliders[y].type ==="range" ){
            sliders[y].oninput = getVals; 
            sliders[y].oninput();
          }
        }
      }
}
    </script>   
@endsection
