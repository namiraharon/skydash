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
  <link rel="stylesheet" href="../vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/perkeso-logo.png" />

  <!-- validate -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
</head>

<body>

  <script type="text/javascript">

    $(document).ready(function(){

      $('#btnsemak').on('click', function(){
        var ic = $('#ic').val();
        var position = $('#position').val();

        $.ajax({
          type:'POST',
          url:'../getdata/getresult.php',
          data: {ic:ic, position:position},
          success:function(html){
            $('#result').html(html);
          }
        });
        // alert(ic); 
      });

    });

  </script>

  <?php
    $ic = '';
    $position = '';
  ?>

  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include('../include/navbar2.php');?>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Semakan Temuduga</h4>
                    <p class="card-description">Semak keputusan temuduga dengan masukkan kad pengenalan atau jawatan.</p>
                    <hr>
                    <form class="forms-sample" method="post">
                      <div class="form-group row">
                        <div class="col-sm-6">
                          <label for="ic" class="form-label">Kad Pengenalan</label>
                          <input type="text" class="form-control form-control-sm" name="ic" id="ic" placeholder="Kad Pengenalan" required>
                        </div>
                        <div class="col-sm-6">
                          <label for="position" class="form-label">Jawatan</label>
                          <input type="text" class="form-control form-control-sm" name="password" id="position" placeholder="Jawatan" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-5"></div>
                        <div class="col">
                          <button type="button" class="btn btn-primary btn-sm mr-2" id="btnsemak">Semak</button>
                        </div>
                      </div>
                    </form>
                    <!-- end form -->
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
  <script src="../vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <script src="../js/settings.js"></script>
  <script src="../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../js/file-upload.js"></script>
  <script src="../js/typeahead.js"></script>
  <script src="../js/select2.js"></script>
  <!-- End custom js for this page-->
</body>

</html>