<?php 
 require('top.inc.php');
 require('config.inc.php');
 $order_id=get_safe_value($con,$_GET['id']);
?>
 
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Order Details</h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                              <thead>
                                            <tr>
                                                <th class="product-remove"><span class="nobr">Product name</span></th>
                                                <th class="product-name"><span class="nobr">Product images</span></th>
                                                <th class="product-name"><span class="nobr">Qty</span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Price </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Total Price </span></th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php
                                          
                                           $res=mysqli_query($con,"select distinct(order_details.id),order_details.*,product.product_name,product.product_img, orderd_product.user_id
                                           
                                           from order_details,product,orderd_product where order_details.order_id='$order_id' and
                                            product.product_id=order_details.product_id")
                                            or die(mysqli_error($con));
                                            $total_price=0;
                                           while($row=mysqli_fetch_assoc($res)){
                                            $total_price= $total_price+($row['qty']*$row['price']);
                                           ?>
                                            <tr>
                                            <td class="product-add-to-cart"> <?php echo $row['product_name']?></td>
                                                <td class="product-remove"><img src="upload/<?php echo $row['product_img']?>"/></td>
                                                <td class="product-name"><?php  echo $row['qty']?>    </td>
                                                <td class="product-remove"><?php echo $row['price']?></td>
                                                <td class="product-remove"><?php echo $row['qty'] * $row['price']?></td>
                                      
                                                
                                            </tr>
                                            <?php
                                           }
                                           ?>
                                            <tr>
                                                <td colspan="3"></td>
                                                <td class="product-remove">Total</td>
                                                <td class="product-remove"><?php echo $total_price;?></td>
                                      
                                                
                                            </tr>
                                        </tbody>
                                        
                              </table>
                              <div>
                                  <strong> Address: </strong>
                                  
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
        <?php require('footer.inc.php')?>