@extends('layouts.app')
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
          <h4 class="card-title">Add Personalise</h4>
          <form class="form" enctype="multipart/form-data" action="{{route('personalise.store')}}" method="post">
          @csrf
            <div class="mb-3 row">
              <label for="user_id" class="col-md-2 col-form-label">User Name</label>
              <div class="col-md-10">
                  <select name="user_id" id="user_id" class="form-select" required>
                    <option value="" selected>Select User</option>
                    @foreach($users as $user)
                    <option value="{{ $user->id }}">{{$user->name}} -- {{$user->mobile}}</option>
                    @endforeach
                  </select>
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-md-2 col-form-label" for="question">Question</label>
              <div class="col-md-10">
                  <textarea name="question" id="question" class="form-control" required></textarea>
              </div>
            </div>
            <hr style="color:currentcolor;">
            <h4 class="card-title">Add Recommendations</h4>
            <div class="mb-3 row">
              <label class="col-md-2 col-form-label" for="recommendations"></label>
              <div align="center" class="col-md-5 fw-bold">
              Recommendations
              </div>
              <div align="center" class="col-md-5 fw-bold">
              Image
              </div>
            </div>

            <div class="mb-3 row">
              <label class="col-md-2 col-form-label" for="recommendation1">1</label>
              <div class="col-md-5">
                <textarea name="recommendation1" id="recommendation1" class="form-control" required></textarea>
              </div>
              <div align="center" class="col-md-5">
                <div class="input-group mb-3">
                  <span class="input-group-text">Upload</span>

                  <div class="custom-file" style="width:82.75%;">
                    <input type="file" class="form-control" id="image1" name="image1">
                  </div>
                </div>
              </div>
            </div>

            <div class="mb-3 row">
              <label class="col-md-2 col-form-label" for="recommendation2">2</label>
              <div class="col-md-5">
                <textarea name="recommendation2" id="recommendation2" class="form-control"></textarea>
              </div>
              <div align="center" class="col-md-5">
                <div class="input-group mb-3">
                  <span class="input-group-text">Upload</span>

                  <div class="custom-file" style="width:82.75%;">
                    <input type="file" class="form-control" id="image2" name="image2">
                  </div>
                </div>
              </div>
            </div>

            <div class="mb-3 row">
              <label class="col-md-2 col-form-label" for="recommendation3">3</label>
              <div class="col-md-5">
                <textarea name="recommendation3" id="recommendation3" class="form-control"></textarea>
              </div>
              <div align="center" class="col-md-5">
                <div class="input-group mb-3">
                  <span class="input-group-text">Upload</span>

                  <div class="custom-file" style="width:82.75%;">
                    <input type="file" class="form-control" id="image3" name="image3">
                  </div>
                </div>
              </div>
            </div>


            <div class="mb-3 row">
              <label class="col-md-2 col-form-label" for="recommendation4">4</label>
              <div class="col-md-5">
                <textarea name="recommendation4" id="recommendation4" class="form-control"></textarea>
              </div>
              <div align="center" class="col-md-5">
                <div class="input-group mb-3">
                  <span class="input-group-text">Upload</span>

                  <div class="custom-file" style="width:82.75%;">
                    <input type="file" class="form-control" id="image4" name="image4">
                  </div>
                </div>
              </div>
            </div>


            <div class="mb-3 row">
              <label class="col-md-2 col-form-label" for="recommendation5">5</label>
              <div class="col-md-5">
                <textarea name="recommendation5" id="recommendation5" class="form-control"></textarea>
              </div>
              <div align="center" class="col-md-5">
                <div class="input-group mb-3">
                  <span class="input-group-text">Upload</span>

                  <div class="custom-file" style="width:82.75%;">
                    <input type="file" class="form-control" id="image5" name="image5">
                  </div>
                </div>
              </div>
            </div>


            <div class="mb-3 row">
              <label class="col-md-2 col-form-label">&nbsp;</label>
              <div class="col-md-10">
                
                <button type="submit" class="btn btn-success rounded-pill px-4">
                    <div class="d-flex align-items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save feather-sm me-1 fill-icon"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                      Save
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
@endsection
@section('script')
@endsection