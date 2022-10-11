@extends('layouts.main', ['title' => $title, 'header' => $header])

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ $header }}</h6>
                @if (Auth::user()->role == 'admin' || Auth::user()->role == 'pegawai')
                <a href="{{ route('dokumen.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i>
                    &nbsp; Tambah
                </a>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-striped" id="myTable">
                        <thead class="thead-light">
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Dokumen</th>
                            <th>Keterangan</th>
                            <th>Pejabat</th>
                            @if (Auth::user()->role == 'admin' || Auth::user()->role == 'pegawai')
                            <th>Aksi</th>
                            @endif
                        </thead>
                        <tbody>
                            @foreach ($dokumen as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ date('d-m-Y', strtotime($item->updated_at)) }}</td>
                                <td>{{ $item->nama_dokumen }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>{{ $item->user->name }}</td>
                                @if (Auth::user()->role == 'admin' || Auth::user()->role == 'pegawai')
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('dokumen.download', $item->id) }}" class="btn btn-primary btn-sm mr-1" target="_blank">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <a href="{{ route('dokumen.edit', $item->id) }}" class="btn btn-warning btn-sm mr-1"><i class="fas fa-edit" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"></i></a>
                                        <form action="{{ route('dokumen.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus" onclick="return confirm('Hapus data ?')"></i></button>
                                        </form>
                                    </div>
                                </td>
                                @endif
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