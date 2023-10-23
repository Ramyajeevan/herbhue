@extends('layouts.app') 
@section('title')
<title>Herbhue - My Orders</title>
@endsection
@section('css')

@endsection
@section('content')
<div class="container-fluid">
<div class="container mb-5">
    <h4 class="text-black my-4">My Order List</h4>

    <table class="table">
        @if(count($orders)>0)
        <thead>
            <tr>
                <th scope="col" class="bg-green text-white">Product</th>
                <th scope="col" class="bg-green text-white">Product Name</th>
                <th scope="col" class="bg-green text-white">Order ID</th>
                <th scope="col" class="bg-green text-white">Date</th>
                <th scope="col" class="bg-green text-white">Status</th>
                <th scope="col" class="bg-green text-white">Total</th>
                <th scope="col" class="bg-green text-white">Actions</th>

            </tr>
        </thead>
        <tbody>
            @foreach($orders as $ord)
            <tr>
                <th scope="row">
                    @if($ord->image1!="")
                      <img  src="https://herbhue.azurewebsites.net/herbhue-admin/public/images/{{ $ord->image1 }}"  style="width: 75px;" >
                      @else
                      <img src="{{ asset('img/no_image.svg') }}" alt="" style="width: 75px;">
                      @endif
                </th>
                <td class="fw-bold align-items-center">{{ $ord->product_name }}</td>
                <td class="fw-bold align-items-center">{{ $ord->order_id }}</td>
                <td class="fw-bold align-items-center">{{ $ord->added_date }}</td>
                <td class="fw-bold align-items-center">{{ $ord->status }}</td>
                <td class="fw-bold align-items-center">&pound; {{ $ord->total }}</td>
                <td><button type="button" class="btn btn-success px-3 rounded-pill btn-sm">View</button>
                </td>
            </tr>
            @endforeach
        </tbody>
        @else
        <tbody>
            <tr>
                <td align="center">No Orders Found</td>
            </tr>
        </tbody>
        @endif
    </table>

</div>
</div>
@endsection
@section('script')

@endsection
