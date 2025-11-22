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
            <h2>Tags</h2>
        </div>
        <div class="tag">
            <div class="tag-item"><a href=""><span class="badge bg-secondary">business</span></a></div>
            <div class="tag-item"><a href=""><span class="badge bg-secondary">river</span></a></div>
            <div class="tag-item"><a href=""><span class="badge bg-secondary">politics</span></a></div>
            <div class="tag-item"><a href=""><span class="badge bg-secondary">google</span></a></div>
            <div class="tag-item"><a href=""><span class="badge bg-secondary">tree</span></a></div>
            <div class="tag-item"><a href=""><span class="badge bg-secondary">airplane</span></a></div>
            <div class="tag-item"><a href=""><span class="badge bg-secondary">tiles</span></a></div>
            <div class="tag-item"><a href=""><span class="badge bg-secondary">recent</span></a></div>
            <div class="tag-item"><a href=""><span class="badge bg-secondary">brand</span></a></div>
            <div class="tag-item"><a href=""><span class="badge bg-secondary">election</span></a></div>
        </div>
    </div>

    {{-- ARCHIVE --}}
    <div class="widget">
        <div class="archive-heading">
            <h2>Archive</h2>
        </div>
        <div class="archive">
            <select class="form-select">
                <option value="">Select Month</option>
                <option value="">February 2022</option>
                <option value="">January 2022</option>
                <option value="">December 2021</option>
                <option value="">November 2021</option>
                <option value="">October 2021</option>
                <option value="">September 2021</option>
                <option value="">August 2021</option>
                <option value="">July 2021</option>
            </select>
        </div>
    </div>

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
                <h2>Popular & Recent News</h2>
            </div>

            <ul class="nav nav-pills mb-3">
                <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#recent-news">
                        Recent News
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#popular-news">
                        Popular News
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
