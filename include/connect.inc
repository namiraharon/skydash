<?php 
// $mysql = mysqli_connect('10.8.51.221', 'amir', '3nf0sFW');
$mysql = mysqli_connect('localhost', 'root', '');
if(!$mysql)
{
	echo 'Sambungan ke Pengkalan Data bermasalah';
	exit();
}
mysqli_select_db($mysql, "careerfair");

date_default_timezone_set('Asia/Kuala_Lumpur');
?>
