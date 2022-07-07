<?php
include('../include/connect.inc');
   
   $ic = '';


   $ic = $_POST['ic'];
   // $ic = "123";

   // $query = "SELECT mfj, ic, nama, phone, emel, oku, created_date FROM 
   //          (SELECT mfj, ic, nama, phone, emel, oku, created_date FROM jobseeker
   //          UNION ALL 
   //          SELECT mfj, ic, nama, phone, emel, oku, created_date FROM registration ORDER BY created_date DESC) a 
   //          WHERE ic = '$ic'
   //          GROUP BY ic
   //          ";
   $query = "select * from keputusan where ic = '$ic'";
   $result = mysqli_query($mysql, $query)or die(mysqli_error($mysql));
   $num = mysqli_num_rows($result);

   if($num > 0){  ?>

      <div class="col-md-12 grid-margin stretch-card">
         <div class="card">
            <div class="card-body">
               <p class="card-title mb-0">Keputusan Temuduga</p>
               <div class="table-responsive" >
                  <table class="table table-striped table-borderless">
                     <thead>
                        <tr>
                           <th>Kad Pengenalan</th>
                           <th>Jawatan</th>
                           <th>Status</th>
                        </tr>  
                     </thead>
                     <tbody>
                   
                        <?php 
                        while($row = mysqli_fetch_array($result)){
                        extract($row); ?>
                        <tr>
                           <td><?php echo $ic; ?></td>
                           <td><?php echo $job_title; ?></td>
                           <td class="font-weight-medium">
                              <?php if($status == 'berjaya'){ ?>
                                 <div class="badge badge-success"> Berjaya</div> 
                              <?php } 
                                 elseif($status == 'tidak berjaya'){ ?>
                                 <div class="badge badge-danger"> Tidak Berjaya</div> 
                              <?php } ?>
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
   ?>

      