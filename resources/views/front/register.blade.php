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
            max-width: 600px;
            margin: 2em auto;
            padding: 1em;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
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
            max-width: 100px; /* Adjust the maximum width as needed */
            margin: 0 auto; /* Center the photos */
            border: 2px solid #ccc; /* Add a rectangular border */
            border-radius: 8px; /* Adjust border-radius as needed */
        }

        .user-photo img {
            width: 100%;
            height: auto; /* Ensure the entire photo is visible without cropping */
            border-radius: 6px; /* Adjust border-radius to match the user-photo border-radius */
        }

        .login-form {
            text-align: left;
            width: 100%;
            text-align: center;
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
            color: #000000; /* Lighter text color */
        }

        .password-container {
          position: relative;
        }

        #password,
        #password_confirmation {
            border-radius: 4px 4px 0 0;
        }

        #togglePassword,
        #toggleConfirmPassword {
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

        .login-button,
        .create-account-button {
            background-color: #FF0000;
            color: #000000;
            padding: 0.7em;
            border: none;
            border-radius: 8px;
            font-size: 1.5em;
            cursor: pointer;
            width: 100%; /* Make the button take up the full width */
            font-weight: bold; /* Bold the button text */
        }

        .login-button:hover,
        .create-account-button:hover {
            background-color: #FFEE00;
        }

        .create-account-section {
            margin-top: 1em;
        }

        .create-account-link {
            color: #4BD10D;
            text-decoration: none;
        }

        .create-account-link:hover {
            text-decoration: underline;
        }

    </style>
    </head>

    <body>

    <div class="login-container">
        <div class="create-account-section">
            <h2><b>Create Account</b></h2>

          <!-- Display validation errors -->

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form class="login-form" action="{{route('authenticate')}}" method="post">
              @csrf
                <label for="name">
                    <input type="text" id="name" name="name" placeholder="Nama" value="{{ old('name') }}" required>
                </label>

                <label for="username">
                    <input type="text" id="username" name="username" placeholder="Username" value="{{ old('username') }}" required>
                </label>

                <label for="email">
                    <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                </label>

                <label for="password" class="password-container">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <button type="button" id="togglePassword" onclick="togglePasswordVisibility('password')">
                        <i class="fas fa-eye"></i>
                    </button>
                </label>

                <label for="password_confirmation" class="password-container">
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password" required>
                    <button type="button" id="toggleConfirmPassword" onclick="togglePasswordVisibility('password_confirmation')">
                        <i class="fas fa-eye"></i>
                    </button>
                </label>

                <button type="submit" class="create-account-button">Daftar Sekarang</button>
            </form>
        </div>
    </div>

    <script>
        function togglePasswordVisibility(inputId) {
            const passwordInput = document.getElementById(inputId);
            const toggleButton = document.getElementById(`toggle${inputId.replace(/-(.)/g, (match, group1) => group1.toUpperCase())}`);

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleButton.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                passwordInput.type = "password";
                toggleButton.innerHTML = '<i class="fas fa-eye"></i>';
            }
        }
    </script>

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
        <h2> <ul class="list-group">
        <a class="list-group-item list-group-item-action active" href="#">Silahkan</a>
        <a class="list-group-item list-group-item-action disabled" href="#" tabindex="-1" aria-disabled="true">Daftar Akun</a>
        </ul></h2><br>
        <br>-->
            <!-- Display validation errors -->

       <!-- <br>
        <form action="{{route('store')}}" method="post">
        @csrf
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="{{ old('username') }}" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="password_confirmation">Konfirmasi Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>

            <button type="submit">Daftar</button>
            <a href="{{route('login')}}">Login</a>
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
