<?php
require('top.inc.php');
$condition="";
$condition1="";
if($_SESSION['ADMIN_ROLE']==1)
{
   $condition=" and product.added_by='".$_SESSION['ADMIN_ID']."'";
   $condition1=" and added_by='".$_SESSION['ADMIN_ID']."'";
}
$categories_id='';
$name='';
$mrp='';
$price='';
$qty='';
$sub_categories_id='';
$short_decs='';
$description='';
$meta_title='';
$meta_desc='';
$mete_keyword='';
$status='';
$best_seller='';

$msg='';
$require = "required";
if(isset($_GET['id']) && $_GET['id']!='')
{
  $require='';
  $id=get_safe_value($con,$_GET['id']);
  $res=mysqli_query($con,"select * from product where id='$id' $condition1");
  
  $check=mysqli_num_rows($res);
  if($check>0){
    $row=mysqli_fetch_assoc($res);
    $categories_id=$row['categories_id'];
     $sub_categories_id=$row['sub_categories_id'];
   $name=$row['name'];
   $mrp=$row['mrp'];
   $price=$row['price'];
   $qty=$row['qty'];
   $short_decs=$row['short_decs'];
   $description=$row['description'];
   $meta_title=$row['meta_title'];
   $meta_desc=$row['meta_desc'];
   $mete_keyword=$row['mete_keyword'];
   $best_seller=$row['best_seller'];
  }else{
    header('location:product.php');
    die();
  }
}

if(isset($_POST['submit'])){
   $categories_id=get_safe_value($con,$_POST['categories_id']);
   $sub_categories_id=get_safe_value($con,$_POST['sub_categories_id']);
   
   $name=get_safe_value($con,$_POST['name']);
   $mrp=get_safe_value($con,$_POST['mrp']);
   $price=get_safe_value($con,$_POST['price']);
   $qty=get_safe_value($con,$_POST['qty']);
   $short_decs=get_safe_value($con,$_POST['short_decs']);
   $description=get_safe_value($con,$_POST['description']);
   $meta_title=get_safe_value($con,$_POST['meta_title']);
   $meta_desc=get_safe_value($con,$_POST['meta_desc']);
   $mete_keyword=get_safe_value($con,$_POST['mete_keyword']);
   $best_seller=get_safe_value($con,$_POST['best_seller']);
   

   $res=mysqli_query($con,"select * from product where name='$name' and $condition1");
  $check=mysqli_num_rows($res);
  if($check>0){
      if(isset($_GET['id']) && $_GET['id']!=''){
        $getData=mysqli_fetch_assoc($res);
        if($id==$getData['id']){

        }else{
          $msg="product already exist";
        }
      }else{
         $msg="product already exist";
      }
  }
  if($_FILES['img']['type']=='image/png' || $_FILES['img']['type']=='image/jpg' || $_FILES['img']['type']=='image/jpeg'){
    
  }else{
    if($_FILES['img']['type']==''){

    }else{
      $msg="Place Enter the jpg,png or jpeg file";
    }
    
  }
//prx($_FILES['img']);

  if($msg==''){
    if(isset($_GET['id']) && $_GET['id']!=''){
      if($_FILES['img']['name']!=''){
          $image=rand(1111,9999).'_'.$_FILES['img']['name'];
          move_uploaded_file($_FILES['img']['tmp_name'],'media/product/'.$image);
          $update_sql ="update product set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_decs='$short_decs',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',mete_keyword='$mete_keyword',image='$image',sub_categories_id='$sub_categories_id',best_seller='$best_seller' where id='$id'";
      
      }else{
        $update_sql = "update product set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_decs='$short_decs',description='$description',meta_title='$meta_title',sub_categories_id='$sub_categories_id',meta_desc='$meta_desc',mete_keyword='$mete_keyword',best_seller='$best_seller' where id='$id'";
      }
        mysqli_query($con,$update_sql);
      
     }else{

     	$image=rand(1111,9999).'_'.$_FILES['img']['name'];
     	move_uploaded_file($_FILES['img']['tmp_name'],'media/product/'.$image);
        mysqli_query($con,"insert into product(categories_id,name,mrp,price,qty,short_decs,description,meta_title,meta_desc,mete_keyword,status,image,best_seller,sub_categories_id,added_by) values ('$categories_id','$name','$mrp','$price','$qty','$short_decs','$description','$meta_title','$meta_desc','$mete_keyword',1,'$image','$best_seller','$sub_categories_id','".$_SESSION['ADMIN_ID']."')");
       

     }
   	header('location:product.php');
    die();
  }
}
?>
   <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Product</strong><small> Form</small></div>
                        <form method="post" enctype="multipart/form-data">
                              <div class="card-body card-block">
                                 <div class="form-group">
                                    <label for="catagories" class=" form-control-label">Catagories</label>
                                    <select class="form-control" id="categories_id" name="categories_id" onchange="get_sub_cat(' ')">
                                    	<option>Select Category</option>
                                    	<?php
                                    	$res=mysqli_query($con,"select id,categories from categories order by categories asc");
                                    		while($row=mysqli_fetch_assoc($res)){
                                    			if($row['id']==$categories_id){
                                    				echo "<option selected value=".$row['id'].">".$row['categories']."</option>";
                                    			}else{	
                                    				
                                    				echo "<option  value=".$row['id'].">".$row['categories']."</option>";
                                    			}
                                    		}
                                    	?>
                                    </select>
                                 </div>
                                 <div class="form-group">
                                    <label for="catagories" class=" form-control-label">Sub Catagories</label>
                                    <select class="form-control" name="sub_categories_id" id="sub_categories_id" required>
                                      <option>Select Sub Category</option>
                                    </select>
                                 </div>
                                 <div class="form-group">
                                    <label for="catagories" class=" form-control-label">Product Name</label>
                                    <input type="text" name="name" placeholder="Enter Product name" class="form-control" required value="<?php echo $name; ?>">
                                 </div>
                                 <div class="form-group">
                                    <label for="catagories" class=" form-control-label">Best Seller</label>
                                    <select class="form-control" name="best_seller" required>
                                      <?php
                                        if($best_seller==1){
                                          echo ' <option value="1" selected>Yes</option>
                                                 <option value="0">No</option>';
                                        }else if($best_seller==0){
                                           echo ' <option value="1" >Yes</option>
                                                 <option value="0" selected>No</option>';
                                        }else{
                                          echo ' <option value=" ">select</option>
                                                 <option value="0">No</option>';
                                        }
                                      ?>
                                     
                                    </select>
                                 </div>
                                  <div class="form-group">
                                    <label for="catagories" class=" form-control-label">MRP</label>
                                    <input type="text" name="mrp" placeholder="Enter Product Mrp" class="form-control" required value="<?php echo $mrp; ?>">
                                 </div>
                                  <div class="form-group">
                                    <label for="catagories" class=" form-control-label">Price</label>
                                    <input type="text" name="price" placeholder="Enter Product Price" class="form-control" required value="<?php echo $price; ?>">
                                 </div>
                                  <div class="form-group">
                                    <label for="catagories" class=" form-control-label">QTY</label>
                                    <input type="text" name="qty" placeholder="Enter Product Qty" class="form-control" required value="<?php echo $qty; ?>">
                                 </div>
                                  <div class="form-group">
                                    <label for="catagories" class=" form-control-label">Image</label>
                                    <input type="file" name="img" <?php echo $require; ?> class="form-control">
                                    <!--<input type="file" name="image" id="image"class="form-control" >-->
                                 </div>
                                  <div class="form-group">
                                    <label for="catagories" class=" form-control-label">Short Decs </label>
                                    <textarea name="short_decs" class=" form-control" placeholder="Place Enter Short Description" required><?php echo $short_decs; ?></textarea>
                                 </div>
                                 <div class="form-group">
                                    <label for="catagories" class=" form-control-label">Description </label>
                                    <textarea name="description" class=" form-control" placeholder="Place Enter Description" required><?php echo $description; ?></textarea>
                                 </div>

                                  <div class="form-group">
                                    <label for="catagories" class=" form-control-label">Meta Title</label>
                                    <input type="text" name="meta_title" placeholder="Enter Meta Title" class="form-control"  value="<?php echo $meta_title; ?>">
                                 </div>

                                  <div class="form-group">
                                    <label for="catagories" class=" form-control-label">Meta Description</label>
                                    <input type="text" name="meta_desc" placeholder="Enter Meta Description" class="form-control"  value="<?php echo $meta_desc; ?>">
                                 </div>

                                  <div class="form-group">
                                    <label for="catagories" class=" form-control-label">Meta Keyword</label>
                                    <input type="text" name="mete_keyword" placeholder="Enter Meta Keyword" class="form-control" required value="<?php echo $mete_keyword; ?>">
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
         <script type="text/javascript">
           function get_sub_cat(sub_cat_id){
            var categories_id=jQuery('#categories_id').val();
            jQuery.ajax({
              url:'get_sub_cat.php',
              type:'post',
              data:'categories_id='+categories_id+'&sub_cat_id='+sub_cat_id,
              success:function(result){
                jQuery('#sub_categories_id').html(result);
              }
            });
           }

         </script>
<?php
require('fotter.inc.php');
?>
<script type="text/javascript">
  <?php
            if(isset($_GET['id'])){
              ?>
                get_sub_cat('<?php echo $sub_categories_id ?>');
              <?php
            }
           ?>
</script>