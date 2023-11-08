@extends('layouts.app')
@section('breadcrumb')
<!-- -------------------------------------------------------------- -->
<!-- Bread crumb and right sidebar toggle -->
<!-- -------------------------------------------------------------- -->
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">Blog</h4>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Blog</li>
          </ol>
        </nav>
      </div>
    </div>

  </div>
</div>
<!-- -------------------------------------------------------------- -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- -------------------------------------------------------------- -->
@endsection
@section('content')
@if(Session::has('success'))
<div class="alert customize-alert alert-dismissible text-success  alert-success fade show remove-close-icon" role="alert">
    <span class="side-line bg-success"></span>
    <div class="d-flex align-items-center font-weight-medium">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info text-success feather-sm me-2 flex-shrink-0">
            <circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="8"></line>
        </svg>
        <span class="text-truncate"> {{Session::get('success')}}</span>
        <div class="ms-auto d-flex justify-content-end">
        <a href="javascript:void(0)" class="px-2 btn" data-bs-dismiss="alert" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 fill-white text-success feather-sm">
                <polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line>
            </svg>
        </a>
        </div>
    </div>
</div>
@endif
@if(Session::has('errors'))
<div class="alert customize-alert alert-dismissible text-danger  alert-danger fade show remove-close-icon" role="alert">
    <span class="side-line bg-danger"></span>
    <div class="d-flex align-items-center font-weight-medium">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info text-danger feather-sm me-2 flex-shrink-0"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="8"></line></svg>
        <span class="text-truncate">{{Session::get('errors')}}</span>
        <div class="ms-auto d-flex justify-content-end">
        <a href="javascript:void(0)" class="px-2 btn" data-bs-dismiss="alert" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 fill-white text-danger feather-sm"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
        </a>
        </div>
    </div>
</div>
@endif

<!-- -------------------------------------------------------------- -->
<!-- Container fluid  -->
<!-- -------------------------------------------------------------- -->
<div class="container-fluid">
  <!-- -------------------------------------------------------------- -->
  <!-- Start Page Content -->
  <!-- -------------------------------------------------------------- -->

  <!-- .row -->
  <div class="row">
    <div class="col-sm-12">
      <!-- ---------------------
                    start Default Basic Forms
                ---------------- -->
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Edit Blog</h4>
          <form class="form" enctype="multipart/form-data"  action="{{route('blog.update',$blog->id)}}" method="post">
          @csrf

            <div class="mb-3 row">
              <label for="title" class="col-md-2 col-form-label">Blog Title</label>
              <div class="col-md-10">
                <input class="form-control" type="text" id="title" name="title" value="{{ $blog->title }}" placeholder="Enter Blog Title" required/>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="name" class="col-md-2 col-form-label">Blog Description</label>
              <div class="col-md-10">
                <textarea class="form-control"  id="description" name="description" placeholder="Enter Blog description" required>{{ $blog->description }}</textarea>
              </div>
            </div>

            <div class="mb-3 row">
              <label class="col-md-2 col-form-label" for="image">Blog Image</label>
              <div class="col-md-10">
                  <div class="input-group mb-3">
                      <span class="input-group-text">Upload</span>

                      <div class="custom-file" style="width:92.75%;">
                        <input type="file" class="form-control" id="image" name="image">
                      </div>
                    </div>
              </div>

            <div class="mb-3 row">
              <label class="col-md-2 col-form-label">&nbsp;</label>
              <div class="col-md-10">
                  <button type="submit" class="btn btn-success rounded-pill px-4">
                    <div class="d-flex align-items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save feather-sm me-1 fill-icon"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                      Update
                    </div>
                  </button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- ---------------------
                    end Default Basic Forms
                ---------------- -->
    </div>
  </div>
  <!-- /.row -->
  <!-- -------------------------------------------------------------- -->
  <!-- End PAge Content -->
  <!-- -------------------------------------------------------------- -->
</div>
<!-- -------------------------------------------------------------- -->
<!-- End Container fluid  -->
<!-- -------------------------------------------------------------- -->
@endsection