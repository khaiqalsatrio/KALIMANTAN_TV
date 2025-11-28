@extends('front.layout.app')

@section('seo_title', 'Hasil Pencarian')
@section('seo_meta_description', 'Hasil pencarian konten Kalimantan TV')

@section('main_content')

<div class="container my-5">

    <h3 class="mb-4">
        Hasil Pencarian:
        <strong class="text-primary">{{ request()->q }}</strong>
    </h3>

    @if($posts->count() == 0)
    <div class="alert alert-warning">
        Tidak ada hasil ditemukan untuk kata kunci:
        <strong>{{ request()->q }}</strong>
    </div>
    @endif

    <div class="row">

        <!-- =========================== -->
        <!-- KONTEN KIRI (HASIL SEARCH) -->
        <!-- =========================== -->
        <div class="col-md-8">
            <div class="row">
                @foreach($posts as $post)
                <div class="col-md-6 d-flex">
                    <div class="card mb-4 shadow-sm search-card flex-fill">

                        <img
                            src="{{ $post->post_photo ? asset('uploads/post/'.$post->post_photo) : asset('uploads/post/no-image.png') }}"
                            class="search-thumb w-100" alt="">

                        <div class="card-body">
                            <h5 class="card-title mb-2">
                                <a href="{{ route('news_detail', $post->id) }}" class="search-title-link">
                                    {{ $post->post_title }}
                                </a>
                            </h5>

                            <p class="card-text text-muted">
                                {{ Str::limit(strip_tags($post->post_detail), 120) }}
                            </p>

                            <small class="text-secondary d-block mt-2">
                                <i class="far fa-calendar"></i>
                                {{ $post->created_at->format('d M Y') }}
                            </small>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- PAGINATION -->
            <div class="mt-4">
                {{ $posts->links() }}
            </div>
        </div>
        <!-- =========================== -->
        <!-- SIDEBAR KANAN (KALENDER)   -->
        <!-- =========================== -->
        <div class="col-lg-4 col-md-6 sidebar-col">
            @include('front.layout.sidebar')
        </div>
    </div>
</div>

{{-- Kalender Script --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {

        const calendarDiv = document.getElementById('calendar');
        const date = new Date();

        const monthNames = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];

        function generateCalendar(year, month) {
            let firstDay = new Date(year, month).getDay();
            let daysInMonth = new Date(year, month + 1, 0).getDate();

            let calendarHTML = `
                <div class="calendar-header">${monthNames[month]} ${year}</div>
                <table class="calendar-table">
                    <tr>
                        <th>M</th><th>S</th><th>S</th><th>R</th><th>K</th><th>J</th><th>S</th>
                    </tr>
                    <tr>
            `;

            let dayCount = 1;

            firstDay = (firstDay === 0) ? 7 : firstDay;

            for (let i = 1; i < firstDay; i++) calendarHTML += "<td></td>";

            for (let i = firstDay; i <= 7; i++) {
                calendarHTML += `<td>${dayCount}</td>`;
                dayCount++;
            }

            calendarHTML += "</tr>";

            while (dayCount <= daysInMonth) {
                calendarHTML += "<tr>";
                for (let i = 1; i <= 7; i++) {
                    if (dayCount <= daysInMonth) {
                        calendarHTML += `<td>${dayCount}</td>`;
                        dayCount++;
                    } else {
                        calendarHTML += "<td></td>";
                    }
                }
                calendarHTML += "</tr>";
            }

            calendarHTML += "</table>";
            calendarDiv.innerHTML = calendarHTML;
        }

        generateCalendar(date.getFullYear(), date.getMonth());
    });
</script>

@endsection