@extends('front.layout.app')

@section('main_content')

<style>
    .news-ticker-box {
        background: whitesmoke;
        border: 1px solid #b2acacff;
        border-radius: 6px;
        overflow: hidden;
        width: 100%;
    }

    .ticker-label {
        background: #4073daff;
        min-width: 140px;
        text-align: center;
    }

    .ticker-content {
        white-space: nowrap;
        overflow: hidden;
    }

    .ticker-move {
        display: inline-block;
        padding-left: 20px;
        animation: tickerMove 110s linear infinite;
    }

    /* ANIMASI KIRI -> KANAN */
    @keyframes tickerMove {
        0% {
            transform: translateX(-100%);
        }

        100% {
            transform: translateX(100%);
        }
    }

    .ticker-move:hover {
        animation-play-state: paused;
    }

    .ticker-move a {
        text-decoration: none;
        color: #000;
    }

    .ticker-move a:hover {
        text-decoration: underline;
    }

    /* news ticker mobile */
    /* News Ticker - Mobile Responsive (Simple & Clean) */

    /* Mobile */
    @media (max-width: 767px) {
        .news-ticker-wrapper {
            padding: 0.5rem 0 !important;
        }

        .news-ticker-box {
            display: flex !important;
            align-items: center !important;
        }

        /* Label Latest News */
        .ticker-label {
            font-size: 10px !important;
            padding: 0.3rem 0.4rem !important;
            white-space: nowrap;
            flex-shrink: 0;
            min-width: auto !important;
            max-width: 65px !important;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Ticker Content */
        .ticker-content {
            flex-grow: 1 !important;
            overflow: hidden !important;
        }

        .ticker-move {
            margin-bottom: 0 !important;
        }

        .ticker-move li {
            display: inline-block !important;
            margin-right: 1.5rem !important;
        }

        .ticker-move li a {
            font-size: 12px !important;
            word-break: break-word;
            display: inline;
            line-height: 1.4;
        }
    }

    /* Mobile Small (< 576px) */
    @media (max-width: 576px) {
        .news-ticker-wrapper {
            padding: 0.4rem 0 !important;
        }

        .ticker-label {
            font-size: 10px !important;
            padding: 0.25rem 0.35rem !important;
            max-width: 70px !important;
        }

        .ticker-move li {
            margin-right: 1rem !important;
        }

        .ticker-move li a {
            font-size: 11px !important;
        }
    }

    /* data post */

    /* Tambahkan CSS ini ke file stylesheet Anda */

    /* Perbaikan Text untuk Mobile - Layout Tetap 2 Kolom */
    @media (max-width: 767px) {

        /* Pertahankan Layout: Kiri 8 kolom, Kanan 4 kolom */
        .home-main .col-8.left {
            flex: 0 0 auto;
            width: 66.66666667% !important;
            padding-right: 4px !important;
            display: flex;
            flex-direction: column;
        }

        .home-main .col-8.left .inner {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .home-main .col-8.left .inner .photo {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .home-main .col-8.left .inner .photo img {
            flex: 1;
            object-fit: cover;
            min-height: 100%;
        }

        .home-main .col-4 {
            flex: 0 0 auto;
            width: 33.33333333% !important;
            padding-left: 4px !important;
        }

        .home-main .row.g-2 {
            margin-right: -4px !important;
            margin-left: -4px !important;
        }

        /* Perbaikan Text - Post Besar (Kiri) */
        .home-main .left .inner .text-inner h2 {
            font-size: 13px !important;
            line-height: 1.2 !important;
            margin-bottom: 5px !important;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            text-overflow: ellipsis;
            word-wrap: break-word;
            word-break: break-word;
            max-height: 31px;
            /* 13px * 1.2 * 2 */
        }

        .home-main .left .inner .text-inner h2 a {
            font-size: 13px !important;
            line-height: 1.2 !important;
            display: block;
        }

        /* Perbaikan Text - Post Kecil (Kanan) */
        .home-main .col-4 .inner-right .text-inner h2 {
            font-size: 10px !important;
            line-height: 1.2 !important;
            margin-bottom: 3px !important;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            text-overflow: ellipsis;
            word-wrap: break-word;
            word-break: break-word;
            max-height: 24px;
            /* 10px * 1.2 * 2 */
        }

        .home-main .col-4 .inner-right .text-inner h2 a {
            font-size: 10px !important;
            line-height: 1.2 !important;
            display: block;
        }

        /* Badge Kategori - Lebih Kecil */
        .home-main .left .category .badge {
            font-size: 8px !important;
            padding: 2px 4px !important;
            margin-bottom: 3px !important;
            display: inline-block;
        }

        .home-main .col-4 .category .badge {
            font-size: 7px !important;
            padding: 1px 3px !important;
            margin-bottom: 2px !important;
            display: inline-block;
        }

        /* Date & User Info - Lebih Compact */
        .home-main .left .date-user {
            font-size: 8px !important;
            display: flex;
            gap: 4px;
            margin-top: 3px;
        }

        .home-main .col-4 .date-user {
            font-size: 7px !important;
            display: flex;
            gap: 3px;
            margin-top: 2px;
        }

        .home-main .date-user .user,
        .home-main .date-user .date {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 100px;
        }

        .home-main .date-user .user a,
        .home-main .date-user .date a {
            font-size: inherit !important;
        }

        /* Padding Text Container - Lebih Kecil */
        .home-main .left .text {
            padding: 6px !important;
        }

        .home-main .col-4 .text {
            padding: 4px !important;
        }

        .home-main .left .text-inner {
            padding: 4px !important;
        }

        .home-main .col-4 .text-inner {
            padding: 3px !important;
        }

        /* Gambar Responsive - Sesuaikan Tinggi */
        .home-main .photo {
            position: relative;
            overflow: hidden;
        }

        .home-main .photo img {
            width: 100%;
            height: auto;
            object-fit: cover;
            display: block;
        }

        .home-main .left .photo img {
            max-height: 180px;
            min-height: 180px;
        }

        .home-main .col-4 .inner-right .photo img {
            max-height: 100px;
            min-height: 100px;
        }

        /* Background overlay - Lebih gelap untuk readability */
        .home-main .photo .bg {
            background: linear-gradient(to bottom, transparent 0%, rgba(0, 0, 0, 0.8) 100%);
        }

        /* Gap antara post kanan & Rata tinggi */
        .home-main .col-4 {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .home-main .col-4 .inner-right {
            margin-bottom: 0;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .home-main .col-4 .inner-right .photo {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .home-main .col-4 .inner-right .photo img {
            flex: 1;
            object-fit: cover;
        }
    }

    /* Untuk layar sangat kecil (< 576px) */
    @media (max-width: 576px) {
        .home-main .left .inner .text-inner h2 {
            font-size: 11px !important;
            max-height: 26px !important;
        }

        .home-main .left .inner .text-inner h2 a {
            font-size: 11px !important;
        }

        .home-main .col-4 .inner-right .text-inner h2 {
            font-size: 9px !important;
            max-height: 22px !important;
        }

        .home-main .col-4 .inner-right .text-inner h2 a {
            font-size: 9px !important;
        }

        .home-main .left .category .badge {
            font-size: 7px !important;
        }

        .home-main .col-4 .category .badge {
            font-size: 6px !important;
        }

        .home-main .left .date-user {
            font-size: 7px !important;
        }

        .home-main .col-4 .date-user {
            font-size: 6px !important;
        }
    }
</style>

@if ($setting_data->news_ticker_status == 'Show')
<div class="news-ticker-wrapper py-2">
    <div class="container">
        <div class="news-ticker-box d-flex align-items-center">

            <!-- LABEL -->
            <div class="ticker-label text-white fw-bold px-3 py-2">
                Latest News
            </div>

            <!-- TICKER -->
            <div class="ticker-content flex-grow-1 overflow-hidden">
                <ul class="ticker-move mb-0">
                    @php $i = 0; @endphp
                    @foreach ($post_data as $row)
                    @php $i++; @endphp
                    @if ($i > $setting_data->news_ticker_total)
                    @break
                    @endif
                    <li class="d-inline-block me-4">
                        <a href="{{ route('news_detail', $row->id) }}">
                            {{ $row->post_title }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
</div>
@endif

<!-- Home Main -->
<div class="home-main">
    <div class="container">
        <div class="row g-2">
            <!-- Kolom kiri: Post pertama (selalu 8 kolom) -->
            <div class="col-8 left">
                @php
                $i = 0;
                @endphp
                @foreach($post_data as $row)
                @php
                $i++;
                @endphp
                @if ($i > 1)
                @break
                @endif
                <div class="inner">
                    <div class="photo">
                        <div class="bg"></div>
                        <img src="{{ asset('uploads/post/'.$row->post_photo) }}" alt="">
                        <div class="text">
                            <div class="text-inner">
                                <div class="category">
                                    <span class="badge bg-success badge-sm">{{ $row->category->category_name ?? 'No Category' }}</span>
                                </div>
                                <h2><a href="{{ route('news_detail', $row->id) }}">{{$row->post_title}}</a></h2>
                                <div class="date-user">
                                    <div class="user">
                                        <a href="">
                                            @if($row->author_id == 0)
                                            @php
                                            $user_data = \App\Models\Admin::where('id', $row->admin_id)->first();
                                            @endphp
                                            @else
                                            {{--Implement this later--}}
                                            @endif
                                            {{ $user_data->name ?? 'Unknown' }}
                                        </a>
                                    </div>
                                    <div class="date">
                                        <a href="">
                                            @php
                                            $time = $row->updated_at;
                                            $updated_date = date('d F, Y', strtotime($time));
                                            @endphp
                                            {{ $updated_date }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Kolom kanan: Post ke-2 dan ke-3 (selalu 4 kolom) -->
            <div class="col-4">
                @php
                $i = 0;
                @endphp
                @foreach ($post_data as $row)
                @php
                $i++;
                @endphp
                @if ($i == 1)
                @continue
                @endif
                @if ($i > 3)
                @break
                @endif
                <div class="inner inner-right">
                    <div class="photo">
                        <div class="bg"></div>
                        <img src="{{ asset('uploads/post/'.$row->post_photo) }}" alt="">
                        <div class="text">
                            <div class="text-inner">
                                <div class="category">
                                    <span class="badge bg-success badge-sm">{{ $row->category->category_name ?? 'No Category' }}</span>
                                </div>
                                <h2><a href="{{ route('news_detail', $row->id) }}">{{$row->post_title}}</a></h2>
                                <div class="date-user">
                                    <div class="user">
                                        <a href="">
                                            @if($row->author_id == 0)
                                            @php
                                            $user_data = \App\Models\Admin::where('id', $row->admin_id)->first();
                                            @endphp
                                            @else
                                            {{--Implement this later--}}
                                            @endif
                                            {{ $user_data->name ?? 'Unknown' }}
                                        </a>
                                    </div>
                                    <div class="date">
                                        <a href="">
                                            @php
                                            $time = $row->updated_at;
                                            $updated_date = date('d F, Y', strtotime($time));
                                            @endphp
                                            {{ $updated_date }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="search-section">
    <div class="container">
        <form action="{{ route('search') }}" method="GET">
            <div class="inner">
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <input type="text" name="q" class="form-control" placeholder="Cari judul atau isi berita...">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="home-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6 left-col">
                <div class="left">
                    @foreach($categories as $item)
                    @if($item->posts->count() == 0)
                    @continue
                    @endif
                    <!-- News Of Category -->
                    <div class="news-total-item">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <h2 class="ps-3" style="border-left:5px solid #0d6efd; font-weight:800; font-size:25px; text-transform:uppercase; letter-spacing:1px; color:#1a1a1a;">{{ $item->category_name }}</h2>
                            </div>
                            <div class="col-lg-6 col-md-12 see-all">
                                <a href="{{ route('category', $item->id) }}" class="btn btn-primary btn-sm">
                                    SEE ALL NEWS
                                </a>
                            </div>
                            <div class="col-md-12">
                                <div class="bar"></div>
                            </div>
                        </div>
                        <div class="row">
                            {{-- POST BESAR (1 POST) --}}
                            @foreach($item->posts as $single)
                            @if($loop->iteration == 2) @break @endif
                            <div class="col-lg-6 col-md-12">
                                <div class="left-side">
                                    <div class="photo">
                                        <img src="{{ asset('uploads/post/'.$single->post_photo) }}" alt="">
                                    </div>
                                    <div class="category">
                                        <span class="badge bg-success">{{ $item->category_name }}</span>
                                    </div>
                                    <h3>
                                        <a href="{{ route('news_detail',$single->id) }}">
                                            {{ $single->post_title }}
                                        </a>
                                    </h3>
                                    <div class="date-user">
                                        <div class="user">
                                            @php
                                            $user_data = \App\Models\Admin::find($single->admin_id);
                                            @endphp
                                            <a href="javascript:void;">{{ $user_data->name ?? 'Unknown' }}</a>
                                        </div>
                                        <div class="date">
                                            <a href="javascript:void;">
                                                {{ date('d F, Y', strtotime($single->updated_at)) }}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-short-text">
                                        {!! $single->post_detail !!}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            {{-- LIST KANAN (5 POST) --}}
                            <div class="col-lg-6 col-md-12">
                                <div class="right-side">
                                    @foreach($item->posts as $single)
                                    @if($loop->iteration == 1) @continue @endif
                                    @if($loop->iteration == 6) @break @endif
                                    <div class="right-side-item">
                                        <div class="left">
                                            <img src="{{ asset('uploads/post/'.$single->post_photo) }}" alt="">
                                        </div>
                                        <div class="right">
                                            <div class="category">
                                                <span class="badge bg-success">{{ $item->category_name }}</span>
                                            </div>
                                            <h2>
                                                <a href="{{ route('news_detail',$single->id) }}">
                                                    {{ $single->post_title }}
                                                </a>
                                            </h2>
                                            <div class="date-user">
                                                <div class="user">
                                                    @php
                                                    $user_data = \App\Models\Admin::find($single->admin_id);
                                                    @endphp
                                                    <a href="javascript:void;">{{ $user_data->name ?? 'Unknown' }}</a>
                                                </div>
                                                <div class="date">
                                                    <a href="javascript:void;">
                                                        {{ date('d F, Y', strtotime($single->updated_at)) }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- // News Of Category -->
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 col-md-6 sidebar-col">
                @include('front.layout.sidebar')
            </div>
        </div>
    </div>
</div>

@if ($setting_data->video_status == 'Show')
<div class="video-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="video-heading">
                    <h2>Videos</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="video-carousel owl-carousel">
                    @foreach ($video_data as $row)
                    @if($loop->iteration > $setting_data->video_total)
                    @break
                    @endif
                    <div class="item">
                        <div class="video-thumb">
                            <img src="https://img.youtube.com/vi/{{ $row->video_id }}/0.jpg" alt="">
                            <div class="bg"></div>
                            <div class="icon">
                                <a href="https://www.youtube.com/watch?v={{ $row->video_id }}" class="video-button">
                                    <i class="fas fa-play"></i>
                                </a>
                            </div>
                        </div>
                        <div class="video-caption">
                            <a href="javascript:void">{{ $row->caption }}</a>
                        </div>
                        <div class="video-date">
                            <i class="fas fa-calendar-alt"></i>
                            {{ date('d F, Y', strtotime($row->created_at)) }}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection