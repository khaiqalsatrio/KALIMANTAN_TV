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

        /* Responsive top untuk mobile */
    </style>
</head>

<!-- Header -->

<body>
    <div class="top" style="background-color: #eff0f2ff;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ul>
                        <li class="today-text">Today: {{ date('F d, Y') }}</li>
                        <!-- <li class="email-text">kalimantanTV@gmail.com</li> -->
                    </ul>
                </div>
                <div class="col-md-6">
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
                        <li>
                            <!-- <div class="language-switch">
                                <select id="language_select">
                                    <option value="en" {{ session('lang') == 'en' ? 'selected' : '' }}>English</option>
                                    <option value="id" {{ session('lang') == 'id' ? 'selected' : '' }}>Indonesia</option>
                                </select>
                            </div> -->
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Header -->
    <div class="heading-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4 d-flex align-items-center">
                    <div class="logo" style="padding: 20px 0; text-align:center;">
                        <a href="{{ route('home') }}" style="text-decoration: none;">
                            <h1 style="
        margin: 0; padding: 0;
        font-size: 34px;
        font-weight: 900;
        font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(90deg, #6e80f2, #3f58e6);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-shadow: 2px 2px 7px rgba(108,133,240,0.22);
        letter-spacing: 0.5px;
        display: inline-block;
        cursor: pointer;
    ">
                                Kalimantan
                                <span style="
            color: #000000;
            font-weight: 900;
            margin-left: 3px; /* jarak diperkecil */
            text-shadow: 1px 1px 3px rgba(0,0,0,0.12);
        ">
                                    TV
                                </span>
                            </h1>
                        </a>

                    </div>
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
                            <!-- <li><a href="{{ route('contact') }}">Contact</a></li> -->
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