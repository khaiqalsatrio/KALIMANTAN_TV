@extends('admin.layout.app')

@section('heading', 'Edit Post')

@section('button')
<a href="{{ route('admin_post_show') }}" class="btn btn-primary">
    <i class="fas fa-arrow-left"></i> Kembali
</a>
@endsection

@section('main_content')
<div class="card">
    <div class="card-body">

        {{-- Error alert --}}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- FORM UPDATE POST --}}
        <form action="{{ route('admin_post_update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- HAPUS @method('PUT') karena route cuma menerima POST --}}

            <div class="mb-3">
                <label class="form-label">Judul Post</label>
                <input type="text" name="post_title" class="form-control"
                    value="{{ old('post_title', $post->post_title) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Slug</label>
                <input type="text" name="slug" class="form-control"
                    value="{{ old('post_slug', $post->post_slug) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select name="category_id" class="form-select" required>
                    @foreach ($categories as $item)
                    <option value="{{ $item->id }}"
                        {{ old('category_id', $post->category_id) == $item->id ? 'selected' : '' }}>
                        {{ $item->category_name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <textarea name="post_detail"
                class="form-control"
                id="editor"
                style="height: 200px;">
            {{ old('post_detail', $post->post_detail) }}
            </textarea>

            <div class="mb-3">
                <label class="form-label">Foto Lama</label><br>
                <img src="{{ asset('uploads/post/' . $post->post_photo) }}"
                    alt="" style="width: 150px; border-radius: 6px;">
            </div>

            <div class="mb-3">
                <label class="form-label">Ganti Thumbnail (opsional)</label>
                <input type="file" name="post_photo" class="form-control">
            </div>

            {{-- Tags --}}
            @php
            $tagList = $post->tags ? $post->tags->pluck('tag_name')->implode(', ') : '';
            @endphp

            <div class="mb-3">
                <label class="form-label">Tags (opsional)</label>
                <input type="text" name="post_tag" class="form-control"
                    maxlength="255"
                    pattern="[A-Za-z0-9,\- ]*"
                    title="Tag hanya boleh huruf, angka, koma, tanda hubung -, dan spasi."
                    placeholder="Contoh: politik, ekonomi, sport"
                    value="{{ old('post_tag', $tagList) }}">
            </div>
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Update Post
            </button>
        </form>

    </div>
</div>
@endsection