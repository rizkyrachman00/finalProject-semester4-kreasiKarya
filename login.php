<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kreasi-Karya</title>
    <link rel="stylesheet" href="assets/css/index-style.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />
  </head>

  <body>
    <main>
      <div class="box">
        <div class="inner-box">
          <div class="form-wrap">
            <!-- sign in form -->
            <form action="controller/auth_controller.php" method="POST" autocomplete="off" class="sign-in-form">
              <div class="logo">
                <img src="assets/img/logo.png" alt="logo" class="logo" />
                <h3>Kreasi Karya</h3>
              </div>
              <div class="heading">
                <h2>Selamat Datang</h2>
                <h6>Belum Punya Akun ?</h6>
                <a href="#" class="toggle">Buat Akun</a>
              </div>
              <!-- username -->
              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                    minlength=3"
                    autocomplete="off"
                    class="input-field"
                    required
                    id="signIn-nama"
                    name="username"
                  />
                  <label>Username</label>
                </div>
              </div>
              <!-- password -->
              <div class="actual-form">
                <div class="input-wrap">
                  <input
                  name="password"
                    type="password"
                    minlength="3"
                    autocomplete="off"
                    class="input-field"
                    required
                    id="signIn-password"
                  />
                  <label for="pass">KATA SANDI</label>
                </div>

                <!-- button sign-in -->
                <input
                  type="submit"
                  value="Masuk"
                  class="sign-btn"
                  name="login"
                />
               
                <p class="text">
                  Lupa Password ?
                  <a href="#">Butuh Bantuan ?</a> Masuk
                </p>
              </div>
            </form>

            <!-- sign up form -->
            <form action="controller/auth_controller.php " method="POST" autocomplete="off" class="sign-up-form">
              <div class="logo">
                <img src="assets/img/logo.png" alt="logo" class="logo" />
                <h3>Kreasi Karya</h3>
              </div>
              <div class="heading">
                <h2>Dapat Dimulai</h2>
                <h6>Sudah Punya Akun ?</h6>
                <a href="#" class="toggle">Masuk</a>
              </div>
              <!-- username -->
              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                    minlength="3"
                    autocomplete="off"
                    class="input-field"
                    required
                    id="signUp-nama"
                    name="full_name"
                  />
                  <label>Nama</label>
                </div>
              </div>
              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                    minlength="3"
                    autocomplete="off"
                    class="input-field"
                    required
                    id="signUp-nama"
                    name="username"
                  />
                  <label>Username</label>
                </div>
              </div>

              <!-- email -->
              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="email"
                    minlength="3"
                    autocomplete="off"
                    class="input-field"
                    required
                    id="signUp-email"
                    name="email"
                  />
                  <label>Email</label>
                </div>
              </div>

              <!-- password -->
              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="password"
                    minlength="3"
                    autocomplete="off"
                    class="input-field"
                    required
                    id="signUp-password"
                    name="password"
                  />
                  <label for="pass">Password</label>
                </div>
                
                <div class="position-relative">
                  
                <div class="form-check form-check-inline">
                  <input required class="form-check-input" type="radio" name="role" id="inlineRadio1" value="client">
                  <p class="form-check-label" for="inlineRadio1">Client</p>
                </div>
                <div class="form-check form-check-inline">
                  <input required class="form-check-input" type="radio" name="role" id="inlineRadio2" value="designer">
                  <p class="form-check-label" for="inlineRadio2">Designer</p>
                </div>
                </div>
                <!-- button sign-up -->
                <input
                  type="submit"
                  value="Daftar"
                  class="sign-btn"
                  name="register"
                />
               
                <p class="text">
                  Setelah Melakukan Pendaftaran, Saya Setuju
                  <a href="#">Aturan Yang Ada</a> dan
                  <a href="#">Kebijakan Privasi</a>
                </p>
              </div>
            </form>
          </div>

          <div class="carousel">
            <div class="images-wrapper">
              <img src="assets/img/1.png" class="image img-1 show" alt="" />
              <img src="assets/img/2.png" class="image img-2" alt="" />
              <img src="assets/img/3.png" class="image img-3" alt="" />
            </div>

            <div class="text-slider">
              <div class="text-wrap">
                <div class="text-group">
                  <h2>Website dibuat sepenuh hati</h2>
                  <h2>Ngoding aja dulu jagonya belakangan</h2>
                  <h2>Selalu Penasaran</h2>
                </div>
              </div>
            </div>

            <div class="bullets">
              <span class="active" data-value="1"></span>
              <span data-value="2"></span>
              <span data-value="3"></span>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- js file -->
    <script src="assets/js/index-apps.js"></script>
  </body>
</html>
