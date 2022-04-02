<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Login and Registration Form in HTML & CSS | CodingLab </title>-->
    <link rel="stylesheet" href="../auth/css/style.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="../auth/images/peduli diri.jpg" alt="">
        <div class="text">
          <span class="text-1">Selamat Datang di <br> Peduli diri</span>
          <span class="text-2"></span>
        </div>
      </div>
      <div class="back">
        <img class="backImg" src="../auth/images/backImg.jpg" alt="">
        <div class="text">
          <span class="text-1">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Login</div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input id  type="text" placeholder="Nik" name="nik" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Masukan password" name ="password" required>
              </div>
              {{-- <div class="text"><a href="#">Lupa password?</a></div> --}}
              <div class="button input-box">
                <input type="submit" value="Login">
              </div>
              <div class="text sign-up-text">Tidak punya akun?<label for="flip">Daftar sekarang!</label></div>
            </div>
        </form>
      </div>
        <div class="signup-form">
          <div class="title">Daftar</div>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Masukan nama " name ="name" required>
              </div>
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Masukan nik" name ="nik" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Masukan email" name="email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Masukan password" name = "password" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Masukan password kembali" name = "password_confirmation" required>
              </div>
              <div class="button input-box">
                <input type="submit" value="Daftar Sekarang">
              </div>
              <div class="text sign-up-text">Sudah Punya Akun? <label for="flip">Masuk Sekarang </label></div>
            </div>
      </form>
    </div>
    </div>
    </div>
  </div>
</body>
</html>
