<!-- submit & save on same screen -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
  $(document).ready(function(){

      $('#simpan').click(function (e){
         e.preventDefault();
         var form = $(this).parents('form');

         //Do your validation stuff      
         if (!form[0].checkValidity()) {
            form[0].reportValidity()
         }
         //prevent submit
         //var jns_srt = $("#i_dok").val();
         else{
            Swal.fire({
               title: "Anda pasti ingin meneruskan?",
               icon: 'warning',
               showCancelButton: true,
               confirmButtonColor: "#DD6B55",
               confirmButtonText: "Ya",
               cancelButtonText: "Tidak"
            }).then(function (result){

               if(result.value === true){
                  console.log("Submitted");
                  form.submit();
               }
            });
         }
      });
   });

</script>

<?php
include('../include/connect.inc');
   
   $ic = $_POST['ic'];
   $idvacan = $_POST['idvacan'];
   $position = $_POST['position'];

   $query2 = "select * from vacancies where idvacan = '$idvacan' ";
   $result2 = mysqli_query($mysql, $query2)or die(mysqli_error($mysql));
   $num2 = mysqli_num_rows($result2);

   $query = "select * from registration where ic = '$ic' group by ic";
   $result = mysqli_query($mysql, $query)or die(mysqli_error($mysql));
   $num = mysqli_num_rows($result);

      if($num > 0){
         // echo $ic;
         while($row = mysqli_fetch_array($result)){
         extract($row);
?>

   <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
         <div class="card-body">
            <h4 class="card-title">Maklumat calon</h4>
            <p class="card-description">Pilih keputusan temuduga bagi calon di bawah.</p>
            <hr>
            <!-- <div style="padding-left: 20px;"> -->
            <form class="form-sample" name="form" method="post" action="../getdata/setresult.php">

               <!-- detail calon-->
               <div class="form-group row">
                  <div class="col">

                     <div class="row">
                        <div class="col">
                           <label>Nama:</label>
                           <span><?php echo $nama; ?></span>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col">
                           <label>Kad Pengenalan:</label>
                           <span><?php echo $ic; ?></span>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col">
                           <label>Emel:</label>
                           <span><?php echo $emel; ?></span>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col">
                           <label>No. Telefon:</label>
                           <span><?php echo $phone; ?></span>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col">
                           <label>Status OKU:</label>
                           <span>
                              <?php 
                                 if($oku == 1) { echo "Ya"; }
                                 if($oku == 2) { echo "Tidak"; }
                              ?>
                           </span>
                         </div>
                     </div>

                     <div class="row">
                        <label class="col-sm-2">Keputusan: </label>

                        <div class="col-sm-3">
                           <select class="form-control form-control-sm" name="status" id="status" required>
                              <option selected disabled>--Keputusan--</option>
                              <option value="1">Berjaya</option>
                              <option value="2">Tidak Berjaya</option>
                              <option value="3">Temuduga Kedua</option>
                           </select>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col">
                           <br>
                           <br>
                           <input type="hidden" value="<?php echo $nama; ?>" name="nama" id="nama" >
                           <input type="hidden" value="<?php echo $ic; ?>" name="ic" id="ic">
                           <input type="hidden" value="<?php echo $emel; ?>" name="emel" id="emel" >
                           <input type="hidden" value="<?php echo $phone; ?>" name="phone" id="phone" >
                           <input type="hidden" value="<?php echo $oku; ?>" name="oku" id="oku" >
                           <input type="hidden" value="<?php echo $idvacan; ?>" name="idvacan" id="idvacan" >
                           <input type="hidden" value="<?php echo $position; ?>" name="position" id="position" >
                           <input type="hidden" value="" name="created_date" id="created_date">

                           
                           <button type="button" class="btn btn-sm btn-primary" id="simpan">Simpan</button>
                           <button type="button" class="btn btn-sm btn-light" onClick="document.location.href='../pages/joblist.php';" >Batal</button>
                        </div>
                     </div>

                  </div>
               </div>
            </form>
            <!-- end form -->
            <!-- <div> -->
         </div>
      </div>
   </div>

<?php
   }
}
else {
   echo '<script>alert("Kad Pengenalan '.$ic.' tidak wujud di pangkalan data")</script>';
}
?>