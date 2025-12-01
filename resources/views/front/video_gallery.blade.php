@extends('front.layout.app')

@section('main_content')

<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="fw-bold">Video</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Video</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="video-gallery">
                    <div class="row g-4">
                        @foreach ($video_data as $row)
                        <div class="col-lg-6 col-md-6">
                            <div class="card border-0 shadow-sm video-card h-100">
                                <a href="{{ route('video.detail', $row->id) }}" class="video-thumb">
                                    <img src="https://img.youtube.com/vi/{{ $row->getYoutubeId() }}/hqdefault.jpg"
                                        class="card-img-top rounded-top"
                                        alt="{{ $row->caption }}">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title mb-2">
                                        <a href="{{ route('video.detail', $row->id) }}" class="text-dark fw-semibold text-decoration-none">
                                            {{ $row->caption }}
                                        </a>
                                    </h5>
                                    <p class="text-muted small mb-0">
                                        <i class="fas fa-calendar-alt"></i>
                                        @php
                                        $time = $row->created_at;
                                        $create_date = date('d F, Y', strtotime($time));
                                        @endphp
                                        {{ $create_date }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        {{ $video_data->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
            {{-- SIDEBAR --}}
            <div class="col-lg-4 col-md-12">
                @include('front.layout.sidebar')
            </div>
        </div>
    </div>
</div>
@endsection