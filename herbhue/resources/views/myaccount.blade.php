@extends('layouts.app') 
@section('title')
<title>Herbhue - My Account</title>
@endsection
@section('css')

@endsection
@section('content')
<div class="container-fluid pb-5">
    <div class="container">
        <h2 class="text-black">My Account</h2>

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card shadow border-3 mb-5 border-secondary">
                    <div class="card-body">
                        <div class="d-flex">
                            <img src="{{asset('img/Group 45.png')}}" width="60px" class="me-2" alt="">
                            <div>
                                <h6>Hello ,</h6>
                                <h5 class="text-green">{{ $user->name }}</h5>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card shadow border-3 border-secondary">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item py-3">
                            <div class="row">
                                <div class="col-3">
                                    <img src="{{asset('img/inventory_2_FILL1_wght400_GRAD0_opsz48.png')}}" width="30px" alt="">
                                </div>
                                <div class="col-6">
                                    <h5>My Orders</h5>
                                </div>

                                <div class="col-3 text-end">
                                    <img src="{{asset('img/arrow_forward_ios_FILL1_wght400_GRAD0_opsz48.svg')}}" width="10px" alt="">
                                </div>

                            </div>
                        </li>
                        <li class="list-group-item py-3">
                            <div class="row">
                                <div class="col-3">
                                    <img src="{{asset('img/location_on_FILL1_wght400_GRAD0_opsz48.png')}}" width="30px" alt="">
                                </div>
                                <div class="col-6">
                                    <h5>My Addresses</h5>
                                </div>

                                <div class="col-3 text-end">
                                    <img src="{{asset('img/arrow_forward_ios_FILL1_wght400_GRAD0_opsz48.svg')}}" width="10px" alt="">
                                </div>

                            </div>
                        </li>
                        <li class="list-group-item py-4">
                            <div class="row">
                                <div class="col-3">
                                    <img src="{{asset('img/shopping_cart_FILL1_wght400_GRAD0_opsz48 (3) (1).svg')}}" width="30px" alt="">
                                </div>
                                <div class="col-6">
                                    <h5>My Cart</h5>
                                </div>

                                <div class="col-3 text-end">
                                    <img src="{{asset('img/arrow_forward_ios_FILL1_wght400_GRAD0_opsz48.svg')}}" width="10px" alt="">
                                </div>

                            </div>
                        </li>


                        <li class="list-group-item py-3">
                            <div class="row">
                                <div class="col-3">
                                    <img src="{{asset('img/favorite_FILL1_wght400_GRAD0_opsz48 (2) (1).svg')}}" width="30px" alt="">
                                </div>
                                <div class="col-6">
                                    <h5>My Wishlist</h5>
                                </div>

                                <div class="col-3 text-end">
                                    <img src="{{asset('img/arrow_forward_ios_FILL1_wght400_GRAD0_opsz48.svg')}}" width="10px" alt="">
                                </div>

                            </div>
                        </li>

                        <li class="list-group-item py-3">
                            <div class="row">
                                <div class="col-3">
                                    <img src="{{asset('img/contact_page_FILL1_wght400_GRAD0_opsz48 (1).svg')}}" width="30px" alt="">
                                </div>
                                <div class="col-6">
                                    <h5>Contact Us</h5>
                                </div>

                                <div class="col-3 text-end">
                                    <img src="{{asset('img/arrow_forward_ios_FILL1_wght400_GRAD0_opsz48.svg')}}" width="10px" alt="">
                                </div>

                            </div>
                        </li>

                        <li class="list-group-item py-3">
                            <a href="{{ route('logout') }}">
                            <div class="row">
                                <div class="col-3">
                                    <img src="{{asset('img/logout_FILL1_wght400_GRAD0_opsz48 (1).svg')}}" width="30px" alt="">
                                </div>
                                <div class="col-6">
                                    <h5 style="color:#212529;">Log Out</h5>
                                </div>

                                <div class="col-3 text-end">
                                    <img src="{{asset('img/arrow_forward_ios_FILL1_wght400_GRAD0_opsz48.svg')}}" width="10px" alt="">
                                </div>

                            </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card shadow border-secondary border-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <h5 class="text-black">Manage your personal information</h5>

                                <div class="row">
                                    <div class="col-4">
                                        <small class="text-muted">Full Name</small> <br>
                                        <p class="text-black fw-bold">{{ $user->name }}</p>
                                    </div>
                                    <div class="col-4">
                                        <small class="text-muted">Mobile No.</small> <br>
                                        <p class="text-black fw-bold">{{ $user->mobile }}</p>
                                    </div>
                                    <div class="col-12">
                                        <small class="text-muted">Email ID</small> <br>
                                        <p class="text-black fw-bold">{{ $user->email }}</p>
                                    </div>


                                </div>
                            </div>
                            <div class="col-3 text-end">
                                <img src="{{asset('img/drive_file_rename_outline_FILL1_wght400_GRAD0_opsz48.svg')}}" width="20px" data-bs-toggle="modal" data-bs-target="#exampleModal" alt="">
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body">

            <a href="javascript:void(0);" class="close" data-bs-dismiss="modal" aria-label="Close"><img  src="{{ asset('img/close_FILL0_wght400_GRAD0_opsz48 (2).svg') }}" style="width: 60px;position:absolute;top: -17%;left: 40%;background: white;padding: 2%; clip-path:circle();" alt="X"></a>
            <p class="text-muted text-center">EDIT PROFILE</p>
                <form method="post" action="{{ route('myaccountsettings') }}">
                    @csrf()
                    <div class="mb-3">
                        <label for="name" class="form-label text-green">Name </label>
                        <input type="text" class="form-control border-0 border-bottom border border-black rounded-0" id="name" name="name" placeholder="Name"  value="{{ $user->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label text-green">Email ID</label>
                        <input type="email" class="form-control border-0 border-bottom border border-black rounded-0" id="email" name="email" value="{{ $user->email }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="mobile" class="form-label text-green">Mobile No.</label>
                        <input type="text" class="form-control border-0 border-bottom border border-black rounded-0" id="mobile" name="mobile" onkeypress="return onlyNumberKey(event);" maxlength = "10"  value="{{ $user->mobile }}">
                    </div>

                    <div class="mb-3">
                        <label for="dob" class="form-label text-green">Date Of Birth</label>
                        <input type="date" class="form-control border-0 border-bottom border border-black rounded-0" id="dob" name="dob" placeholder="Enter Date of Birth" max="<?php echo date("Y-m-d"); ?>"  value="{{ $user->dob }}" required>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary w-100">Save Changes</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
        function onlyNumberKey(evt) {
            // Only ASCII character in that range allowed
            var keyCode = evt.which ? evt.which : evt.keyCode

                if (!(keyCode >= 48 && keyCode <= 57)) {
                //alert("Only numbers are allowed!");
                return false;
            }
            
        }
    </script>
<script>
    $(document).ready(function () {
    $('#dob').datepicker({
        startDate: '-180d',
        endDate: '+1d',
        autoclose: true
    });
});
</script>
@endsection