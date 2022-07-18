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

  <script type="text/javascript">

    $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('whatever') // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('.modal-title').text('New message to ' + recipient)
      modal.find('.modal-body input').val(recipient)
    })

    $(document).ready(function(){

      $('#btncari').on('click', function(){
        var ic = $('#ic').val();
        var idvacan = $('#idvacan').val();
        var position = $('#position').val();

        // alert(ic);
        $.ajax({
          type:'POST',
          url:'../getdata/getic.php',
          data: {ic:ic, idvacan:idvacan, position:position},
          success:function(html){
            $('#result').html(html);
          }
        }); 
      });

      $('#btnlist').on('click', function(){

        $.ajax({    //create an ajax request to display.php
        type: "GET",
        url: "../getdata/getlist.php",             
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#bodylist").html(response); 
            //alert(response);
          }
        }); 
      });

    });

  </script>

<body>

  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include('../include/navbar2.php');

      include('../include/connect.inc');

      $idvacan = $_POST['idvacan'];

      $ic ='';
      $position ='';
     
    ?>
      
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

          <!-- first row -->
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Pemilihan Calon </h4>
                  <p class="card-description">
                    Pilih calon yang telah ditemuduga bagi jawatan berikut.
                  </p>
                  <hr>
                  <!-- <div style="padding-left: 20px;"> -->
                    <form class="form-sample" id="form" method="post">

                      <!-- detail jawatan -->
                      <div class="form-group row">
                        <div class="col">
                          <div class="row">
                            <div class="col">
                              <?php 
                                $query = "select * from vacancies where idvacan = '$idvacan' ";
                                $result = mysqli_query($mysql, $query)or die(mysqli_error($mysql));
                                $num = mysqli_num_rows($result);
                                if($num > 0){  
                                  while($row = mysqli_fetch_array($result)){
                                  extract($row); 
                              ?>

                              <label class="form-label">Jawatan: <?php echo $position; ?></label>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col">
                              <label class="form-label">Kekosongan: <?php echo $vacant; ?></label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php } } ?>

                      <!-- popup senarai calon -->
                      <div class="form-group row">
                        <div class="col">

                          <div class="row">
                            <div class="col">
                              <button type="button" class="btn btn-sm btn-inverse-primary" data-toggle="modal" data-target="#exampleModal" id="btnlist">
    Senarai Calon
  </button>
                            </div>
                          </div>

                          <!-- search by ic -->
                          <div class="row">
                            <label class="col-sm-3 col-form-label">Kad Pengenalan Calon</label>

                            <div class="col-sm-4">
                              <div class="input-group">
                                <input type="hidden" value="<?php echo $position; ?>" name="position" id="position" >
                                <input type="hidden" value="<?php echo $idvacan; ?>" name="idvacan" id="idvacan" >
                                
                                <input type="text" class="form-control form-control-sm" placeholder="Kad Pengenalan Calon" aria-label="Kad Pengenalan Calon" name="ic" id="ic" required>
                                <div class="input-group-append">
                                  <button class="btn btn-sm btn-inverse-primary" type="button" id="btncari"><i class="icon-search"></i></button>
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>
                      </div>
                    </form>
                    <!-- end form -->
                  <!-- </div> -->
                </div>
              </div>
            </div>
          </div> 
          <!-- end first row -->


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



  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Senarai Calon</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="bodylist">
          <!-- list here -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>



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