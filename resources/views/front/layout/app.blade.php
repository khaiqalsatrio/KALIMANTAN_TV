<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>KalimantanTV News</title>
    <link rel="icon" type="image/png" href="{{ asset('uploads/post/kalimantantv2.png') }}">

    @include('front.layout.styles')
    @include('front.layout.scripts')

    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
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
        /* =========================================================
   1. TOP AD BANNER
   ========================================================= */
        .top-ad-img {
            max-width: 100%;
            height: auto;
            object-fit: contain;
            display: block;
            margin: 0 auto;
        }

        .ad-section-1 {
            padding: 10px 0;
            text-align: center;
        }

        @media (min-width: 992px) {
            .top-ad-img {
                max-width: 800px;
                max-height: 100px;
            }
        }

        /* =========================================================
   2. TOP BAR
   ========================================================= */
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

        .top-info-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 18px;
            align-items: center;
            font-weight: 500;
            white-space: nowrap;
        }

        .top-info-list li {
            display: flex;
            align-items: center;
            font-size: 14px;
            color: #333;
        }

        .top-info-list li i {
            margin-right: 6px;
        }

        .top-info-list li.breaking-news i {
            color: red;
        }

        .top ul.right {
            justify-content: flex-end;
        }

        .top ul.right li.menu a {
            color: #333;
            text-decoration: none;
            font-weight: 500;
            padding: 10px 12px;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .top ul.right li.menu a:hover {
            color: #4073da;
            background-color: rgba(64, 115, 218, 0.1);
        }

        /* =========================================================
   3. HEADER / LOGO
   ========================================================= */
        .heading-area {
            background: #ffffff;
            border-bottom: 1px solid #e5e5e5;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
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

        .logo-image {
            max-width: 100%;
            height: auto;
            display: block;
        }

        .logo-text {
            margin: 0;
            padding: 0;
            font-size: 34px;
            font-weight: 900;
            font-family: 'Poppins', 'Segoe UI', sans-serif;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .logo-text .logo-main {
            background: linear-gradient(90deg, #6e80f2, #3f58e6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 900;
        }

        .logo-text .logo-accent {
            color: #000;
            font-weight: 900;
        }

        /* =========================================================
   4. FOOTER (NEWS PORTAL ELEGANT)
   ========================================================= */
        .footer {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            /* background: #2d3f57 !important; */
            color: #e2e8f0;
            padding: 2.5rem 0 0;
            position: relative;
            overflow: hidden;
        }

        /* Animated top border */
        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #3b82f6, #8b5cf6, #ec4899, #3b82f6);
            background-size: 200% 100%;
            animation: gradientMove 3s linear infinite;
        }

        @keyframes gradientMove {
            0% {
                background-position: 0% 0%;
            }

            100% {
                background-position: 200% 0%;
            }
        }

        .footer .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        /* Fade animation */
        .footer-item {
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .footer .heading {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #fff;
            padding-bottom: 0.5rem;
            position: relative;
        }

        .footer .heading::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(90deg, #3b82f6, #8b5cf6);
            border-radius: 2px;
        }

        .footer-item p {
            color: #cbd5e1;
            line-height: 1.6;
            font-size: 0.875rem;
        }

        /* Links */
        .footer .useful-links {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .footer .useful-links li {
            margin-bottom: 0.75rem;
        }

        .footer .useful-links a {
            color: #cbd5e1;
            text-decoration: none;
            padding-left: 1.5rem;
            display: inline-flex;
            align-items: center;
            position: relative;
            transition: all 0.3s ease;
        }

        .footer .useful-links a::before {
            content: '→';
            position: absolute;
            left: 0;
            opacity: 0;
            color: #3b82f6;
            transition: all 0.25s ease;
        }

        .footer .useful-links a:hover {
            color: #fff;
            padding-left: 2rem;
        }

        .footer .useful-links a:hover::before {
            opacity: 1;
            left: 0.5rem;
        }

        /* Footer button */
        .footer .btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background: transparent;
            border: 2px solid #3b82f6;
            color: #3b82f6;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            overflow: hidden;
            position: relative;
            z-index: 1;
        }

        .footer .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, #3b82f6, #8b5cf6);
            transition: left 0.3s ease;
            z-index: -1;
        }

        .footer .btn:hover {
            color: #fff;
            border-color: #8b5cf6;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3);
        }

        .footer .btn:hover::before {
            left: 0;
        }

        /* Social icons */
        .footer .social {
            display: flex;
            gap: 0.75rem;
            list-style: none;
            flex-wrap: wrap;
            margin-top: 1.5rem;
            padding: 0;
        }

        .footer .social li a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: #cbd5e1;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .footer .social li a:hover {
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            color: #fff;
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.4);
            border-color: transparent;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding: 2rem 0;
            background: rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .footer-bottom p {
            color: #94a3b8;
            margin: 0;
            font-size: 0.9rem;
        }

        /* =========================================================
   5. RESPONSIVE
   ========================================================= */

        /* Desktop >1200 */
        @media (min-width: 1200px) {
            .logo-wrapper {
                padding: 20px 0;
            }

            .logo-image {
                max-height: 70px;
            }

            .logo-text {
                font-size: 38px;
            }

            .top ul li {
                padding: 12px 0;
            }
        }

        /* Laptop 992–1199 */
        @media (min-width: 992px) and (max-width: 1199px) {
            .logo-wrapper {
                padding: 18px 0;
            }

            .logo-image {
                max-height: 65px;
            }

            .logo-text {
                font-size: 34px;
            }
        }

        /* Tablet 768–991 */
        @media (min-width: 768px) and (max-width: 991px) {
            .logo-wrapper {
                padding: 15px 0;
            }

            .logo-image {
                max-height: 55px;
            }

            .logo-text {
                font-size: 30px;
            }

            .footer-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        /* Mobile 576–767 */
        @media (min-width: 576px) and (max-width: 767px) {
            .logo-wrapper {
                justify-content: center;
            }

            .logo-image {
                max-height: 45px;
            }

            .logo-text {
                font-size: 24px;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 2.5rem;
            }
        }

        /* Mobile <575 */
        @media (max-width: 575px) {
            .logo-wrapper {
                justify-content: center;
            }

            .logo-image {
                max-height: 40px;
            }

            .logo-text {
                font-size: 22px;
            }

            .footer .btn {
                width: 100%;
            }

            .footer-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Extra small <400 */
        @media (max-width: 399px) {
            .logo-image {
                max-height: 35px;
            }

            .logo-text {
                font-size: 20px;
            }
        }
    </style>
</head>

<body>
    <!-- TOP BAR SECTION -->
    <div class="top">
        <div class="container">
            <div class="row">
                <!-- Left Side: Date & Breaking News -->
                <div class="col-md-6">
                    <ul class="top-info-list">
                        <li><i class="bi bi-calendar-date"></i>{{ date('F d, Y') }}</li>
                        <li class="breaking-news">
                            <i class="bi bi-broadcast-pin"></i>
                            BREAKING NEWS
                        </li>
                    </ul>
                </div>

                <!-- Right Side: Menu Links (Uncomment if needed) -->
                <!-- <div class="col-md-6">
                    <ul class="right">
                        @if ($global_page_data->faq_status == 'Show')
                        <li class="menu"><a href="{{ route('faq') }}">FAQ</a></li>
                        @endif
                        @if ($global_page_data->about_status == 'Show')
                        <li class="menu"><a href="{{ route('about') }}">About</a></li>
                        @endif
                        <li class="menu"><a href="{{ route('contact') }}">Contact</a></li>
                        @if ($global_page_data->login_status == 'Show')
                        <li class="menu"><a href="{{ route('login') }}">Login</a></li>
                        @endif
                    </ul>
                </div> -->
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
                        <img src="{{ asset('uploads/kalimantantv_logo.png') }}"
                            alt="Kalimantan TV Logo"
                            class="img-fluid logo-image">
                        @else
                        <h1 class="m-0 fw-bold display-6 d-flex align-items-center gap-2">
                            <span class="text-dark">Kalimantan</span>
                            <span class="badge bg-dark fs-6">TV</span>
                        </h1>
                        @endif
                    </a>
                </div>

                <!-- SEARCH BAR -->
                <div class="col-12 col-md-8">
                    <form action="{{ route('search') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control"
                                placeholder="Cari judul atau isi berita..." required>
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

    <!-- FOOTER -->
    <div class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-item">
                    <h2 class="heading">Kunjungi YouTube Kami</h2>
                    <p>
                        Dapatkan konten terbaru dari Kalimantan TV melalui kanal YouTube resmi kami.
                        Kami menghadirkan berita lokal, liputan daerah, budaya, dan berbagai program menarik lainnya
                        langsung dari Pangkalan Bun, Kotawaringin Barat.
                        Jangan lupa subscribe agar tidak ketinggalan update terbaru!
                    </p>
                </div>
                <div class="footer-item">
                    <h2 class="heading">Tautan</h2>
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
                <div class="footer-item">
                    <h2 class="heading">Informasi Lebih Lanjut</h2>
                    <p>
                        Semua informasi terkait alamat, email, dan nomor telepon tersedia lengkap di halaman kontak kami.
                        Silakan kunjungi link di bawah ini.
                    </p>
                    <a href="{{ route('contact') }}" class="btn">Lihat Kontak Lengkap</a>
                    <ul class="social">
                        <li><a href="" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="" aria-label="Twitter"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="" aria-label="Pinterest"><i class="fab fa-pinterest-p"></i></a></li>
                        <li><a href="" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="" aria-label="Instagram"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
                <div class="footer-item">
                    <h2 class="heading">Tentang Situs Ini</h2>
                    <p>
                        Kami menyajikan berita terbaru, akurat, dan terpercaya dari berbagai kategori.
                        Hadir untuk memberikan informasi yang cepat, relevan, dan mudah dipahami
                        oleh pembaca di seluruh Indonesia.
                    </p>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <p>&copy; 2024 Kalimantan TV. All rights reserved.</p>
            </div>
        </div>
    </div>

    <!-- <div class="copyright">
        Copyright 2025, KalimantanTV. All Rights Reserved.
    </div> -->

    <div class="scroll-top">
        <i class="fas fa-angle-up"></i>
    </div>

    @include('front.layout.scripts_footer')

    <!-- Ajax Scripts -->
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

        // Change Language
        document.getElementById('language_select')?.addEventListener('change', function() {
            window.location.href = "/set-language/" + this.value;
        });
    </script>
    <div id="loader"></div>

    <!-- Toast Messages -->
    @if(session()->get('success'))
    <script>
        iziToast.success({
            title: '',
            position: 'topRight',
            message: "{{ session('success') }}",
        });
    </script>
    @endif

    @yield('map_scripts')

</body>

</html>