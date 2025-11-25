@extends('front.layout.app')

@section('main_content')

<div class="page-top">
    <div class="container">
        <h2>{{ $live->heading }}</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('live.index') }}">Live Stream</a></li>
            <li class="breadcrumb-item active">{{ $live->heading }}</li>
        </ol>
    </div>
</div>

<div class="container py-4">

    <div class="ratio ratio-16x9 mb-3">
        <iframe
            src="https://www.youtube.com/embed/{{ $live->video_id }}?autoplay=1"
            frameborder="0"
            allowfullscreen>
        </iframe>
    </div>

    <h3 class="fw-bold mb-3">{{ $live->heading }}</h3>

    <p class="text-muted">
        Tanggal: {{ date('d F Y', strtotime($live->created_at)) }}
    </p>

</div>

@endsection