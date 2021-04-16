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
$name=get_safe_value($con,$_POST['name']);
$uid=$_SESSION['USER_ID'];
mysqli_query($con,"update users set name='$name' where id='$uid'");
$_SESSION['USER_NAME']=$name;
echo "Your name Update";

?>