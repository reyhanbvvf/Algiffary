@extends('master.back')

@section('title')
    Edit Permohonan
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Permohonan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('superadmin.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit Permohonan</li>
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
                        <h3>Edit</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" action="{{ route('superadmin.permohonan.update', $data->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
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
                                    <input type="text" class="form-control" id="nama" name="nama_pjb" value="{{ $data->nama_pjb }}"
                                        placeholder="Masukan Nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="no_surat">Nomor Surat</label>
                                    <input type="text" class="form-control" id="nama" name="no_surat" value="{{ $data->no_surat }}"
                                        placeholder="Masukan Nomor Surat" required>
                                </div>
                                <div class="form-group">
                                    <div class="select2-purple">
                                        <label for="service">Select Services</label>
                                        <select name="service_id[]" id="service" class="form-control select2" multiple="multiple" data-placeholder="Select Service" style="width: 100%;">
                                            @foreach($service as $s)
                                                <option value="{{ $s->id }}" {{ in_array($s->id, $data->services->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                    {{ $s->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>User</label>
                                    <select name="user_id" class="form-control" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        @foreach($user as $u)
                                            <option value="{{ $u->id }}" {{ $data->user_id == $u->id ? 'selected' : '' }}>{{ $u->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_awal">Tanggal Awal Masa Berlaku</label>
                                    <input type="date" class="form-control" id="tgl_awal" name="tgl_awal" value="{{ $data->tgl_awal }}"
                                        placeholder="Masukan Tanggal" required>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_berakhir">Tanggal Berakhir Masa Berlaku</label>
                                    <input type="date" class="form-control" id="tgl_berakhir" name="tgl_berakhir" value="{{ $data->tgl_berakhir }}"
                                        placeholder="Masukan Tanggal" required>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option value="" disabled>--Pilih Status--</option>
                                        <option value="pending" {{ $data->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="verifikasi" {{ $data->status == 'verifikasi' ? 'selected' : '' }}>Verifikasi</option>
                                        <option value="proses" {{ $data->status == 'proses' ? 'selected' : '' }}>Proses</option>
                                        <option value="selesai" {{ $data->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tipe Permohonan</label>
                                    <select name="tipe_permohonan" class="form-control" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option value="" disabled>--Pilih Tipe data--</option>
                                        <option value="baru" {{ $data->tipe_permohonan == 'baru' ? 'selected' : '' }}>Baru</option>
                                        <option value="perpanjang" {{ $data->tipe_permohonan == 'perpanjang' ? 'selected' : '' }}>Perpanjang</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Status Permohonan</label>
                                    <select name="isActive" class="form-control" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option value="" disabled>--Pilih Status--</option>
                                        <option value="1" {{ $data->isActive == '1' ? 'selected' : '' }}>Aktif</option>
                                        <option value="0" {{ $data->isActive == '0' ? 'selected' : '' }}>Nonaktif</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Dokumen</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="dokumen" type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">
                                                @if($data->dokumen)
                                                    {{ $data->dokumen }}
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
                                    <a type="button" href="{{ route('superadmin.permohonan.index') }}" class="btn btn-danger">Kembali</a>
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
