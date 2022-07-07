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

                  var ic = $('#ic').val();
                  var nama = $('#nama').val();
                  var phone = $('#phone').val();
                  var emel = $('#emel').val();
                  var oku = $('#oku').val();
                  var mfj = $('#mfj').val();
                  var created_date = $('#created_date').val();
                  // alert(ic);
                  $.ajax({
                     type:'POST',
                     url:'getdata/setic.php',
                     data: {ic:ic, nama:nama, phone:phone, emel:emel, oku:oku, mfj:mfj, created_date:created_date},

                     success:function(html){
                          $('').html(html);
                     }
                  });
               }
            });
         }
      });
   });

</script>

<?php
include('../include/connect.inc');
   
   $ic = $_POST['ic'];

   //check existing ic from both table 
   $query = "SELECT mfj, ic, nama, phone, emel, oku, created_date FROM 
            (SELECT mfj, ic, nama, phone, emel, oku, created_date FROM jobseeker
            UNION ALL 
            SELECT mfj, ic, nama, phone, emel, oku, created_date FROM registration ORDER BY created_date DESC) a 
            WHERE ic = '$ic'
            GROUP BY ic
            ";
   // $query = "select mfj, nama, ic, phone, emel, oku, created_date from jobseeker where ic = '$ic'";
   $result = mysqli_query($mysql, $query)or die(mysqli_error($mysql));
   $num = mysqli_num_rows($result);

      if($num > 0){
         // echo $ic;
         while($row = mysqli_fetch_array($result)){
             extract($row);
             ?>
               <form id="form" method="post" action="qrcode.php">
                  <h5>Maklumat peserta:</h5>
                  
                  <label>Nama: </label>
                  <input type="text" value="<?php echo $nama; ?>" name="nama" id="nama" class="form-control" required><br>
                  <label>Kad Pengenalan: </label>
                  <input type="text" value="<?php echo $ic; ?>" name="ic" id="ic" class="form-control" readonly><br>
                  <label>Nombor Telefon: </label>
                  <input type="text" value="<?php echo $phone; ?>" name="phone" id="phone" class="form-control" required><br>
                  <label>Emel: </label>
                  <input type="email" value="<?php echo $emel; ?>" name="emel" id="emel" class="form-control" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" required><br>
                  <label>OKU: </label>
                  <select name="oku" class="form-control" id="oku" required>
                     <option value="1" <?php if($oku == 1) {echo "selected";}?>>Ya</option>
                     <option value="2" <?php if($oku == 2) {echo "selected";}?>>Tidak</option>
                  </select>
                  <input type="hidden" value="<?php echo $mfj; ?>" name="mfj" id="mfj" class="form-control">
                  <br>
                  <?php //echo $created_date; ?>

                  * Click Submit to get QR code
                  <button type="button"  class="btn btn-primary" id="simpan">Simpan</button>
                  <!-- <img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=<?php //echo $ic; ?>"/> -->

               </form>
         <?php
         }
      }
      else {
         // echo "No row";
      ?>
            
      <form id="form" method="post" action="qrcode.php">
         <h5>Maklumat belum wujud, sila isi maklumat berikut:</h5>

         <label>Nama: </label>
         <input type="text" value="" name="nama" id="nama" class="form-control" required>
         <br>
         <label>Kad Pengenalan: </label>
         <input type="text" value="" name="ic" id="ic" class="form-control" required>
         <br>
         <label>Nombor Telefon: </label>
         <input type="text" value="" name="phone" id="phone" class="form-control" required>
         <br>
         <label>Emel: </label>
         <input type="email" value="" name="emel" id="emel" class="form-control" placeholder="example@email.com" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" required>
         <br>
         <label>OKU: </label>
         <select name="oku" class="form-control" id="oku" required>
            <option value="">-</option>
            <option value="1">Ya</option>
            <option value="2">Tidak</option>
         </select>
         <br>
         <label>MyFutureJobs: </label>
         <select name="mfj" class="form-control" id="mfj" required>
            <option value="">-</option>
            <option value="1">Ya</option>
            <option value="2">Tidak</option>
         </select>
         <br>
         <input type="hidden" value="" name="created_date" id="created_date" class="form-control">
         <button type="button"  class="btn btn-primary" id="simpan">Simpan</button>
      </form>

      <?php 
      }
      ?>