@extends('admin.layout.app')
@section('heading', 'Tambah Post Baru')
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
        <form action="{{ route('admin_post_store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Judul Post</label>
                <input type="text" name="post_title" class="form-control" value="{{ old('post_title') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Slug</label>
                <input type="text" name="slug" class="form-control" value="{{ old('slug') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select name="category_id" class="form-select" required>
                    <option value="" disabled selected>-- Pilih Kategori --</option>
                    @foreach ($categories as $item)
                    <option value="{{ $item->id }}"
                        {{ old('category_id') == $item->id ? 'selected' : '' }}>
                        {{ $item->category_name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Isi berita</label>
                <textarea name="post_detail" class="form-control" id="editor" style="height: 200px;">
                {{ old('post_detail') }}
                </textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Foto Thumbnail</label>
                <input type="file" name="post_photo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Tags (opsional)</label>
                <input type="text" name="post_tag" class="form-control"
                    maxlength="255"
                    pattern="[A-Za-z0-9,\- ]*"
                    title="Tag hanya boleh huruf, angka, koma, tanda hubung -, dan spasi."
                    placeholder="Contoh: politik, ekonomi, sport">
            </div>
            <button type="submit" class="btn btn-success mt-3">
                <i class="fas fa-save"></i> Simpan Post
            </button>
        </form>
    </div>
</div>
@endsection