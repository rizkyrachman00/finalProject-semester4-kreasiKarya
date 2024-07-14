<?php

  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    
  </head>

  <body>
    <div class="container">
      <h1 class="text-center">Profil Desainer</h1>

      <div class="row">
        <div class="col-lg-4">
          <img src="<?php if($_SESSION['foto_profil'] == ''){
            echo '../assets/img/default.png';
          }?>" alt="Foto Profil" class="img-fluid" />
          <h2>Nama Desainer</h2>
          <p>Email: designer@example.com</p>
          <p>Lokasi: Jakarta, Indonesia</p>
        </div>
        <div class="col-lg-8">
          <h2>Portofolio</h2>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Judul Proyek 1</h5>
              <p class="card-text">Deskripsi proyek 1...</p>
              <button class="btn btn-success">Setujui</button>
              <button class="btn btn-danger">Tolak</button>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Judul Proyek 2</h5>
              <p class="card-text">Deskripsi proyek 2...</p>
              <button class="btn btn-success">Setujui</button>
              <button class="btn btn-danger">Tolak</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
