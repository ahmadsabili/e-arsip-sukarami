@extends('layouts.main', ['title' => 'Kategori', 'header' => 'Kategori'])

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Kategori</h6>
                <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i>
                    &nbsp; Tambah
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-striped" id="myTable">
                        <thead class="thead-light">
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($kategori as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-warning btn-sm mr-1"><i class="fas fa-edit" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"></i></a>
                                        <form action="{{ route('kategori.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus" onclick="return confirm('Hapus Kategori ?')"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        });
    </script>

    @if (Session::has('success'))
    <script>
        toastr.success("{{ Session::get('success') }}");
    </script>
    @endif
@endsection