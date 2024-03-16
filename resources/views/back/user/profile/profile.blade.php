@extends('master.back')
@section('title')Profil @endsection
@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profil</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('user.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Profil</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                    <a href="#" data-toggle="modal" data-target="#profilePictureModal">
                  <img class="profile-user-img img-fluid img-circle"
                    @if (Auth::user()->foto == null)
                        src="{{asset('back/dist/img/user4-128x128.jpg')}}"
                    @else
                        src="{{ url('storage/user/'.Auth::user()->foto) }}"
                    @endif
                    alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

                <p class="text-muted text-center">Software Engineer</p>

                <!-- Modal -->
                <div class="modal fade" id="profilePictureModal" tabindex="-1" role="dialog" aria-labelledby="profilePictureModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <img class="img-fluid"
                                    @if (Auth::user()->foto == null)
                                        src="{{asset('back/dist/img/user4-128x128.jpg')}}"
                                    @else
                                        src="{{ url('storage/user/'.Auth::user()->foto) }}"
                                    @endif
                                    alt="User profile picture">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Followers</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Following</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                    <strong><i class="fas fa-solid fa-signature mr-1"></i> Nama Perusahaan</strong>
                    <p class="text-muted">{{ Auth::user()->profil ? Auth::user()->profil->nama : '' }}</p>
                    <hr>
                    <strong><i class="fas fa-solid fa-map-pin mr-1"></i> Alamat Perusahaan</strong>
                    <p class="text-muted">{{ Auth::user()->profil ? Auth::user()->profil->alamat : '' }}</p>
                    <hr>
                    <strong><i class="fas fa-solid fa-phone mr-1"></i> Nomor Handphone</strong>
                    <p class="text-muted">{{ Auth::user()->nomor }}</p>
                    <hr>
                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Lokasi</strong>
                    <p class="text-muted">Latitude: {{ Auth::user()->profil ? Auth::user()->profil->lat : '' }}, Longitude: {{ Auth::user()->profil ? Auth::user()->profil->long : '' }}</p>
                    <hr>
                    <strong><i class="fas fa-solid fa-envelope mr-1"></i> Email</strong>
                    <p class="text-muted">{{ Auth::user()->email }}</p>
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Akun</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Profil Perusahaan</a></li>
                  {{-- <li class="nav-item "><a class="nav-link" href="#activity" data-toggle="tab">Akun</a></li> --}}
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  {{-- <div class="tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Shared publicly - 7:30 PM today</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>

                      <p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p>

                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post clearfix">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Sarah Ross</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Sent you a message - 3 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>

                      <form class="form-horizontal">
                        <div class="input-group input-group-sm mb-0">
                          <input class="form-control form-control-sm" placeholder="Response">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-danger">Send</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Adam Jones</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Posted 5 photos - 5 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <div class="row mb-3">
                        <div class="col-sm-6">
                          <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                          <div class="row">
                            <div class="col-sm-6">
                              <img class="img-fluid mb-3" src="../../dist/img/photo2.png" alt="Photo">
                              <img class="img-fluid" src="../../dist/img/photo3.jpg" alt="Photo">
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                              <img class="img-fluid mb-3" src="../../dist/img/photo4.jpg" alt="Photo">
                              <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p>

                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                    </div>
                    <!-- /.post -->
                  </div> --}}
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <form method="POST" class="form-horizontal" action="{{ route('user.profile.perusahaanUpdate') }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <!-- Nama Perusahaan -->
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama Perusahaan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama" id="nama" value="{{ Auth::user()->profil ? Auth::user()->profil->nama : '' }}" placeholder="Nama">
                            </div>
                        </div>

                        <!-- Alamat -->
                        <div class="form-group row">
                            <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="alamat" id="inputAlamat" placeholder="Alamat">{{ Auth::user()->profil ? Auth::user()->profil->alamat : '' }}</textarea>
                            </div>
                        </div>

                        <!-- Longitude -->
                        <div class="form-group row">
                            <label for="longitude" class="col-sm-2 col-form-label">Longitude</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="long" id="longitude" value="{{ Auth::user()->profil ? Auth::user()->profil->long : '' }}" placeholder="Longitude">
                            </div>
                        </div>

                        <!-- Latitude -->
                        <div class="form-group row">
                            <label for="Latitude" class="col-sm-2 col-form-label">Latitude</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="lat" id="Latitude" value="{{ Auth::user()->profil ? Auth::user()->profil->lat : '' }}" placeholder="Latitude">
                            </div>
                        </div>

                        <!-- Tombol Simpan -->
                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-info">Simpan</button>
                            </div>
                        </div>
                    </form>

                  </div>
                  <!-- /.tab-pane -->

                  <div class="active tab-pane" id="settings">
                    <form method="POST" class="form-horizontal" action="{{route('user.profile.profileUpdate')}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" value="{{Auth::user()->username}}" id="inputName2" placeholder="Username" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nama Admin</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name" value="{{Auth::user()->name}}" placeholder="Nama" title="Nama Admin">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}" id="inputEmail" placeholder="Email" title="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputNomor" class="col-sm-2 col-form-label">Nomor Handphone</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="nomor" value="{{Auth::user()->nomor}}" id="inputNomor" placeholder="Nomor Handphone" title="No. WhatsApp">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="exampleInputFile">Logo Perusahaan</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="custom-file ">
                                        <input name="foto" type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">
                                            @if(old('foto'))
                                                {{ old('foto') }}
                                            @else
                                                Pilih Foto
                                            @endif
                                        </label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-0">
                                <small class="text-muted"><b>Ganti Password Anda jika perlu.</b></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password" pattern=".{8,}" title="Password harus terdiri dari minimal 8 karakter">
                                    <div class="input-group-append">
                                        <button type="button" id="togglePassword" onclick="togglePasswordVisibility()" class="btn btn-outline-secondary">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password_confirmation" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Masukan Ulang Password">
                                <div id="passwordHelpBlock" class="form-text"></div>
                            </div>
                        </div>

                      {{-- <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div> --}}
                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-info">Ubah</button>
                            </div>
                        </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
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

  @endsection

  @push('script')
<script src="{{asset('back/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
    $(function () {
      bsCustomFileInput.init();
    });
</script>

<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById('password');
        var passwordConfirmationInput = document.getElementById('password_confirmation');
        var icon = document.getElementById('togglePassword').querySelector('i');

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            passwordConfirmationInput.type = "text";
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = "password";
            passwordConfirmationInput.type = "password";
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>

<script>
    // Fungsi untuk memeriksa apakah password cocok saat diketikkan ulang
    function checkPasswordMatch() {
        var password = document.getElementById('password').value;
        var confirmPassword = document.getElementById('password_confirmation').value;
        var passwordHelpBlock = document.getElementById('passwordHelpBlock');

        // Memeriksa apakah password cocok atau tidak
        if (password === confirmPassword) {
            passwordHelpBlock.innerText = 'Password cocok.';
            passwordHelpBlock.style.color = 'green';
        } else {
            passwordHelpBlock.innerText = 'Password tidak cocok.';
            passwordHelpBlock.style.color = 'red';
        }
    }

    // Memanggil fungsi checkPasswordMatch() setiap kali input password diubah
    document.getElementById('password').addEventListener('input', checkPasswordMatch);
    document.getElementById('password_confirmation').addEventListener('input', checkPasswordMatch);
</script>

@endpush
