<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>BLUD INTAN HIJAU</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

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
                      <li><a href="about.html">Visi Misi</a></li>
                      <!-- <li><a href="deals.html">Visi Misi</a></li> -->
                      <li><a href="reservation.html">Pesan Layanan</a></li>
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

  <br>
  <br>
  <br><br>
  <br>
  <!-- ***** Header Area End ***** -->

  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <title>Form Login</title>
      <style>
          body {
              font-family: Arial, sans-serif;
          }

          .login-container {
              width: 300px;
              margin: 0 auto;
              margin-top: 50px;
          }

          .login-container label {
              display: block;
              margin-bottom: 8px;
          }

          .login-container input {
              width: 100%;
              padding: 8px;
              margin-bottom: 16px;
              box-sizing: border-box;
          }

          .login-container button {
              background-color: #d3c614;
              color: white;
              padding: 10px 15px;
              border: none;
              border-radius: 4px;
              cursor: pointer;
          }
      </style>
  </head>
  <body>

      <div class="login-container">
          <h2> <ul class="list-group">
            <a class="list-group-item list-group-item-action active" href="#">Silahkan</a>
            <a class="list-group-item list-group-item-action disabled" href="#" tabindex="-1" aria-disabled="true">Login</a>
          </ul></h2><br>
          <form action="proses_login.php" method="post">
              <label for="username">Username:</label>
              <input type="text" id="username" name="username" required>

              <label for="password">Password:</label>
              <input type="password" id="password" name="password" required>

              <button type="submit">Login</button>
          </form>
      </div>

  </body>
  </html>
  <br>
  <br><br>
  <br>




  <!-- <div class="reservation-form">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12469.776493332698!2d-80.14036379941481!3d25.907788681148624!2m3!1f357.26927939317244!2f20.870722720054623!3f0!3m2!1i1024!2i768!4f35!3m3!1m2!1s0x88d9add4b4ac788f%3A0xe77469d09480fcdb!2sSunny%20Isles%20Beach!5e1!3m2!1sen!2sth!4v1642869952544!5m2!1sen!2sth" width="100%" height="450px" frameborder="0" style="border:0; border-top-left-radius: 23px; border-top-right-radius: 23px;" allowfullscreen=""></iframe>
          </div>
        </div>
        <div class="col-lg-12">
          <form id="reservation-form" name="gs" method="submit" role="search" action="#">
            <div class="row">
              <div class="col-lg-12">
                <h4>Make Your <em>Reservation</em> Through This <em>Form</em></h4>
              </div>
              <div class="col-lg-6">
                  <fieldset>
                      <label for="Name" class="form-label">Your Name</label>
                      <input type="text" name="Name" class="Name" placeholder="Ex. John Smithee" autocomplete="on" required>
                  </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                    <label for="Number" class="form-label">Your Phone Number</label>
                    <input type="text" name="Number" class="Number" placeholder="Ex. +xxx xxx xxx" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-6">
                  <fieldset>
                      <label for="chooseGuests" class="form-label">Number Of Guests</label>
                      <select name="Guests" class="form-select" aria-label="Default select example" id="chooseGuests" onChange="this.form.click()">
                          <option selected>ex. 3 or 4 or 5</option>
                          <option type="checkbox" name="option1" value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4+">4+</option>
                      </select>
                  </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                    <label for="Number" class="form-label">Check In Date</label>
                    <input type="date" name="date" class="date" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                  <fieldset>
                      <label for="chooseDestination" class="form-label">Choose Your Destination</label>
                      <select name="Destination" class="form-select" aria-label="Default select example" id="chooseCategory" onChange="this.form.click()">
                          <option selected>ex. Switzerland, Lausanne</option>
                          <option value="Italy, Roma">Italy, Roma</option>
                          <option value="France, Paris">France, Paris</option>
                          <option value="Engaland, London">Engaland, London</option>
                          <option value="Switzerland, Lausanne">Switzerland, Lausanne</option>
                      </select>
                  </fieldset>
              </div>
              <div class="col-lg-12">
                  <fieldset>
                      <button class="main-button">Make Your Reservation Now</button>
                  </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div> -->

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2023 <a href="#">BLUD INTAN HIJAU</a>
<<<<<<< HEAD
          <br>Design: <a href="https://templatemo.com" target="_blank" title="free CSS templates">DPRKPLH KAB.BANJAR</a></p>
=======
          <br>Design: <a href="https://templatemo.com" target="_blank" title="free CSS templates">DPRKPLH KABUPATEN BANJAR</a></p>
>>>>>>> 2c54d62315f5edbdb6cc0426efc7fb120b94cf82
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
    $(".option").click(function(){
      $(".option").removeClass("active");
      $(this).addClass("active");
    });
  </script>

  </body>

</html>
