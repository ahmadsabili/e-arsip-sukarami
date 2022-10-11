@extends('layouts.main', ['title' => 'Tambah User', 'header' => 'Tambah User'])

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tambah User</h6>
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
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-5 ml-4">
                            <div class="form-group row">
                                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama" placeholder="Nama" name="name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                                </div>
                            </div>
                            <fieldset class="form-group">
                                <div class="row">
                                  <legend class="col-form-label col-sm-3 pt-0">Role</legend>
                                  <div class="col-sm-9">
                                    <div class="custom-control custom-radio">
                                      <input type="radio" id="admin" name="role" class="custom-control-input" value="admin" checked>
                                      <label class="custom-control-label" for="admin">Admin</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                      <input type="radio" id="pegawai" name="role" class="custom-control-input" value="pegawai">
                                      <label class="custom-control-label" for="pegawai">Pegawai</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="user" name="role" class="custom-control-input" value="user">
                                        <label class="custom-control-label" for="user">User</label>
                                      </div>
                                  </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <div class="form-group row mb-4">
                                <label for="nip" class="col-sm-3 col-form-label">NIP</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="nip" placeholder="NIP" name="nip" required>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="jabatan" placeholder="Jabatan" name="jabatan" required>
                                </div>
                            </div>
                            <fieldset class="form-group">
                                <div class="row">
                                  <legend class="col-form-label col-sm-3 pt-0">Jenis Kelamin</legend>
                                  <div class="col-sm-9">
                                    <div class="custom-control custom-radio">
                                      <input type="radio" id="laki-laki" name="jenis_kelamin" class="custom-control-input" value="Laki-laki" checked>
                                      <label class="custom-control-label" for="laki-laki">Laki-laki</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                      <input type="radio" id="perempuan" name="jenis_kelamin" class="custom-control-input" value="Perempuan">
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
                                <a href="{{ route('users.index') }}" class="btn btn-light" type="button">Batal</a>
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