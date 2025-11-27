@extends('admin.layout.app')

@section('heading', 'Daftar Berita Yang Sudah Dipublikasikan')

@section('button')
<a href="{{ route('admin_post_create') }}" class="btn btn-primary">
    <i class="fas fa-plus"></i> Add
</a>
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- MASUKKAN TABEL LANGSUNG DI SINI --}}
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Thumbnail</th>
                                    <th>Post Title</th>
                                    <th>Category</th>
                                    <th>Author</th>
                                    <th>Admin</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/post/'.$row->post_photo) }}" style="width:200px;">
                                    </td>
                                    <td>{{ $row->post_title }}</td>
                                    {{-- CATEGORY LANGSUNG --}}
                                    <td>{{ $row->category ? $row->category->category_name : '-' }}</td>
                                    {{-- AUTHOR (KOSONGKAN JIKA TIDAK DIPAKAI) --}}
                                    <td> @if($row->admin_id != 0)
                                        {{ Auth::guard('admin')->user()->name }}
                                        @endif
                                    </td>
                                    {{-- ADMIN --}}
                                    <td>
                                        @if($row->admin_id)
                                        {{ optional($row->admin)->name }}
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin_post_edit', $row->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="javascript:;"
                                            onclick="deletePost('{{ $row->id }}')"
                                            class="btn btn-danger btn-sm">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- END TABLE --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    function deletePost(id) {
        Swal.fire({
            title: "Yakin ingin menghapus?",
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batal",
            backdrop: `
            rgba(0,0,0,0.4)
            left top
            no-repeat
        `
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "/admin/post/delete/" + id;
            }
        });
    }
</script>