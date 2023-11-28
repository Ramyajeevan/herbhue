@extends('layouts.app')
@section('content')
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
        <h2 class="font-medium">&pound; {{ $month_earnings }}</h2>
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
                <span class="text-muted">Total Sales</span>
                <h3 class="font-medium mb-0">&pound; {{ $total_sales }}</h3>
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
                <h3 class="font-medium mb-0">{{ $products_sold }}</h3>
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
                <span class="text-muted">Total Customers</span>
                <h3 class="font-medium mb-0">{{ $total_customers }}</h3>
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
      </div>
    </div>
    <!-- ---------------------
                  end Product Sales
              ---------------- -->
  </div>
</div>


@endsection
@section('script')
    <!--This page plugins -->
    <script src="{{ asset('dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
   <script>
    // -------------------------------------------------------------------------------------------------------------------------------------------
// Dashboard 5 : Chart Init Js
// -------------------------------------------------------------------------------------------------------------------------------------------
$(function () {
  "use strict";

  // earnings
  var options_earnings_box = {
    series: [
      {
        name: "Earnings",
       // data: [5, 6, 5, 7, 9, 10, 14, 12, 11, 9, 8, 7, 10, 6, 12, 10, 8],
       data: {{$earnings}},
      },
    ],
    chart: {
      height: 75,
      type: "area",
      fontFamily: '"Nunito Sans",sans-serif',
      zoom: {
        enabled: false,
      },
      toolbar: {
        show: false,
      },
      sparkline: {
        enabled: true,
      },
    },
    dataLabels: {
      enabled: false,
    },
    colors: ["#ACB69C"],
    stroke: {
      curve: "smooth",
      width: 2,
    },
    fill: {
      type: "solid",
      opacity: 0.2,
    },
    grid: {
      show: false,
    },
    xaxis: {
      show: false,
    },
    yaxis: {
      show: false,
    },
    tooltip: {
      theme: "dark",
    },
  };

  var chart_line_earn_box = new ApexCharts(
    document.querySelector(".earnings-month"),
    options_earnings_box
  );
  chart_line_earn_box.render();

    // day chart
    var options_product = {
    series: [
      {
        name: "Amount ",
        data: {{$earnings}},
      }
    ],
    chart: {
      fontFamily: '"Nunito Sans", sans-serif',
      type: "bar",
      height: 400,
      toolbar: {
        show: false,
      },
    },
    grid: {
      show: false,
    },
    colors: ["#ACB69C"],
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: "30%",
        endingShape: "flat",
      },
    },
    dataLabels: {
      enabled: false,
    },
    stroke: {
      show: true,
      width: 0,
      colors: ["transparent"],
    },
    xaxis: {
      type: "category",
      categories: [
        "0",
        "",
        "2",
        "",
        "4",
        "",
        "6",
        "",
        "8",
        "",
        "10",
        "",
        "12",
        "",
        "14",
        "",
        "16",
      ],
      tickAmount: "16",
      axisBorder: {
        color: "rgba(0,0,0,0.5)",
      },
      tickPlacement: "on",
      axisTicks: {
        show: true,
        borderType: "solid",
        color: "rgba(0,0,0,0.5)",
        height: 6,
        offsetX: 0,
        offsetY: 0,
      },
      labels: {
        style: {
          colors: [
            "#acb69c",
            "#acb69c",
            "#acb69c",
            "#acb69c",
            "#acb69c",
            "#acb69c",
            "#acb69c",
            "#acb69c",
            "#acb69c",
            "#acb69c",
            "#acb69c",
            "#acb69c",
            "#acb69c",
            "#acb69c",
            "#acb69c",
            "#acb69c",
            "#acb69c",
            "#acb69c",
            "#acb69c",
          ],
        },
      },
    },
    yaxis: {
      axisBorder: {
        show: true,
        color: "rgba(0,0,0,0.5)",
      },
      labels: {
        style: {
          colors: "#acb69c",
        },
      },
    },
    fill: {
      opacity: 1,
    },
    tooltip: {
      theme: "dark",
    },
    legend: {
      show: false,
    },
  };

  var chart_column_basic = new ApexCharts(
    document.querySelector(".day-chart"),
    options_product
  );
  chart_column_basic.render();

 
});
</script>
@endsection