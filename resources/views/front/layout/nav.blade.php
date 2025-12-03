<style>
    /* =============================
   NAVBAR TERANG (MATCH FOOTER)
   ============================= */
.navbar-custom {
    background: #2d3f57 !important;
    padding: 12px 15px;
    border-bottom: 2px solid #4A70FF;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.20);
}


    /* Link Navbar */
    .navbar-custom .nav-link {
        color: #f5f7ff !important;
        font-weight: 600;
        padding: 10px 18px !important;
        border-radius: 6px;
        position: relative;
        transition: 0.25s ease-in-out;
    }

    /* Efek garis biru halus */
    .navbar-custom .nav-link::after {
        content: "";
        position: absolute;
        left: 50%;
        bottom: 4px;
        width: 0;
        height: 2px;
        background: #4A70FF;
        transition: 0.3s ease;
        transform: translateX(-50%);
        border-radius: 50px;
    }

    .navbar-custom .nav-link:hover::after {
        width: 60%;
    }

    .navbar-custom .nav-link:hover {
        color: #aecdff !important;
        /* biru soft, lebih terang */
        transform: translateY(-2px);
    }

    /* HAMBURGER */
    .navbar-toggler-icon,
    .navbar-toggler-icon::before,
    .navbar-toggler-icon::after {
        background-color: #dfe6ff !important;
    }

    /* DROPDOWN */
    .dropdown-menu {
        background: #e1e1e2ff !important;
        /* sedikit lebih terang */
        border: 1px solid rgba(255, 255, 255, 0.06);
    }

    .dropdown-item {
        color: black;
    }

    .dropdown-item:hover {
        background: rgba(74, 112, 255, 0.25) !important;
        color: #4A70FF !important;
    }

    /* OFFCANVAS (Mobile) */
    .offcanvas {
        background: #1b2b47 !important;
        /* matching navbar */
        color: white;
    }

    .offcanvas .nav-link {
        color: #e8ecff !important;
    }

    .offcanvas .nav-link:hover {
        background: rgba(74, 112, 255, 0.22);
        color: #4A70FF !important;
    }


    /* =============================
       MOBILE FULL WIDTH NAVBAR
       ============================= */
    @media (max-width: 991px) {

        .website-menu,
        .container-lg {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }

        #navbarSupportedContent {
            display: none !important;
        }

        .navbar-custom {
            border-radius: 0;
        }
    }

    /* =============================
       OFFCANVAS GLASSMORPHISM
       ============================= */
    .offcanvas {
        background: rgba(255, 255, 255, 0.8) !important;
        backdrop-filter: blur(12px);
        border-radius: 0 12px 12px 0;
        box-shadow: 4px 0 18px rgba(0, 0, 0, 0.15);
    }

    .offcanvas .nav-link {
        font-weight: 600;
        color: #1d2a55 !important;
        padding: 12px 15px;
        border-radius: 8px;
        transition: 0.2s;
    }

    .offcanvas .nav-link:hover {
        background: rgba(80, 120, 200, 0.15);
        transform: translateX(4px);
    }

    .offcanvas .dropdown-menu {
        background: transparent !important;
        box-shadow: none !important;
        padding-top: 5px;
    }

    .offcanvas .dropdown-item {
        border-radius: 8px;
    }

    .offcanvas .dropdown-item:hover {
        background: rgba(80, 120, 200, 0.25);
    }

    @media (max-width: 991px) {
        .navbar-custom {
            padding-top: 16px !important;
            padding-bottom: 16px !important;
            min-height: 30px;
            /* opsional: agar lebih tinggi */
        }

        .navbar-toggler {
            padding: 10px 12px !important;
            /* tombol lebih besar */
            font-size: 20px !important;
        }

        .navbar-toggler-icon,
        .navbar-toggler-icon::before,
        .navbar-toggler-icon::after {
            width: 30px !important;
            /* garis lebih panjang */
            height: 3px !important;
            /* garis lebih tebal */
        }

        .navbar-toggler-icon::before {
            top: -8px !important;
        }

        .navbar-toggler-icon::after {
            top: 8px !important;
        }
    }

    @media (max-width: 991px) {
        #mobileMenu {
            width: 60% !important;
            max-width: 300px;
            border-top-right-radius: 16px;
            border-bottom-right-radius: 16px;
            overflow: hidden;
        }
    }
</style>

<div class="website-menu bg-white">
    <div class="container-lg">

        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">

            <!-- HAMBURGER -->
            <button class="navbar-toggler collapsed" type="button"
                data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- DESKTOP MENU -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">

                    <!-- HOME -->
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-2" href="{{ route('home') }}">
                            <i class="bi bi-house-door"></i> Home
                        </a>
                    </li>

                    <!-- KATEGORI -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-grid"></i> Kategori
                        </a>
                        <ul class="dropdown-menu">
                            @foreach($global_category_data as $cat)
                            <li>
                                <a class="dropdown-item" href="{{ route('category', $cat->id) }}">
                                    {{ ucwords($cat->category_name) }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </li>

                    <!-- VIDEO -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-camera-video"></i> Video
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('video_gallery') }}">Video</a></li>
                        </ul>
                    </li>

                    <!-- LIVE BERITA -->
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-2" href="{{ route('live_stream') }}">
                            <i class="bi bi-broadcast-pin"></i> Live Berita
                        </a>
                    </li>

                </ul>
            </div>
        </nav>
    </div>


    <!-- OFFCANVAS MOBILE MENU -->
    <div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="mobileMenu">

        <div class="offcanvas-header">
            <h5 class="offcanvas-title fw-bold" style="color: black;">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav">
                <!-- HOME -->
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{ route('home') }}">
                        <i class="bi bi-house-door"></i> Home
                    </a>
                </li>
                <!-- KATEGORI -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-grid"></i> Kategori
                    </a>
                    <ul class="dropdown-menu show position-static">
                        @foreach($global_category_data as $cat)
                        <li>
                            <a class="dropdown-item" href="{{ route('category', $cat->id) }}">
                                {{ ucwords($cat->category_name) }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                <!-- VIDEO -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-camera-video"></i> Video
                    </a>
                    <ul class="dropdown-menu show position-static">
                        <li><a class="dropdown-item" href="{{ route('video_gallery') }}">Video</a></li>
                    </ul>
                </li>
                <!-- LIVE BERITA -->
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{ route('live_stream') }}">
                        <i class="bi bi-broadcast-pin"></i> Live Berita
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>