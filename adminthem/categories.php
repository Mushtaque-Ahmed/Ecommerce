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
      $update_satus="update category set status='$status' where id='$id'";
      mysqli_query($con,$update_satus);
    }
   
   if($type=='delete'){
      $id=get_safe_value($con,$_GET['id']);
      $delete="delete from category where id='$id'";
      mysqli_query($con,$delete)or die(mysqli_query($con));
   
  }
}
$sql="select * from category order by category_name desc";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Categories </h4>
                           <h4 class="box-link"><a href="add_category.php">Add Categories</a> </h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                
                                 <tr>
                                       <th class="serial">Sl No.</th>
                                       <th class="avatar">ID</th>
                                       <th>Name</th>
                                       <th>status</th>
                                       
                                      
                                    </tr>
                                   
                                 </thead>
                                 <tbody>
                                 <?php 
                               $i=1;
                                while($row=mysqli_fetch_assoc($res)){
                                
                                ?>  
                                    <tr>
                                       <td class="serial"><?php echo $i++;?></td>
                                       
                                       <td><?php echo $row['id']?> </td>
                                       <td> <span class="name"><?php echo $row['category_name']?></span> </td>
                                      
                                       <td><?php
                                       if($row['status']==1){
                                           echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>";
                                       }else{
                                         echo " <span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>";
                                       }
                                       echo " <span class='badge badge-pending'><a href='add_category.php?id=".$row['id']."'>edit</a></span>&nbsp";
                                       echo " <span class='badge badge-pending'><a href='?type=delete&id=".$row['id']."'>delete</a></span>";
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