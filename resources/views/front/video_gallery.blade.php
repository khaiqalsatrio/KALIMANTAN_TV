@extends('front.layout.app')

@section('main_content')

<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>News Video</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">News Video</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">

            {{-- KONTEN VIDEO --}}
            <div class="col-lg-8 col-md-12">

                <div class="video-gallery">
                    <div class="row">
                        @foreach ($video_data as $row)
                        <div class="col-lg-6 col-md-6 mb-4">
                            <div class="video-thumb">
                                <img src="http://img.youtube.com/vi/{{ $row->video_id }}/0.jpg" alt="">
                                <div class="bg"></div>
                                <div class="icon">
                                    <a href="https://www.youtube.com/watch?v={{ $row->video_id }}" class="video-button">
                                        <i class="fas fa-play"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="video-caption mt-2">
                                <a href="javascript:void(0)">{{ $row->caption }}</a>
                            </div>

                            <div class="video-date">
                                <i class="fas fa-calendar-alt"></i>
                                @php
                                $time = $row->created_at;
                                $create_date = date('d F, Y', strtotime($time));
                                @endphp
                                {{ $create_date }}
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="d-flex justify-content-center mt-3">
                        {{ $video_data->links() }}
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