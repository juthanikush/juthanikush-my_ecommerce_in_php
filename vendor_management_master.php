<?php
require('top.inc.php');
isAdmin();
$username='';
$password='';
$email='';
$mobile='';


$msg='';

if(isset($_GET['id']) && $_GET['id']!='')
{
  $require='';
  $id=get_safe_value($con,$_GET['id']);
  $res=mysqli_query($con,"select * from admin_user where id='$id'");
  
  $check=mysqli_num_rows($res);
  if($check>0){
    $row=mysqli_fetch_assoc($res);
    $username=$row['username'];
     $password=$row['password'];
   $email=$row['email'];
   $mobile=$row['mobile'];
   
  }else{
    header('location:vendor_management.php');
    die();
  }
}

if(isset($_POST['submit'])){
   $username=get_safe_value($con,$_POST['username']);
   $password=get_safe_value($con,$_POST['password']);
   
   $email=get_safe_value($con,$_POST['email']);
   $mobile=get_safe_value($con,$_POST['mobile']);
   
   
//$id=get_safe_value($con,$_GET['id']);
   $res=mysqli_query($con,"select * from admin_uses where username='$username'");
  $check=mysqli_num_rows($res);
  if($check>0){
      if(isset($_GET['id']) && $_GET['id']!=''){
        $getData=mysqli_fetch_assoc($res);
        if($id==$getData['id']){

        }else{
          $msg="Coupen Coad already exist";
        }
      }else{
         $msg="Coupen Coad already exist";
      }
  }
  
//prx($_FILES['img']);

  if($msg==''){
    if(isset($_GET['id']) && $_GET['id']!=''){
      
          $update_sql ="update admin_user set username='$username',password='$password',email='$email',mobile='$mobile' where id='$id'";
           mysqli_query($con,$update_sql);

      
      
     }else{
        mysqli_query($con,"insert into admin_user(username,password,email,
mobile,status,role) values ('$username','$password','$email','$mobile',1,1)");
       }
   	header('location:vendor_management.php');
    die();
  }
}
?>
   <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Vendor</strong><small> Form</small></div>
                        <form method="post" enctype="multipart/form-data">
                              <div class="card-body card-block">
                                 
                                
                                 <div class="form-group">
                                    <label for="catagories" class=" form-control-label">Vendor Name</label>
                                    <input type="text" name="username" placeholder="Enter Name " class="form-control" required value="<?php echo $username; ?>">
                                 </div>
                                 <div class="form-group">
                                    <label for="catagories" class=" form-control-label">Vendor password</label>
                                    <input type="text" name="password" placeholder="Enter Password " class="form-control" required value="<?php echo $password; ?>">
                                 </div>
                                 
                                 <div class="form-group">
                                    <label for="catagories" class=" form-control-label">Vendor mobile</label>
                                    <input type="text" name="mobile" placeholder="Enter Mobile " class="form-control" required value="<?php echo $mobile; ?>">
                                 </div>
                                 <div class="form-group">
                                    <label for="catagories" class=" form-control-label">Vendor Email</label>
                                    <input type="text" name="email" placeholder="Enter Email " class="form-control" required value="<?php echo $email; ?>">
                                 </div>
                                  
                           <button name="submit" id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                 <span id="payment-button-amount">Submit</span>
                           </button>
                           <div class="field_error"><?php echo $msg; ?></div>
                        </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
        
<?php
require('fotter.inc.php');
?>