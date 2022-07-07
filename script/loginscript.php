
<?php 
/*if(session_id() == '') {
session_start();}*/
//session_destroy();
@ob_start();
session_start();

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);	
 include('../include/connect.inc');

	$ic = $_POST['ic'];
	$password = $_POST['password'];


	$enc_pwd = md5($password);
	
	$query = "select * from user where noic = '$ic' and password = '$enc_pwd'";
	$result = mysqli_query($mysql, $query)or die(mysqli_error($mysql));
	//echo $result;
	if($result === false){
		die(mysql_error());
	}
			
	$n = mysqli_num_rows($result);
	if ($n != 1){
		?>
		<script>
			alert('Log masuk tidak berjaya.');
			window.location.href='../index.php';
	</script>
	<?php }
	else{

			while($row = mysqli_fetch_array($result)){
			extract($row);
						
			//session_start();
			//$_SESSION['login'] = 'yes';
			$_SESSION['nama'] = $nama;
			$_SESSION['noic'] = $ic;

		}
		header('Location: ../main.php');

		// $query = "select * from lengkap where iduser = '$id'";
		// $result = mysqli_query($mysql, $query)or die(mysqli_error($mysql));
		// $leng = mysqli_num_rows($result);

		// if($leng > 0){
		// 	echo "<script>window.location.href='../main.php';</script>";
		//     exit;
		// }
		// else{
		// 	echo "<script>window.location.href='../profile.php';</script>";
		//     exit;
		// }

	
 	}
?>
<form name="form1" method="post">
</form>