@extends('layouts.app')
@section('title')
<title>Herbhue - Blog</title>
@endsection
@section('css')
<style>
    .aboutus img{
        margin-top: 6%; 
        width: 100%;
        height: 400px;
    }
    .wall-body2 {
    position: relative;
    width: 436px;
    top: -65px;
    left: 22px;
}

@media screen and (max-width: 900px){
    .wall-body2 {
    width: 100%;
    left: 0;
}
}

</style>
@endsection
@section('content')
<section class="aboutus">
<img src="https://herbhue.azurewebsites.net/herbhue-admin/public/images/1698671729.png" alt="" >

</section>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-8">



                <h5 class="fw-bold mb-2"  data-aos="fade-up"
                     data-aos-duration="2000">{{ $blogs->title }}</h5>

                <img src="https://herbhue.azurewebsites.net/herbhue-admin/public/images/{{ $blogs->image }}"  data-aos="zoom-in"
     data-aos-duration="2000" width="100%" height="380px" class="my-3" alt="">

                <p class="fs-5"  data-aos="fade-up"
     data-aos-duration="2000">
                {{ $blogs->description }}
                </p>
            </div>
            <div class="col-md-4"  data-aos="fade-up"
     data-aos-duration="2000">
                <h3 class="fw-bold">More</h3>
                @if(count($related_blogs)>0)
                @foreach($related_blogs as $related)  
                <a href="{{ route('blogpage', $related->id) }}" style="text-decoration:none;">  
                <div class="card border-0 mb-2 bg-transparent">
                    <img src="https://herbhue.azurewebsites.net/herbhue-admin/public/images/{{ $related->image }}" alt="" class="card-img-top w-100">
                    <div class="card-body wall-body2 shadow p-4 bg-white rounded-2">
                        <h5 class="text-black fw-bold">6 Stylish Pastel Colour Palattes For Your Dream Home  </h5>
                    
                    </div>
                </div>
                </a>
                @endforeach
                @else
                Not Found
                @endif
                    
            </div>
        </div>
    </div>
</div>
 
@endsection