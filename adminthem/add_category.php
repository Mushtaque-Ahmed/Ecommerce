<?php
require('config.inc.php');
require('top.inc.php');

    $category_name='';
    $msg='';
  if(isset($_GET['id']) && $_GET['id']!=''){
    $id=get_safe_value($con,$_GET['id']);
   $sql="select * from category where id='$id'";
    $res=mysqli_query($con,$sql) or die(mysqli_error($con));
    $check=mysqli_num_rows($res);
    if($check>0){
    $row=mysqli_fetch_assoc($res);
    $category_name=$row['category_name'];
    }else{
     header('location:categories.php');
    }
   }
if(isset($_POST['submit'])){
    $cat_name=get_safe_value($con,$_POST['category_name']);

    $sql="select * from category where category_name='$cat_name'";  //check the data exist or not
    $res=mysqli_query($con,$sql) or die(mysqli_error($con));
    $check=mysqli_num_rows($res);
    
    if($check>0){  
              if(isset($_GET['id'])&&$_GET['id']){
                  $getdata=mysqli_fetch_assoc($res);
                  if($id==$getdata['id']){
                     
                  }else{
                     $msg='already data axist';
                  }
               }else{
                  $msg='already data axist';

               }

         
   }
   if($msg==''){
      if(isset($_GET['id']) && $_GET['id']!=''){
    
         mysqli_query($con,"UPDATE category SET category_name='$cat_name' WHERE id='$id'")or die(mysqli_error($con));

    }else{

     mysqli_query($con,"insert into category (category_name,status) values('$cat_name','1')") or die(mysqli_error($con));
    }

header('location:categories.php');
die();
   }
  
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Category</strong><small> Form</small></div>
                        <div class="card-body card-block">
                       <form method="POST"> 
                        <div class="form-group">
                           <label for="category" class=" form-control-label">Category Name</label>
                           <input type="text" name="category_name" placeholder="Enter your category name" class="form-control" required  value="<?php echo $category_name?>">
                        </div>
                           <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                           <span id="payment-button-amount">Submit</span>
                           </button>
                       </form>
                            <div> <?php echo $msg?></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
<?php
   require('footer.inc.php');
?>