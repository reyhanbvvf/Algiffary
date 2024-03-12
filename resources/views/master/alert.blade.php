<script>
    @if(Session::has('success'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("{{ session('success') }}");
    @endif

    @if(Session::has('error'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('warning'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.warning("{{ session('warning') }}");
    @endif
</script>

<style>
    /* navigasi master */
    .nav li a {
        transition: color 0.3s; /* Efek transisi untuk perubahan warna teks */
    }

    .nav li a:hover {
        color: red; /* Warna teks saat mouse mengarah padanya */
    }

    /* Efek 'scroll after' */
    .nav li a:after {
        content: ""; /* Menambahkan konten pseudo-element setelah tautan */
        display: block; /* Menjadikan pseudo-element sebagai blok */
        width: 0; /* Mulai dengan lebar nol */
        height: 2px; /* Tinggi garis bawah */
        background-color: rgb(255, 251, 0); /* Warna garis bawah */
        transition: width 0.3s; /* Efek transisi untuk perubahan lebar */
    }

    .nav li a:hover:after {
        width: 100%; /* Perbesar lebar saat mouse mengarah padanya */
    }

    .custom-button {
        display: inline-block;
        padding: 8px 20px;
        background-color: #FF0000; /* Warna latar belakang */
        color: #fff; /* Warna teks */
        border-radius: 5px; /* Sudut bulat */
        text-decoration: none; /* Hapus garis bawah bawaan */
        transition: background-color 0.3s ease; /* Efek transisi saat hover */
    }

    .custom-button:hover {
        background-color: #0000FF; /* Warna latar belakang saat hover */
    }
</style>
