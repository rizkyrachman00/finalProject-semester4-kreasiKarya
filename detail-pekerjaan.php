<?php
  require_once('config/koneksi.php');

  
  if(!isset($_GET['id'])){

    header("Location: index.php");
  }
  // Get all jobs
  $id = $_GET['id'];
  $sql = "SELECT * FROM pekerjaan WHERE id_pekerjaan='$id'";
  $result = $conn->query($sql);
  $rows = $result->fetch_all(MYSQLI_ASSOC);
  function formatGaji($gaji)
    {
        $formattedGaji = number_format($gaji, 0, ',', '.');
        return 'Rp. ' . $formattedGaji;
    }

    function formatTanggal($tanggal)
    {
        $formattedTanggal = date('d M Y', strtotime($tanggal));
        return $formattedTanggal;
    }


   
 

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>homepage</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="assets/css/style.css" />
    <style>
      .navbar {
        position: sticky;
      }
    </style>
  </head>
  <body>
    <?php 
    
    include 'partials/navbar.php';
    
    if(isset($_POST['lamar']) && $_SESSION['level'] == 'designer'){
      $id_pekerjaan = $_POST['id_pekerjaan'];
      $id_pelamar = $_POST['id_pelamar'];
      $sql = "INSERT INTO lamaran_pekerjaan (id_pelamar,id_pekerjaan,status) VALUES ('$id_pelamar','$id_pekerjaan','pending')";
      $result = $conn->query($sql);
    
        echo "<script>alert('Lamaran berhasil dikirim')</script>";
      header("Location: designer/dashboard.php");
    }
    ?>
    
    <style>
      main {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
      }

      .content-container {
        text-align: center;
        background-image: url("images/bg.png");
        height: 500px;
        padding-top: 100px;
        padding-right: 100px;
        padding-left: 100px;
      }
    </style>

   
    <div class="mt-5 container list-desain">
      <div class="row">
        
        <div class="col-8 mx-auto">
            <img src="assets/user/pekerjaan/file_64b0235e15e4d.png" class="img-pekerjaan-detail" alt="">
          <h1 class="mt-3"><?= $rows[0]['judul_pekerjaan']?></h1>
          <p><?= $rows[0]['deskripsi_pekerjaan']?></p>
          <h6 class="mt-2">Gaji : <span class="fw-bold"> <?= formatGaji($rows[0]['gaji'])?></span></h6>
          <h6 class="mt-2">Tanggal Mulai : <span class="fw-bold"> <?= formatTanggal($rows[0]['tanggal_mulai'])?></span></h6>
          <h6 class="mt-2">Tanggal Berakhir : <span class="fw-bold"><?= formatTanggal($rows[0]['tanggal_akhir'])?></span></h6>
          <div class="row">
            <div class="col-5 mx-auto mt-4">
              <form action="" method="post">
              <?php 
               if (session_status() === PHP_SESSION_NONE) {
                session_start();
              }
              $id_pelamar = $_SESSION['id'];
              $id_pekerjaan = $_GET['id'];
              ?>
              <input type="text" hidden name="id_pekerjaan" value="<?= $id_pekerjaan?>">
              <input type="text" hidden name="id_pelamar" value="<?= $id_pelamar?>">
              <button class="btn col-12 btn-primary" type="submit" name="lamar">Lamar</button>

              </form>
          </div>
          </div>

          <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="proses-lamaran.php" method="POST">
                  <div class="mb-3">
                      <label for="nama">Nama</label>
                      <input type="text" class="form-control" name="nama" id="nama" required>
                  </div>
                  <div class="mb-3">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email" id="email" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Kirim Lamaran</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>

                   </form>

                </div>
              
              </div>
            </div>
          </div> -->
        </div>
        
      </div>
    </div>
      <?php include('partials/footer.php')?>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
