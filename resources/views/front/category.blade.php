@extends('front.layout.app')

@section('main_content')
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="fw-bold text-uppercase">{{ $category->category_name }}</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ $category->category_name }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6">

                <div class="category-page">
                    <div class="row">

                        @if ($posts->count())
                        @foreach($posts as $row)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="category-page-post-item">
                                <div class="photo">
                                    <a href="{{ route('news_detail', $row->id) }}">
                                        <img src="{{ asset('uploads/post/'.$row->post_photo) }}" alt="">
                                    </a>
                                </div>

                                <div class="category">
                                    <span class="badge bg-success">
                                        {{ $category->category_name }}
                                    </span>
                                </div>

                                <h3 class="mt-2">
                                    <a href="{{ route('news_detail', $row->id) }}">
                                        {{ $row->post_title }}
                                    </a>
                                </h3>

                                <div class="date-user">
                                    <div class="user">
                                        @php
                                        $user_data = \App\Models\Admin::find($row->admin_id);
                                        @endphp
                                        <a href="javascript:void;">{{ $user_data->name }}</a>
                                    </div>

                                    <div class="date">
                                        <a href="javascript:void;">
                                            {{ date('d F, Y', strtotime($row->updated_at)) }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <span class="text-danger">Tidak ada postingan.</span>
                        @endif

                        <div class="d-flex justify-content-center mt-4">
                            {{ $posts->links() }}
                        </div>

                    </div>
                </div>

            </div>

            <div class="col-lg-4 col-md-6 sidebar-col">
                @include('front.layout.sidebar')
            </div>
        </div>
    </div>
</div>
@endsection