@extends('layouts.app')
@section('css')
    <!-- This page plugin CSS -->
    <link rel="stylesheet" href="{{ asset('dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
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
        <h4 class="card-title mb-0">Order List</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
       
          <table id="file_export" class="table table-striped table-bordered display">
            <thead>
              <!-- start row -->
              <tr>
                 <th>S.NO</th>
                <th>Order Id</th>
                <th>Ordered Date</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Payment Type</th>
                <th>Payment Status</th>
                <th>Payment Id</th>
                 <th>Status</th>
                <th>Action</th>
              </tr>
              <!-- end row -->
            </thead>
            <tbody>
            @if(count($order)>0)
              @foreach ($order as $ord)
              <tr>
                <td>{{ ($loop->index)+1 }}</td>
                <td>{{ $ord->order_id }}</td>
                <td>{{ $ord->added_date }}</td>
                <td>{{ $ord->name }}</td>
                <td>{{ $ord->mobile }}</td>
                <td>{{ $ord->address1 }}@if($ord->address2!="")<br>{{ $ord->address2 }} @endif<br>{{ $ord->pincode }}</td>
                <td>{{ $ord->payment_method }}</td>
                <td>{{ $ord->payment_status }}</td>
                <td>{{ $ord->payment_id }}</td>
                <td>{{ $ord->status }}</td>
                <td>
                  
                  <a  href="{{route('order.edit',$ord->id)}}" class="btn btn-sm text-primary border-primary" style="margin-bottom:10px;" data-original-title="Edit Order">
                      <i data-feather="edit-3"></i>
                    </a> <br>
                  <a  href="javascript:void(0);" onclick="deleteorder({{$ord->id}})"class="btn btn-sm text-danger border-danger" data-original-title="Delete">
                    <i data-feather="trash-2"></i></a>
                </td>
              </tr>
              @endforeach
              @else
              <tr><td colspan='11' align="center">No order Found</td></tr>
              @endif
            </tbody>

          </table>
       </div>
      </div>
    </div>
    <!-- ---------------------
                  end File export
              ---------------- -->
  </div>
</div>

@endsection
@if(count($order)>0)
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
<script>
      function deleteorder(id)
      {
        if(confirm("Are you sure want to delete this order?"))
        {
        	var url="{{URL('order')}}/"+id;
            $.ajax(
            {
                url: url,
                method: 'delete', 
                data:{"id":id, "_token": "{{ csrf_token() }}" },
                success: function (response)
                {
                    alert(response); // see the reponse sent
                    window.location.reload();
                }
            });
        }
      }  
    </script>
@endsection
@endif