<?php
$noic = '';
$nama = '';

$noic = $_SESSION['noic'];
$nama = $_SESSION['nama'];

if($noic == ''){
    ?>
        <script>window.location.replace("http:/EmpSys/");</script>
    <?php
    }

include('include/connect.inc');

$query = "select * from user where noic = '$noic'";
$result = mysqli_query($mysql, $query)or die(mysqli_error($mysql));
$lengkap = mysqli_num_rows($result);
if($lengkap > 0){
?>


<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo mr-5" href="#"><img src="images/perkeso-logo.png" class="mr-2" alt="logo"/></a>
    <a class="navbar-brand brand-logo-mini" href="#"><img src="images/perkeso-logo.png" alt="logo"/></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="icon-menu"></span>
    </button>
      
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item dropdown">
        <a class="nav-link align-items-center justify-content-end" id="notificationDropdown" >
          <h6><b><?php echo $nama; ?></b></h6>
        </a>
      </li>
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
          <img src="images/user.png" alt="profile"/>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item">
            <i class="ti-settings text-primary"></i>
              Settings
          </a>
          <a class="dropdown-item" href="logout.php">
            <i class="ti-power-off text-primary"></i>
              Logout
          </a>
        </div>
      </li>
    </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="icon-menu"></span>
      </button>
  </div>
</nav>

<!-- partial -->
<div class="container-fluid page-body-wrapper">
  
  <!-- partial:partials/_settings-panel.html -->
  <div class="theme-setting-wrapper">
    <div id="settings-trigger"><i class="ti-settings"></i></div>
    <div id="theme-settings" class="settings-panel">
      <i class="settings-close ti-close"></i>
      <p class="settings-heading">SIDEBAR SKINS</p>
      <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
      <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
      <p class="settings-heading mt-2">HEADER SKINS</p>
      <div class="color-tiles mx-0 px-4">
        <div class="tiles success"></div>
        <div class="tiles warning"></div>
        <div class="tiles danger"></div>
        <div class="tiles info"></div>
        <div class="tiles dark"></div>
        <div class="tiles default"></div>
      </div>
    </div>
  </div>

  <!-- partial:partials/_sidebar.html -->
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="main.php">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
          
      <li class="nav-item">
        <a class="nav-link" href="pages/result.php">
          <i class="icon-paper menu-icon"></i>
          <span class="menu-title">Semak Keputusan</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="pages/joblist.php">
          <i class="icon-clipboard menu-icon"></i>
          <span class="menu-title">Senarai Jawatan</span>
        </a>
      </li>
    </ul>
  </nav>

<?php } ?>