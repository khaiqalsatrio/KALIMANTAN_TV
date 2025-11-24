<div class="sidebar">

    {{-- TOP SIDEBAR ADS --}}
    <div class="widget">
        @foreach($global_sidebar_top_ad as $row)
        <div class="ad-sidebar">
            @if($row->sidebar_ad_url == '')
            <img src="{{ asset('uploads/'.$row->sidebar_ad) }}" alt="" style="width:100%">
            @else
            <a href="{{ $row->sidebar_ad_url }}">
                <img src="{{ asset('uploads/'.$row->sidebar_ad) }}" alt="" style="width:100%">
            </a>
            @endif
        </div>
        @endforeach
    </div>

    {{-- TAG STATIC --}}
    <div class="widget">
        <div class="tag-heading">
            <h2>Tag Berita</h2>
        </div>
        <div class="tag">
            @foreach($tags as $tag)
            <div class="tag-item">
                <a href="#">
                    <span class="badge bg-secondary">{{ $tag->tag_name }}</span>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    {{-- ARCHIVE --}}
    @foreach($tags as $tag)
    <div class="tag-item">
        <a href="#">
            <span class="badge bg-secondary">{{ $tag->arcives }}</span>
        </a>
    </div>
    @endforeach



    {{-- LIVE CHANNEL --}}
    <div class="widget">
        @foreach ($global_live_channel_data as $row)
        <div class="live-channel">
            <div class="live-channel-heading">
                <h2>{{ $row->heading }}</h2>
            </div>
            <div class="live-channel-item">
                <iframe width="560" height="315"
                    src="https://www.youtube.com/embed/{{ $row->video_id }}"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        </div>
        @endforeach
    </div>

    {{-- POPULAR & RECENT NEWS --}}
    <div class="widget">
        <div class="news">
            <div class="news-heading">
                <h2>
                    Berita Populer & Terkini</h2>
            </div>
            <ul class="nav nav-pills mb-3">
                <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#recent-news">
                        Berita Terkini
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#popular-news">
                        Berita Populer
                    </button>
                </li>
            </ul>
            <div class="tab-content">
                {{-- RECENT --}}
                <div class="tab-pane fade show active" id="recent-news">
                    @foreach ($global_recent_news_data as $row)
                    @if($loop->iteration > 5) @break @endif
                    @php
                    $admin = \App\Models\Admin::find($row->admin_id);
                    @endphp
                    <div class="news-item">
                        <div class="left">
                            <img src="{{ asset('uploads/post/'.$row->post_photo) }}" alt="">
                        </div>
                        <div class="right">
                            {{-- CATEGORY FIX --}}
                            <div class="category">
                                <span class="badge bg-success">
                                    {{ $row->category->category_name }}
                                </span>
                            </div>
                            <h2><a href="{{ route('news_detail', $row->id) }}">{{ $row->post_title }}</a></h2>
                            <div class="date-user">
                                <div class="user">
                                    <a href="javascript:void(0)">
                                        {{ $admin->name ?? 'Admin' }}
                                    </a>
                                </div>
                                <div class="date">
                                    <a href="javascript:void(0)">
                                        {{ date('d F, Y', strtotime($row->created_at)) }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{-- POPULAR --}}
                <div class="tab-pane fade" id="popular-news">
                    @foreach ($global_popular_news_data as $row)
                    @if($loop->iteration > 5) @break @endif
                    @php
                    $admin = \App\Models\Admin::find($row->admin_id);
                    @endphp
                    <div class="news-item">
                        <div class="left">
                            <img src="{{ asset('uploads/post/'.$row->post_photo) }}" alt="">
                        </div>
                        <div class="right">
                            {{-- CATEGORY FIX --}}
                            <div class="category">
                                <span class="badge bg-success">
                                    {{ $row->category->category_name }}
                                </span>
                            </div>
                            <h2><a href="{{ route('news_detail', $row->id) }}">{{ $row->post_title }}</a></h2>
                            <div class="date-user">
                                <div class="user">
                                    <a href="javascript:void(0)">
                                        {{ $admin->name ?? 'Admin' }}
                                    </a>
                                </div>
                                <div class="date">
                                    <a href="">
                                        {{ date('d F, Y', strtotime($row->created_at)) }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- BOTTOM SIDEBAR ADS --}}
    <div class="widget">
        @foreach($global_sidebar_bottom_ad as $row)
        <div class="ad-sidebar">
            @if($row->sidebar_ad_url == '')
            <img src="{{ asset('uploads/'.$row->sidebar_ad) }}" alt="" style="width:100%">
            @else
            <a href="{{ $row->sidebar_ad_url }}">
                <img src="{{ asset('uploads/'.$row->sidebar_ad) }}" alt="" style="width:100%">
            </a>
            @endif
        </div>
        @endforeach
    </div>
</div>