<?php 
include("includes/header.php");
?>

<?php
        if(isset($_POST['submit'])){
                move_uploaded_file($_FILES['file']['tmp_name'],"pictures/".$_FILES['file']['name']);
                $con = mysqli_connect("localhost","root","","profiles");
                $q = mysqli_query($con,"UPDATE users SET image = '".$_FILES['file']['name']."' WHERE username = '".$_SESSION['username']."'");
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
                        $con = mysqli_connect("localhost", "root", "piatra", "retea");
                        $q = mysqli_query($con,"SELECT * FROM users");
                        while($row = mysqli_fetch_assoc($q)){
                                echo $row['username'];
                                if($row['image'] == ""){
                                        echo "<img width='100' height='100' src='pictures/default.jpg' alt='Default Profile Pic'>";
                                } else {
                                        echo "<img width='100' height='100' src='pictures/".$row['image']."' alt='Profile Pic'>";
                                }
                                echo "<br>";
                        }
                ?>
        </body>
</html>
