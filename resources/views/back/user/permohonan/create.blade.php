@extends('master.back')

@section('title')
Ajukan Permohonan
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ajukan Permohonan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('user.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Ajukan Permohonan</li>
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
                        <form method="post" action="{{ route('user.permohonan.userStore') }}" enctype="multipart/form-data">
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
                                    <label for="service">Pilih Layanan</label>
                                        <select name="service_id[]" id="service" class="form-control select2 " data-dropdown-css-class="select2-purple" multiple="multiple" data-placeholder="Select Service" style="width: 100%;">
                                            @foreach($service as $s)
                                            <option value="{{ $s->id }}" {{ in_array($s->id, old('s', [])) ? 'selected' : '' }}>{{ $s->nama }}</option>
                                        @endforeach
                                        </select>
                                    </div>
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
                                    <a type="button" href="{{ route('user.index') }}"
                                        class="btn btn btn-danger">Kembali ke dashboard</a>
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
