<?php
require('connect.inc.php');
require('function.inc.php');
$name=get_safe_value($con,$_POST['name']);
$password=get_safe_value($con,$_POST['password']);
$mobile=get_safe_value($con,$_POST['mobile']);
$email=get_safe_value($con,$_POST['email']);
$check_user=mysqli_num_rows(mysqli_query($con,"select * from users where email='$email'"));
$check_mobile=mysqli_num_rows(mysqli_query($con,"select * from users where mobile='$mobile'"));
if($check_user>0){
	echo "email_present";
}/*else if($check_mobile>0){
	echo "mobile_present";
}*/else{
	$added_on=date('Y-m-d h:i:s');
	mysqli_query($con,"insert into users (name,password,email,mobile,added_on) values('$name','$password','$email','$mobile','$added_on')");
	echo "succfull";
}
?>