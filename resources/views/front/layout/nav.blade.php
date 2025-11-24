<div class="website-menu">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('home') }}">Home</a>
                            </li>

                            <!-- CATEGORY DROPDOWN -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                    Kategori
                                </a>

                                <ul class="dropdown-menu">
                                    @foreach($global_category_data as $cat)
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('category', $cat->id) }}">
                                            {{ $cat->category_name }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            <!-- MENU VIDEO -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                    News Video & Jurnalis
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('photo_gallery') }}">Jurnalis Kami</a></li>
                                    <li><a class="dropdown-item" href="{{ route('video_gallery') }}">Video News</a></li>
                                </ul>
                            </li>
                            <!-- Live Channel -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('live_stream') }}">Live Stream</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>