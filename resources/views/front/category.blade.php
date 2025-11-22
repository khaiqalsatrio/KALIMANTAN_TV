@extends('front.layout.app')

@section('main_content')
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $category_data->category_name }}</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ $category_data->category_name }}
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

                        @if (count($post_data))
                        @foreach($post_data as $row)
                        <div class="col-lg-6 col-md-12">
                            <div class="category-page-post-item">
                                <div class="photo">
                                    <img src="{{ asset('uploads/post/'.$row->post_photo) }}" alt="">
                                </div>

                                <div class="category">
                                    <span class="badge bg-success">
                                        {{ $category_data->category_name }}
                                    </span>
                                </div>

                                <h3><a href="{{ route('news_detail', $row->id) }}">
                                        {!! $row->post_detail !!}
                                    </a></h3>

                                <div class="date-user">
                                    <div class="user">
                                        @php
                                        $user_data = \App\Models\Admin::find($row->admin_id);
                                        @endphp
                                        <a href="javascript:void;">{{ $user_data->name }}</a>
                                    </div>

                                    <div class="date">
                                        @php
                                        $updated_date = date('d F, Y', strtotime($row->updated_at));
                                        @endphp
                                        <a href="javascript:void;">{{ $updated_date }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        @else
                        <span class="text-danger">Tidak ada postingan.</span>
                        @endif

                        <div class="d-flex justify-content-center">
                            {{ $post_data->links() }}
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