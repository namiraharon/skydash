<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Employment System</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="../js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/perkeso-logo.png" />

  <!-- validate -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
</head>

<script type="text/javascript">

  function pilihjawatan(x){
    document.form2.idvacan.value = x;
    document.form2.action = "../pages/pilih.php";
    document.form2.submit();
      //window.open("admin/viewstaff.php?b="+x,"mywindow","directories=0,titlebar=0,toolbar=0,location=0,status=0,menubar=0,scrollbars=no,resizable=0, width=1500, height=950");
  }

</script>

<body>

  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include('../include/navbar2.php');

      include('../include/connect.inc');

      $idvacan = '';

      $query = "select * from vacancies ";
      $result = mysqli_query($mysql, $query)or die(mysqli_error($mysql));
      $num = mysqli_num_rows($result);
      if($num > 0){  

    ?>
      
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Senarai Jawatan Kosong</h4>
                  <p class="card-description">
                    Pilih jawatan di bawah.
                  </p>
                  <hr>
                  <div class="table-responsive">
                  <form class="forms-sample" name="form2" method="post">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Jawatan</th>
                          <th>Kekosongan</th>
                          <th>Jumlah Calon Hadir</th>
                          <th>Pilih</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $a=1;
                          while($row = mysqli_fetch_array($result)){
                          extract($row);    

                          echo "<tr><td>".$a."</td>";
                          echo "<td>".$position."</td>";
                          echo "<td>".$vacant."</td>";
                          echo "<td>".$hadir."</td>";
                          echo "<td><button type ='button' class='btn btn-inverse-primary btn-icon' onClick='pilihjawatan(".$idvacan.")'><i class='mdi mdi-clipboard-text'></i>
                            </button>
                            </td>
                          </tr>";
                          $a++;
                          }
                        ?>
                      </tbody>
                    </table>
                    <input type="hidden" name="idvacan" id="idvacan" value="<?php echo $idvacan; ?>">
                  </form>
                  </div>
                  <?php } ?>

                </div>
              </div>
            </div>
          </div>

          <div class="row" id="result">
            <!-- result here -->
                  
          </div>
        
        </div>
        <!-- content-wrapper ends -->

        <!-- partial:partials/_footer.html -->
        <?php include('../include/footer.php');?>
        
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../vendors/chart.js/Chart.min.js"></script>
  <script src="../vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="../js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <script src="../js/settings.js"></script>
  <script src="../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/dashboard.js"></script>
  <script src="../js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>