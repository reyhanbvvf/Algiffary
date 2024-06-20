@extends('master.back')
@section('title')
Permohonan
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Permohonan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('superadmin.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Permohonan </li>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <td>
                            <a href="{{ route('superadmin.permohonan.create') }}" class="btn btn-primary">
                                <span><i class="feather icon-plus"></i> Tambah Permohonan</span>
                            </a>
                            <td>
                                <button class="btn btn-info dropdown-toggle float-right" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span><i class="feather icon-plus"></i>Cetak</span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="{{route('superadmin.report.perusahaan')}}" target="_blank">Perusahaan</a>
                                    <button type="button" class="dropdown-item" data-toggle="modal" data-target="#filterModal">
                                        pendapatan
                                    </button>
                                </div>
                            </td>
                        </td>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Status</th>
                                    <th>Tipe Permohonan</th>
                                    <th>Nomor Surat</th>
                                    <th>Masa Berlaku</th>
                                    <th>Info</th>
                                    <th>Dokumen</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($data as $d )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $d->user->profil->nama ?? '-' }}</td>
                                    <td>{{ $d->status }}</td>
                                    <td>{{ $d->tipe_permohonan }}</td>
                                    <td>{{ $d->no_surat ? $d->no_surat : '-' }}</td>
                                    <td>{{ isset($d->tgl_awal) ? \Carbon\Carbon::parse($d->tgl_awal)->format('d-M-y') : '-' }} s/d {{ isset($d->tgl_berakhir) ? \Carbon\Carbon::parse($d->tgl_berakhir)->format('d-M-y') : '-' }}
                                    </td>
                                    <td>{{ $d->statuspelayanan }}</td>
                                    <td><a href="{{ url('storage/dokumen/'.$d->dokumen) }}" target="_blank">Lihat Dokumen</a> </td>
                                    <td>
                                        <a class="btn btn-sm btn-success text-white" href="{{ route('superadmin.tagihan.index', $d->id) }}">
                                            <i class="fas fa-receipt"></i>
                                          </a>
                                        <a class="btn btn-sm btn-info text-white" href="{{ route('superadmin.permohonan.edit', $d->id) }}">
                                            <i class="fas fa-edit"></i>
                                          </a>
                                        <button data-target="#modaldelete" data-toggle="modal" type="button"
                                            class="delete btn btn-sm bg-danger"
                                            data-link="{{ route('superadmin.permohonan.destroy',$d->id) }}">
                                            <i class="fas fa-times"></i>
                                        </button>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>


                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
      </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @include('master.delete')
  @include('back.superadmin.permohonan.filter')

@endsection

@push('script')
    <script>
        $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": [""]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        });
    </script>

    <script>
        $('.delete').on('click', function(){
        var link = $(this).data('link');
        $('#formDelete').attr('action',link)
        });
    </script>
@endpush
