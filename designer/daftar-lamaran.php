
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Enlink - Admin Dashboard Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../assets-enlink/images/logo/favicon.png" />

    <!-- page css -->
    <link
      href="../assets-enlink/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css"
      rel="stylesheet"
    />

    <!-- Core css -->
    <link href="../assets-enlink/css/app.min.css" rel="stylesheet" />
  </head>

  <body>
    <div class="app">
      <div class="layout">
        <!-- Header START -->
        <?php include('header.php'); ?>
        <!-- Header END -->

        <!-- Side Nav START -->
        <?php include('side-navbar.php');
        
            if(!isset($_SESSION['level']) || $_SESSION['level'] != 'designer'){
            $_SESSION['err'] = 'Anda tidak memiliki akses pada halaman ini';
            header("Location: ../index.php");
            }
            require_once('../config/koneksi.php');
        
            // Get all jobs
            $id_user = $_SESSION['id'];
            $sql = "SELECT pekerjaan.*, lamaran_pekerjaan.* 
            FROM lamaran_pekerjaan
            JOIN pengguna ON pengguna.id = lamaran_pekerjaan.id_pelamar
            JOIN pekerjaan ON pekerjaan.id_pekerjaan = lamaran_pekerjaan.id_pekerjaan
            WHERE pengguna.id = '$id_user'";
            $result = $conn->query($sql);

            $rows = $result->fetch_all(MYSQLI_ASSOC);
        ?>
        <!-- Side Nav END -->


        <!-- Page Container START -->
        <div class="page-container">
          <!-- Content Wrapper START -->
          <div class="main-content">
            <div class="row">
              <div class="col-12">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul Pekerjaan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $i = 0;
                        foreach($rows as $row) {
                        $i++;
                      

                        ?>
                        <tr>
                        <th scope="row"><?= $i?></th>
                        <td><?= $row['judul_pekerjaan']?></td>
                        <td><?= $row['status']?></td>
                        <td>
                          
                          <a class="btn btn-danger m-r-5" href="controller/user_crud.php?hapus=<?= $row['id']?>">Delete</a>
                        </td>
                      </tr>
                    <?php } ?>
                      
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
    <script src="../assets-enlink/js/vendors.min.js"></script>

    <!-- page js -->
    <script src="../assets-enlink/vendors/chartjs/Chart.min.js"></script>
    <script src="../assets-enlink/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="../assets-enlink/js/pages/dashboard-project.js"></script>

    <!-- Core JS -->
    <script src="../assets-enlink/js/app.min.js"></script>
  </body>
</html>
