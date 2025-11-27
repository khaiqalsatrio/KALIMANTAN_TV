@extends('front.layout.app')

@section('main_content')

<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $page_data->contact_title }}</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $page_data->contact_title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">

            {{-- Contact Text Content --}}
            <div class="col-md-12 mb-3">
                {!! $page_data->contact_detail !!}
            </div>
            <!-- {{-- Contact Form --}}
            <div class="col-lg-6 col-md-12">
                <form action="{{ route('contact_form_submit') }}" method="POST" class="form_contact_ajax">
                    @csrf
                    <div class="contact-form">
                        <div class="mb-3">
                            <label class="form-label"> NAME </label>
                            <input type="text" class="form-control" name="name">
                            <span class="text-danger error-text name_error"></span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"> EMAIL_ADDRESS </label>
                            <input type="text" class="form-control" name="email">
                            <span class="text-danger error-text email_error"></span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"> MESSAGE </label>
                            <textarea class="form-control" name="message" rows="3"></textarea>
                            <span class="text-danger error-text message_error"></span>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary bg-website"> SEND_MESSAGE </button>
                        </div>
                    </div>
                </form>
            </div> -->
            <div class="col-lg-6 col-md-12">
                @if ($page_data->contact_map_link)
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Lokasi Kantor Kami</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="ratio ratio-16x9">
                            <iframe
                                src="{{ $page_data->contact_map_link }}"
                                style="border:0;"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>
                @else
                <p class="text-danger">Google Maps link belum ditambahkan.</p>
                @endif
            </div>


        </div>
    </div>
</div>

{{-- AJAX Contact Form Script --}}
<script>
    (function($) {
        $(".form_contact_ajax").on('submit', function(e) {
            e.preventDefault();
            $('#loader').show();
            var form = this;

            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                data: new FormData(form),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(form).find('span.error-text').text('');
                },
                success: function(data) {
                    $('#loader').hide();
                    if (data.result == false) {
                        $.each(data.error_message, function(prefix, val) {
                            $(form).find('span.' + prefix + '_error').text(val[0]);
                        });
                    } else if (data.result == true) {
                        $(form)[0].reset();
                        iziToast.success({
                            title: '',
                            position: 'topRight',
                            message: data.success_message,
                        });
                    }
                }
            });
        });
    })(jQuery);
</script>

<div id="loader"></div>

@endsection