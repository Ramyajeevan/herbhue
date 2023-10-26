<!-- -------------------------------------------------------------- -->
<!-- Topbar header - style you can find in pages.scss -->
<!-- -------------------------------------------------------------- -->
<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header">
        <!-- This is for the sidebar toggle which is visible on mobile only -->
        <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
            <i class="ri-close-line fs-6 ri-menu-2-line"></i>
        </a>
        <!-- -------------------------------------------------------------- -->
        <!-- Logo -->
        <!-- -------------------------------------------------------------- -->
        <a class="navbar-brand" href="{{ route('home') }}">
            <!-- Logo icon -->
            <b class="logo-icon">
            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
            <!-- Dark Logo icon -->
            <img src="{{ asset('assets/images/logo-icon.png') }}" alt="homepage" class="dark-logo" />
            <!-- Light Logo icon -->
            <img
                src="{{ asset('assets/images/logo-light-icon.png ') }}"
                alt="homepage"
                class="light-logo"
            />
            </b>
            <!--End Logo icon -->
            <!-- Logo text -->
            <span class="logo-text">
            <!-- dark Logo text -->
            <img src="{{ asset('assets/images/logo-text.png ') }}" alt="homepage" class="dark-logo" />
            <!-- Light Logo text -->
            <img
                src="{{ asset('assets/images/logo-light-text.png ') }}"
                class="light-logo"
                alt="homepage"
            />
            </span>
        </a>
        <!-- -------------------------------------------------------------- -->
        <!-- End Logo -->
        <!-- -------------------------------------------------------------- -->
        <!-- -------------------------------------------------------------- -->
        <!-- Toggle which is visible on mobile only -->
        <!-- -------------------------------------------------------------- -->
        <a
            class="topbartoggler d-block d-md-none waves-effect waves-light"
            href="javascript:void(0)"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
            ><i class="ri-more-line fs-6"></i
        ></a>
        </div>
        <!-- -------------------------------------------------------------- -->
        <!-- End Logo -->
        <!-- -------------------------------------------------------------- -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
        <!-- -------------------------------------------------------------- -->
        <!-- toggle and nav items -->
        <!-- -------------------------------------------------------------- -->
        <ul class="navbar-nav me-auto">
            <li class="nav-item d-none d-md-block">
            <a
                class="nav-link sidebartoggler waves-effect waves-light"
                href="javascript:void(0)"
                data-sidebartype="mini-sidebar"
                ><i data-feather="menu" class="feather-sm"></i
            ></a>
            </li>
        </ul>
        <!-- -------------------------------------------------------------- -->
        <!-- Right side toggle and nav items -->
        <!-- -------------------------------------------------------------- -->
        <ul class="navbar-nav">

            <!-- -------------------------------------------------------------- -->
            <!-- User profile and search -->
            <!-- -------------------------------------------------------------- -->
            <li class="nav-item dropdown">
            <a
<<<<<<< HEAD
                class="nav-link dropdown-toggle text-muted waves-effect waves-dark"
=======
                class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic"
>>>>>>> de157da9c9466cb6459f82797f6962a949cbf747
                href="javascript:void(0);"
                data-bs-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
                >Administrator</a>
            <div class="dropdown-menu dropdown-menu-end user-dd animated flipInY">
                <form id="logout-form" action="{{ route('logoutform') }}" method="POST" class="d-none">
                        @csrf                   
                    </form>
                <a class="dropdown-item" href="javascript:void(0);"  onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                ><i data-feather="log-out" class="feather-sm text-danger me-1 ms-1"></i>
                Logout</a
                >
                
            </div>
            </li>
            <!-- -------------------------------------------------------------- -->
            <!-- User profile and search -->
            <!-- -------------------------------------------------------------- -->
        </ul>
        </div>
    </nav>
</header>
<!-- -------------------------------------------------------------- -->
<!-- End Topbar header -->
<!-- -------------------------------------------------------------- -->
