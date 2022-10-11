@extends('layouts.main', ['title' => 'Profil', 'header' => 'Profil Saya'])

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Profil Saya</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('profil.update', Auth::user()->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-5 ml-5">
                            <div class="form-group row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" placeholder="Nama" name="name" required value="{{ $profil->user->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="nip" placeholder="Nip" name="nip" required value="{{ $profil->nip }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nip" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" placeholder="Email" name="email" required value="{{ $profil->user->email }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <div class="form-group row mb-4">
                                <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="jabatan" placeholder="Jabatan" name="jabatan" required value="{{ $profil->jabatan }}">
                                </div>
                            </div>
                            <fieldset class="form-group">
                                <div class="row">
                                  <legend class="col-form-label col-sm-3 pt-0">Jenis Kelamin</legend>
                                  <div class="col-sm-9">
                                    <div class="custom-control custom-radio">
                                      <input type="radio" id="laki-laki" name="jenis_kelamin" class="custom-control-input" value="Laki-laki" {{ $profil->jenis_kelamin == 'Laki-laki' ? 'checked':'' }}>
                                      <label class="custom-control-label" for="laki-laki">Laki-laki</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                      <input type="radio" id="perempuan" name="jenis_kelamin" class="custom-control-input" value="Perempuan" {{ $profil->jenis_kelamin == 'Perempuan' ? 'checked':'' }}>
                                      <label class="custom-control-label" for="perempuan">Perempuan</label>
                                    </div>
                                  </div>
                                </div>
                            </fieldset>
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