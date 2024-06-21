@extends('master.back')
@section('title')Profil @endsection
@section('content')
<style>#map {
    height: 700px; /* Set the height to 500 pixels */
    width: 100%; /* Set the width to 100% of its container */
}</style>

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
                        src="{{asset('back/dist/img/user-225x225.png')}}"
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
                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Lokasi</strong>
                    <p class="text-muted">Latitude: {{ Auth::user()->profil ? Auth::user()->profil->lat : '' }}, Longitude: {{ Auth::user()->profil ? Auth::user()->profil->long : '' }}</p>
                    <hr>
                    <strong><i class="fas fa-solid fa-envelope mr-1"></i> Email</strong>
                    <p class="text-muted">{{ Auth::user()->email }}</p>
                    <hr>
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
                    <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Profil Perusahaan</a></li>
                    <li class="nav-item"><a class="nav-link " href="#timeline" data-toggle="tab">Akun</a></li>
                  {{-- <li class="nav-item "><a class="nav-link" href="#activity" data-toggle="tab">Akun</a></li> --}}
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">

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
                            <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}" id="inputEmail" placeholder="Email" title="Email Perusahaan">
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
                        <hr>
                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-0">
                                <small class="text-muted"><b>(Ganti Password Anda jika perlu)</b></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                              <small id="passwordHelpBlock" class="form-text text-muted">
                                Password harus terdiri dari minimal 8 karakter.
                              </small>
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

                  <div class="active tab-pane" id="settings">
                    <form method="POST" class="form-horizontal" action="{{ route('user.profile.perusahaanUpdate') }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <!-- Peta -->
                    <div class="" id="map" style="width: 100%; height: 400px"></div>
                    <div class="form-group">
                        <div class="text-center">
                            <button type="button" class="btn btn-outline-info text-center" id="addMarkerButton">Cek Marker</button>
                        </div>
                    </div>
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
    var map = L.map('map').setView([-3.4458,114.8214], 13);

    var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    var marker;

    function addOrUpdateMarker() {
        var latitude = parseFloat(document.getElementById('latitude').value);
        var longitude = parseFloat(document.getElementById('longitude').value);

        if (!isNaN(latitude) && !isNaN(longitude)) {
            var newLatLng = L.latLng(latitude, longitude);

            if (marker) {
                marker.setLatLng(newLatLng);
            } else {
                marker = L.marker(newLatLng).addTo(map);
            }
        } else {
            toastr.warning('Koordinat tidak valid. Silakan masukkan nilai numerik yang valid.');
        }
    }

    document.getElementById('addMarkerButton').addEventListener('click', function () {
        addOrUpdateMarker();
    });

    map.on('click', function (e) {
        document.getElementById('latitude').value = e.latlng.lat.toFixed(6);
        document.getElementById('longitude').value = e.latlng.lng.toFixed(6);
        addOrUpdateMarker();
    });

    var gmap = L.tileLayer('http://{s}.google.com/vt?lyrs=m,h&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
    });

    var gsmap = L.tileLayer('http://{s}.google.com/vt?lyrs=s,h&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
    });

    var baseMaps = {
    "OpenStreetMap": osm,
    "Google Maps": gmap,
    "Google Satelite Maps": gsmap
    };

    L.control.layers(baseMaps).addTo(map);

</script>

<script>
    $(function () {
      bsCustomFileInput.init();
    });
</script>



        // Event listener for adding marker on click
    //     map.on('click', function(e) {
    //     var latitude = e.latlng.lat.toFixed(6);
    //     var longitude = e.latlng.lng.toFixed(6);
    //     document.getElementById('latitude').value = latitude;
    //     document.getElementById('longitude').value = longitude;
    //     addOrUpdateMarker(latitude, longitude);
    // });

    // Add existing marker to the map
    // var existingLatitude = parseFloat({{ Auth::user()->profil ? Auth::user()->profil->lat : '' }});
    // var existingLongitude = parseFloat({{ Auth::user()->profil ? Auth::user()->profil->long : '' }});
    // var marker = L.marker([existingLatitude, existingLongitude]).addTo(map);


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
