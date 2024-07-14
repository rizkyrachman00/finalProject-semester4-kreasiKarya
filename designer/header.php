<?php 
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

?>    


<style>
  .logo-fold-1{
    width:30px
  }
  .logo-fold{
    width:30px
  }
</style>
<!-- Header START -->
 <div class="header">
          <div class="logo logo-dark pt-1">
            <a href="../index.php">
              <img src="../assets/img/logo.png" alt="Logo" class="logo-fold-1"  />
              <img
                class="logo-fold"
                src="../assets/img/logo.png"
                alt="Logo"
              />
              <p>KREASI KITA</p>
            </a>
           
          </div>
          <div class="logo logo-white">
            <a href="../index.php">
              <img src="../assets/img/logo.png" class="logo-fold-1" alt="Logo" />
              <img
                class="logo-fold"
                src="../assets/img/logo.png"
                alt="Logo"

              />
              <p>KREASI KITA</p>
            </a>
          </div>
          <div class="nav-wrap">
            <ul class="nav-left">
              <li class="desktop-toggle">
                <a href="javascript:void(0);">
                  <i class="anticon"></i>
                </a>
              </li>
              <li class="mobile-toggle">
                <a href="javascript:void(0);">
                  <i class="anticon"></i>
                </a>
              </li>
              <li>
                <a
                  href="javascript:void(0);"
                  data-toggle="modal"
                  data-target="#search-drawer"
                >
                  <i class="anticon anticon-search"></i>
                </a>
              </li>
            </ul>
            <ul class="nav-right">
              <li class="dropdown dropdown-animated scale-left">
                <div class="pointer" data-toggle="dropdown">
                  <div class="avatar avatar-image m-h-10 m-r-15">
                    <img src="../assets-enlink/images/avatars/thumb-3.jpg" alt="" />
                  </div>
                </div>
                <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                  <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                    <div class="d-flex m-r-50">
                      <div class="avatar avatar-lg avatar-image">
                        <img src="../assets-enlink/images/avatars/thumb-3.jpg" alt="" />
                      </div>
                      <div class="m-l-10">
                        <p class="m-b-0 text-dark font-weight-semibold">
                          <?= $_SESSION['nama_pengguna']?>
                        </p>
                        <p class="m-b-0 opacity-07">UI/UX Desinger</p>
                      </div>
                    </div>
                  </div>
                  <a
                    href="../controller/logout.php"
                    class="dropdown-item d-block p-h-15 p-v-10"
                  >
                    <div
                      class="d-flex align-items-center justify-content-between"
                    >
                      <div>
                        <i
                          class="anticon opacity-04 font-size-16 anticon-logout"
                        ></i>
                        <span class="m-l-10">Logout</span>
                      </div>
                      <i class="anticon font-size-10 anticon-right"></i>
                    </div>
                  </a>
                </div>
              </li>
              
            </ul>
          </div>
        </div>
        <!-- Header END -->