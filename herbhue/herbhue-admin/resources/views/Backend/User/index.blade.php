@extends('layouts.app')
@section('css')
    <!-- This page plugin CSS -->
    <link rel="stylesheet" href="{{ asset('dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
@endsection
@section('breadcrumb')
 <!-- -------------------------------------------------------------- -->
<!-- Bread crumb and right sidebar toggle -->
<!-- -------------------------------------------------------------- -->
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">User</h4>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">User</li>
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
<!-- Start Page Content -->
<!-- -------------------------------------------------------------- -->
<!-- File export -->
<div class="row">
  <div class="col-12">
    <!-- ---------------------
                  start File export
              ---------------- -->
    <div class="card">
      <div class="border-bottom title-part-padding">
        <h4 class="card-title mb-0">User List</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
        @if(count($user)>0)
          <table id="file_export" class="table table-striped table-bordered display text-nowrap">
            <thead>
              <!-- start row -->
              <tr>
                <th>S.No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Address</th>
                <th>Mobile</th>
                <th>Action</th>
              </tr>
              <!-- end row -->
            </thead>
            <tbody>
            @if(count($user)>0)
              @foreach ($user as $users)
                <tr>
                  <td>{{ ($loop->index)+1 }}</td>
                  <td>{{ $users->name }}</td>
                <td>{{ $users->email }}</td>
                <td>{{ $users->password }}</td>
                <td>{{ $users->address }}<br>{{ $users->city }}<br>{{ $users->pincode }}</td>
                 <td>{{ $users->mobile }}</td>
                  <td>
                   <!-- <a  href="{{route('user.edit',$users->id)}}"  class="btn btn-sm text-primary border-primary" data-original-title="Edit Coupon">
                      <i data-feather="edit-3"></i>
                    </a> -->
                    <a href="javascript:void(0);"  onclick="deleteuser({{$users->id}})" class="btn btn-sm text-danger border-danger" data-original-title="Delete">
                    <i data-feather="trash-2"></i></a>
                  </td>
                </tr>
              @endforeach
              @else
              <tr>
                  <td colspan='7' align="center">No Users Found</td>
              </tr>
              @endif
            </tbody>

          </table>
          @else
              <div align="center">No Users Found</div>
              @endif
        </div>
      </div>
    </div>
    <!-- ---------------------
                  end File export
              ---------------- -->
  </div>
</div>


@endsection
@section('script')
    <!-- --------------------------------------------------------------- -->
    <!-- This page JavaScript -->
    <!-- --------------------------------------------------------------- -->
    <script src="{{ asset('dist/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <script src="{{ asset('dist/js/pages/datatable/datatable-advanced.init.js') }}"></script>



    <!-- Scripts -->
    <script>
      function deleteuser(id)
      {
        /*if(swal( {
        title: "Are you sure?",
        text: "You will not be able to recover this User!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    }))*/
        if(confirm("Are you sure want to delete this user?"))
        {
        	var url="{{URL('user')}}/"+id;
            $.ajax(
            {
                url: url,
                method: 'delete', 
                data:{"id":id, "_token": "{{ csrf_token() }}" },
                success: function (response)
                {
                  swal(response); // see the reponse sent
                  setTimeout(function(){window.location.reload();},5000); 
                }
            });
        }
      }  
    </script>
@endsection