@extends('front.layout.app')

@section('seo_title', 'Hasil Pencarian')
@section('seo_meta_description', 'Hasil pencarian konten Kalimantan TV')
@section('main_content')

<style>
    .search-title-link {
        color: #1a1a1a;
        text-decoration: none;
        transition: 0.2s ease-in-out;
    }

    .search-title-link:hover {
        color: #6c96e4ff;
        /* Biru */
    }
</style>

<div class="container my-5">
    <h3 class="mb-4">Hasil Pencarian: <strong>{{ request()->q }}</strong></h3>

    @if($posts->count() == 0)
    <div class="alert alert-warning">
        Tidak ada hasil ditemukan untuk kata kunci: <strong>{{ request()->q }}</strong>
    </div>
    @endif

    <div class="row">
        @foreach($posts as $post)
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">

                {{-- Thumbnail --}}
                @if($post->post_photo)
                <img src="{{ asset('uploads/post/'.$post->post_photo) }}" class="card-img-top" alt="">
                @else
                <img src="{{ asset('uploads/post/no-image.png') }}" class="card-img-top" alt="">
                @endif

                <div class="card-body">

                    {{-- Judul bisa diklik --}}
                    <h5 class="card-title">
                        <a href="{{ route('news_detail', $post->id) }}" class="search-title-link">
                            {{ $post->post_title }}
                        </a>
                    </h5>


                    <p class="card-text">
                        {{ Str::limit(strip_tags($post->post_detail), 120) }}
                    </p>

                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center">
        {{ $posts->appends(['q' => request()->q])->links() }}
    </div>

</div>
@endsection