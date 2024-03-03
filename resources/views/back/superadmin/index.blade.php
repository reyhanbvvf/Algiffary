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
          </div><!-- /.col -->
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
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <i class="fa fa-star"></i>
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
                <h3>Rp. 200.000<sup style="font-size: 20px"></sup></h3>

                <p>Dalam Kota</p>
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
                <h3>Rp. 300.000</h3>

                <p>Luar Kota</p>
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
                <h3>Rp. 550.000</h3>

                <p>Khusus (Dalam Kota)</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #850505; color: #ffffff;">
              <div class="inner">
                <h3>Rp. 650.000</h3>

                <p>Khusus (Luar Kota)</p>
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

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"
                        style="display: inline-block; padding: 10px 20px; background-color: #0839ff; color:yellow; border-radius: 5px; text-align: center;"
                        >Sedot Limbah / Tinja<sup style="font-size: 20px"> (Dalam Kota)</sup>
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>

          <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>Rp. 200.000</h3>

                  <p>Septi tank Komunal</p>
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
                  <h3>Rp. 500.000<sup style="font-size: 20px">★</sup></h3>

                  <p>Rumah Tangga</p>
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
                  <h3>Rp. 600.000</h3>

                  <p>Rumah Sakit</p>
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
                  <h3>Rp. 700.000</h3>

                  <p>Hotel</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-link">
                  <div class="inner">
                    <h3>Rp. 800.000</h3>

                    <p>Industri</p>
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

          <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"
                        style="display: inline-block; padding: 10px 20px; background-color: #0839ff; color:yellow; border-radius: 5px; text-align: center;"
                        ><blockqoutes>Sedot Limbah / Tinja<sup style="font-size: 20px"> (Luar Kota)</sup></blockqoutes>
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>

          <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>Rp. #</h3>

                  <p>Septi tank Komunal</p>
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
                  <h3>Rp. 650.000<sup style="font-size: 20px"></sup></h3>

                  <p>Rumah Tangga</p>
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
                  <h3>Rp. 800.000</h3>

                  <p>Rumah Sakit</p>
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
                  <h3>Rp. 950.000</h3>

                  <p>Hotel</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-link">
                  <div class="inner">
                    <h3>Rp. 1.100.000</h3>

                    <p>Industri</p>
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
                <!-- <div class="row">
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


                              </div>
                          </div>
                      </div>
                  @endforeach
                </div> -->

          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection

