<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php 
include('../include/connect.inc');

   $ic = $_POST['ic'];
   $nama = $_POST['nama'];
   $phone = $_POST['phone'];
   $emel = $_POST['emel'];
   $oku = $_POST['oku'];
   $position = $_POST['position'];
   $idvacan = $_POST['idvacan'];
   $status = $_POST['status'];
   $created_date = $_POST['created_date'];

   $query = "insert into keputusan (nama, ic, phone, emel, oku, position, idvacan, status, created_date) 
               values ('{$nama}', '{$ic}', '{$phone}', '{$emel}', '{$oku}', '{$position}',  '{$idvacan}', '{$status}', CURRENT_TIMESTAMP() ) ";
   $result = mysqli_query($mysql, $query)or die(mysqli_error($mysql));

?>

<script language="javascript">

   $(document).ready(function(){
      //var form = $(this).parents('form');
      Swal.fire({
         title: "Proses Telah Berjaya",
         text: "Maklumat telah disimpan",
         icon: 'success',
         confirmButtonColor: "#DD6B55",
         confirmButtonText: "Ya",
      }).then(function (result){
         if(result.value === true){
            window.location.href="../pages/joblist.php";
            //form.submit();
         }
      });
   });            

</script>
