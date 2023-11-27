@extends('layouts.app1')
@section('title')
<title>Herbhue - Admin Panel</title>
@endsection
@section('content')
 <!-- -------------------------------------------------------------- -->
      <!-- Login box.scss -->
      <!-- -------------------------------------------------------------- -->
      <div
        class="auth-wrapper d-flex no-block justify-content-center align-items-center"
        style="background: grey;"
      >
      <div class="auth-box">
          <div id="loginform">
            <div class="logo">
              <span class="db"><img src="{{ asset('assets/images/Herbhue_Logo.png') }}" alt="logo" width="150" /></span>
            </div>
            
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
            <!-- Form -->
            <div class="row">
              <div class="col-12">
                <form class="form-horizontal mt-3" id="loginform" method="POST" action="{{ route('dologin') }}" >
                    @csrf
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="email">
                      <i data-feather="user" class="feather-sm"></i>
                    </span>
                    <input
                    id="email" name="email" type="email"
                      class="form-control form-control-lg"
                      placeholder="Email"
                      aria-label="Email"
                      aria-describedby="email" value="{{ old('email') }}" required
                    />
                  </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="password">
                      <i data-feather="edit-2" class="feather-sm"></i>
                    </span>
                    <input
                    id="password" name="password" type="password"
                      class="form-control form-control-lg"
                      placeholder="Password"
                      aria-label="Password"
                      aria-describedby="password" required
                    />
                  </div>

                  <div class="mb-3 text-center">
                    <div class="col-xs-12 pb-3">
                      <button class="btn d-block w-100 btn-lg btn-info font-medium" type="submit">
                        Log In
                      </button>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
       
        </div>
      </div>
      <!-- -------------------------------------------------------------- -->
      <!-- Login box.scss -->
      <!-- -------------------------------------------------------------- -->
      @endsection
