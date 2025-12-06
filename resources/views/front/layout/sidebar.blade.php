<style>
    .search-title-link {
        color: #1a1a1a;
        text-decoration: none;
        transition: 0.2s ease-in-out;
    }

    .search-title-link:hover {
        color: #0d6efd;
        text-decoration: underline;
    }

    .search-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.12);
    }

    .search-thumb {
        height: 200px;
        object-fit: cover;
        border-top-left-radius: .5rem;
        border-top-right-radius: .5rem;
    }

    /* Kalender */
    #calendar {
        width: 100%;
    }

    .calendar-table {
        width: 100%;
        border-collapse: collapse;
        text-align: center;
    }

    .calendar-table th {
        background: #4f74e8;
        color: white;
        padding: 8px;
    }

    .calendar-table td {
        padding: 8px;
        border: 1px solid #e5e7eb;
    }

    .calendar-header {
        text-align: center;
        font-weight: bold;
        margin-bottom: 10px;
        font-size: 18px;
    }

    /* CARD SIDEBAR */
    .sidebar-card {
        background: linear-gradient(145deg, #23314d, #1c2940);
        border-radius: 14px;
        padding: 18px;
        color: #e8ecf7;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
        position: relative;
        overflow: hidden;
    }

    /* BORDER GLOWING */
    .sidebar-card::before {
        content: "";
        position: absolute;
        inset: 0;
        border-radius: 14px;
        padding: 2px;
        /* ketebalan border */
        background: linear-gradient(135deg, #4da3ff, #6c8dff, #4da3ff);
        -webkit-mask:
            linear-gradient(#fff 0 0) content-box,
            linear-gradient(#fff 0 0);
        -webkit-mask-composite: xor;
        mask-composite: exclude;
        pointer-events: none;
    }

    /* Reset default nav-pills */
    .custom-tabs .nav-link {
        border-radius: 5px;
        background: #dededeff;
        color: #4f74e8;
        font-weight: 600;
        position: relative;
        padding: 8px 22px;
        margin-right: 10px;
        transition: .25s;
    }

    Glow Border .glow-tab::before {
        content: "";
        position: absolute;
        inset: 0;
        border-radius: 5px;
        padding: 2px;
        background: linear-gradient(135deg, #4f74e8, #6f87f5, #4f74e8);
        -webkit-mask:
            linear-gradient(#fff 0 0) content-box,
            linear-gradient(#fff 0 0);
        mask:
            linear-gradient(#fff 0 0) content-box,
            linear-gradient(#fff 0 0);
        -webkit-mask-composite: xor;
        mask-composite: exclude;
        pointer-events: none;
        opacity: 0;
        box-shadow: 0 0 18px rgba(79, 116, 232, 0.6);
        transition: .3s;
    }

    /* Active tab — glow aktif */
    .custom-tabs .nav-link.active::before {
        opacity: 1;
    }

    /* Hover memperkuat glow */
    .custom-tabs .nav-link:hover::before {
        opacity: .9;
    }

    /* Warna active */
    .custom-tabs .nav-link.active {
        background: #2d3f57 !important;
        color: #fff;
    }

    /* Hover */
    .custom-tabs .nav-link:hover {
        background: #273356;
    }

    /* ---------------------------------------------------
   CARD STYLE – Kalender Modern
--------------------------------------------------- */
    .card.calendar-card {
        border-radius: 14px;
        border: 1px solid rgba(0, 102, 255, 0.25);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
        overflow: hidden;
    }

    /* Judul */
    .calendar-card h5 {
        font-weight: 800;
        letter-spacing: 0.5px;
    }

    /* ---------------------------------------------------
   TABLE – Calendar Style
--------------------------------------------------- */
    .calendar-table {
        width: 100%;
        border-collapse: collapse;
        text-align: center;
        font-size: 15px;
    }

    /* Header Hari */
    .calendar-table th {
        background: linear-gradient(90deg, #4f74e8, #6a8dff);
        color: white;
        padding: 10px 0;
        font-weight: bold;
        border: none;
        font-size: 14px;
    }

    /* Sel Hari */
    .calendar-table td {
        padding: 10px 0;
        border: 1px solid #e5e7eb;
        font-weight: 600;
        position: relative;
        transition: 0.25s ease;
    }

    /* Hover Glow */
    .calendar-table td:hover {
        background: rgba(0, 106, 255, 0.1);
        border-color: #4f74e8;
        cursor: pointer;
    }

    /* ---------------------------------------------------
   Today Highlight – GARIS MENYALA
--------------------------------------------------- */
    .active-day {
        background: #eaf0ff;
        border: 2px solid #4f74e8 !important;
        font-weight: 900;
        color: #2a48d8;
        border-radius: 8px;

        /* Glow menyala */
        box-shadow:
            0 0 4px rgba(79, 116, 232, 0.6),
            0 0 8px rgba(79, 116, 232, 0.4);
    }

    /* ---------------------------------------------------
   RESPONSIVE – HP, Tablet, Semua Device
--------------------------------------------------- */

    /* Tablet */
    @media (max-width: 768px) {

        .calendar-table th,
        .calendar-table td {
            padding: 8px 0;
            font-size: 13px;
        }
    }

    /* Mobile */
    @media (max-width: 576px) {

        .calendar-table th,
        .calendar-table td {
            padding: 7px 0;
            font-size: 12px;
        }

        .calendar-card h5 {
            font-size: 16px;
        }

        .calendar-card strong {
            font-size: 15px;
        }
    }

    /* Extra Small Mobile */
    @media (max-width: 380px) {

        .calendar-table th,
        .calendar-table td {
            padding: 6px 0;
            font-size: 11px;
        }
    }

    /* WEATHER CARD */
    .weather-card {
        background: linear-gradient(135deg, #4caf50, #2196f3);
        border-radius: 20px;
        padding: 30px;
        color: white;
        box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.2);
    }

    /* FLEX UTAMA */
    .weather-info {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    /* SUHU BESAR */
    .weather-temp {
        font-size: 4rem;
        font-weight: 800;
        line-height: 1;
    }

    /* DESKRIPSI CUACA */
    .weather-desc {
        font-size: 1.1rem;
        margin-top: 5px;
        opacity: 0.85;
    }

    /* LOKASI */
    .weather-location {
        font-size: 0.9rem;
        margin-top: 3px;
        opacity: 0.8;
    }

    /* ICON */
    .weather-icon img {
        width: 90px;
        filter: drop-shadow(0 4px 10px rgba(0, 0, 0, 0.4));
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .weather-icon img.show {
        opacity: 1;
    }

    /* RESPONSIVE */
    @media (max-width: 576px) {
        .weather-info {
            flex-direction: column;
            text-align: center;
            gap: 15px;
        }

        .weather-temp {
            font-size: 3rem;
        }

        .weather-icon img {
            width: 70px;
        }
    }
</style>

<!-- Sidebar -->
<div class="sidebar">
    {{-- TOP SIDEBAR ADS --}}
    <div class="widget">
        @foreach($global_sidebar_top_ad as $row)
        <div class="ad-sidebar">
            @if($row->sidebar_ad_url == '')
            <img src="{{ asset('uploads/'.$row->sidebar_ad) }}" alt="" style="width:100%">
            @else
            <a href="{{ $row->sidebar_ad_url }}">
                <img src="{{ asset('uploads/'.$row->sidebar_ad) }}" alt="" style="width:100%">
            </a>
            @endif
        </div>
        @endforeach
    </div>


    {{-- TAG STATIC --}}
    <div class="widget">
        <div class="tag-heading mb-3">
            <h2 class="ps-3" style="border-left:5px solid #0d6efd; font-weight:800; text-transform:uppercase; letter-spacing:1px; color:#1a1a1a;">Tag berita</h2>
        </div>
        <div class="tag">
            @foreach($tags as $tag)
            <div class="tag-item">
                <a href="#">
                    <span class="badge bg-secondary">{{ $tag->tag_name }}</span>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    {{-- ARCHIVE --}}
    @foreach($tags as $tag)
    <div class="tag-item">
        <a href="#">
            <span class="badge bg-secondary">{{ $tag->arcives }}</span>
        </a>
    </div>
    @endforeach

    {{-- LIVE CHANNEL --}}
    <div class="widget">
        @foreach ($global_live_channel_data as $row)
        <div class="live-channel">
            <div class="live-channel-heading">
                <h2 class="fw-bold mb-3 pb-2 border-bottom border-2 border-black">
                    {{ strtoupper($row->heading) }}
                </h2>
            </div>
            <div class="live-channel-item">
                <iframe width="560" height="315"
                    src="https://www.youtube.com/embed/{{ $row->video_id }}"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        </div>
        @endforeach
    </div>

    {{-- POPULAR & RECENT NEWS --}}
    <div class="widget">
        <div class="news">
            <div class="news-heading d-flex align-items-center" style="gap:10px; margin-bottom:10px;">
                <i class="bi bi-newspaper" style="font-size:28px; color:dark;"></i>
                <h2 class="m-0" style="font-weight:800; letter-spacing:1px;">
                    BERITA POPULER & TERKINI
                </h2>
            </div>
            <ul class="nav nav-pills mb-3 custom-tabs">
                <li class="nav-item">
                    <button class="nav-link active glow-tab" data-bs-toggle="pill" data-bs-target="#recent-news">
                        Berita Terkini
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link glow-tab" data-bs-toggle="pill" data-bs-target="#popular-news">
                        Berita Populer
                    </button>
                </li>
            </ul>

            <div class="tab-content">
                {{-- RECENT --}}
                <div class="tab-pane fade show active" id="recent-news">
                    @foreach ($global_recent_news_data as $row)
                    @if($loop->iteration > 5) @break @endif
                    @php
                    $admin = \App\Models\Admin::find($row->admin_id);
                    @endphp
                    <div class="news-item">
                        <div class="left">
                            <img src="{{ asset('uploads/post/'.$row->post_photo) }}" alt="">
                        </div>
                        <div class="right">

                            {{-- CATEGORY FIX --}}
                            <div class="category">
                                <span class="badge bg-success">
                                    {{ $row->category->category_name }}
                                </span>
                            </div>
                            <h2><a href="{{ route('news_detail', $row->id) }}">{{ $row->post_title }}</a></h2>
                            <div class="date-user">
                                <div class="user">
                                    <a href="javascript:void(0)">
                                        {{ $admin->name ?? 'Admin' }}
                                    </a>
                                </div>
                                <div class="date">
                                    <a href="javascript:void(0)">
                                        {{ date('d F, Y', strtotime($row->created_at)) }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- POPULAR --}}
                <div class="tab-pane fade" id="popular-news">
                    @foreach ($global_popular_news_data as $row)
                    @if($loop->iteration > 5) @break @endif
                    @php
                    $admin = \App\Models\Admin::find($row->admin_id);
                    @endphp
                    <div class="news-item">
                        <div class="left">
                            <img src="{{ asset('uploads/post/'.$row->post_photo) }}" alt="">
                        </div>
                        <div class="right">

                            {{-- CATEGORY FIX --}}
                            <div class="category">
                                <span class="badge bg-success">
                                    {{ $row->category->category_name }}
                                </span>
                            </div>
                            <h2><a href="{{ route('news_detail', $row->id) }}">{{ $row->post_title }}</a></h2>
                            <div class="date-user">
                                <div class="user">
                                    <a href="javascript:void(0)">
                                        {{ $admin->name ?? 'Admin' }}
                                    </a>
                                </div>
                                <div class="date">
                                    <a href="">
                                        {{ date('d F, Y', strtotime($row->created_at)) }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- TENTANG KAMI --}}
                <div class="widget">
                    <div class="sidebar-card mb-4 mt-4">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h5 class="fw-bold mb-0">Tentang Kami</h5>
                            <div class="icon-circle">
                                <i class="bi bi-person-circle text-primary" style="font-size: 20px;"></i>
                            </div>
                        </div>

                        <div class="sidebar-title-line mb-3"></div>

                        <p>
                            Kalimantan TV adalah platform media digital yang menyediakan berita terkini,
                            video, serta informasi terbaru seputar Kalimantan. Menghadirkan konten informatif,
                            faktual, dan terpercaya untuk masyarakat.
                        </p>
                    </div>
                </div>

                {{-- CALENDAR --}}
                @php
                $month = date('n');
                $year = date('Y');
                $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);
                $totalDays = date('t', $firstDayOfMonth);
                $startDay = date('N', $firstDayOfMonth); // 1 (Mon) - 7 (Sun)
                // Urutan hari (Minggu–Sabtu)
                $dayNames = ['M', 'S', 'S', 'R', 'K', 'J', 'S'];
                $currentDay = date('j');
                $day = 1;
                @endphp
                <div class="col-md-12 mt-4">
                    <div class="card shadow-sm mb-4 calendar-card">

                        <div class="card-body">
                            {{-- TITLE --}}
                            <h5 class="fw-bold mb-3">Kalender</h5>
                            {{-- MONTH NAME --}}
                            <div class="text-center mb-2">
                                <strong style="font-size:18px;">
                                    {{ date('F Y') }}
                                </strong>
                            </div>
                            {{-- CALENDAR TABLE --}}
                            <table class="table text-center calendar-table">
                                <thead>
                                    <tr>
                                        @foreach($dayNames as $index => $d)
                                        <th class="fw-bold py-2 {{ $index == 0 ? 'text-danger' : '' }}">
                                            {{ $d }}
                                        </th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- FIRST ROW --}}
                                    <tr>
                                        @for ($i = 1; $i < $startDay; $i++)
                                            <td>
                                            </td>
                                            @endfor
                                            @for ($i = $startDay; $i <= 7; $i++)
                                                <td class="{{ $day == $currentDay ? 'active-day' : '' }}">
                                                {{ $day }}
                                                </td>
                                                @php $day++; @endphp
                                                @endfor
                                    </tr>
                                    {{-- REMAINING ROWS --}}
                                    @while ($day <= $totalDays)
                                        <tr>
                                        @for ($i = 1; $i <= 7 && $day <=$totalDays; $i++)
                                            <td class="{{ $day == $currentDay ? 'active-day' : '' }}">
                                            {{ $day }}
                                            </td>
                                            @php $day++; @endphp
                                            @endfor
                                            </tr>
                                            @endwhile
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- STYLE UNTUK HARI AKTIF --}}
            </div>

            <!-- Weather -->
            <div class="weather-card" id="cuaca">
                <div class="weather-info">
                    <div class="weather-left">
                        <div class="weather-temp" id="weather-temp">
                            <span class="spinner-border spinner-border-sm"></span> Memuat...
                        </div>
                        <div class="weather-desc" id="weather-desc">-</div>
                        <div class="weather-location" id="weather-location">Mendeteksi lokasi...</div>
                    </div>

                    <div class="weather-icon">
                        <img id="weather-icon" src="" alt="Weather Icon">
                    </div>
                </div>
            </div>

            <!-- <div class="weather-card shadow-sm" id="cuaca">
                <div class="weather-info">
                    <div class="weather-left">
                        <div class="weather-temp" id="weather-temp">
                            <span class="spinner-border spinner-border-sm"></span> Memuat...
                        </div>
                        <div class="weather-desc" id="weather-desc"></div>
                        <div class="weather-location text-muted small" id="weather-location">
                            Mendeteksi lokasi...
                        </div>
                    </div>
                    <div class="weather-icon">
                        <img id="weather-icon" src="" alt="Weather Icon" class="fade-icon" style="display:none;">
                    </div>
                </div>
            </div> -->

        </div>
    </div>

    {{-- BOTTOM SIDEBAR ADS --}}
    <div class="widget">
        @foreach($global_sidebar_bottom_ad as $row)
        <div class="ad-sidebar">
            @if($row->sidebar_ad_url == '')
            <img src="{{ asset('uploads/'.$row->sidebar_ad) }}" alt="" style="width:100%">
            @else
            <a href="{{ $row->sidebar_ad_url }}">
                <img src="{{ asset('uploads/'.$row->sidebar_ad) }}" alt="" style="width:100%">
            </a>
            @endif
        </div>
        @endforeach
    </div>
    <style>
        .active-day {
            background: #0d6efd !important;
            color: #fff;
            font-weight: 700;
            border-radius: 6px;
        }
    </style>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('🚀 Starting geolocation...');

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    const lat = position.coords.latitude;
                    const lon = position.coords.longitude;
                    console.log('📍 Location:', lat, lon);

                    fetchWeather(lat, lon);
                },
                function(error) {
                    console.error('❌ Geolocation error:', error);
                    document.getElementById('weather-temp').textContent = 'Lokasi ditolak';
                    document.getElementById('weather-desc').textContent = 'Aktifkan izin lokasi';
                    document.getElementById('weather-location').textContent = 'Izin lokasi diperlukan';
                }
            );
        } else {
            console.error('❌ Geolocation not supported');
            document.getElementById('weather-temp').textContent = 'Tidak didukung';
            document.getElementById('weather-desc').textContent = 'Browser tidak mendukung geolokasi';
        }
    });

    function fetchWeather(lat, lon) {
        const url = `/api/weather?lat=${lat}&lon=${lon}`;
        console.log('🌤️ Fetching weather from:', url);

        fetch(url)
            .then(response => {
                console.log('📥 Response status:', response.status);

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const contentType = response.headers.get('content-type');
                if (!contentType || !contentType.includes('application/json')) {
                    return response.text().then(text => {
                        console.error('❌ Response bukan JSON:', text);
                        throw new Error('Response bukan JSON');
                    });
                }

                return response.json();
            })
            .then(data => {
                console.log('✅ Weather data:', data);

                if (data.error) {
                    throw new Error(data.error);
                }

                // Update UI
                document.getElementById('weather-temp').textContent = Math.round(data.temp) + '°C';
                document.getElementById('weather-desc').textContent = data.description;
                document.getElementById('weather-location').textContent = data.location; // ← Update ini

                const iconImg = document.getElementById('weather-icon');
                iconImg.src = data.icon;
                iconImg.style.display = 'block';
            })
            .catch(error => {
                console.error('❌ Weather fetch error:', error);
                document.getElementById('weather-temp').textContent = 'Error';
                document.getElementById('weather-desc').textContent = error.message;
                document.getElementById('weather-location').textContent = 'Tidak dapat memuat lokasi';
            });
    }
</script>