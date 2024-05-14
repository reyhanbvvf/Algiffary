@extends('master.back')
@section('title')
Peta Perusahaan
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Peta Perusahaan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('superadmin.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Peta Perusahaan </li>
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

                        <div id="map"></div>

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
        var map = L.map('map').setView([-3.3571046, 115.0606351], 10);

        // Define base layers
        var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var gmap = L.tileLayer('http://{s}.google.com/vt?lyrs=m,h&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        });

        var gsmap = L.tileLayer('http://{s}.google.com/vt?lyrs=s,h&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        });

        // Define overlay layer
        var category2Layer = L.layerGroup();

        // Add overlay layer to overlayMaps object
        var overlayMaps = {
            "Perusahaan": category2Layer,
        };

        // Add layers control to the map with all layers selected by default
        var layerControl = L.control.layers({
            "OpenStreetMap": osm,
            "Google Maps": gmap,
            "Google Satellite Maps": gsmap
        }, overlayMaps, {
            collapsed: false // Show the layers control expanded by default
        }).addTo(map);

        // Add the overlay layer to the map
        category2Layer.addTo(map);

        // Iterate over Kebakaran data and add markers to category2Layer
        @foreach($data as $d)

        // Initialize popup content
        var popupContent = `<div class="custom-popup">`;

        popupContent += `<b>Perusahaan</b><br>
                        <b>Nama Perusahaan :</b><br>{{ $d->nama ? $d->nama : '-' }}<br>
                        <br>
                        <b>Alamat :</b><br>{{ $d->alamat }}<br>
                        <br>
                        <b>Foto :</b><br>`;

        // Check if photos are available
        @if ($d->foto)
            popupContent += `<div style="text-align: center;"><img src="{{ asset('storage/user/' . $d->foto) }}" class="img-fluid" alt="Foto Perusahaan" style="max-width: 200px; max-height: 200px; margin: 0 auto;"></div><br>`; // Center the image
        @else
            // If no photos available, display a message
            popupContent += `No photos available<br>`;
        @endif

        // Add a link to view details
        popupContent += `<br>`
                        ;

        popupContent += `</div>`;

        // Create marker and bind popup
        var marker = L.marker([{{ $d->latitude }}, {{ $d->longitude }}]).addTo(category2Layer);
        marker.bindPopup(popupContent, { maxWidth: 400, maxHeight: 400 }); // Set the maximum width and height of the popup container
        @endforeach
    </script>


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
