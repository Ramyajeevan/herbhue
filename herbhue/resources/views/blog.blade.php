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
                <h3 class="fw-bold">INTRODUCTION</h3>
                <p class="fs-5 mb-4">If you’re looking for a sophisticated and serene aura, pastel colour palettes are credited with these traits. For example, bedrooms often flaunt a serene and calming pastel blue colour palette because of its sleep-inducing abilities, elegance and charm. It is important for you to understand the allure of pastel colours and the importance of choosing the right colour palette for your project.</p>

                <h5 class="fw-bold mb-2">A. The Allure of Pastel Colours in Home Decor</h5>

                <img src="https://vertexpaint.in/website/public/img/blog1.png" width="100%" height="380px" class="my-3" alt="">

                <p class="fs-5 mb-4">
                If you’re looking for a sophisticated and serene aura, pastel colour palettes are credited with these traits. For example, bedrooms often flaunt a serene and calming pastel blue colour palette because of its sleep-inducing abilities, elegance and charm. It is important for you to understand the allure of pastel colours and the importance of choosing the right colour palette for your project.
                </p>



                <h5 class="fw-bold mb-2">A. The Allure of Pastel Colours in Home Decor</h5>

                <img src="https://vertexpaint.in/website/public/img/blog1.png" width="100%" height="380px" class="my-3" alt="">

                <p class="fs-5">
                If you’re looking for a sophisticated and serene aura, pastel colour palettes are credited with these traits. For example, bedrooms often flaunt a serene and calming pastel blue colour palette because of its sleep-inducing abilities, elegance and charm. It is important for you to understand the allure of pastel colours and the importance of choosing the right colour palette for your project.
                </p>
            </div>
            <div class="col-md-4">
            <h3 class="fw-bold">More</h3>

            <div class="card border-0 mb-2 bg-transparent">
                    <img src="https://vertexpaint.in/website/public/img/blog1.png" alt="" class="card-img-top w-100">
                    <div class="card-body wall-body2 shadow p-4 bg-white rounded-2">
                        <h5 class="text-black fw-bold">6 Stylish Pastel Colour Palattes For Your Dream Home  </h5>
                       
                    </div>
                </div>
                <div class="card border-0 mb-2 bg-transparent">
                    <img src="https://vertexpaint.in/website/public/img/blog1.png" alt="" class="card-img-top w-100">
                    <div class="card-body wall-body2 shadow p-4 bg-white rounded-2">
                        <h5 class="text-black fw-bold">6 Stylish Pastel Colour Palattes For Your Dream Home  </h5>
                       
                    </div>
                </div>
                <div class="card border-0 mb-2 bg-transparent">
                    <img src="https://vertexpaint.in/website/public/img/blog1.png" alt="" class="card-img-top w-100">
                    <div class="card-body wall-body2 shadow p-4 bg-white rounded-2">
                        <h5 class="text-black fw-bold">6 Stylish Pastel Colour Palattes For Your Dream Home  </h5>
                       
                    </div>
                </div>
                <div class="card border-0 mb-2 bg-transparent">
                    <img src="https://vertexpaint.in/website/public/img/blog1.png" alt="" class="card-img-top w-100">
                    <div class="card-body wall-body2 shadow p-4 bg-white rounded-2">
                        <h5 class="text-black fw-bold">6 Stylish Pastel Colour Palattes For Your Dream Home  </h5>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection