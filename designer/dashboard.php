<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Kreasi Karya</title>

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
        <?php include('side-navbar.php'); ?>
        <!-- Side Nav END -->

        <!-- Page Container START -->
        <div class="page-container">
          <!-- Content Wrapper START -->
          <div class="main-content">
            <div class="page-header no-gutters">
              <div
                class="d-md-flex align-items-md-center justify-content-between"
              >
                <div class="media m-v-10 align-items-center">
                  <div class="avatar avatar-image avatar-lg">
                    <img src="../assets-enlink/images/avatars/thumb-3.jpg" alt="" />
                  </div>
                  <div class="media-body m-l-15">
                    <h4 class="m-b-0">Selamat Datang <?= $_SESSION['nama_pengguna'] ?></h4>
                  </div>
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

       
        <!-- Quick View END -->
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
