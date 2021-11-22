<?php 
require('config.inc.php');
require('top.inc.php');
if(isset($_GET['type']) && $_GET['type']!=''){
   $type=get_safe_value($con,$_GET['type']);
   if($type=='status'){
      $operation=get_safe_value($con,$_GET['operation']);
      $id=get_safe_value($con,$_GET['id']);
      if($operation=='active'){
            $status='1';
      }else{
          $status='0';
      }
      $update_satus="update product  set status='$status' where product_id='$id'";
      mysqli_query($con,$update_satus);

   }
       if($type=='delete'){
       $id=get_safe_value($con,$_GET['id']);
       $delete="delete from product where product_id='$id'";
       mysqli_query($con,$delete)or die(mysqli_query($con));
 
       }
}
$sql="select product.*,category.category_name from product,category where product.category_id=category.id order by product.product_id desc";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Product </h4>
                           <h4 class="box-link"><a href="add_product.php">Add Product</a> </h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                
                                 <tr>
                                        <th class="serial">#</th>
                                       <th>Id</th>
                                       <th >categories </th>
                                       <th>Name</th>
                                       <th class="avatar">Image</th>
                                       <th>MRP</th>
                                       <th>Price</th>
                                       <th>Quantity</th>
                                       <th></th>   
                                    </tr>
                                   
                                 </thead>
                                 <tbody>
                                 <?php 
                               $i=1;
                                while($row=mysqli_fetch_assoc($res)){
                                
                                ?>  
                                    <tr>
                                       <td class="serial"><?php echo $i++;?></td>
                                       
                                       <td><?php echo $row['product_id']?> </td>
                                       <td><?php echo $row['category_name']?></td>
                                       <td><?php echo $row['product_name']?> </td>
                                       <td><img src="upload/<?php echo $row['product_img']?>" width="50px"height="50px" /> </td>
                                       <td><?php echo $row['product_mrp']?> </td>
                                       <td><?php echo $row['product_sprice']?></td>
                                       <td><?php echo $row['product_qnt']?> </td>
                                      
                                       <td><?php
                                       if($row['status']==1){
                                           echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['product_id']."'>Active</a></span>";
                                       }else{
                                         echo " <span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['product_id']."'>Deactive</a></span>";
                                       }
                                       echo " <span class='badge badge-pending'><a href='add_product.php?id=".$row['product_id']."'>edit</a></span>&nbsp";
                                       echo " <span class='badge badge-pending'><a href='?type=delete&id=".$row['product_id']."'>delete</a></span>";
                                       ?>
                                       </td>
                                    
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