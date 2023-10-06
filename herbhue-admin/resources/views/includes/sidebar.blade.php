@php
    $url = url()->current();
    $url = explode('/', $url);
    if(!isset($url[7])){
        $url[7] = '';
    }
   //print_r($url);
@endphp
<!-- -------------------------------------------------------------- -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- -------------------------------------------------------------- -->
<aside class="left-sidebar">
  <!-- Sidebar scroll-->
  <div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
      <ul id="sidebarnav">
        <li class="nav-small-cap">
          <i class="mdi mdi-dots-horizontal"></i>
          <span class="hide-menu">Personal</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark" href="{{ route('home') }}">
            <i data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard </span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
            <i data-feather="sidebar" class="feather-icon"></i>
            <span class="hide-menu">Banner </span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="{{ route('banner.index') }}" class="sidebar-link">
                <i class="mdi mdi-view-quilt"></i>
                <span class="hide-menu"> View Banners </span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="{{ route('banner.create') }}" class="sidebar-link">
                <i class="mdi mdi-view-parallel"></i>
                <span class="hide-menu"> Add Banner </span>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-small-cap">
          <i class="mdi mdi-dots-horizontal"></i>
          <span class="hide-menu">Products</span>
        </li>
       
        
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
            <i data-feather="sidebar" class="feather-icon"></i>
            <span class="hide-menu">Category </span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="{{ route('category.index') }}" class="sidebar-link">
                <i class="mdi mdi-view-quilt"></i>
                <span class="hide-menu"> View Categories </span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="{{ route('category.create') }}" class="sidebar-link">
                <i class="mdi mdi-view-parallel"></i>
                <span class="hide-menu"> Add Category </span>
              </a>
            </li>
          </ul>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
            <i data-feather="bookmark" class="feather-icon"></i>
            <span class="hide-menu">Sub Category </span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="{{ route('subcategory.index') }}" class="sidebar-link">
                <i class="mdi mdi-book-multiple"></i>
                <span class="hide-menu"> View Sub Categories </span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="{{ route('subcategory.create') }}" class="sidebar-link">
                <i class="mdi mdi-book-plus"></i>
                <span class="hide-menu"> Add Sub Category </span>
              </a>
            </li>
          </ul>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
            <i data-feather="cpu" class="feather-icon"></i>
            <span class="hide-menu">Products </span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="{{ route('product.index') }}" class="sidebar-link">
                <i class="mdi mdi-box-shadow"></i>
                <span class="hide-menu"> View Products</span></a
              >
            </li>
            <li class="sidebar-item">
              <a href="{{ route('product.create') }}" class="sidebar-link">
                <i class="mdi mdi-application"></i>
                <span class="hide-menu"> Add Product</span>
              </a>
            </li>
           
          </ul>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
            <i data-feather="cpu" class="feather-icon"></i>
            <span class="hide-menu">Orders </span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="{{ route('order.index') }}" class="sidebar-link">
                <i class="mdi mdi-box-shadow"></i>
                <span class="hide-menu"> View Orders</span></a
              >
            </li>
           
          </ul>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
            <i data-feather="cpu" class="feather-icon"></i>
            <span class="hide-menu">Coupons </span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="{{ route('coupon.index') }}" class="sidebar-link">
                <i class="mdi mdi-box-shadow"></i>
                <span class="hide-menu"> View Coupons</span></a
              >
            </li>
            <li class="sidebar-item">
              <a href="{{ route('coupon.create') }}" class="sidebar-link">
                <i class="mdi mdi-application"></i>
                <span class="hide-menu"> Add Coupon</span>
              </a>
            </li>
          </ul>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
            <i data-feather="cpu" class="feather-icon"></i>
            <span class="hide-menu">Users </span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="{{ route('user.index') }}" class="sidebar-link">
                <i class="mdi mdi-box-shadow"></i>
                <span class="hide-menu"> View Users</span></a
              >
            </li>
           
          </ul>
        </li>
           
          </ul>
        </li>
      </ul>
    </nav>
    <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
</aside>
<!-- -------------------------------------------------------------- -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- -------------------------------------------------------------- -->