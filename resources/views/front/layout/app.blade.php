<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Kalimantan TV Website</title>
    <link rel="icon" type="image/png" href="{{ asset('uploads/kalimantantv2.png') }}">

    @include('front.layout.styles')
    @include('front.layout.scripts')

    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script type="text/javascript" src="https://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6212352ed76fda0a"></script>

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-84213520-6"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-84213520-6');
    </script>
    <style>
        .top-ad-img {
            max-width: 100%;
            height: auto;
            object-fit: contain;
            display: block;
            margin: 0 auto;
        }

        /* Wrap container supaya rapi */
        .ad-section-1 {
            padding: 10px 0;
            text-align: center;
        }

        /* Batas maksimal agar tetap mirip ukuran desain */
        @media (min-width: 992px) {
            .top-ad-img {
                max-width: 800px;
                max-height: 100px;
            }
        }

        /* ===== LOGO HEADER RESPONSIVE ===== */
        .heading-area {
            background: #ffffff;
            border-bottom: 1px solid #e5e5e5;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .heading-area .container {
            position: relative;
        }

        .logo-wrapper {
            padding: 15px 0;
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }

        .logo-link {
            display: inline-block;
            text-decoration: none;
            transition: transform 0.3s ease;
        }

        .logo-link:hover {
            transform: scale(1.02);
        }

        /* Logo Image */
        .logo-image {
            max-width: 100%;
            height: auto;
            display: block;
        }

        /* Logo Text Fallback (jika belum ada gambar) */
        .logo-text {
            margin: 0;
            padding: 0;
            font-size: 34px;
            font-weight: 900;
            font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.2;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .logo-text .logo-main {
            background: linear-gradient(90deg, #6e80f2, #3f58e6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 2px 2px 7px rgba(108, 133, 240, 0.22);
            letter-spacing: 0.5px;
        }

        .logo-text .logo-accent {
            color: #000000;
            font-weight: 900;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.12);
        }

        /* ===== DESKTOP (> 1200px) ===== */
        @media (min-width: 1200px) {
            .logo-wrapper {
                padding: 20px 0;
            }

            .logo-image {
                max-height: 70px;
                width: auto;
            }

            .logo-text {
                font-size: 38px;
            }
        }

        /* ===== LAPTOP (992px - 1199px) ===== */
        @media (min-width: 992px) and (max-width: 1199px) {
            .logo-wrapper {
                padding: 18px 0;
            }

            .logo-image {
                max-height: 65px;
                width: auto;
            }

            .logo-text {
                font-size: 34px;
            }
        }

        /* ===== TABLET / iPad (768px - 991px) ===== */
        @media (min-width: 768px) and (max-width: 991px) {
            .logo-wrapper {
                padding: 15px 0;
            }

            .logo-image {
                max-height: 55px;
                width: auto;
            }

            .logo-text {
                font-size: 30px;
            }
        }

        /* ===== MOBILE (576px - 767px) ===== */
        @media (min-width: 576px) and (max-width: 767px) {
            .logo-wrapper {
                padding: 12px 0;
                justify-content: center;
            }

            .logo-image {
                max-height: 45px;
                width: auto;
            }

            .logo-text {
                font-size: 24px;
            }

            .logo-text .logo-main,
            .logo-text .logo-accent {
                text-shadow: 1px 1px 3px rgba(108, 133, 240, 0.15);
            }
        }

        /* ===== MOBILE SMALL (< 576px) ===== */
        @media (max-width: 575px) {
            .heading-area {
                border-bottom: 1px solid #e5e5e5;
            }

            .logo-wrapper {
                padding: 10px 0;
                justify-content: center;
            }

            .logo-image {
                max-height: 40px;
                width: auto;
            }

            .logo-text {
                font-size: 22px;
                gap: 3px;
            }

            .logo-text .logo-main {
                letter-spacing: 0.3px;
            }

            .logo-text .logo-main,
            .logo-text .logo-accent {
                text-shadow: 1px 1px 2px rgba(108, 133, 240, 0.12);
            }
        }

        /* ===== MOBILE EXTRA SMALL (< 400px) ===== */
        @media (max-width: 399px) {
            .logo-wrapper {
                padding: 8px 0;
            }

            .logo-image {
                max-height: 35px;
                width: auto;
            }

            .logo-text {
                font-size: 20px;
                gap: 2px;
            }
        }

        /* ===== iPad Specific ===== */
        @media (min-width: 768px) and (max-width: 1024px) {
            .logo-wrapper {
                padding: 16px 0;
            }

            .logo-image {
                max-height: 58px;
                width: auto;
            }

            .logo-text {
                font-size: 32px;
            }
        }

        /* iPad Portrait */
        @media (min-width: 768px) and (max-width: 768px) and (orientation: portrait) {
            .logo-image {
                max-height: 52px;
            }

            .logo-text {
                font-size: 28px;
            }
        }

        /* iPad Landscape */
        @media (min-width: 1024px) and (max-width: 1024px) and (orientation: landscape) {
            .logo-image {
                max-height: 60px;
            }

            .logo-text {
                font-size: 34px;
            }
        }

        /* ===== TOP BAR RESPONSIVE ===== */
        .top {
            background-color: #eff0f2;
            border-bottom: 1px solid #e0e0e0;
            font-size: 14px;
        }

        .top .container {
            padding: 0 15px;
        }

        .top ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            flex-wrap: wrap;
        }

        .top ul li {
            display: inline-flex;
            align-items: center;
            padding: 10px 0;
        }

        .top ul li:not(:last-child) {
            margin-right: 20px;
        }

        /* Today Text */
        .top .today-text {
            color: #555;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .top .today-text::before {
            content: "📅";
            font-size: 14px;
        }

        /* Email Text */
        .top .email-text {
            color: #666;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .top .email-text::before {
            content: "✉";
            font-size: 14px;
        }

        /* Right Menu */
        .top ul.right {
            justify-content: flex-end;
        }

        .top ul.right li.menu a {
            color: #333;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
            padding: 10px 12px;
            display: inline-block;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .top ul.right li.menu a:hover {
            color: #4073da;
            background-color: rgba(64, 115, 218, 0.1);
        }

        /* Language Switch (jika diaktifkan) */
        .language-switch {
            display: inline-block;
        }

        .language-switch select {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px 10px;
            font-size: 13px;
            background-color: white;
            color: #333;
            cursor: pointer;
            transition: border-color 0.3s ease;
        }

        .language-switch select:hover {
            border-color: #4073da;
        }

        .language-switch select:focus {
            outline: none;
            border-color: #4073da;
            box-shadow: 0 0 0 2px rgba(64, 115, 218, 0.1);
        }

        /* ===== DESKTOP (> 1200px) ===== */
        @media (min-width: 1200px) {
            .top {
                padding: 0;
            }

            .top ul li {
                padding: 12px 0;
            }

            .top .today-text {
                font-size: 14px;
            }

            .top ul.right li.menu a {
                font-size: 14px;
                padding: 10px 15px;
            }
        }

        /* ===== LAPTOP (992px - 1199px) ===== */
        @media (min-width: 992px) and (max-width: 1199px) {
            .top ul li:not(:last-child) {
                margin-right: 15px;
            }

            .top ul.right li.menu a {
                padding: 8px 12px;
                font-size: 13px;
            }
        }

        /* ===== TABLET / iPad (768px - 991px) ===== */
        @media (min-width: 768px) and (max-width: 991px) {
            .top {
                font-size: 13px;
            }

            .top .row {
                margin: 0 !important;
            }

            .top .col-md-6 {
                padding: 0 8px !important;
            }

            .top ul li {
                padding: 10px 0;
            }

            .top ul li:not(:last-child) {
                margin-right: 12px;
            }

            .top .today-text {
                font-size: 13px;
            }

            .top .today-text::before {
                font-size: 13px;
            }

            .top ul.right li.menu a {
                padding: 6px 10px;
                font-size: 13px;
            }

            .language-switch select {
                font-size: 12px;
                padding: 4px 8px;
            }
        }

        /* ===== MOBILE (576px - 767px) ===== */
        @media (min-width: 576px) and (max-width: 767px) {
            .top {
                padding: 8px 0;
                font-size: 12px;
            }

            .top .row {
                margin: 0 !important;
            }

            .top .col-md-6 {
                width: 100% !important;
                padding: 0 !important;
                text-align: center;
            }

            .top .col-md-6:first-child {
                margin-bottom: 8px;
            }

            .top ul {
                justify-content: center;
                gap: 8px;
            }

            .top ul li {
                padding: 6px 0;
                margin-right: 0 !important;
            }

            .top .today-text {
                font-size: 12px;
            }

            .top .today-text::before {
                font-size: 12px;
            }

            .top ul.right {
                justify-content: center;
            }

            .top ul.right li.menu {
                margin: 0 4px;
            }

            .top ul.right li.menu a {
                padding: 5px 10px;
                font-size: 12px;
            }

            .language-switch select {
                font-size: 11px;
                padding: 4px 8px;
            }
        }

        /* ===== MOBILE SMALL (< 576px) ===== */
        @media (max-width: 575px) {
            .top {
                padding: 6px 0;
                font-size: 11px;
            }

            .top .container {
                padding: 0 10px;
            }

            .top .row {
                margin: 0 !important;
            }

            .top .col-md-6 {
                width: 100% !important;
                padding: 0 !important;
                text-align: center;
            }

            .top .col-md-6:first-child {
                margin-bottom: 6px;
            }

            .top ul {
                justify-content: center;
                gap: 6px;
                flex-wrap: wrap;
            }

            .top ul li {
                padding: 4px 0;
                margin-right: 0 !important;
            }

            .top .today-text {
                font-size: 11px;
            }

            .top .today-text::before {
                font-size: 11px;
            }

            .top .email-text {
                display: none;
                /* Hide email on very small screens */
            }

            .top ul.right {
                justify-content: center;
            }

            .top ul.right li.menu {
                margin: 0 3px;
            }

            .top ul.right li.menu a {
                padding: 4px 8px;
                font-size: 11px;
            }

            .language-switch select {
                font-size: 10px;
                padding: 3px 6px;
            }
        }

        /* ===== MOBILE EXTRA SMALL (< 400px) ===== */
        @media (max-width: 399px) {
            .top {
                padding: 5px 0;
                font-size: 10px;
            }

            .top .today-text {
                font-size: 10px;
            }

            .top .today-text::before {
                display: none;
                /* Hide icon on very small screens */
            }

            .top ul.right li.menu a {
                padding: 3px 6px;
                font-size: 10px;
                margin: 0 2px;
            }

            /* Compress menu items */
            .top ul.right li.menu a {
                white-space: nowrap;
            }
        }

        /* ===== iPad Specific (768px - 1024px) ===== */
        @media (min-width: 768px) and (max-width: 1024px) {
            .top {
                padding: 0;
            }

            .top ul li {
                padding: 11px 0;
            }

            .top ul li:not(:last-child) {
                margin-right: 14px;
            }

            .top .today-text {
                font-size: 13px;
            }

            .top ul.right li.menu a {
                padding: 7px 11px;
                font-size: 13px;
            }
        }

        /* iPad Portrait */
        @media (min-width: 768px) and (max-width: 768px) and (orientation: portrait) {
            .top ul li:not(:last-child) {
                margin-right: 12px;
            }

            .top ul.right li.menu a {
                padding: 6px 10px;
                font-size: 12px;
            }
        }

        /* iPad Landscape */
        @media (min-width: 1024px) and (max-width: 1024px) and (orientation: landscape) {
            .top ul li:not(:last-child) {
                margin-right: 16px;
            }

            .top ul.right li.menu a {
                padding: 8px 12px;
                font-size: 13px;
            }
        }

        /* ===== Stacked Layout for Very Small Screens ===== */
        @media (max-width: 450px) {

            /* Stack menu items vertically if too crowded */
            .top ul.right {
                gap: 4px;
            }

            .top ul.right li.menu {
                margin: 2px 0;
            }
        }

        /* BREAKING NEWS */
        .top-info-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 18px;
            align-items: center;
            font-weight: 500;
            white-space: nowrap;
            /* Supaya tidak turun */
        }

        .top-info-list li {
            display: flex;
            align-items: center;
            font-size: 14px;
            color: #333;
        }

        .top-info-list li i {
            margin-right: 6px;
            color: #2d6cdf;
        }

        /* Jika layar kecil banget, perkecil font supaya tetap muat */
        @media (max-width: 400px) {
            .top-info-list li {
                font-size: 12px;
            }
        }

        .top-info-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 18px;
            align-items: center;
            font-weight: 500;
            white-space: nowrap;
            flex-wrap: nowrap !important;
            /* cegah turun baris */
        }

        .top-info-list li {
            display: flex;
            align-items: center;
            font-size: 14px;
            color: #333;
        }

        .top-info-list li i {
            margin-right: 6px;
            color: #2d6cdf;
        }

        /* --- KHUSUS IPAD (portrait + landscape) --- */
        @media (min-width: 768px) and (max-width: 1024px) {
            .top-info-list {
                gap: 25px;
                /* beri ruang lebih */
                font-size: 15px;
                /* sedikit lebih besar agar enak dilihat */
            }

            .top-info-list li {
                font-size: 15px;
            }
        }

        /* Untuk hp kecil saja, perkecil text */
        @media (max-width: 450px) {
            .top-info-list li {
                font-size: 12px;
            }
        }

        /* ============================
   iPad PORTRAIT (768px)
   ============================ */
        @media (min-width: 768px) and (max-width: 820px) {
            .heading-area {
                padding-top: 15px;
                padding-bottom: 15px;
            }

            .heading-area img {
                max-height: 55px !important;
            }

            .heading-area .col-md-4 {
                margin-bottom: 10px;
            }

            .heading-area .input-group input {
                height: 42px;
                font-size: 15px;
            }

            .heading-area .btn {
                height: 42px;
                font-size: 15px;
                padding: 0 16px;
            }
        }

        /* ============================
   iPad LANDSCAPE (1024px)
   ============================ */
        @media (min-width: 821px) and (max-width: 1024px) {
            .heading-area img {
                max-height: 60px !important;
            }

            .heading-area .input-group input {
                height: 45px;
                font-size: 15px;
            }

            .heading-area .btn {
                height: 45px;
                padding: 0 20px;
                font-size: 16px;
            }
        }

        /* ============================
   iPad PORTRAIT (768px)
   ============================ */
        @media (min-width: 768px) and (max-width: 820px) {

            .heading-area h1 {
                font-size: 26px !important;
                line-height: 1.2;
            }

            .heading-area h1 span {
                display: inline-block;
            }
        }

        /* ============================
   iPad LANDSCAPE (1024px)
   ============================ */
        @media (min-width: 821px) and (max-width: 1024px) {

            .heading-area h1 {
                font-size: 30px !important;
                line-height: 1.2;
            }

            .heading-area h1 span {
                display: inline-block;
            }
        }
    </style>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<!-- Header -->

<body>
    <!-- TOP BAR SECTION -->
    <div class="top">
        <div class="container">
            <div class="row">
                <!-- Left Side: Date & Email -->
                <div class="col-md-6">
                    <ul class="top-info-list">
                        <li><i class="bi bi-calendar-date"></i>{{ date('F d, Y') }}</li>
                        <li class="breaking-news">
                            <i class="bi bi-broadcast-pin" style="color: red;"></i>
                            BREAKING NEWS
                        </li>

                    </ul>
                </div>

                <!-- Right Side: Menu Links -->
                <!-- <div class="col-md-6">
                    <ul class="right">
                        @if ($global_page_data->faq_status == 'Show')
                        <li class="menu">
                            <a href="{{ route('faq') }}">FAQ</a>
                        </li>
                        @endif

                        @if ($global_page_data->about_status == 'Show')
                        <li class="menu">
                            <a href="{{ route('about') }}">About</a>
                        </li>
                        @endif

                        <li class="menu">
                            <a href="{{ route('contact') }}">Contact</a>
                        </li>

                        @if ($global_page_data->login_status == 'Show')
                        <li class="menu">
                            <a href="{{ route('login') }}">Login</a>
                        </li>
                        @endif -->

                <!-- Language Switcher (Uncomment jika ingin diaktifkan) -->
                <!-- <li>
                        <div class="language-switch">
                            <select id="language_select">
                                <option value="en" {{ session('lang') == 'en' ? 'selected' : '' }}>English</option>
                                <option value="id" {{ session('lang') == 'id' ? 'selected' : '' }}>Indonesia</option>
                            </select>
                        </div>
                    </li> -->
                </ul>
            </div>
        </div>
    </div>
    </div>

    <!-- HEADING AREA -->
    <div class="heading-area py-3 mb-2">
        <div class="container">
            <div class="row align-items-center">

                <!-- LOGO -->
                <div class="col-12 col-md-4 mb-3 mb-md-0">
                    <a href="{{ route('home') }}" class="d-flex align-items-center text-decoration-none">

                        @if(isset($setting_data->logo) && $setting_data->logo)
                        <img src="{{ asset('uploads/kalimantantv_logo.png' . $setting_data->logo) }}"
                            alt="Kalimantan TV Logo"
                            class="img-fluid"
                            style="max-height: 60px;">
                        @else
                        <h1 class="m-0 fw-bold display-6 d-flex align-items-center gap-2">
                            <span class="text-dark" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Kalimantan</span>
                            <span class="badge bg-dark fs-6">TV</span>
                        </h1>
                        @endif
                    </a>
                </div>
                <!-- SEARCH BAR -->
                <div class="col-12 col-md-8">
                    <form action="{{ route('search') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="q"
                                class="form-control"
                                placeholder="Cari judul atau isi berita..."
                                required>
                            <button class="btn" type="submit"
                                style="background-color: #3965bf; color: white;">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <!-- Navigation -->
    @include('front.layout.nav')

    <!-- Main Content -->
    @yield('main_content')

    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="item">
                        <h2 class="heading">Kunjungi YouTube Kami</h2>
                        <p>
                            Dapatkan konten terbaru dari Kalimantan TV melalui kanal YouTube resmi kami.
                            Kami menghadirkan berita lokal, liputan daerah, budaya, dan berbagai program menarik lainnya
                            langsung dari Pangkalan Bun, Kotawaringin Barat.
                            Jangan lupa subscribe agar tidak ketinggalan update terbaru!
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="item">
                        <h2 class="heading">
                            Tautan</h2>
                        <ul class="useful-links">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            @if ($global_page_data->terms_status == 'Show')
                            <li><a href="{{ route('terms') }}">Terms and Conditions</a></li>
                            @endif
                            @if ($global_page_data->privacy_status == 'Show')
                            <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                            @endif
                            @if ($global_page_data->disclaimer_status == 'Show')
                            <li><a href="{{ route('disclaimer') }}">Disclaimer</a></li>
                            @endif
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                            <li><a href="{{ route('faq') }}">FAQ</a></li>
                            <li><a href="{{ route('about') }}">About</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="item">
                        <h2 class="heading">Informasi Lebih Lanjut</h2>
                        <p>
                            Semua informasi terkait alamat, email, dan nomor telepon tersedia lengkap di halaman kontak kami.
                            Silakan kunjungi link di bawah ini.
                        </p>
                        <a href="{{ route('contact') }}" class="btn btn-outline-primary mb-4">Lihat Kontak Lengkap</a>
                        <ul class="social">
                            <li>
                                <a href="">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fab fa-pinterest-p"></i>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="item">
                        <h2 class="heading">Tentang Situs Ini</h2>
                        <p>
                            Kami menyajikan berita terbaru, akurat, dan terpercaya dari berbagai kategori.
                            Hadir untuk memberikan informasi yang cepat, relevan, dan mudah dipahami
                            oleh pembaca di seluruh Indonesia.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright">
        Copyright 2025, KalimantanTV. All Rights Reserved.
    </div>

    <div class="scroll-top">
        <i class="fas fa-angle-up"></i>
    </div>

    @include('front.layout.scripts_footer')

    {{-- Ajax Start --}}
    <script>
        (function($) {
            $(".form_subscribe_ajax").on('submit', function(e) {
                e.preventDefault();
                $('#loader').show();
                var form = this;
                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: new FormData(form),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(form).find('span.error-text').text('');
                    },
                    success: function(data) {
                        $('#loader').hide();
                        if (data.code == 0) {
                            $.each(data.error_message, function(prefix, val) {
                                $(form).find('span.' + prefix + '_error').text(val[0]);
                            });
                        } else if (data.code == 1) {
                            $(form)[0].reset();
                            iziToast.success({
                                title: '',
                                position: 'topRight',
                                message: data.success_message,
                            });
                        }

                    }
                });
            });
        })(jQuery);

        // Change Language (Bahasa)
        document.getElementById('language_select').addEventListener('change', function() {
            window.location.href = "/set-language/" + this.value;
        });
    </script>
    <div id="loader"></div>

    {{-- Ajax End --}}


    {{-- Toast message Setup start --}}
    @if(session()->get('success'))
    <script>
        iziToast.success({
            title: '',
            position: 'topRight',
            message: "{{ session('success') }}",
        });
    </script>
    @endif
    {{-- Toast message Setup end --}}




    @yield('map_scripts')


</body>

</html>