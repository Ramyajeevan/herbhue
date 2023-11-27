@php
    $url = url()->current();
    $url = explode('/', $url);
    if(!isset($url[7])){
        $url[7] = '';
    }
   print_r($url);
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
          <a class="sidebar-link waves-effect waves-dark  @if($url[6]=='home') active @endif" href="{{ route('home') }}">
            <i data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard </span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow waves-effect waves-dark @if($url[6]=='banner') active @endif" href="javascript:void(0);" aria-expanded="false">
            <i data-feather="image" class="feather-icon"></i>
            <span class="hide-menu">Banner </span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="{{ route('banner.index') }}" class="sidebar-link  @if($url[6]=='banner'&&$url[7]=='') active @endif">
                <i class="mdi mdi-view-quilt"></i>
                <span class="hide-menu"> View Banners </span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="{{ route('banner.create') }}" class="sidebar-link @if($url[6]=='banner'&&$url[7]=='create') active @endif">
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
          <a class="sidebar-link has-arrow waves-effect waves-dark @if($url[6]=='category') active @endif" href="javascript:void(0);" aria-expanded="false">
            <i data-feather="sidebar" class="feather-icon"></i>
            <span class="hide-menu">Category </span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="{{ route('category.index') }}" class="sidebar-link @if($url[6]=='category'&&$url[7]=='') active @endif">
                <i class="mdi mdi-view-quilt"></i>
                <span class="hide-menu"> View Categories </span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="{{ route('category.create') }}" class="sidebar-link @if($url[6]=='category'&&$url[7]=='create') active @endif">
                <i class="mdi mdi-view-parallel"></i>
                <span class="hide-menu"> Add Category </span>
              </a>
            </li>
          </ul>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link has-arrow waves-effect waves-dark @if($url[6]=='subcategory') active @endif" href="javascript:void(0);" aria-expanded="false">
            <i data-feather="sidebar" class="feather-icon"></i>
            <span class="hide-menu">Sub Category </span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="{{ route('subcategory.index') }}" class="sidebar-link @if($url[6]=='subcategory'&&$url[7]=='') active @endif">
                <i class="mdi mdi-book-multiple"></i>
                <span class="hide-menu"> View Sub Categories </span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="{{ route('subcategory.create') }}" class="sidebar-link @if($url[6]=='subcategory'&&$url[7]=='create') active @endif">
                <i class="mdi mdi-book-plus"></i>
                <span class="hide-menu"> Add Sub Category </span>
              </a>
            </li>
          </ul>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow waves-effect waves-dark @if($url[6]=='product') active @endif" href="javascript:void(0);" aria-expanded="false">
            <i data-feather="cpu" class="feather-icon"></i>
            <span class="hide-menu">Products </span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="{{ route('product.index') }}" class="sidebar-link @if($url[6]=='product'&&$url[7]=='') active @endif">
                <i class="mdi mdi-box-shadow"></i>
                <span class="hide-menu"> View Products</span></a
              >
            </li>
            <li class="sidebar-item">
              <a href="{{ route('product.create') }}" class="sidebar-link @if($url[6]=='product'&&$url[7]=='create') active @endif">
                <i class="mdi mdi-application"></i>
                <span class="hide-menu"> Add Product</span>
              </a>
            </li>
           
          </ul>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
            <i data-feather="sidebar" class="feather-icon"></i>
            <span class="hide-menu">Brand </span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="{{ route('brand.index') }}" class="sidebar-link">
                <i class="mdi mdi-view-quilt"></i>
                <span class="hide-menu"> View Brands </span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="{{ route('brand.create') }}" class="sidebar-link">
                <i class="mdi mdi-view-parallel"></i>
                <span class="hide-menu"> Add Brand </span>
              </a>
            </li>
          </ul>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
            <i data-feather="package" class="feather-icon"></i>
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
            <i data-feather="tag" class="feather-icon"></i>
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
            <i data-feather="users" class="feather-icon"></i>
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
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
            <i data-feather="bookmark" class="feather-icon"></i>
            <span class="hide-menu">Tickets </span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="{{ route('ticket.index') }}" class="sidebar-link">
                <i class="mdi mdi-box-shadow"></i>
                <span class="hide-menu"> View Tickets</span></a
              >
            </li>
           
          </ul>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
            <i data-feather="sidebar" class="feather-icon"></i>
            <span class="hide-menu">Personalization </span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="{{ route('personalise.index') }}" class="sidebar-link">
                <i class="mdi mdi-view-quilt"></i>
                <span class="hide-menu"> View Personalization </span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="{{ route('personalise.create') }}" class="sidebar-link">
                <i class="mdi mdi-view-parallel"></i>
                <span class="hide-menu"> Add Personalization </span>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-small-cap">
          <i class="mdi mdi-dots-horizontal"></i>
          <span class="hide-menu">Others</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
            <i data-feather="sidebar" class="feather-icon"></i>
            <span class="hide-menu">Blog </span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="{{ route('blog.index') }}" class="sidebar-link">
                <i class="mdi mdi-view-quilt"></i>
                <span class="hide-menu"> View Blog </span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="{{ route('blog.create') }}" class="sidebar-link">
                <i class="mdi mdi-view-parallel"></i>
                <span class="hide-menu"> Add Blog </span>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-small-cap">
          <i class="mdi mdi-dots-horizontal"></i>
          <span class="hide-menu">Ratings</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
            <i data-feather="star" class="feather-icon"></i>
            <span class="hide-menu">Ratings </span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="{{ route('ratings.index') }}" class="sidebar-link">
                <i class="mdi mdi-box-shadow"></i>
                <span class="hide-menu"> View Ratings</span></a>
            </li>
           
          </ul>
        </li>

        <li class="nav-small-cap">
          <i class="mdi mdi-dots-horizontal"></i>
          <span class="hide-menu">Newsletter</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
            <i data-feather="star" class="feather-icon"></i>
            <span class="hide-menu">Newsletter </span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="{{ route('newsletter.index') }}" class="sidebar-link">
                <i class="mdi mdi-box-shadow"></i>
                <span class="hide-menu"> View Subscribers</span></a>
            </li>
            <li class="sidebar-item">
              <a href="{{ route('newsletter.create') }}" class="sidebar-link">
                <i class="mdi mdi-box-shadow"></i>
                <span class="hide-menu"> Send Newsletter</span></a>
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