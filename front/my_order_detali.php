<?php 
	require('top.php');
    if(!isset($_SESSION['USER_LOGIN'])){
        ?>
        <script type="text/javascript">
            window.location.href="index.php";
        </script>
        <?php
    }

    $order_id=get_safe_value($con,$_GET['id']);
    $coupon_details=mysqli_fetch_assoc(mysqli_query($con,"select coupon_value from `order` where id='$order_id'"));
    $coupon_values=$coupon_details['coupon_value'];
?>
 <div class="wishlist-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="wishlist-content">
                            <form action="#">
                                <div class="wishlist-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-thumbnail">Prodect Name</th>
                                                <th class="product-thumbnail">Prodect Image</th>
                                                <th class="product-thumbnail">Qty</th>
                                                <th class="product-thumbnail">Price</th>
                                                <th class="product-thumbnail">Tatal Price</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php

                                        		$uid=$_SESSION['USER_ID'];
                                        		$res=mysqli_query($con,"select distinct(order_detail.id),order_detail.*,product.name,product.image from order_detail,product,`order` where order_detail.order_id='$order_id' and `order`.user_id='$uid' and order_detail.product_id=product.id");
                                                $total_price=0;
                                                
                                        		while($row=mysqli_fetch_assoc($res)){
                                                    $total_price=$total_price+($row['qty']*$row['price']);
                                            ?>
                                            <tr>
                                                
                                                <td class="product-name"><?php echo $row['name'] ?> </td>
                                                <td class="product-name"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image'] ?> "> </td>
                                                <td class="product-name"><?php echo $row['qty'] ?> </td>
                                                <td class="product-name"><?php echo $row['price'] ?> </td>
                                                <td class="product-name"><?php echo $row['qty']*$row['price'] ?> </td>
                                            </tr>
                                            <?php } if($coupon_values!=''){?>
                                              <tr>
                                                <td colspan="3" class="product-name"></td>
                                                <td class="product-name">Coupon Value </td>
                                                <td class="product-name"><?php echo $coupon_values ?> </td>
                                            </tr>
                                        <?php } ?>
                                            <tr>
                                                <td colspan="3" class="product-name"></td>
                                                <td class="product-name">Total Price </td>
                                                <td class="product-name"><?php echo $total_price-$coupon_values ?> </td>
                                            </tr>
                                        </tbody>
                                       
                                    </table>
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>	
<?php 
	require('footer.php');
?>