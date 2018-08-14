<?php session_start();
include("includes/header.php");

require 'config/config.php';
$_SESSION['username'] = $userLoggedIn;

error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
 
<?php

if(isset($_GET['profile_username'])) {
	$username = $_GET['profile_username'];
	$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
	$user_array = mysqli_fetch_array($user_details_query);

	$num_friends = (substr_count($user_array['friend_array'], ",")) - 1;
}



$logged_in_user_obj = new User($con, $userLoggedIn); 
			
		//$result_path ="assets/images/profile_pics/".$finalname."n.jpeg";
        if(isset($_POST['submit'])){
        move_uploaded_file($_FILES['file']['tmp_name'],"assets/images/profile_pics/".$_FILES['file']['name']);
		
		$result_path ="assets/images/profile_pics/".$_FILES['file']['name'];
		//$result_path ="pictures/".$_FILES['file']['name'];
		//Insert image into database
		 $q = mysqli_query($con,"UPDATE users SET profile_pic='$result_path' WHERE username='$userLoggedIn'");
		header("Location: ".$userLoggedIn);

        }
?>

<div id="Overlay" style=" width:100%; height:100%; border:0px #990000 solid; position:absolute; top:0px; left:0px; z-index:2000; display:none;"></div>
<div class="main_column column">


	<div id="formExample">
		        <body>
                <form action="" method="post" enctype="multipart/form-data">
                        <input type="file" name="file"><br>
                        <input type="submit" name="submit">
                </form>
               
               

				
		<div class="user_details column">
		<a href="<?php echo $userLoggedIn; ?>">  <img src="<?php echo $user['profile_pic']; ?>"> </a>

		<div class="user_details_left_right">
			<a href="<?php echo $userLoggedIn; ?>">
			<?php 
			echo $user['first_name'] . " " . $user['last_name'];
			 ?>
		</div>

	</div>
				
        </body>
</div>
 
 
 
 