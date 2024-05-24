@extends('master.back')
@section('title')Dashboard @endsection
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><b>Dashboard</b></h1>
            <ul></ul>
            <h4 class="m-0"
                style="display: inline-block; padding: 10px 20px; background-color: #18970a; color: #ffffff; border-radius: 5px; text-align: center;"
                >Pengangkutan Sampah Ke TPA
            </h4>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Peraturan Bupati Banjar</a></li>
              <li class="breadcrumb-item"><a href="https://jdih.banjarkab.go.id/pencarian?q=sampah&jenis_peraturan=62&nomor_peraturan=19&tahun_terbit=2023">Nomor 19 Tahun 2023</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="row">
      @foreach($data as $d)
          <div class="col-lg-6 mb-4">
              <div class="card">
                  {{-- Tambahkan kondisi untuk memastikan bahwa file gambar ada --}}
                  @if($d->foto)
                      <img src="{{ asset('storage/service/'.$d->foto) }}" class="card-img-top" alt="{{ $d->nama }}">
                  @endif 

                  <div class="card-body">
                      <h5 class="card-title text-center">{{ $d->nama }}</h5>
                      <p class="card-text">{{ $d->deskripsi }}</p>
                      <hr>
                      <ul class="list-group list-group-flush">
                          <li class="list-group-item">
                              <i class="fa fa-check-square"></i>
                              <span class="list">{{ $d->info }}</span>
                          </li>
                          <li class="list-group-item">
                              <i class="fa fa-check-square"></i>
                              <span class="list">{{ $d->status }}</span>
                          </li>
                      </ul>

                      <div class="main-button mt-3">
                          <a href="{{ route('reservation') }}" class="btn btn-primary">Pesan Sekarang</a>
                      </div>
                  </div>
              </div>
          </div>
      @endforeach
  </div>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection

