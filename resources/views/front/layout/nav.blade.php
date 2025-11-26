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
                                <a class="nav-link dropdown-toggle fw-semibold" href="#" data-bs-toggle="dropdown">
                                    Kategori
                                </a>
                                <ul class="dropdown-menu shadow rounded-3">
                                    @foreach($global_category_data as $cat)
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2 py-2 fw-medium border-bottom"
                                            style="border-color:#f1f1f1; transition:0.2s;"
                                            onmouseover="this.style.background='#eef4ff'"
                                            onmouseout="this.style.background='transparent'"
                                            href="{{ route('category', $cat->id) }}">
                                            <span style="width:7px; height:7px; background:#0d6efd; border-radius:50%;"></span>
                                            {{ $cat->category_name }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            <!-- MENU VIDEO -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle fw-semibold" href="#" data-bs-toggle="dropdown">
                                    News Video & Jurnalis
                                </a>
                                <ul class="dropdown-menu shadow rounded-3 p-2" style="min-width:230px;">
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2 py-2 fw-medium border-bottom"
                                            style="border-color:#f1f1f1; transition:0.2s;"
                                            onmouseover="this.style.background='#eef4ff'"
                                            onmouseout="this.style.background='transparent'"
                                            href="{{ route('photo_gallery') }}">
                                            <span style="width:7px; height:7px; background:#0d6efd; border-radius:50%;"></span>
                                            Jurnalis Kami
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2 py-2 fw-medium"
                                            style="transition:0.2s;"
                                            onmouseover="this.style.background='#eef4ff'"
                                            onmouseout="this.style.background='transparent'"
                                            href="{{ route('video_gallery') }}">
                                            <span style="width:7px; height:7px; background:#0d6efd; border-radius:50%;"></span>
                                            Video News
                                        </a>
                                    </li>
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