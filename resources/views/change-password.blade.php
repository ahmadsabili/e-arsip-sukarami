@extends('layouts.main', ['title' => 'Ubah Password', 'header' => 'Ubah Password'])

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Ubah Password</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('update-password', Auth::user()->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group row mx-5">
                        <label for="nama" class="col-sm-2 col-form-label">Password Lama</label>
                        <div class="col-sm-10">
                        <input type="password" class="form-control" id="nama" placeholder="Password Lama" name="old_password" required>
                        </div>
                    </div>
                    <div class="form-group row mx-5">
                        <label for="nama" class="col-sm-2 col-form-label">Password Baru</label>
                        <div class="col-sm-10">
                        <input type="password" class="form-control" id="new_password" placeholder="Password Baru" name="new_password" required>
                        </div>
                    </div>
                    <div class="form-group row mx-5">
                        <label for="nama" class="col-sm-2 col-form-label">Konfirmasi Password Baru</label>
                        <div class="col-sm-10">
                        <input type="password" class="form-control" id="confirm_new_password" placeholder="Konfirmasi Password Baru" name="confirm_new_password" required>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <div class="col-sm-12">
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary mr-2" onclick="return validate()">Simpan</button>
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
    <script>
        function validate() {
        var password = document.getElementById("new_password").value;
        var confirmPassword = document.getElementById("confirm_new_password").value;
        if (password != confirmPassword) {
            alert("Konfirmasi password tidak sama !");
            return false;
        }
        return true;
        }
    </script>

    @if (Session::has('success'))
    <script>
        toastr.success("{{ Session::get('success') }}");
    </script>
    @endif
    @if (Session::has('error'))
    <script>
        toastr.error("{{ Session::get('error') }}");
    </script>
    @endif
@endsection