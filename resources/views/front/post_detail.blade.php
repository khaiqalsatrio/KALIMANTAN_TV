@extends('front.layout.app')
@section('main_content')

<style>
    .tag-container {
        display: flex;
        flex-wrap: wrap;
        /* otomatis turun baris kalau panjang */
        gap: 6px;
        /* jarak antar badge */
        margin-top: 6px;
    }

    .tag-badge {
        background: #16A34A;
        /* warna hijau modern (bg-success versi lebih fresh) */
        color: #fff;
        padding: 6px 12px;
        font-size: 0.9rem;
        border-radius: 5px;
        /* bulat modern */
        font-weight: 500;
        white-space: nowrap;
        /* tag tidak patah di tengah kata */
    }

    /* ===== COMMENT FORM MODERN STYLE ===== */

    /* Card styling */
    .comment-section form {
        border-radius: 14px !important;
        padding: 25px !important;
        transition: 0.3s;
        border: 2px solid #f1f1f1;
    }

    /* Glow saat hover */
    .comment-section form:hover {
        border-color: #0d6efd;
        box-shadow: 0 0 12px rgba(13, 110, 253, 0.3);
    }

    /* Label */
    .comment-section .form-label {
        color: #333;
        font-size: 15px;
    }

    /* Input dan textarea */
    .comment-section .form-control {
        border-radius: 10px;
        padding: 10px 14px;
        transition: 0.3s;
        border: 1.8px solid #dcdcdc;
    }

    /* Efek fokus */
    .comment-section .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 8px rgba(13, 110, 253, 0.4);
    }

    /* Tombol kirim */
    .comment-section button {
        border-radius: 10px;
        font-weight: 600;
        padding: 10px 22px !important;
        transition: 0.3s;
        background-color: #1f3a63;
    }

    /* Hover tombol */
    .comment-section button:hover {
        background-color: #0b5ed7;
        box-shadow: 0 0 10px rgba(13, 110, 253, 0.4);
    }

    /* ===========================
   RESPONSIVE
=========================== */
    @media (max-width: 768px) {
        .comment-section form {
            padding: 18px !important;
        }
    }

    @media (max-width: 576px) {
        .comment-section h3 {
            font-size: 20px;
        }

        .comment-section .form-control {
            font-size: 14px;
        }

        .comment-section button {
            width: 100%;
        }
    }

    /* ANIMASI */
    .comment-box {
    transition: 0.2s ease;
}
.comment-box:hover {
    transform: translateY(-3px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15) !important;
}
</style>
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
                        {{ $post_detail->visitor_count }}
                    </div>
                </div>
                <div class="main-text">
                    {!! $post_detail->post_detail !!}
                </div>
                <!-- TAG -->
                <div class="tag-section">
                    <div class="tag-section-content">
                        <!-- @foreach ($tag_data as $row)
                        <a href="javascript:void(0)">
                            <div class="tag-container">
                                @foreach($tag_data as $row)
                                <span class="badge bg-success tag-badge">{{ $row->tag_name }}</span>
                                @endforeach
                            </div>
                        </a>
                        @endforeach -->
                        <div class="widget mt-3">
                            <div class="tag-heading">
                                <h2 class="ps-3 d-flex align-items-center gap-2"
                                    style="font-weight:800; text-transform:uppercase; letter-spacing:1px; color:#1a1a1a;">
                                    <i class="bi bi-tags-fill" style="font-size:20px; color:#0d6efd;"></i>
                                    Tags
                                </h2>
                            </div>
                            <div class="tag">
                                @foreach($tag_data as $tag)
                                <div class="tag-item">
                                    <a href="#">
                                        <span class="badge bg-secondary">{{ $tag->tag_name }}</span>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
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
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div style="width:40px; height:40px; background:#1f3a63; 
                border-radius:50%; display:flex; align-items:center; justify-content:center;">
                            <i class="bi bi-chat-dots text-white" style="font-size:20px;"></i>
                        </div>
                        <h3 class="m-0 fw-bold">Tinggalkan Komentar</h3>
                    </div>
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
                    <div class="related-news-heading d-flex align-items-center mb-3"
                        style="padding-left: 10px;">
                        <i class="bi bi-newspaper me-2" style="font-size: 1.5rem;"></i>
                        <h2 class="m-0 fw-bold">Related News</h2>
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
<div class="card mt-4 shadow-sm border-0 mb-3">
    <div class="card-body bg-light rounded">

        <!-- Heading -->
        <div class="d-flex align-items-center gap-2 mb-4">
            <i class="bi bi-chat-left-text" style="font-size: 1.4rem; color:#0d6efd;"></i>
            <h4 class="m-0 fw-bold">{{ $post_detail->comments->count() }} Komentar</h4>
        </div>

        <!-- Scroll Container -->
        <div class="px-1" style="max-height: 300px; overflow-y: auto;">
            @foreach ($post_detail->comments as $komen)
            <div class="d-flex gap-3 p-3 mb-3 border rounded bg-white shadow-sm align-items-start comment-box">
                
                <!-- Avatar -->
                <div class="rounded-circle d-flex justify-content-center align-items-center shadow-sm"
                    style="width:45px; height:45px; font-weight:600; font-size: 18px; background:#1f3a63; color:white;">
                    {{ strtoupper(substr($komen->name, 0, 1)) }}
                </div>

                <!-- Comment Content -->
                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between mb-1">
                        <strong class="text-dark">{{ $komen->name }}</strong>
                        <small class="text-muted">
                            <i class="bi bi-clock"></i> {{ $komen->created_at->format('d M Y H:i') }}
                        </small>
                    </div>

                    <p class="mb-0 text-secondary" style="line-height: 1.5;">
                        {{ $komen->comment }}
                    </p>
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