<?php
require('top.inc.php');
isAdmin();
$categories='';
$msg='';
$sub_catagories='';
if(isset($_GET['id']) && $_GET['id']!='')
{
  $id=get_safe_value($con,$_GET['id']);
  $res=mysqli_query($con,"select * from sub_categories where id='$id'");
  
  $check=mysqli_num_rows($res);
  if($check>0){
    $row=mysqli_fetch_assoc($res);
    $sub_catagories=$row['sub_catagories'];
    $categories=$row['categories_id'];

  }else{
    header('location:sub_catagories.php');
    die();
  }
}

if(isset($_POST['submit'])){
   $categories=get_safe_value($con,$_POST['catagories_id']);
   $sub_catagories=get_safe_value($con,$_POST['sub_catagories']);
   $res=mysqli_query($con,"select * from sub_categories where categories_id='$categories' and sub_catagories='$sub_catagories'");
  $check=mysqli_num_rows($res);
  if($check>0){
      if(isset($_GET['id']) && $_GET['id']!=''){
        $getData=mysqli_fetch_assoc($res);
        if($id==$getData['id']){

        }else{
          $msg="sub catagories already exist";
        }
      }else{
         $msg="sub catagories already exist";
      }
  }
  if($msg==''){
    if(isset($_GET['id']) && $_GET['id']!=''){
        mysqli_query($con,"update sub_categories set categories_id='$categories',sub_catagories='$sub_catagories' where id='$id'");
     }else{
      echo "insert into sub_categories(categories_id,sub_catagories,status) values ('$categories','$sub_catagories','1')";
     // die();
        mysqli_query($con,"insert into sub_categories(categories_id,sub_catagories,status) values ('$categories','$sub_catagories','1')");
     }
    header('location:sub_catagories.php');
    die();
  }
}
?>
   <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Sub Catagories</strong><small> Form</small></div>
                        <form method="post">
                              <div class="card-body card-block">
                                 <div class="form-group">
                                    <label for="catagories" class=" form-control-label">Catagories</label>
                                    <select name="catagories_id" required class="form-control">
                                      <option value="">Select Catagories</option>
                                      <?php
                                        $res=mysqli_query($con,"select * from categories where status='1'");
                                        while($row=mysqli_fetch_assoc($res)){
                                          if($row['id']==$categories){
                                            echo "<option selected value=".$row['id'].">".$row['categories']."</option>";
                                          }else{
                                            echo "<option value=".$row['id'].">".$row['categories']."</option>";
                                          }
                                        }
                                      ?>
                                    </select>
                                 </div>
                                 <div class="form-group">
                                    <label for="categories" class=" form-control-label">Sub  Categories</label>
                                    <input type="text" name="sub_catagories" placeholder="Enter Sub Categories" class="form-control" required value="<?php echo $sub_catagories ?>">
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