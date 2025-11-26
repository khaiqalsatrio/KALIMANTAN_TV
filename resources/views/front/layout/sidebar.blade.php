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
        <div class="tag-heading">
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
            <div class="news-heading">
                <h2>
                    BERITA POPLER & TERKINI</h2>
            </div>
            <ul class="nav nav-pills mb-3">
                <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#recent-news">
                        Berita Terkini
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#popular-news">
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
                    <div class="card shadow-sm mb-4 mt-4" style="border-radius: 12px;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <h5 class="fw-bold mb-0">Tentang Kami</h5>
                                <div class="d-flex justify-content-center align-items-center"
                                    style="width:34px; height:34px; background:#eef2ff; border-radius:50%;">
                                    <i class="bi bi-person-circle text-primary" style="font-size: 20px;"></i>
                                </div>
                            </div>
                            <div style="width: 70px; height: 3px; background-color: #4f74e8; border-radius: 3px;" class="mb-3"></div>
                            <p class="text-muted" style="font-size: 14.2px; line-height: 1.55;">
                                Kalimantan TV adalah platform media digital yang menyediakan berita terkini,
                                video, serta informasi terbaru seputar Kalimantan. Menghadirkan konten informatif,
                                faktual, dan terpercaya untuk masyarakat.
                            </p>
                        </div>
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
                    <div class="card shadow-sm mb-4" style="border-radius: 12px;">
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