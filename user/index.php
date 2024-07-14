<?php
  session_start();
  if(!isset($_SESSION['level']) || $_SESSION['level'] != 'client'){
    $_SESSION['err'] = 'Anda tidak memiliki akses pada halaman ini';
    header("Location: ../index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
      $pageTitle = 'Designer profile';
      require_once("../partials/head.php");  
    ?>
  </head>

  <body>
    <?php 
      require_once('../partials/navbar.php');
    ?>
    <div class="container">
      <h1 class="text-center">Profil Pengguna</h1>

      <div class="row">
        <div class="col-lg-4">
          <img
            src="<?= ($_SESSION['foto_profil'] == '') ? '../assets/img/default.png' :  $_SESSION['foto_profil'] ?>"
            alt="Foto Profil"
            class="img-fluid"
          />
          <h2><?= $_SESSION['nama_pengguna']?></h2>
          <p>Email: <?= $_SESSION['email']?></p>
          <p>Lokasi: <?= ($_SESSION['lokasi'] == '') ? ' - ' : $_SESSION['lokasi']?></p>
          <button class="btn btn-primary">Edit Profil</button>
        </div>
        <div class="col-lg-8">
          <h2>Desain yang Diunggah</h2>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Judul Desain 1</h5>
              <p class="card-text">Deskripsi desain 1...</p>
              <a href="#" class="btn btn-primary">Lihat Detail</a>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Judul Desain 2</h5>
              <p class="card-text">Deskripsi desain 2...</p>
              <a href="#" class="btn btn-primary">Lihat Detail</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
