@extends('master.back')

@section('title')
Tambah Tagihan
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Tagihan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('superadmin.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Tambah Tagihan</li>
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
                        <h3>Tagihan</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" action="{{ route('superadmin.tagihan.store') }}" enctype="multipart/form-data">
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
                                <input type="hidden" type="numeric" value="{{$data->id}}" name="permohonan_id">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="bayar_awal">Tanggal Mulai Pembayaran</label>
                                            <input type="date" class="form-control" id="bayar_awal" name="bayar_awal" value="{{old('bayar_awal')}}"
                                                placeholder="Masukan Tanggal" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="bayar_berakhir">Tanggal Akhir Pembayaran</label>
                                            <input type="date" class="form-control" id="bayar_berakhir" name="bayar_berakhir" value="{{old('bayar_berakhir')}}"
                                                placeholder="Masukan Tanggal" required>
                                        </div>
                                    </div>
                                </div>

                                <h3>Pelayanan </h3>
                                @foreach($data->services as $service)
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="harga_{{ $service->id }}">Harga {{ $service->nama }}</label>
                                            <input type="text" class="form-control harga" id="harga_{{ $service->id }}" name="harga[{{ $service->id }}]" value="{{ old('harga.'.$service->id) }}" placeholder="Harga {{ $service->nama }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="jumlah_{{ $service->id }}">Jumlah {{ $service->nama }}</label>
                                            <input type="text" class="form-control jumlah" id="jumlah_{{ $service->id }}" name="jumlah[{{ $service->id }}]" value="{{ old('jumlah.'.$service->id) }}" placeholder="Jumlah {{ $service->nama }}">

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="subtotal_{{ $service->id }}">Subtotal {{ $service->nama }}</label>
                                            <input type="text" class="form-control subtotal" id="subtotal_{{ $service->id }}"  readonly>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="modal-footer justify-content-between">
                                <td>
                                    <a type="button" href="{{ route('superadmin.tagihan.index', $data->id) }}"
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

    $(document).ready(function() {
        $('.harga, .jumlah').on('input', function() {
            var parentRow = $(this).closest('.row');
            var harga = parseFloat(parentRow.find('.harga').val());
            var jumlah = parseFloat(parentRow.find('.jumlah').val());
            var subtotal = harga * jumlah;
            parentRow.find('.subtotal').val(subtotal.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' }));
        });
    });
  </script>

@endpush
