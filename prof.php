<?php
require 'config/config.php';
$_SESSION['username'] = "adelina_silaghi";
?>


<?php
	if(isset($_POST['submit'])){
		move_uploaded_file($_FILES['file']['tmp_name'],"assets/images/profile_pics/".$_FILES['file']['name']);
		//$con = mysqli_connect("localhost","retea","@Blackberry@22","retea");
		$q = mysqli_query($con,"UPDATE users SET profile_pic = '".$_FILES['file']['name']."' WHERE username = '".$_SESSION['username']."'");
	}
?>

<!DOCTYPE html>
<html>
	<head>
	
	</head>
	<body>
		<form action="" method="post" enctype="multipart/form-data">
			<input type="file" name="file">
			<input type="submit" name="submit">
		</form>
		

	</body>
</html>