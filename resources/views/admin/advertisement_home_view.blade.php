@extends('admin.layout.app')

@section('heading', 'Home Advertisements (Iklan)')

@section('main_content')

<div class="section-body">
    <form action="{{ route('admin_home_ad_update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h5>Home Iklan</h5>

                        <div class="form-group mb-3">
                            <label>Foto yang Ada
                            </label>
                            <div>
                                @if (!empty($home_ad_data->above_search_ad) && file_exists(public_path('uploads/post/'.$home_ad_data->above_search_ad)))
                                <img src="{{ asset('uploads/post/'.$home_ad_data->above_search_ad) }}" style="width:100%">
                                @else
                                <div class="text-danger">No Image Found</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Change Photo</label>
                            <input type="file" name="above_search_ad">
                        </div>

                        <div class="form-group mb-3">
                            <label>URL</label>
                            <input type="text"
                                class="form-control"
                                name="above_search_ad_url"
                                value="{{ $home_ad_data->above_search_ad_url ?? '' }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>Status</label>
                            <select name="above_search_ad_status" class="form-control">
                                <option value="Show" {{ ($home_ad_data->above_search_ad_status ?? '') == 'Show' ? 'selected' : '' }}>Show</option>
                                <option value="Hide" {{ ($home_ad_data->above_search_ad_status ?? '') == 'Hide' ? 'selected' : '' }}>Hide</option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>


            <!-- <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h5>Above Footer</h5>

                        <div class="form-group mb-3">
                            <label>Existing Photo</label>
                            <div>
                                @if (!empty($home_ad_data->above_footer_ad) && file_exists(public_path('uploads/'.$home_ad_data->above_footer_ad)))
                                    <img src="{{ asset('uploads/'.$home_ad_data->above_footer_ad) }}" style="width:100%">
                                @else
                                    <div class="text-danger">No Image Found</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Change Photo</label>
                            <input type="file" name="above_footer_ad">
                        </div>

                        <div class="form-group mb-3">
                            <label>URL</label>
                            <input type="text"
                                   class="form-control"
                                   name="above_footer_ad_url"
                                   value="{{ $home_ad_data->above_footer_ad_url ?? '' }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>Status</label>
                            <select name="above_footer_ad_status" class="form-control">
                                <option value="Show" {{ ($home_ad_data->above_footer_ad_status ?? '') == 'Show' ? 'selected' : '' }}>Show</option>
                                <option value="Hide" {{ ($home_ad_data->above_footer_ad_status ?? '') == 'Hide' ? 'selected' : '' }}>Hide</option>
                            </select>
                        </div>

                    </div>
                </div>
            </div> -->

        </div>

        <div class="form-group mt-2">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>

    </form>
</div>

@endsection