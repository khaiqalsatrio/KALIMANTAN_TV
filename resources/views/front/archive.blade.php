@extends('front.layout.app')

@section('content')
<div class="container mt-4">

    <h2>Arsip Berita: {{ $year }} / {{ $month }}</h2>
    <hr>

    @if($posts->count() == 0)
    <p>Tidak ada berita pada bulan ini.</p>
    @else
    @foreach($posts as $post)
    <div class="mb-3">
        <h4>
            <a href="{{ route('news_detail', $post->id) }}">
                {{ $post->title }}
            </a>
        </h4>
        <small>{{ $post->created_at->format('d M Y') }}</small>
    </div>
    @endforeach
    @endif

</div>
@endsection