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
                <!-- COMMENT FORM -->
                <div class="comment-section mt-5">
                    <h3 class="mb-3">Tinggalkan Komentar</h3>
                    @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form action="{{ route('comment_store', $post_detail->id) }}" method="POST" class="p-3 border rounded bg-white shadow-sm">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Nama Anda</label>
                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    placeholder="Masukkan nama"
                                    required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Email Anda</label>
                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    placeholder="Masukkan email"
                                    required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Komentar</label>
                            <textarea
                                name="comment"
                                class="form-control"
                                rows="4"
                                placeholder="Tulis komentar di sini..."
                                required></textarea>
                        </div>
                        <button class="btn btn-primary px-4" type="submit">
                            <i class="fas fa-paper-plane"></i> Kirim Komentar
                        </button>
                    </form>
                </div>
                <!-- RELATED NEWS -->
                {{-- RELATED NEWS - MASIH STATIC, nanti bisa saya buat dinamis --}}
                <div class="related-news">
                    <div class="related-news-heading">
                        <h2>Related News</h2>
                    </div>
                    <div class="related-post-carousel owl-carousel owl-theme">
                        @foreach ($related_posts as $post)
                        <div class="item">
                            <div class="photo">
                                <img src="{{ asset('uploads/post/'.$post->post_photo) }}" alt="">
                            </div>
                            <div class="category">
                                <span class="badge bg-success">{{ $post->category->category_name }}</span>
                            </div>
                            <h3>
                                <a href="{{ route('news_detail', $post->id) }}">
                                    {{ $post->post_title }}
                                </a>
                            </h3>
                            <div class="date-user">
                                <div class="user">
                                    <a href="#">{{ $post->admin->name ?? 'Admin' }}</a>
                                </div>
                                <div class="date">
                                    <a href="#">{{ date('d M, Y', strtotime($post->created_at)) }}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- COMMENTS LIST -->
                <div class="card mt-4 shadow-sm border-0">
                    <div class="card-body bg-light rounded">
                        <h4 class="mb-4">{{ $post_detail->comments->count() }} Komentar</h4>
                        <!-- Scroll Container -->
                        <div class="px-1" style="max-height: 300px; overflow-y: auto;">
                            @foreach ($post_detail->comments as $komen)
                            <div class="d-flex gap-3 p-3 mb-3 border rounded bg-white shadow-sm">
                                <!-- Avatar -->
                                <div class="rounded-circle bg-secondary text-white d-flex justify-content-center align-items-center"
                                    style="width:45px; height:45px; font-weight:600; font-size: 18px;">
                                    {{ strtoupper(substr($komen->name, 0, 1)) }}
                                </div>
                                <!-- Comment Content -->
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between mb-1">
                                        <strong>{{ $komen->name }}</strong>
                                        <small class="text-muted">{{ $komen->created_at->format('d M Y H:i') }}</small>
                                    </div>
                                    <p class="mb-0">{{ $komen->comment }}</p>
                                </div>
                            </div>
                            @endforeach
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