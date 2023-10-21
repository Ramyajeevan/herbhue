@extends('layouts.app') 
@section('title')
<title>Herbhue - Thanks Page</title>
@endsection
@section('css')

@endsection
@section('content')
<div class="container-fluid mb-5">
    Thank You for ordering with us.<br>
    You have made a successfull order.<br>
    Your Order Id is {{ $order_id }}.<br>
    <a href="{{ route('products') }}" class="btn btn-primary" style="background-color:#F44336;color:#ffffff;" title="Continue Shopping">Continue Shopping</a>
</div>
@endsection