@extends('front.layout.app')

@section('main_content')

<div class="page-top">
    <div class="container">
        <h2>{{ $video->heading }}</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('video.index') }}">Video</a></li>
            <li class="breadcrumb-item active">{{ $video->heading }}</li>
        </ol>
    </div>
</div>

<div class="container py-4">
    <div class="row">
        <div class="col-lg-8 col-md-12">
            <div class="ratio ratio-16x9 mb-3">
                <iframe
                    src="https://www.youtube.com/embed/{{ $video->video_id }}?autoplay=1&mute=1&playsinline=1"
                    frameborder="0"
                    allow="autoplay; encrypted-media"
                    allowfullscreen>
                </iframe>
            </div>
            <h3 class="fw-bold mb-3">{{ $video->heading }}</h3>
            <div class="video-caption mt-2">
                <a href="javascript:void(0)" class="fs-5 fw-semibold">{{ $video->caption }}</a>
            </div>
            <p class="text-muted">
                Tanggal: {{ date('d F Y', strtotime($video->created_at)) }}
            </p>
        </div>
        <div class="col-lg-4 col-md-12">
            @include('front.layout.sidebar')
        </div>
    </div>
</div>
@endsection