
<?php 
  session_start();
  $level;

  if(isset($_SESSION['level'])){
    $level = ($_SESSION['level'] == 'client') ? 'user/dashboard.php' : 'designer/dashboard.php';
  }
?>

<style>
  .btn{
  text-transform: uppercase; 
  }
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand me-5" href="#">
          <img src="assets/img/logo.png" alt="" style="width: 40px">
          KREASI KARYA
        </a>
         
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pekerjaan.php">Pekerjaan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
          <div class="nav-right ms-auto">
          <?= isset($_SESSION['id']) ? '<a href="'.$level.'" class="ms-auto btn btn-light">'.$_SESSION['username'].' </a>' : '' ?>
          <a href="<?= isset($_SESSION['id']) ? 'controller/logout.php' : 'login.php'?>" class="btn btn-light ms-auto"><?= isset($_SESSION['id']) ? 'Logout' : 'Login' ?></a>
          </div>
        </div>
      </div>
    </nav>