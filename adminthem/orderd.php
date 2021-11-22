<?php 
 require('top.inc.php');
 require('config.inc.php');
 
?>
 
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Order Master </h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                        
                                        <thead>
                                            <tr>
                                                <th class="product-remove"><span class="nobr">Order Id</span></th>
                                                <th class="product-name"><span class="nobr">Order Date</span></th>
                                                <th class="product-name"><span class="nobr">Address</span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Payment Type </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Payment Status </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Order Status </span></th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php
                                          
                                           $sql="select orderd_product.*,order_status.status_name from orderd_product,order_status where
                                           order_status.status_id=orderd_product.order_status";
                                           $res=mysqli_query($con,$sql) or die(mysqli_error($con));
                                           while($row=mysqli_fetch_assoc($res)){
                                           ?>
                                            <tr>
                                            <td class="product-add-to-cart"><a href="order_master_details.php?id=<?php echo $row['id']?>"> <?php echo $row['id']?></a></td>
                                                <td class="product-remove"><a href="#"><?php echo $row['added_on']?></a></td>
                                               
                                                <td class="product-name"><a href="#">
                                                    <?php echo $row['address']?><br>
                                                    <?php echo $row['city']?><br>
                                                    <?php echo $row['pin_code']?><br>
                                                </a></td>
                                                <td class="product-price"><span class="amount"><?php echo $row['payment_type']?></span></td>
                                                <td class="product-price"><span class="amount"><?php echo $row['payment_status']?></span></td>
                                                <td class="product-stock-status"><span class="wishlist-in-stock"><?php echo $row['status_name']?></span></td>
                                                
                                            </tr>
                                            <?php
                                           }
                                           ?>
                                           
                                        </tbody>
                                        
                                
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
        <?php require('footer.inc.php')?>