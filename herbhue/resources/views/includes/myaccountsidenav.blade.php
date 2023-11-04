                <!-- <div class="card shadow border-3 mb-5 border-secondary">
                    <div class="card-body">
                        <div class="d-flex">
                            <img src="{{asset('img/Group 45.png')}}" width="60px" class="me-2" alt="">
                            <div>
                                <h6>Hello ,</h6>
                                <h5 class="text-green">{{ $user->name }}</h5>
                            </div>
                        </div>
                    </div>
                </div> -->


                <div class="card shadow border-3 border-secondary">
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item py-3">
                            <a href="{{ route('myaccount') }}" class="text-black">
                            <div class="row">
                                <div class="col-3">
                                    <img src="{{asset('img/edit.svg')}}" width="30px" alt="">
                                </div>
                                <div class="col-6">
                                    <h5>Edit Profile</h5>
                                </div>

                                <div class="col-3 text-end">
                                    <img src="{{asset('img/black-arrow.svg')}}" width="10px" alt="">
                                </div>

                            </div>
                            </a>
                        </li>
                        <li class="list-group-item py-3">
                            <a href="{{ route('myorders') }}" class="text-black">
                            <div class="row">
                                <div class="col-3">
                                    <img src="{{asset('img/order.svg')}}" width="30px" alt="">
                                </div>
                                <div class="col-6">
                                    <h5>My Orders</h5>
                                </div>
                                <div class="col-3 text-end">
                                    <img src="{{asset('img/black-arrow.svg')}}" width="10px" alt="">
                                </div>

                            </div>
                            </a>
                        </li>
                        <li class="list-group-item py-3">
                        <a href="{{ route('myaddress') }}" class="text-black">
                            <div class="row">
                                <div class="col-3">
                                    <img src="{{asset('img/location.svg')}}" width="30px" alt="">
                                </div>
                                <div class="col-6">
                                    <h5>My Addresses</h5>
                                </div>

                                <div class="col-3 text-end">
                                    <img src="{{asset('img/black-arrow.svg')}}" width="10px" alt="">
                                </div>
                            </div>
                         </a>
                        </li>
                        <li class="list-group-item py-4">
                            <a href="{{ route('viewcart') }}" class="text-black">
                            <div class="row">
                                <div class="col-3">
                                    <img src="{{asset('img/cart.svg')}}" width="30px" alt="">
                                </div>
                                <div class="col-6">
                                    <h5>My Cart</h5>
                                </div>

                                <div class="col-3 text-end">
                                    <img src="{{asset('img/black-arrow.svg')}}" width="10px" alt="">
                                </div>

                            </div>
                        </li>


                        <li class="list-group-item py-3">
                            <a href="{{ route('mywishlist') }}" class="text-black">
                            <div class="row">
                                <div class="col-3">
                                    <img src="{{asset('img/wishlist.svg')}}" width="30px" alt="">
                                </div>
                                <div class="col-6">
                                    <h5>My Wishlist</h5>
                                </div>

                                <div class="col-3 text-end">
                                    <img src="{{asset('img/black-arrow.svg')}}" width="10px" alt="">
                                </div>

                            </div>
                            </a>
                        </li>

                        <li class="list-group-item py-3">
                            <a href="{{ route('profilecontact') }}" class="text-black">
                            <div class="row">
                                <div class="col-3">
                                    <img src="{{asset('img/contact.svg')}}" width="30px" alt="">
                                </div>
                                <div class="col-6">
                                    <h5>Contact Us</h5>
                                </div>

                                <div class="col-3 text-end">
                                    <img src="{{asset('img/black-arrow.svg')}}" width="10px" alt="">
                                </div>

                            </div>
                            </a>
                        </li>

                        <li class="list-group-item py-3">
                            <a href="{{ route('logout') }}">
                            <div class="row">
                                <div class="col-3">
                                    <img src="{{asset('img/logout.svg')}}" width="30px" alt="">
                                </div>
                                <div class="col-6">
                                    <h5 style="color:#212529;">Log Out</h5>
                                </div>

                                <div class="col-3 text-end">
                                    <img src="{{asset('img/black-arrow.svg')}}" width="10px" alt="">
                                </div>

                            </div>
                            </a>
                        </li>
                    </ul>
                </div>