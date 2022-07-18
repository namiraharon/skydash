<?php 
include('../include/connect.inc');

  $query = "select * from registration group by ic";
  $result = mysqli_query($mysql, $query)or die(mysqli_error($mysql));
  $num = mysqli_num_rows($result);

  if($num > 0){  
?>
<div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Kad Pengenalan</th>
                    <th>Status OKU</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  $a=1;
                  while($row = mysqli_fetch_array($result)){
                  extract($row);    

                    echo "<tr><td>".$a."</td>";
                    echo "<td>".$nama."</td>";
                    echo "<td>".$ic."</td>";
                    echo "<td>".$oku."</td></tr>";
                    $a++;
                  }
                  ?>
                </tbody>
              </table>
            </form>
          </div>

          <?php } ?>