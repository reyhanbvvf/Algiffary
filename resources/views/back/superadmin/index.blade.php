@extends('master.back')
@section('title')Dashboard @endsection
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
            <quote class="color text-red"><b>"Pelayanan Kebersihan"</b></quote>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Rp. 80.000</h3>

                <p>Pengelolaan Sampah di TPA</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Angkutan Sampah</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>59</h3>

                <p>Penanganan Sampah</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>Rp. 500.000</h3>

                <p>Sedot Limbah / Tinja</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->

        <div class="col-lg-6 col-sm-6">
            <div class="item">
              <div class="row">
                <div class="col-lg-6">
                  <div class="image">
                    {{-- <img src="{{asset('front/assets/images/logosalih.png')}}" alt=""> --}}
                  </div>
                </div>
                <div class="row">
                  @foreach($data as $d)
                      <div class="col-lg-6 mb-4">
                          <div class="card">
                              {{-- Tambahkan kondisi untuk memastikan bahwa file gambar ada --}}
                              @if($d->foto)
                                  <img src="{{ asset('storage/service/'.$d->foto) }}" class="card-img-top" alt="{{ $d->nama }}">
                              @endif

                              <div class="card-body">
                                  <h5 class="card-title">{{ $d->nama }}</h5>
                                  <p class="card-text">{{ $d->deskripsi }}</p>

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
                                      <a href="{{ route('reservation') }}" class="btn btn-primary"></a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  @endforeach
              </div>

          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection

