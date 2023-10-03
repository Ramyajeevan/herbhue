@extends('frontend.layout.main')

@section('content')

<div class="container-fluid">
<div class="container mb-5">
    <h4 class="text-black my-4">My Order List</h4>

    <table class="table">
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
            <tr>
                <th scope="row">
                    <img src="img/medicine.png" alt="" style="width: 75px;" />
                </th>
                <td class="fw-bold align-items-center">Glucosamine HCL <br> 1500 mg Tablet <br> Joint Health</td>
                <td class="fw-bold align-items-center">#LT-ORD93362</td>
                <td class="fw-bold align-items-center">2022-08-19</td>
                <td class="fw-bold align-items-center">Waiting</td>
                <td class="fw-bold align-items-center">£ 482.00</td>
                <td><button type="button" class="btn btn-success px-3 rounded-pill btn-sm">View</button>
                </td>
            </tr>
        </tbody>
    </table>

</div>
</div>
@endsection