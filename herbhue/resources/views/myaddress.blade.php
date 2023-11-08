@extends('layouts.app') 
@section('title')
<title>Herbhue - Saved Addresses</title>
@endsection
@section('css') 
@endsection
@section('content')
<div class="container-fluid my-5">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-4 mb-4">
            @include('includes.myaccountsidenav')
            </div>
            <div class="col-md-8 mb-4">
           <div class="card border-0">
            <div class="card-body">
                <h5 class="card-tittle mb-4">My Addresses</h5> 
                <a href="{{ route('addaddress') }}" class="text-black"> <button type="button" class="btn btn-dark"><i class="fa fa-plus text-white me-2"></i> Add a new Address </button> </a>
                <div class=" ps-3 py-3 my-5 saved-add" style="background-color:#E2F0DB;">
                    <h5><i class="fa fa-home" style="color:#889A6A;"> </i> You Saved {{ count($addresses) }} Addresses</h5>
                </div>

                @foreach($addresses as $address)
                <div class="card rounded-0 p-3 mb-3 shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-10">
                        <p>{{ $address->firstname }} {{ $address->lastname }}</p> 
                        <p class="py-0 my-0">{{ $address->street_address }}, @if($address->street_address2!="") {{ $address->street_address2 }}, @endif {{ $address->city }}, {{ $address->pincode }}</p>
                        <p class="py-0 my-0">{{ $address->phone }}</p>
                        </div>
                        <div class="col-2 text-end">
                        <a href="{{ route('editaddress',$address->id) }}">
                            <img src="{{ asset('img/edit2.png') }}" alt="" class="me-2"  style="width: 20px;">
                        </a>
                        <a href="javascript:void(0);" onclick="deleteaddress({{ $address->id }} );">
                            <img src="{{ asset('img/delete_FILL0_wght400_GRAD0_opsz24.svg') }}" alt=""  style="width: 20px;">
                        </a> 
                      
                       
                        </div>
                        </div>
                        
                       
                    </div>
                </div>
                @endforeach

            </div>
           </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
     function deleteaddress(id)
    {
      if(confirm("Are you sure want to delete this address?"))
      {
        var url="{{URL('deleteaddress')}}";
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
</script>
@endsection
