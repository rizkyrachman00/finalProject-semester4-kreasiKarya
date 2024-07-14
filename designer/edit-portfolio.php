<?php
  session_start();
  if(!isset($_SESSION['level']) || $_SESSION['level'] != 'designer'){
    $_SESSION['err'] = 'Anda tidak memiliki akses pada halaman ini';
    header("Location: ../index.php");
  }

  if(!isset($_GET['id'])){
    header("Location: dashboard.php");
  }

  require_once('../config/koneksi.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM design WHERE id='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc()

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
    required  
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
              <div class="card">
                <div class="card-body">
                  <h5>Buat Lowongan Pekerjaan</h5>
                  <form method="POST" action="controller/designer_crud.php" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="formGroupExampleInput"
                        >Judul Perkerjaan</label
                      >
                      <input
                      required
                      value="<?= $row['judul']?>"
                      name="judul"
                        type="text"
                        class="form-control"
                        id="formGroupExampleInput"
                      />
                    </div>
                    <div class="form-group">
                      <label for="formGroupExampleInput2"
                        >Deskripsi Pekerjaan</label
                      >
                      <textarea
                      placeholder="<?= $row['deskripsi']?>"
                      value="<?= $row['deskripsi']?>"
                      required
                      name="deskripsi"
                        type="text"
                        class="form-control"
                        id="formGroupExampleInput2"
                        
                        rows="5"
                      ></textarea>
                    </div>
                    <div class="form-group">
                      <label for="formGroupExampleInput2">Gambar</label>
                      <div class="custom-file">
                        <input
           
                        name="gambar"
                          type="file"
                          class="custom-file-input col-6"
                          id="customFile"
                        />
                        <label class="custom-file-label" for="customFile"
                          >Pilih gambar</label
                        >
                      </div>
                    </div>
                    <input type="text" hidden name="id" value="<?= $row['id']?>">
                    <button type="submit" 
                    name="edit" class="btn btn-primary">Buat</button>
                  </form>
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
