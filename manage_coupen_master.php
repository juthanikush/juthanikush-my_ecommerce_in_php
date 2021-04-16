<?php
require('top.inc.php');
isAdmin();
$coupon_value='';
$coupon_code='';
$coupon_type='';
$cart_min_value='';


$msg='';

if(isset($_GET['id']) && $_GET['id']!='')
{
  $require='';
  $id=get_safe_value($con,$_GET['id']);
  $res=mysqli_query($con,"select * from coupen_master where id='$id'");
  
  $check=mysqli_num_rows($res);
  if($check>0){
    $row=mysqli_fetch_assoc($res);
    $coupon_value=$row['coupon_value'];
     $coupon_code=$row['coupon_code'];
   $coupon_type=$row['coupon_type'];
   $cart_min_value=$row['cart_min_value'];
   
  }else{
    header('location:coupen_master.php');
    die();
  }
}

if(isset($_POST['submit'])){
   $coupon_value=get_safe_value($con,$_POST['coupon_value']);
   $coupon_code=get_safe_value($con,$_POST['coupon_code']);
   
   $coupon_type=get_safe_value($con,$_POST['coupon_type']);
   $cart_min_value=get_safe_value($con,$_POST['cart_min_value']);
   
   
$id=get_safe_value($con,$_GET['id']);
   $res=mysqli_query($con,"select * from coupen_master where id='$id'");
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
      
          $update_sql ="update coupen_master set coupon_value='$coupon_value',coupon_code='$coupon_code',coupon_type='$coupon_type',cart_min_value='$cart_min_value' where id='$id'";
           mysqli_query($con,$update_sql);

      
      
     }else{
        mysqli_query($con,"insert into coupen_master(coupon_value,coupon_code,coupon_type,
cart_min_value,status) values ('$coupon_value','$coupon_code','$coupon_type','$cart_min_value',1)");
       

     }
   	header('location:coupen_master.php');
    die();
  }
}
?>
   <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Coupen</strong><small> Form</small></div>
                        <form method="post" enctype="multipart/form-data">
                              <div class="card-body card-block">
                                 
                                
                                 <div class="form-group">
                                    <label for="catagories" class=" form-control-label">Coupen Code</label>
                                    <input type="text" name="coupon_code" placeholder="Enter Coupen Code " class="form-control" required value="<?php echo $coupon_code; ?>">
                                 </div>
                                 <div class="form-group">
                                    <label for="catagories" class=" form-control-label">Coupon Value</label>
                                    <input type="text" name="coupon_value" placeholder="Enter Coupen Code " class="form-control" required value="<?php echo $coupon_value; ?>">
                                 </div>
                                 
                                 <div class="form-group">
                                    <label for="catagories" class=" form-control-label">Cart Min Value</label>
                                    <input type="text" name="cart_min_value" placeholder="Enter Coupen Code " class="form-control" required value="<?php echo $cart_min_value; ?>">
                                 </div>
                                 <div class="form-group">
                                    <label for="catagories" class=" form-control-label">Coupon Type</label>
                                    <select class="form-control" name="coupon_type" required>
                                      <?php
                                        if($coupon_type=="percentage"){
                                          echo ' <option value="percentage" selected>percentage</option>
                                                 <option value="Rupee">Rupee</option>';
                                        }else if($coupon_type=="Rupee"){
                                           echo ' <option value="percentage" >percentage</option>
                                                 <option value="Rupee" selected>Rupee</option>';
                                        }else{
                                          echo ' <option value=" ">Select</option>
                                                 <option value="percentage">percentage</option>
                                                 <option value="Rupee">Rupee</option>';
                                        }
                                      ?>
                                     
                                    </select>
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