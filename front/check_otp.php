<?php
require('connect.inc.php');
require('function.inc.php');


$type=get_safe_value($con,$_POST['type']);
$otp=get_safe_value($con,$_POST['otp']);
if($otp==$_SESSION['EMAIL_OTP']){
	echo "done";
}else{
	echo "no";
}

?>