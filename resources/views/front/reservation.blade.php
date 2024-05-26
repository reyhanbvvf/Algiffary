@extends('master.main')

@section('content')
<div class="second-page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2>BLUD INTAN HIJAU</h2>
          <h4></h4>
          <p></p>
          <div class="main-button"><a href="about.html">Tentang BLUD</a></div>
        </div>
      </div>
    </div>
  </div>

  <div class="more-info reservation-info">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-phone"></i>
            <h4>Kontak HP/WA</h4>
            <a href="https://api.whatsapp.com/send?phone=6282150008231&amp;text=Permisi%20mau%20menggunakan%20jasa%20BLUD%20Intan%20Hijau">+6821-5000-8231</a>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-envelope"></i>
            <h4>Kontak via Email</h4>
            <a href="https://mail.google.com/mail/u/0/?view=cm&tf=1&fs=1&to=bludintanhijau@gmail.com">bludintanhijau@gmail.com</a>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa-solid fa-location-dot"></i>
            <h4>Visit Lokasi</h4>
            <a href="https://www.google.com/maps/place/BLUD+INTAN+HIJAU/@-3.4383947,114.8792743,17z/data=!4m21!1m14!4m13!1m6!1m2!1s0x2de680f4b8b44f4d:0xa4dd2dbf91f322a8!2sHV7H%2B3Q2+BLUD+INTAN+HIJAU,+Indra+Sari,+Martapura,+Sungai+Ulin,+Kec.+Banjarbaru+Utara,+Kabupaten+Banjar,+Kalimantan+Selatan+70714!2m2!1d114.8794723!2d-3.437498!1m5!1m1!1s0x2de680f4b8b44f4d:0xa4dd2dbf91f322a8!2m2!1d114.8794723!2d-3.437498!3m5!1s0x2de680f4b8b44f4d:0xa4dd2dbf91f322a8!8m2!3d-3.4373728!4d114.8793829!16s%2Fg%2F11f3tj4qwg?entry=ttu">JL.Chandra Kirana Desa Indrasari Kecamatan Martapura Kota Kabupaten Banjar</a>
          </div>
        </div>
      </div>
    </div>
  </div>

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
@endsection
