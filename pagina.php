<?php
require 'config/config.php';
session_start();
$_SESSION['username'] = "adelina_silaghi";

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>


<!DOCTYPE html>
<html>
	<head>
	
	</head>
	<body>
		<?php
			//$con = mysqli_connect("localhost","retea","retea","@Blckberry@22",);
			$q = mysqli_query($con,"SELECT * FROM users");
			while($row = mysqli_fetch_assoc($q)){
				echo $row['username'];
				if($row['profile_pic'] == ""){
					echo "<img width='100' height='100' src='assets/images/profile_pics/defaults/head_alizarin.png' alt='Default Profile Pic'>";
				} else {
					echo "<img width='100' height='100' src='assets/images/profile_pics/".$row['profile_pic']."' alt='Profile Pic'>";
				}
				echo "<br>";
			}
		?>
	</body>
</html>