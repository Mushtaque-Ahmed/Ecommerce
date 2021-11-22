<?php 
 require('top.inc.php');
 require('config.inc.php');
 if(isset($_GET['type']) && $_GET['type']){
     $type=get_safe_value($con,$_GET['type']);
     if($type=='delete'){
         $id=get_safe_value($con,$_GET['id']);
         $delete_sql="delete from register where id='$id'";
         mysqli_query($con,$delete_sql) or die(mysqli_error($con));
     }
 }
 $sql="select * from register order by id desc";
 $res=mysqli_query($con,$sql) or die(mysqli_error($con));

?>
 
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">users </h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                
                                       <th>ID</th>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Mobile</th>
                                       <th>password</th>
                                       <th>Date</th>
                                       <th></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                     while($row=mysqli_fetch_assoc($res)){
                                     ?>
                                    <tr>
                                       <td><?php echo $row['id']?></td>
                                       <td><?php echo $row['name']?></td>
                                       <td><?php echo $row['email']?></td>
                                       <td><?php echo $row['mobile']?></td>
                                       <td><?php echo $row['password']?></td>
                                       <td><?php echo $row['added_on']?></td>
                                       <td><a href='?type=delete&id=<?php echo $row['id']?>'>Delete</a></td>
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