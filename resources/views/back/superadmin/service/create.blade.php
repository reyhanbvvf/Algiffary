@extends('master.back')

@section('title')
Tambah Jenis Pelayanan
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Jenis Pelayanan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('superadmin.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Tambah Jenis Pelayanan</li>
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
                        <form method="post" action="{{ route('superadmin.service.store') }}" enctype="multipart/form-data">
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
                                    <label for="name">Nama pelayanan</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{old('nama')}}"
                                        placeholder="Masukan Nama Pelayanan" required>
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="text" class="form-control" id="harga" name="harga" value="{{ old('harga') }}"
                                        placeholder="Rp." required>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea type="text" class="form-control" id="deskripsi" name="deskripsi"
                                        placeholder="Masukan Deskripsi" required>{{ old('deskripsi') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control select2 select2-hidden-accessible" data-select2-id="1" tabindex="-1"
                                        aria-hidden="true">
                                        <option value="" {{ old('status') == '--Pilih Status--' ? 'selected' : '' }} disabled>--Pilih Status--</option>
                                        <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="Nonaktif" {{ old('status') == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="satuan">Satuan</label>
                                    <input type="text" class="form-control" id="satuan" name="satuan" value="{{ old('satuan') }}"
                                        placeholder="Masukan Satuan" required>
                                </div>
                                <div class="form-group">
                                    <label for="info">Info</label>
                                    <input type="text" class="form-control" id="info" name="info" value="{{ old('info') }}"
                                        placeholder="Masukan Info" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
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
                            <div class="modal-footer justify-content-between">
                                <td>
                                    <a type="button" href="{{ route('superadmin.service.index') }}"
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
<script src="{{asset('back/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
@push('script')
<script>
    $(function () {
      bsCustomFileInput.init();
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize autoNumeric on the input field
        new AutoNumeric('#harga', {
            currencySymbol: 'Rp. ',
            decimalCharacter: ',',
            digitGroupSeparator: '.',
            decimalPlaces: 0,
            unformatOnSubmit: true,
        });
    });
</script>
@endpush


