<?php require('config.inc.php');
require('top.inc.php');
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Category</strong><small> Form</small></div>
                        <div class="card-body card-block">
                            <?php
                            $id=$_GET['id'];
                            $sql="select * from category where id ='$id'";
                            $query=mysqli_query($con,$sql) or die(mysqli_error($con));
                            if(mysqli_num_rows($query)>0){
                            while($row=mysqli_fetch_assoc($query)){
                                ?>
                       <form method="post" action="update_process_category.php"> 
                       <div class="form-group">
                           <label for="category" class=" form-control-label">Category Name</label>
                           <input type="hidden" name="post_id" placeholder="Enter your category name" class="form-control" required  value="<?php echo $row['id']?>">
                        </div>
                        <div class="form-group">
                           <label for="category" class=" form-control-label">Category Name</label>
                           <input type="text" name="category_name" placeholder="Enter your category name" class="form-control" required  value="<?php echo $row['category_name']?>">
                        </div>
                           <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                           <span id="payment-button-amount">Submit</span>
                           </button>
                       </form>
                       <?php
                            }
                        }else{
                            echo "<div class='text-danger'> You are going to wrong</div>";
                        }
                    ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
<?php
   require('footer.inc.php');
?>