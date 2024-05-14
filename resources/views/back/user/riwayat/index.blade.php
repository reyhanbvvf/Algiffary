@extends('master.back')
@section('title')
Tagihan Sudah Dibayar
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tagihan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('user.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Tagihan </li>
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
                            {{-- button --}}
                        </td>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Status</th>
                                    <th>Verifikasi</th>
                                    <th>denda</th>
                                    <th>total</th>
                                    <th>Masa Pembayaran</th>
                                    <th>Bukti</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($data as $d )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $d->status_pembayaran ? $d->status_pembayaran : '-' }}</td>
                                    <td>{{ $d->verifikasi ? $d->verifikasi : '-' }}</td>
                                    <td>{{ $d->denda ? $d->denda : '-' }} (%)</td>
                                    <td>{{ $d->total ? 'Rp ' . number_format($d->total, 0, ',', '.') : '-' }}</td>
                                    <td>{{ isset($d->bayar_awal) ? \Carbon\Carbon::parse($d->bayar_awal)->format('d-M-y') : '-' }} - {{ isset($d->bayar_berakhir) ? \Carbon\Carbon::parse($d->bayar_berakhir)->format('d-M-y') : '-' }}
                                    </td>
                                    <td>
                                        @if ($d->bukti)
                                            <a href="{{ url('storage/bukti/'.$d->bukti) }}" target="_blank">Bukti Pembayaran</a>
                                        @else
                                            Belum ada bukti
                                        @endif
                                    </td>
                                    <td>
                                        {{-- button --}}

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
