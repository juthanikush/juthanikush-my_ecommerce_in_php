<?php
require('connect.inc.php');
require('function.inc.php');

if(!isset($_SESSION['USER_ID'])){
        ?>
            <script type="text/javascript">
                window.location.href='login.php';
            </script>
        <?php
    }
$current_password=get_safe_value($con,$_POST['current_password']);
$new_password=get_safe_value($con,$_POST['new_password']);
$uid=$_SESSION['USER_ID'];


$row=mysqli_fetch_assoc(mysqli_query($con,"select password from users where id='$uid'"));
if($row['password']!=$current_password){
	echo "Place Enter Your Current Valid Password";
}else{
	mysqli_query($con,"update users set `password`='$new_password' where id='$uid'");
	echo "Password Update";
}



?>