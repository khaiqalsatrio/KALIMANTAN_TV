<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                        class="fas fa-search"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <!-- <li class="nav-link">
            <a href="" target="_blank" class="btn btn-warning">Front End</a>
        </li> -->
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <div class="rounded-circle border border-4 border-light shadow-sm p-1 d-inline-block bg-white">
                    <img
                        src="{{ asset('uploads/' . Auth::guard('admin')->user()->photo) }}"
                        alt="Profile Photo"
                        class="rounded-circle"
                        style="width: 45px; height: 45px; object-fit: cover;">
                </div>
                <div class="d-sm-none d-lg-inline-block">{{ Auth::guard('admin')->user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('admin_profile') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Edit Profile
                </a>
                <a href="{{ route('admin_logout') }}" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>