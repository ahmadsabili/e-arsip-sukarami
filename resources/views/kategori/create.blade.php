@extends('layouts.main', ['title' => 'Tambah Kategori', 'header' => 'Kategori', 'subTitle' => 'Tambah Kategori'])

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Kategori</h6>
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('kategori.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Kategori</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="nama" placeholder="Nama Kategori" name="nama" required>
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