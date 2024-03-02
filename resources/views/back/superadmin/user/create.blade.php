@extends('master.back')

@section('title')
Tambah User
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('superadmin.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Tambah User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3>Tambah</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" action="{{ route('superadmin.user.store') }}">
                            <div class="modal-body">
                                @csrf
                                @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}"
                                        placeholder="Masukan Nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" value="{{old('username')}}"
                                        placeholder="Masukan Username" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}"
                                        placeholder="Masukan Email" required>
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <select name="role" class="form-control" data-select2-id="2" tabindex="-1" aria-hidden="true">
                                        <option value="" {{ old('role') == '--Pilih Role--' ? 'selected' : '' }} disabled>--Pilih Role--
                                        </option>
                                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Status Akun</label>
                                    <select name="status" class="form-control" data-select2-id="1" tabindex="-1"
                                        aria-hidden="true">
                                        <option value="" {{ old('status') == '--Pilih Status--' ? 'selected' : '' }} disabled>--Pilih Status--
                                        </option>
                                        <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="Nonaktif" {{ old('status') == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <i class="text-danger"><span><sup>*</sup>Wajib 8 (huruf, angka)</span></i>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password" required>
                                        <div class="input-group-append">
                                            <button type="button" id="togglePassword" onclick="togglePasswordVisibility()" class="btn btn-outline-secondary">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Konfirmasi Password</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Masukan Ulang Password" required>
                                    <div id="passwordHelpBlock" class="form-text"></div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <td>
                                        <a type="button" href="{{ route('superadmin.user.index') }}"
                                            class="btn btn btn-danger">Kembali</a>
                                    </td>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>

                            <script>
                                function togglePasswordVisibility() {
                                    const passwordInput = document.getElementById("password");
                                    const toggleButton = document.getElementById("togglePassword");

                                    if (passwordInput.type === "password") {
                                        passwordInput.type = "text";
                                        toggleButton.innerHTML = '<i class="fas fa-eye-slash"></i>';
                                    } else {
                                        passwordInput.type = "password";
                                        toggleButton.innerHTML = '<i class="fas fa-eye"></i>';
                                    }
                                }
                            </script>

                            <script>
                                document.getElementById("password_confirmation").addEventListener("input", function() {
                                    var passwordInput = document.getElementById("password");
                                    var confirmPasswordInput = document.getElementById("password_confirmation");
                                    var message = document.getElementById("passwordHelpBlock");

                                    if (passwordInput.value === confirmPasswordInput.value) {
                                        message.innerHTML = "Password sesuai";
                                        message.style.color = "green";
                                    } else {
                                        message.innerHTML = "Password belum sesuai";
                                        message.style.color = "red";
                                    }
                                });
                            </script>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->


      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</div>
@endsection
