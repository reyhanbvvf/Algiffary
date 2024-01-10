<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>BLUD INTAN HIJAU</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('front/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('front/assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/templatemo-woox-travel.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/owl.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/animate.css')}}">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link rel="icon" href="{{asset('front/assets/images/banjar.png')}}" sizes="32x32" type="image/png">
<!--

TemplateMo 580 Woox Travel

https://templatemo.com/tm-580-woox-travel

-->

  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="">
                      <br>
                        <img src="{{asset('front/assets/images/banjar.png')}}" width="200" height="100" alt="Deskripsi gambar">



                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="{{route('home')}}" class="active">Home</a></li>
                        <li><a href="{{route('front.about')}}">Visi Misi</a></li>
                        <!-- <li><a href="deals.html">Visi Misi</a></li> -->
                        <li><a href="{{route('front.reservation')}}">Pesan Layanan</a></li>
                        <li><a href="{{route('front.login')}}">Masuk</a></li>
                        <!-- <li><a href="reservation.html">Book Yours</a></li> -->
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <!-- ***** Main Banner Area Start ***** -->
  @yield('content')


  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2023 <a href="#">SAL-IH</a> <!-- BADAN LAYANAN UMUM DAERAH INTAN HIJAU adalah Satuan Kerja Perangkat Daerah (SKPD) di lingkungan Pemerintah Kabupaten Banjar yang dibentuk untuk memberikan pelayanan kepada masyarakat berupa penyediaan barang/jasa yang dijual tanpa mengutamakan mencari keuntungan.  -->
          <br>Design: <a href="https://templatemo.com" target="_blank" title="free CSS templates">DLH KABUPATEN BANJAR</a></p>



        </div>

      </div>
    </div>

  </footer>


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('front/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('front/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

  <script src="{{asset('front/assets/js/isotope.min.js')}}"></script>
  <script src="{{asset('front/assets/js/owl-carousel.js')}}"></script>
  <script src="{{asset('front/assets/js/wow.js')}}"></script>
  <script src="{{asset('front/assets/js/tabs.js')}}"></script>
  <script src="{{asset('front/assets/js/popup.js')}}"></script>
  <script src="{{asset('front/assets/js/custom.js')}}"></script>

  <script>
    function bannerSwitcher() {
      next = $('.sec-1-input').filter(':checked').next('.sec-1-input');
      if (next.length) next.prop('checked', true);
      else $('.sec-1-input').first().prop('checked', true);
    }

    var bannerTimer = setInterval(bannerSwitcher, 5000);

    $('nav .controls label').click(function() {
      clearInterval(bannerTimer);
      bannerTimer = setInterval(bannerSwitcher, 5000)
    });
  </script>

  </body>

</html>
