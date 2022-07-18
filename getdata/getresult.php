<?php
include('../include/connect.inc');

   $ic = $_POST['ic'];
   $position = $_POST['position'];
   // $ic = "123";

   // if($ic <> ''){ $ic = " and ic = '$ic' ";}
   // if($job_title <> ''){ $job_title = " and job_title = '$job_title' ";}


   // $query = "SELECT mfj, ic, nama, phone, emel, oku, created_date FROM 
   //          (SELECT mfj, ic, nama, phone, emel, oku, created_date FROM jobseeker
   //          UNION ALL 
   //          SELECT mfj, ic, nama, phone, emel, oku, created_date FROM registration ORDER BY created_date DESC) a 
   //          WHERE ic = '$ic'
   //          GROUP BY ic
   //          ";
   $query = "select * from keputusan where ic = '$ic' OR position = '$position' ";

   // $query = "SELECT * from keputusan where 1=1  $ic $position ";
   $result = mysqli_query($mysql, $query)or die(mysqli_error($mysql));
   $num = mysqli_num_rows($result);

   if($num > 0){  

   ?>

      <div class="col-md-12 grid-margin stretch-card">
         <div class="card">
            <div class="card-body">
               <p class="card-title mb-0">Keputusan Temuduga</p>
               <div class="table-responsive" >
                  <hr>
                  <table class="table table-striped table-borderless">
                     <thead>
                        <tr>
                           <th>Nama</th>
                           <th>Kad Pengenalan</th>
                           <th>Jawatan</th>
                           <th>Status</th>
                        </tr>  
                     </thead>
                     <tbody>
                        <?php 
                           while($row = mysqli_fetch_array($result)){
                           extract($row); 
                        ?>
                        <tr>
                           <td><?php echo $nama; ?></td>
                           <td><?php echo $ic; ?></td>
                           <td><?php echo $position; ?></td>
                           <td class="font-weight-medium">
                              <?php if($status == '1'){ ?>
                                 <div class="badge badge-success"> Berjaya</div> 
                              <?php } 
                                 elseif($status == '2'){ ?>
                                 <div class="badge badge-danger"> Tidak Berjaya</div> 
                              <?php }
                                 elseif($status == '3'){ ?>
                                 <div class="badge badge-warning"> Temuduga Kedua</div> 
                              <?php }?>
                           </td>
                        </tr> 
                        <?php } ?>  
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
           
   <?php 
   }
   else {
      echo '<script>alert("Kad Pengenalan '.$ic.' tidak wujud di pangkalan data")</script>';
   }
   ?>

      