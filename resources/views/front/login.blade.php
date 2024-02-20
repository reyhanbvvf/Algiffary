@extends('master.main')

@section('content')
  <br>
  <br>
  <br><br>
  <br>
  <!-- ***** Header Area End ***** -->


  <html lang="en">

<head>
    <!-- ... Other meta tags ... -->

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .login-container {
            max-width: 400px;
            margin: 2em auto;
            padding: 1em;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }

        .login-form {
            display: flex;
            flex-direction: column;
        }

        .login-form label,
        .login-form input {
            margin-bottom: 1em;
            width: 100%;
            padding: 0.7em;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1em;
        }

        .password-container {
            position: relative;
        }

        #password {
            border-radius: 4px 4px 0 0;
        }

        #togglePassword {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1.2em;
            color: #777;
        }

        .login-button {
            background-color: #1877f2;
            color: #fff;
            padding: 0.7em;
            border: none;
            border-radius: 4px;
            font-size: 1.2em;
            cursor: pointer;
        }

        .user-photo {
            margin-bottom: 1em;
            border-radius: 50%;
            overflow: hidden;
        }

        .user-photos {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1em;
            width: 100%; /* Ensure the user-photos div takes up the full width */
        }

        .user-photo {
            flex: 1;
            overflow: hidden;
            max-width: auto; /* Adjust the maximum width as needed */
            margin: 0 auto; /* Center the photos */
            border: 2px; /* Add a rectangular border */
            border-radius: 8px; /* Adjust border-radius as needed */
        }

        .user-photo img {
            width: 50%;
            height: 90%; /* Ensure the entire photo is visible without cropping */
            border-radius: 6px; /* Add border-radius to create a circular shape */
        }

        .running-text-container {
            width: 100%; /* Set the width of the container */
            overflow: hidden; /* Hide content that overflows */
            background-color: #FF9D00; /* Background color of the container */
        }

        .running-text {
            white-space: nowrap; /* Prevent text from wrapping */
            animation: marquee 10s linear infinite; /* Apply animation for scrolling */
            color: #000092; /* Text color */
        }

        .slow {
            animation: marquee-slow 23s linear infinite; /* Slow animation duration */
        }

        .medium {
            animation: marquee-medium 20s linear infinite; /* Medium animation duration */
        }

        .fast {
            animation: marquee-fast 18s linear infinite; /* Fast animation duration */
        }

        @keyframes marquee-slow {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }

        @keyframes marquee-medium {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }

        @keyframes marquee-fast {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }

    </style>
    </head>

    <body>

    <div class="login-container">
        <div class="user-photos">
            <div class="user-photo">
                <img src="{{asset('front/assets/images/manis.png')}}" alt="User Photo Left">
            </div>

            <div class="user-photo">
                <img src="{{asset('front/assets/images/logosalih.png')}}" alt="User Photo Right">
            </div>
        </div>
        <h2><b>LOGIN</b></h2>
        <form class="login-form" action="{{route('authenticate')}}" method="post">
          @csrf
            <label for="username">Username:
              <input type="text" id="username" name="username" placeholder="Username" required>
            </label>

            <label for="password" class="password-container">Password:
                <input type="password" id="password" name="password" placeholder="Password" required>
                <button type="button" id="togglePassword" onclick="togglePasswordVisibility()">
                    <i class="fas fa-eye"></i>
                </button>
            </label>

            <button type="submit" class="login-button">Login</button>
            <a href="{{route('register')}}">Daftar Akun</a>
        </form>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById("password");
            const toggleButton = document.getElementById("togglePassword");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleButton.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                passwordInput.type = "password";
                toggleButton.innerHTML = '<i class="fas fa-eye"></i>';
            }
        }
    </script>

    <div class="running-text-container">
        <div class="running-text">
            <p class="slow">Jagalah kebersihan untuk menciptakan lingkungan hidup yang lebih sehat</p>
            <p class="medium">Satu sampah yang telah kau lupakan, akan memberi berbagai dampak yang tak terlupakan di lingkungan.</p>          
            <p class="fast">Alam Semesta ini harus terselamatkan atas sampah-sampah yang akan berada ditempat semestinya.</p>
        </div>
    </div>


  </body>
  </html>

  <br>
  <br><br>
  <br>

      <!-- <style>
          body {
              font-family: Arial, sans-serif;
          }

          .login-container {
              width: 300px;
              margin: 0 auto;
              margin-top: 50px;
              box-shadow: 50px 50px 50px 50px #ccc inset;
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
          <h2> <ul><b class="list-group">
            <a class="list-group-item list-group-item-action active" href="#">SILAHKAN</a>
            <a class="list-group-item list-group-item-action disabled" href="#" tabindex="-1" aria-disabled="true">LOGIN</a>
          </ul></b></h2><br>
          <form action="{{route('authenticate')}}" method="post">
            @csrf
              <label for="username">Username:</label>
              <input type="text" id="username" name="username" required>

              <label for="password">Password:</label>
              <input type="password" id="password" name="password" required>
              <button type="submit">Login</button>
              <a href="{{route('register')}}">Daftar Akun</a>
          </form>
      </div>

  </body>
  </html>
  <br>
  <br><br>
  <br>-->




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

@push('script')
  <script>
    $(".option").click(function(){
      $(".option").removeClass("active");
      $(this).addClass("active");
    });
  </script>
@endpush
