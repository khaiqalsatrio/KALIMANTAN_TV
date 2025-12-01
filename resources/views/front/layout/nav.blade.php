<style>
    /* =============================
       NAVBAR MODERN STYLING
       ============================= */
    .navbar-custom {
        background: linear-gradient(135deg, #5078c8, #3a5baa);
        padding: 8px 15px;
        border-radius: 5px;
        box-shadow: 0 3px 12px rgba(0, 0, 0, 0.15);
    }

    .navbar-custom .nav-link {
        color: #f2f2f2 !important;
        font-weight: 600;
        padding: 10px 18px !important;
        border-radius: 8px;
        transition: 0.25s ease;
        letter-spacing: 0.3px;
    }

    .navbar-custom .nav-link:hover {
        background: rgba(255, 255, 255, 0.22);
        transform: translateY(-2px);
    }

    /* =============================
       HAMBURGER ICON ANIMATION
       ============================= */
    .navbar-toggler {
        border: none !important;
    }

    .navbar-toggler-icon {
        background-image: none !important;
        width: 26px;
        height: 2px;
        background-color: white;
        position: relative;
        border-radius: 2px;
    }

    .navbar-toggler-icon::before,
    .navbar-toggler-icon::after {
        content: "";
        width: 26px;
        height: 2px;
        background-color: white;
        position: absolute;
        left: 0;
        border-radius: 2px;
    }

    .navbar-toggler-icon::before {
        top: -7px;
    }

    .navbar-toggler-icon::after {
        top: 7px;
    }


    /* =============================
       DROPDOWN DESKTOP
       ============================= */
    .dropdown-menu {
        border-radius: 12px !important;
        padding: 10px 0;
        border: 0;
        margin-top: 10px;
        animation: fadeInMenu 0.25s ease;
        box-shadow: 0 6px 22px rgba(0, 0, 0, 0.12);
    }

    @keyframes fadeInMenu {
        from {
            opacity: 0;
            transform: translateY(8px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .dropdown-item:hover {
        background: #dfe8ff;
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
        background: rgba(255, 255, 255, 0.55) !important;
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
</style>

<div class="website-menu bg-white">
    <div class="container-lg">

        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">

            <!-- HAMBURGER -->
            <button class="navbar-toggler collapsed" type="button"
                data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- DESKTOP MENU -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">

                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Kategori</a>
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

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Video</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('video_gallery') }}">Video</a></li>
                        </ul>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="{{ route('live_stream') }}">Live Berita</a></li>

                </ul>
            </div>
        </nav>
    </div>

    <!-- OFFCANVAS MOBILE MENU -->
    <div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="mobileMenu">

        <div class="offcanvas-header">
            <h5 class="offcanvas-title fw-bold">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>

        <div class="offcanvas-body">

            <ul class="navbar-nav">

                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Kategori</a>
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

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Video</a>
                    <ul class="dropdown-menu show position-static">
                        <li><a class="dropdown-item" href="{{ route('video_gallery') }}">Video</a></li>
                    </ul>
                </li>

                <li class="nav-item"><a class="nav-link" href="{{ route('live_stream') }}">Live Berita</a></li>

            </ul>
        </div>

    </div>
</div>