@extends('front.layout.app')

@section('main_content')

<style>
    .live-card {
        position: relative;
        border-radius: 10px;
        overflow: hidden;
        cursor: pointer;
        transition: 0.3s;
        height: 230px;
        display: block;
        text-decoration: none !important;
    }

    .live-card:hover {
        transform: scale(1.02);
    }

    .live-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .gradient-bottom {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 45%;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.85), rgba(0, 0, 0, 0));
        padding: 15px;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        color: white;
    }

    .play-circle {
        position: absolute;
        top: 12px;
        right: 12px;
        width: 42px;
        height: 42px;
        border: 2px solid white;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        font-size: 20px;
        opacity: 0.9;
        backdrop-filter: blur(3px);
    }

    .live-date {
        font-size: 13px;
        opacity: 0.9;
        margin-bottom: 4px;
    }

    .live-title {
        font-size: 17px;
        font-weight: 700;
        line-height: 1.2;
        color: white;
        text-decoration: none !important;
        display: block;
    }
</style>

<div class="page-top mb-5">
    <div class="container">
        <h2 class="fw-bold">Live Stream</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Live Stream</li>
        </ol>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            @foreach ($live_channels as $row)
            <div class="col-lg-3 col-md-4 mb-4">
                <a href="{{ route('live.detail', $row->id) }}" class="live-card">
                    <img src="http://img.youtube.com/vi/{{ $row->video_id }}/hqdefault.jpg">
                    <div class="play-circle"><i class="fas fa-play"></i></div>
                    <div class="gradient-bottom">
                        <div class="live-date">{{ date('d F Y', strtotime($row->created_at)) }}</div>
                        <span class="live-title">🔴 {{ $row->heading }}</span>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-3">
            {{ $live_channels->links() }}
        </div>
    </div>
</div>
@endsection