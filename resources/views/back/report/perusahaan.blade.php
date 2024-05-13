<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        h4,
        h2 {
            font-family: serif;
        }

        body {
            font-family: sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th {
            text-align: center;
        }

        td {
            text-align: center;
        }

        br {
            margin-bottom: 5px !important;
        }

        .judul {
            text-align: center;
        }

        .header {
            margin-bottom: 0px;
            text-align: center;
            height: 110px;
            padding: 0px;
        }

        .pemko {
            width: 80px;
        }

        .logo {
    float: left;
    margin-right: 0px;
    width: 10%;
    padding: 0px;
    text-align: right;
}

.logo img {
    max-width: 100%;
    height: auto;
}


        .headtext {
            float: right;
            margin-left: 0px;
            width: 72%;
            padding-left: 0px;
            padding-right: 10%;
        }

        hr {
            margin-top: 10%;
            height: 3px;
            background-color: black;
            width: 100%;
        }

        .ttd {
            margin-left: 65%;
            text-align: center;
            text-transform: uppercase;
        }

        .text-right {
            text-align: right;
        }

        .isi {
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="logo">
            <img rel="icon" src="{{asset('front/assets/images/banjar.png')}}" type="image/x-icon">
        </div>
        <div class="headtext">
            <h3 style="margin:0px;">PEMERINTAH KOTA BANJARBARU </h4>
            <h4 style="margin:0px;">BADAN PENANGGULANGAN BENCANA DAERAH</h4>
            <p style="margin:0px;">Jalan Trikora No.1 Banjarbaru Kalimantan Selatan Kode Pos 70713
                Telp.08115130453-081253951966 email:bpbdbanjarbaru@gmail.com
            </p>
        </div>
        <br>
    </div>
    <div class="container">
        <hr style="margin-top:2px;">
        <div class="isi">
            <h2 style="text-align:center;">LAPORAN PERUSAHAAN</h2>

            <table id="myTable" class="table table-bordered table-striped dataTable no-footer text-center" role="grid"
                aria-describedby="myTable_info">
                <thead>

                    <tr>
                        <th>No</th>
                        <th>Nama Perusahaan</th>
                        <th>Alamat</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)

                    <tr>
                        <td style="text-align: left">{{$loop->iteration}}</td>
                        <td style="text-align: left">{{$d->nama}}</td>
                        <td style="text-align: left">{{$d->alamat}}</td>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <br>
            <br>
            <div class="ttd">
                <p style="margin:0px"> BPBD BANJARBARU,</p>
                <h6 style="margin:0px"></h6>
                <h5 style="margin:0px"> </h5>
                <br>
                <br>
                <div class="">


                <br>
                <br>
                <h5 style="text-decoration:underline; margin:0px"></h5>
                {{-- <h5 style="margin:0px">NIP. 19710830 199101 1 002</h5> --}}
            </div>
        </div>
    </div>
</body>

</html>
