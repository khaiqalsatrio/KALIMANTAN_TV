@extends('front.layout.app')

@section('main_content')
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $post_detail->post_title }}</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>

                        {{-- CATEGORY --}}
                        <li class="breadcrumb-item">
                            <a href="{{ route('category', $post_detail->category->id) }}">
                                {{ $post_detail->category->category_name }}
                            </a>
                        </li>

                        <li class="breadcrumb-item active" aria-current="page">
                            {{ $post_detail->post_title }}
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

                <div class="featured-photo">
                    <img src="{{ asset('uploads/post/'.$post_detail->post_photo) }}" alt="">
                </div>

                <div class="sub">
                    <div class="item">
                        <b><i class="fas fa-user"></i></b>
                        <a href="javascript:void(0)">
                            {{ $user_data->name }}
                        </a>
                    </div>

                    <div class="item">
                        <b><i class="fas fa-edit"></i></b>
                        <a href="{{ route('category', $post_detail->category->id) }}">
                            {{ $post_detail->category->category_name }}
                        </a>
                    </div>

                    <div class="item">
                        <b><i class="fas fa-clock"></i></b>
                        @php
                        $updated_date = date('d F, Y', strtotime($post_detail->updated_at));
                        @endphp
                        {{ $updated_date }}
                    </div>

                    <div class="item">
                        <b><i class="fas fa-eye"></i></b>
                        {{ $post_detail->visitors }}
                    </div>
                </div>

                <div class="main-text">
                    {!! $post_detail->post_detail !!}
                </div>

                <div class="tag-section">
                    <h2>Tags</h2>
                    <div class="tag-section-content">
                        @foreach ($tag_data as $row)
                        <a href="javascript:void(0)">
                            <span class="badge bg-success">{{ $row->tag_name }}</span>
                        </a>
                        @endforeach
                    </div>
                </div>

                @if ($post_detail->is_share != 0)
                <div class="share-content">
                    <h2>Share</h2>
                    <div class="addthis_inline_share_toolbox"></div>
                </div>
                @endif

                @if ($post_detail->is_comment != 0)
                <div class="comment-fb">
                    <h2>Comment</h2>
                    <div id="disqus_thread"></div>
                    <script>
                        (function() {
                            var d = document,
                                s = d.createElement('script');
                            s.src = 'https://arefindev-com.disqus.com/embed.js';
                            s.setAttribute('data-timestamp', +new Date());
                            (d.head || d.body).appendChild(s);
                        })();
                    </script>
                </div>
                @endif

                {{-- RELATED NEWS - MASIH STATIC, nanti bisa saya buat dinamis --}}
                <div class="related-news">
                    <div class="related-news-heading">
                        <h2>Related News</h2>
                    </div>
                    <div class="related-post-carousel owl-carousel owl-theme">

                        <div class="item">
                            <div class="photo">
                                <img src="uploads/n6.jpg" alt="">
                            </div>
                            <div class="category">
                                <span class="badge bg-success">General</span>
                            </div>
                            <h3><a href="">Example Related News</a></h3>
                            <div class="date-user">
                                <div class="user"><a href="">User</a></div>
                                <div class="date"><a href="">10 Jan, 2022</a></div>
                            </div>
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