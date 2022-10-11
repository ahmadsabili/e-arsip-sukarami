@extends('layouts.main', ['title' => 'Edit Dokumen', 'header' => 'Dokumen', 'subTitle' => 'Edit Dokumen'])

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Edit Dokumen</h6>
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('dokumen.update', $dokumen->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Dokumen</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="nama" placeholder="Nama Dokumen" name="nama_dokumen" value="{{ $dokumen->nama_dokumen }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="keterangan">Keterangan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="keterangan" rows="3" placeholder="Keterangan" name="keterangan">{{ $dokumen->keterangan }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="kategori">Kategori</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="kategori" name="kategori_id">
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $dokumen->kategori_id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="kategori">File</label>
                        <div class="col-sm-10">
                            <div class="custom-file">
                                <input class="form-control" type="file" id="formFile" name="file" value="{{ $dokumen->file }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <div class="col-sm-12">
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                <a href="{{ route('kategori.index') }}" class="btn btn-light" type="button">Batal</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@if (Session::has('success'))
<script>
    toastr.success("{{ Session::get('success') }}");
</script>
@endif
@endsection