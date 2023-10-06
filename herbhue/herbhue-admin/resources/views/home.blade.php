@extends('layouts.app')
@section('content')

        <!-- -------------------------------------------------------------- -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- -------------------------------------------------------------- -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-5 align-self-center">
              <h4 class="page-title">Dashboard</h4>
              <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                  </ol>
                </nav>
              </div>
            </div>
            <div class="col-7 align-self-center">
              <div class="d-flex no-block justify-content-end align-items-center">
                <div class="me-2">
                  <div class="lastmonth"></div>
                </div>
                <div class="">
                  <small>LAST MONTH</small>
                  <h4 class="text-info mb-0 font-medium">$58,256</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- -------------------------------------------------------------- -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- -------------------------------------------------------------- -->
        <!-- -------------------------------------------------------------- -->
        <!-- Container fluid  -->
        <!-- -------------------------------------------------------------- -->
        <div class="container-fluid">
          <!-- -------------------------------------------------------------- -->
          <!-- Earnings -->
          <!-- -------------------------------------------------------------- -->
          <div class="row">
            <!-- Column -->
            <div class="col-sm-12 col-lg-4 d-flex align-items-stretch">
              <!-- ---------------------
                            start Earnings
                        ---------------- -->
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title">Earnings</h4>
                  <h5 class="card-subtitle">Total Earnings of the Month</h5>
                  <h2 class="font-medium">$43,567.53</h2>
                </div>
                <div class="earnings-month mt-1"></div>
              </div>
              <!-- ---------------------
                            end Earnings
                        ---------------- -->
            </div>
            <!-- Column -->
            <div class="col-sm-12 col-lg-8 d-flex align-items-stretch">
              <!-- ---------------------
                            start Overview
                        ---------------- -->
              <div class="card w-100">
                <div class="card-body border-bottom">
                  <h4 class="card-title">Overview</h4>
                  <h5 class="card-subtitle">Total Earnings of the Month</h5>
                </div>
                <div class="card-body">
                  <div class="row mt-2">
                    <!-- col -->
                    <div class="col-sm-12 col-md-4 mb-3 mb-md-0">
                      <div class="d-flex align-items-center">
                        <div class="me-2">
                          <span class="text-orange display-5"
                            ><i class="ri-wallet-2-fill"></i
                          ></span>
                        </div>
                        <div>
                          <span class="text-muted">Net Profit</span>
                          <h3 class="font-medium mb-0">$3,567.53</h3>
                        </div>
                      </div>
                    </div>
                    <!-- col -->
                    <!-- col -->
                    <div class="col-sm-12 col-md-4 mb-3 mb-md-0">
                      <div class="d-flex align-items-center">
                        <div class="me-2">
                          <span class="text-primary display-5"
                            ><i class="ri-shopping-basket-fill"></i
                          ></span>
                        </div>
                        <div>
                          <span class="text-muted">Product sold</span>
                          <h3 class="font-medium mb-0">5489</h3>
                        </div>
                      </div>
                    </div>
                    <!-- col -->
                    <!-- col -->
                    <div class="col-sm-12 col-md-4 mb-3 mb-md-0">
                      <div class="d-flex align-items-center">
                        <div class="me-2">
                          <span class="display-5"><i class="ri-account-box-fill"></i></span>
                        </div>
                        <div>
                          <span class="text-muted">New Customers</span>
                          <h3 class="font-medium mb-0">$23,568.90</h3>
                        </div>
                      </div>
                    </div>
                    <!-- col -->
                  </div>
                </div>
              </div>
              <!-- ---------------------
                            end Overview
                        ---------------- -->
            </div>
          </div>
          <!-- -------------------------------------------------------------- -->
          <!-- Product Sales -->
          <!-- -------------------------------------------------------------- -->
          <div class="row">
            <div class="col-sm-12">
              <!-- ---------------------
                            start Product Sales
                        ---------------- -->
              <div class="card">
                <div class="card-body">
                  <div class="d-md-flex align-items-center">
                    <div>
                      <h4 class="card-title">Product Sales</h4>
                      <h5 class="card-subtitle">Total Earnings of the Month</h5>
                    </div>
                    <div class="ms-auto d-flex align-items-center">
                      <!-- Tabs -->
                      <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                          <a
                            class="nav-link active"
                            id="pills-home-tab2"
                            data-bs-toggle="pill"
                            href="#day"
                            role="tab"
                            aria-selected="true"
                            >Day</a
                          >
                        </li>
                        <li class="nav-item">
                          <a
                            class="nav-link"
                            id="pills-profile-tab2"
                            data-bs-toggle="pill"
                            href="#week"
                            role="tab"
                            aria-selected="false"
                            >Week</a
                          >
                        </li>
                        <li class="nav-item">
                          <a
                            class="nav-link"
                            id="pills-month-tab2"
                            data-bs-toggle="pill"
                            href="#month"
                            role="tab"
                            aria-selected="false"
                            >Month</a
                          >
                        </li>
                      </ul>
                      <!-- Tabs -->
                    </div>
                  </div>
                  <div class="tab-content mt-3" id="pills-tabContent2">
                    <div
                      class="tab-pane fade show active"
                      id="day"
                      role="tabpanel"
                      aria-labelledby="pills-home-tab2"
                    >
                      <div class="day-chart"></div>
                    </div>
                    <div
                      class="tab-pane fade"
                      id="week"
                      role="tabpanel"
                      aria-labelledby="pills-profile-tab2"
                    >
                      <div class="week-chart"></div>
                    </div>
                    <div
                      class="tab-pane fade"
                      id="month"
                      role="tabpanel"
                      aria-labelledby="pills-month-tab2"
                    >
                      <div class="month-chart d-flex justify-content-center"></div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- ---------------------
                            end Product Sales
                        ---------------- -->
            </div>
          </div>
          <!-- -------------------------------------------------------------- -->
          <!-- Orders -->
          <!-- -------------------------------------------------------------- -->
          <div class="row">
            <div class="col-sm-12 col-lg-8 d-flex align-items-stretch">
              <!-- ---------------------
                            start Products of the Month
                        ---------------- -->
              <div class="card w-100">
                <div class="card-body">
                  <!-- title -->
                  <div class="d-md-flex align-items-center">
                    <div>
                      <h4 class="card-title">Products of the Month</h4>
                      <h5 class="card-subtitle">Overview of Latest Month</h5>
                    </div>
                    <div class="ms-auto d-flex align-items-center">
                      <div class="dl">
                        <select class="form-select">
                          <option value="0" selected>March</option>
                          <option value="1">April</option>
                          <option value="2">May</option>
                          <option value="3">June</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <!-- title -->
                  <div class="table-responsive scrollable mt-2" style="height: 400px">
                    <table class="table v-middle">
                      <thead>
                        <!-- start row -->
                        <tr>
                          <th class="border-top-0">Products</th>
                          <th class="border-top-0">Customers</th>
                          <th class="border-top-0">Status</th>
                          <th class="border-top-0">Invoice</th>
                          <th class="border-top-0">Amount</th>
                        </tr>
                        <!-- end row -->
                      </thead>
                      <tbody>
                        <!-- start row -->
                        <tr>
                          <td>
                            <div class="d-flex align-items-center">
                              <div class="me-2">
                                <img
                                  src="../../assets/images/product/chair.png"
                                  alt="user"
                                  class="circle"
                                  width="45"
                                />
                              </div>
                              <div class="">
                                <h5 class="mb-0 fs-4 font-medium">Orange Shoes</h5>
                              </div>
                            </div>
                          </td>
                          <td>Rotating Chair</td>
                          <td>
                            <i
                              class="ri-checkbox-blank-circle-fill text-orange fs-4"
                              data-bs-toggle="tooltip"
                              data-bs-placement="top"
                              title="In Progress"
                            ></i>
                          </td>
                          <td>35</td>
                          <td class="font-medium">$96K</td>
                        </tr>
                        <!-- end row -->
                        <!-- start row -->
                        <tr>
                          <td>
                            <div class="d-flex align-items-center">
                              <div class="me-2">
                                <img
                                  src="../../assets/images/product/chair2.png"
                                  alt="user"
                                  class="circle"
                                  width="45"
                                />
                              </div>
                              <div class="">
                                <h5 class="mb-0 fs-4 font-medium">Red Sandle</h5>
                              </div>
                            </div>
                          </td>
                          <td>Dummy Product</td>
                          <td>
                            <i
                              class="ri-checkbox-blank-circle-fill text-success fs-4"
                              data-bs-toggle="tooltip"
                              data-bs-placement="top"
                              title="Active"
                            ></i>
                          </td>
                          <td>35</td>
                          <td class="font-medium">$96K</td>
                        </tr>
                        <!-- end row -->
                        <!-- start row -->
                        <tr>
                          <td>
                            <div class="d-flex align-items-center">
                              <div class="me-2">
                                <img
                                  src="../../assets/images/product/chair3.png"
                                  alt="user"
                                  class="circle"
                                  width="45"
                                />
                              </div>
                              <div class="">
                                <h5 class="mb-0 fs-4 font-medium">Gourgeous Purse</h5>
                              </div>
                            </div>
                          </td>
                          <td>Comfortable Chair</td>
                          <td>
                            <i
                              class="ri-checkbox-blank-circle-fill text-success fs-4"
                              data-bs-toggle="tooltip"
                              data-bs-placement="top"
                              title="Active"
                            ></i>
                          </td>
                          <td>35</td>
                          <td class="font-medium">$96K</td>
                        </tr>
                        <!-- end row -->
                        <!-- start row -->
                        <tr>
                          <td>
                            <div class="d-flex align-items-center">
                              <div class="me-2">
                                <img
                                  src="../../assets/images/product/chair4.png"
                                  alt="user"
                                  class="circle"
                                  width="45"
                                />
                              </div>
                              <div class="">
                                <h5 class="mb-0 fs-4 font-medium">Puma T-shirt</h5>
                              </div>
                            </div>
                          </td>
                          <td>Wooden Chair</td>
                          <td>
                            <i
                              class="ri-checkbox-blank-circle-fill text-orange fs-4"
                              data-bs-toggle="tooltip"
                              data-bs-placement="top"
                              title="In Progress"
                            ></i>
                          </td>
                          <td>35</td>
                          <td class="font-medium">$96K</td>
                        </tr>
                        <!-- end row -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- ---------------------
                            end Products of the Month
                        ---------------- -->
            </div>
            <div class="col-sm-12 col-lg-4 d-flex align-items-stretch">
              <!-- ---------------------
                            start Order Stats
                        ---------------- -->
              <div class="card w-100">
                <div class="card-body border-bottom">
                  <h4 class="card-title">Order Stats</h4>
                  <h5 class="card-subtitle">Overview of orders</h5>
                  <div class="order-stats mt-4 d-flex justify-content-center"></div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-4">
                      <i class="ri-checkbox-blank-circle-fill fs-4 text-primary"></i>
                      <h3 class="mb-0 font-medium">5489</h3>
                      <span>Success</span>
                    </div>
                    <div class="col-4">
                      <i class="ri-checkbox-blank-circle-fill fs-4 text-info"></i>
                      <h3 class="mb-0 font-medium">954</h3>
                      <span>Pending</span>
                    </div>
                    <div class="col-4">
                      <i class="ri-checkbox-blank-circle-fill fs-4 text-orange"></i>
                      <h3 class="mb-0 font-medium">736</h3>
                      <span>Failed</span>
                    </div>
                  </div>
                </div>
              </div>
              <!-- ---------------------
                            end Order Stats
                        ---------------- -->
            </div>
          </div>
          <!-- -------------------------------------------------------------- -->
          <!-- Review -->
          <!-- -------------------------------------------------------------- -->
          <div class="row">
            <div class="col-sm-12">
              <!-- ---------------------
                            start Reviews
                        ---------------- -->
              <div class="card">
                <div class="row">
                  <div class="col-sm-12 col-lg-4">
                    <div class="card-body">
                      <h4 class="card-title">Reviews</h4>
                      <h5 class="card-subtitle">Overview of Review</h5>
                      <h2 class="font-medium mt-5 mb-0">25426</h2>
                      <span class="text-muted">This month we got 346 New Reviews</span>
                      <div class="image-box mt-4 mb-4">
                        <a
                          href="#"
                          class="me-2"
                          data-bs-toggle="tooltip"
                          data-bs-placement="top"
                          title="Simmons"
                          ><img
                            src="../../assets/images/users/1.jpg"
                            class="rounded-circle"
                            width="45"
                            alt="user"
                        /></a>
                        <a
                          href="#"
                          class="me-2"
                          data-bs-toggle="tooltip"
                          data-bs-placement="top"
                          title="Fitz"
                          ><img
                            src="../../assets/images/users/2.jpg"
                            class="rounded-circle"
                            width="45"
                            alt="user"
                        /></a>
                        <a
                          href="#"
                          class="me-2"
                          data-bs-toggle="tooltip"
                          data-bs-placement="top"
                          title="Phil"
                          ><img
                            src="../../assets/images/users/3.jpg"
                            class="rounded-circle"
                            width="45"
                            alt="user"
                        /></a>
                        <a
                          href="#"
                          class="me-2"
                          data-bs-toggle="tooltip"
                          data-bs-placement="top"
                          title="Melinda"
                          ><img
                            src="../../assets/images/users/4.jpg"
                            class="rounded-circle"
                            width="45"
                            alt="user"
                        /></a>
                      </div>
                      <a
                        href="javascript:void(0)"
                        class="btn btn-lg btn-info waves-effect waves-light"
                        >Checkout All Reviews</a
                      >
                    </div>
                  </div>
                  <div class="col-sm-12 col-lg-8 border-left">
                    <div class="card-body">
                      <ul class="list-style-none">
                        <li class="mt-4">
                          <div class="d-flex align-items-center">
                            <i class="ri-emotion-happy-line display-5 text-muted"></i>
                            <div class="ms-2">
                              <h5 class="mb-0">Positive Reviews</h5>
                              <span class="text-muted">25547 Reviews</span>
                            </div>
                          </div>
                          <div class="progress">
                            <div
                              class="progress-bar bg-success"
                              role="progressbar"
                              style="width: 47%"
                              aria-valuenow="47"
                              aria-valuemin="0"
                              aria-valuemax="100"
                            ></div>
                          </div>
                        </li>
                        <li class="mt-5">
                          <div class="d-flex align-items-center">
                            <i class="ri-emotion-unhappy-line display-5 text-muted"></i>
                            <div class="ms-2">
                              <h5 class="mb-0">Negative Reviews</h5>
                              <span class="text-muted">5547 Reviews</span>
                            </div>
                          </div>
                          <div class="progress">
                            <div
                              class="progress-bar bg-orange"
                              role="progressbar"
                              style="width: 33%"
                              aria-valuenow="33"
                              aria-valuemin="0"
                              aria-valuemax="100"
                            ></div>
                          </div>
                        </li>
                        <li class="mt-5 mb-5">
                          <div class="d-flex align-items-center">
                            <i class="ri-emotion-normal-line display-5 text-muted"></i>
                            <div class="ms-2">
                              <h5 class="mb-0">Neutral Reviews</h5>
                              <span class="text-muted">547 Reviews</span>
                            </div>
                          </div>
                          <div class="progress">
                            <div
                              class="progress-bar bg-info"
                              role="progressbar"
                              style="width: 20%"
                              aria-valuenow="20"
                              aria-valuemin="0"
                              aria-valuemax="100"
                            ></div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <!-- ---------------------
                            end Reviews
                        ---------------- -->
            </div>
          </div>
        </div>
        <!-- -------------------------------------------------------------- -->
        <!-- End Container fluid  -->
        <!-- -------------------------------------------------------------- -->

@endsection
@section('script')
    <!--This page plugins -->
    <script src="{{ asset('dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('dist/js/pages/dashboards/dashboard5.js') }}"></script>
@endsection