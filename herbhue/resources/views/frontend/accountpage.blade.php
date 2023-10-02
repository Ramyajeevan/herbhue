@extends('frontend.layout.main')

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
                                <h5 class="text-green">Shruti Singh</h5>
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
                            <div class="row">
                                <div class="col-3">
                                    <img src="{{asset('img/logout_FILL1_wght400_GRAD0_opsz48 (1).svg')}}" width="30px" alt="">
                                </div>
                                <div class="col-6">
                                    <h5>Log Out</h5>
                                </div>

                                <div class="col-3 text-end">
                                    <img src="{{asset('img/arrow_forward_ios_FILL1_wght400_GRAD0_opsz48.svg')}}" width="10px" alt="">
                                </div>

                            </div>
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
                                        <p class="text-black fw-bold">Shruti Singh</p>
                                    </div>
                                    <div class="col-4">
                                        <small class="text-muted">Mobile No.</small> <br>
                                        <p class="text-black fw-bold">+44 0000 000000</p>
                                    </div>
                                    <div class="col-12">
                                        <small class="text-muted">Email ID</small> <br>
                                        <p class="text-black fw-bold">example@gmail.com</p>
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
            <img src="http://127.0.0.1:8000/img/close_FILL0_wght400_GRAD0_opsz48 (2).svg" style="width: 60px;position:absolute;top: -17%;left: 40%;background: white;padding: 2%; clip-path:circle();" alt="">
            <p class="text-muted text-center">EDIT PROFILE</p>
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label text-green">NAME </label>
                        <input type="text" class="form-control border-0 border-bottom border border-black rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" value="Shruti Singh">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label text-green">Email ID</label>
                        <input type="text" class="form-control border-0 border-bottom border border-black rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" value="shrutisingh28@gmail.com">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label text-green">PHONE NO.</label>
                        <input type="text" class="form-control border-0 border-bottom border border-black rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" value="+44 0000 000000">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label text-green">DATE OF BIRTH</label>
                        <div class="row">
                            <div class="col-4"><select class="form-select rounded-0" aria-label="Default select example">
                                    <option selected>Month</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select></div>
                            <div class="col-4"><select class="form-select rounded-0" aria-label="Default select example">
                                    <option selected>Day</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select></div>

                            <div class="col-4"><select class="form-select rounded-0" aria-label="Default select example">
                                    <option selected>Year</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select></div>

                        </div>
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