@extends('front.layout.app')

@section('main_content')
<div class="page-content pt_50 pb_80">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-md-12">
                <h3 class="mb-4">All News</h3>

                <div class="row">
                    @foreach($posts as $item)
                    <div class="col-md-6 mb-4">
                        <div class="news-item">
                            <a href="{{ route('news_detail', $item->id) }}">
                                <img src="{{ asset('uploads/'.$item->post_photo) }}" alt="" style="width:100%">
                            </a>

                            <div class="mt-2">
                                <span class="badge bg-success">{{ $item->subCategory->sub_category_name ?? 'News' }}</span>

                                <h5 class="mt-2">
                                    <a href="{{ route('news_detail', $item->id) }}">
                                        {{ $item->post_title }}
                                    </a>
                                </h5>

                                <div class="text-muted small">
                                    <i class="fa fa-calendar"></i>
                                    {{ date('d F, Y', strtotime($item->created_at)) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="mt-4">
                    {{ $posts->links() }}
                </div>
            </div>

            {{-- SIDEBAR --}}
            <div class="col-lg-4 col-md-12">
                @include('front.sidebar')
            </div>

        </div>
    </div>
</div>
@endsection