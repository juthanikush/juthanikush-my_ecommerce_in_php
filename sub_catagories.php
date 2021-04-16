<?php
require('top.inc.php');
isAdmin();
if(isset($_GET['type']) && $_GET['type']!='')
{
   $type=get_safe_value($con,$_GET['type']);
   if($type == 'status')
   {
      $operation=get_safe_value($con,$_GET['operation']);
      $id=get_safe_value($con,$_GET['id']);
      if($operation == 'active')
      {
         $status='1';
      }else{
         $status='0';
      }
      $update_status_sql="update sub_categories set status='$status' where id='$id'";
      mysqli_query($con,$update_status_sql);
   }
}
if(isset($type)){
   if($type == "delete")
   {
     
      $id=get_safe_value($con,$_GET['id']);
      $delete_sql="delete from sub_categories  where id='$id'";
      mysqli_query($con,$delete_sql);
   }
}
   //echo "select sub_categories.*,categories.categories from sub_categories,categories where categories.id=sub_categories.categories_id order by sub_catagories.sub_catagories asc";
$sql="select sub_categories.*,categories.categories from sub_categories,categories where categories.id=sub_categories.categories_id order by sub_catagories asc";
$result=mysqli_query($con,$sql);

?>

 <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Sub Catagories</h4>
                           <small><h4 class="box-title"><a href="manage_sub_catagories.php">Add Sub Catagories</a></h4></small>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th class="avatar">iD</th>
                                       <th>Catagories</th>
                                       <th>Sub Catagories</th>
                                       <th></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php 
                                 $i=1;
                                 while($row=mysqli_fetch_assoc($result)) {?>
                                    <tr class=" pb-0">
                                       <td class="serial"><?php echo $i; ?></td>
                                       <td><?php echo $row['id']; ?></td>
                                       <td><?php echo $row['categories']; ?></td>
                                       <td><?php echo $row['sub_catagories']; ?></td>
                                       <td>
                                          <?php 
                                             if($row['status']==1){
                                                echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['id']."'>Active&nbsp;</a></span>&nbsp;";
                                             }else{
                                                echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['id']."'>Deactive&nbsp;</a></span>&nbsp;";
                                             }
                                             echo "<span class='badge badge-edit'><a href='manage_sub_catagories.php?type=edit&id=".$row['id']."'>Edit</a></span>&nbsp;";
                                              echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>&nbsp;";
                                              
                                           ?></td>
                                    </tr>
                                 <?php } ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
<?php
require('fotter.inc.php');
?>