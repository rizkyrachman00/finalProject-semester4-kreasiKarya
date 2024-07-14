
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Kreasikita</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" />

    <!-- page css -->
    <link
      href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css"
      rel="stylesheet"
    />

    <!-- Core css -->
    <link href="assets/css/app.min.css" rel="stylesheet" />
  </head>

  <body>
    <div class="app">
      <div class="layout">
         <!-- Header START -->
         <?php include('header.php');
         
         if(!isset($_SESSION['level']) || $_SESSION['level'] != 'client'){
          $_SESSION['err'] = 'Anda tidak memiliki akses pada halaman ini';
          header("Location: ../index.php");
        }
        require_once('../config/koneksi.php');
      
        // Get all jobs
        $id_pekerjaan = $_GET['id'];
        $sql = "SELECT pekerjaan.*, lamaran_pekerjaan.* , pengguna.*
        FROM lamaran_pekerjaan
        JOIN pengguna ON pengguna.id = lamaran_pekerjaan.id_pelamar
        JOIN pekerjaan ON pekerjaan.id_pekerjaan = lamaran_pekerjaan.id_pekerjaan
        WHERE pekerjaan.id_pekerjaan = '$id_pekerjaan'";
        $result = $conn->query($sql);
        $rows = $result->fetch_all(MYSQLI_ASSOC);

         ?>
        <!-- Header END -->
        
        <!-- Side Nav START -->
        <?php include('side-navbar.php'); ?>
        <!-- Side Nav END -->
    
        
        <!-- Page Container START -->
        <div class="page-container">
          <!-- Content Wrapper START -->
          <div class="main-content">
            <div class="row">
              <h1>Daftar Pelamar UI/UX Designer</h1>

              <div class="col-12">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Pelamar</th>
                        <th scope="col">Email</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $i = 0;
                      foreach($rows as $row):;
                      
                      $i++;
                      ?>
                        <tr>
                          <th scope="row"><?= $i?></th>
                          <td><?= $row['nama_pengguna']?></td>
                          <td><?= $row['email']?> </td>
                          <td>
                            <button class="btn btn-success m-r-5">Terima</button>
                            <button class="btn btn-danger m-r-5">Tolalk</button>
                          </td>
                      </tr>
                      <?php endforeach;?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- Content Wrapper END -->

          <!-- Footer START -->
          <footer class="footer">
            <div class="footer-content">
              <p class="m-b-0">
                Copyright © 2019 Theme_Nate. All rights reserved.
              </p>
              <span>
                <a href="" class="text-gray m-r-15">Term &amp; Conditions</a>
                <a href="" class="text-gray">Privacy &amp; Policy</a>
              </span>
            </div>
          </footer>
          <!-- Footer END -->
        </div>
        <!-- Page Container END -->
      </div>
    </div>

    <!-- Core Vendors JS -->
    <script src="assets/js/vendors.min.js"></script>

    <!-- page js -->
    <script src="assets/vendors/chartjs/Chart.min.js"></script>
    <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="assets/js/pages/dashboard-project.js"></script>

    <!-- Core JS -->
    <script src="assets/js/app.min.js"></script>
  </body>
</html>
