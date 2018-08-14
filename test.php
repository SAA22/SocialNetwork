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
        move_uploaded_file($_FILES['file']['tmp_name'],"pictures/".$_FILES['file']['name']);
				 
		$result_path ="pictures/".$_FILES['file']['name'];
		//Insert image into database
		//$q = mysqli_query($con,"UPDATE users SET profile_pic='".$_FILES['file']['name']."' WHERE username = '".$_SESSION['username']."'");
		 $q = mysqli_query($con,"UPDATE users SET profile_pic='$result_path' WHERE username='$userLoggedIn'");
		//$q = mysqli_query($con,"UPDATE users SET profile_pic='$result_path' WHERE username='$userLoggedIn'");

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
               
               
                <?php
                        //$con = mysqli_connect("localhost","root","","profiles");
                        $q = mysqli_query($con,"SELECT * FROM users");
                        while($row = mysqli_fetch_assoc($q)){
                                echo $row['username'];
                                if($row['profile_pic'] == ""){
                                        echo "<img width='100' height='100' src='pictures/default.jpg' alt='Default Profile Pic'>";
                                } else {
                                        echo "<img width='100' height='100' src='pictures/pictures/".$row['profile_pic']."' alt='Profile Pic'>";
                                }
                                echo "<br>";
                        }
                ?>
        </body>
</html>