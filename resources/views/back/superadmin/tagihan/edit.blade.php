@extends('master.back')

@section('title')
    Edit Tagihan
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Tagihan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('superadmin.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit Tagihan</li>
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
                        <form method="post" action="{{ route('superadmin.tagihan.update', $data->id) }}" enctype="multipart/form-data">
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
                                    <label for="bayar_awal">Tanggal Awal Masa Pembayaran</label>
                                    <input type="date" class="form-control" id="bayar_awal" name="bayar_awal" value="{{ $data->bayar_awal }}"
                                        placeholder="Masukan Tanggal" required>
                                </div>
                                <div class="form-group">
                                    <label for="bayar_berakhir">Tanggal Berakhir Masa Pembayaran</label>
                                    <input type="date" class="form-control" id="bayar_berakhir" name="bayar_berakhir" value="{{ $data->bayar_berakhir }}"
                                    placeholder="Masukan Tanggal" required>
                                </div>
                                <div class="form-group">
                                    <label for="denda">Denda</label>
                                    <input type="number" class="form-control" id="denda" name="denda" value="{{ $data->denda }}"
                                        placeholder="Masukan Denda">
                                </div>
                                <div class="form-group">
                                    <label for="total">Total</label>
                                    <input type="number" class="form-control" id="total" name="total" value="{{ $data->total }}"
                                        placeholder="Masukan Denda" required>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status_pembayaran" class="form-control" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option value="" disabled>--Pilih Status--</option>
                                        <option value="tepat waktu" {{ $data->status_pembayaran == 'tepat waktu' ? 'selected' : '' }}>Tepat Waktu</option>
                                        <option value="terlambat" {{ $data->status_pembayaran == 'terlambat' ? 'selected' : '' }}>Terlambat</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Verifikasi</label>
                                    <select name="verifikasi" class="form-control" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option value="" disabled selected>--Pilih Verifikasi--</option>
                                        <option value="diterima" {{ ($data->verifikasi == 'diterima' && $data->verifikasi !== null) ? 'selected' : '' }}>Diterima</option>
                                        <option value="bukti tidak valid" {{ ($data->verifikasi == 'bukti tidak valid' && $data->verifikasi !== null) ? 'selected' : '' }}>Bukti tidak valid</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Bukti</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="bukti" type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">
                                                @if($data->bukti)
                                                    {{ $data->bukti }}
                                                @else
                                                    Pilih bukti
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
                                    <a type="button" href="{{ route('superadmin.tagihan.index', $data->permohonan_id) }}" class="btn btn-danger">Kembali</a>
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
