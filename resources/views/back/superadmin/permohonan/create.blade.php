@extends('master.back')

@section('title')
Tambah Permohonan
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Permohonan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('superadmin.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Tambah Permohonan</li>
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
                        <h3>Permohonan</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" action="{{ route('superadmin.permohonan.store') }}" enctype="multipart/form-data">
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
                                    <label for="nama">Nama Penanggungjawab</label>
                                    <input type="text" class="form-control" id="nama" name="nama_pjb" value="{{old('nama_pjb')}}"
                                        placeholder="Masukan Nama" required>
                                </div>
                                <div class="form-group">
                                    <div  class="select2-purple">
                                    <label for="service">Select Services</label>
                                        <select name="service_id[]" id="service" class="form-control select2 " data-dropdown-css-class="select2-purple" multiple="multiple" data-placeholder="Select Service" style="width: 100%;">
                                            @foreach($service as $s)
                                            <option value="{{ $s->id }}" {{ in_array($s->id, old('s', [])) ? 'selected' : '' }}>{{ $s->nama }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>User</label>
                                    <select name="user_id" class="form-control" data-select2-id="1" tabindex="-1"
                                        aria-hidden="true">
                                            @foreach($user as $u)
                                            <option value="{{ $u->id }}" {{ old('user_id') == $u->id ? 'selected' : '' }}>{{ $u->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control" data-select2-id="1" tabindex="-1"
                                        aria-hidden="true">
                                        <option value="" {{ old('status') == '--Pilih Status--' ? 'selected' : '' }} disabled>--Pilih Status--</option>
                                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="verifikasi" {{ old('status') == 'verifikasi' ? 'selected' : '' }}>Verifikasi</option>
                                        <option value="proses" {{ old('status') == 'proses' ? 'selected' : '' }}>Proses</option>
                                        <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tipe Permohonan</label>
                                    <select name="tipe_permohonan" class="form-control" data-select2-id="1" tabindex="-1"
                                        aria-hidden="true">
                                        <option value="" {{ old('status') == '--Pilih Status--' ? 'selected' : '' }} disabled>--Pilih Status--</option>
                                        <option value="baru" {{ old('status') == 'baru' ? 'selected' : '' }}>Baru</option>
                                        <option value="perpanjang" {{ old('status') == 'perpanjang' ? 'selected' : '' }}>Perpanjang</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Dokumen</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="dokumen" type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">
                                                @if(old('dokumen'))
                                                    {{ old('dokumen') }}
                                                @else
                                                    Pilih dokumen
                                                @endif
                                            </label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <td>
                                    <a type="button" href="{{ route('superadmin.permohonan.index') }}"
                                        class="btn btn btn-danger">Kembali</a>
                                </td>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
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

@push('script')
<script src="{{asset('back/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })

      bsCustomFileInput.init();
    })
  </script>
@endpush
