@extends('front.layout.app')

@section('main_content')

<style>
    .video-thumb {
        position: relative;
        border-radius: 10px;
        overflow: hidden;
        cursor: pointer;
        transition: 0.3s;
    }

    .video-thumb img {
        width: 100%;
        height: 180px;
        object-fit: cover;
    }

    .video-thumb:hover {
        transform: scale(1.03);
    }

    .video-thumb .play-btn {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        font-size: 38px;
        color: white;
        opacity: 0.9;
    }

    .video-caption a {
        font-weight: 600;
        font-size: 16px;
        text-decoration: none;
        color: #222;
    }

    .video-caption a:hover {
        color: #0066ff;
    }

    /* MODAL PLAYER */
    #videoModal iframe {
        width: 100%;
        height: 500px;

    }
</style>

<!-- Modal Player -->
<div class="modal fade" id="videoModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-0">
                <iframe id="videoFrame" src="" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>


<!-- Page Top -->
<div class="page-top">
    <div class="container">
        <h2>Live Stream</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Live Stream</li>
        </ol>
    </div>
</div>

<!-- Page Content -->
<div class="page-content">
    <div class="container">
        <div class="row">

            @foreach ($live_channels as $row)
            <div class="col-lg-3 col-md-4 mb-4">

                <div class="video-thumb"
                    onclick="openVideo('{{ $row->video_id }}')">

                    <img src="http://img.youtube.com/vi/{{ $row->video_id }}/hqdefault.jpg" alt="">

                    <div class="play-btn">
                        <i class="fas fa-play-circle"></i>
                    </div>

                </div>

                <div class="video-caption mt-2">
                    <a href="javascript:void(0)" onclick="openVideo('{{ $row->video_id }}')">
                        {{ $row->heading }}
                    </a>
                </div>

                <div class="video-date">
                    <i class="fas fa-calendar-alt"></i>
                    {{ date('d F, Y', strtotime($row->created_at)) }}
                </div>

            </div>
            @endforeach

            <div class="d-flex justify-content-center mt-3">
                {{ $live_channels->links() }}
            </div>

        </div>
    </div>
</div>

<script>
    function openVideo(videoId) {
        let url = "https://www.youtube.com/embed/" + videoId + "?autoplay=1";
        document.getElementById("videoFrame").src = url;
        let modal = new bootstrap.Modal(document.getElementById('videoModal'));
        modal.show();

        // Hapus video saat modal ditutup
        document.getElementById('videoModal').addEventListener('hidden.bs.modal', function() {
            document.getElementById("videoFrame").src = "";
        });
    }
</script>

@endsection