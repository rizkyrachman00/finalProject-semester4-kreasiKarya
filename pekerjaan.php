<?php
  require_once('config/koneksi.php');

  // Get all jobs
  $sql = "SELECT * FROM pekerjaan";
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
    <?php include 'partials/navbar.php'?>
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
        
        <?php foreach ($rows as $row): ?>
            <div class="col-4 mt-4">
                <div class="card">
                    <img src="assets/user/pekerjaan/<?= $row['gambar'] ?>" class="img-pekerjaan" alt="detail">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['judul_pekerjaan'] ?></h5>
                        <p class="card-text"><?= $row['deskripsi_pekerjaan'] ?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Gaji : <span class="fw-bold"><?= formatGaji($row['gaji']) ?></span></li>
                        <li class="list-group-item">Tanggal Mulai : <span class="fw-bold"><?= formatTanggal( $row['tanggal_mulai'] )?></span> </li>
                    </ul>
                    <div class="card-body align-items-end">
                        <div class="col-3 mx-auto">
                            <a href="detail-pekerjaan.php?id=<?= $row['id_pekerjaan'] ?>" class="ms-auto btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
     
      </div>
    </div>
        <?php include('partials/footer.php') ?>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
