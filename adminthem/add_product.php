<?php
      require('config.inc.php');
      require('top.inc.php');

    $category_id='';
    $name='';
    $mrp='';
    $sprice='';
    $qnty='';
    $short_desc='';
    $description='';
    $meta_title='';
    $meta_desc='';
    $meta_key='';
    $msg='';
    $image_required='required';
  if(isset($_GET['id']) && $_GET['id']!=''){
     $image_required='';
    $id=get_safe_value($con,$_GET['id']);
   $sql="select * from product where product_id='$id'";
    $res=mysqli_query($con,$sql) or die(mysqli_error($con));
    $check=mysqli_num_rows($res);
    if($check>0){
    $row=mysqli_fetch_assoc($res);
    $category_id=$row['category_id'];
    $name=$row['product_name'];
    $mrp=$row['product_mrp'];
    $sprice=$row['product_sprice'];
    $qnty=$row['product_qnt'];
    $short_desc=$row['short_desc'];
    $description=$row['pdescription']; 
    $meta_title=$row['meta_title'];
    $meta_desc=$row['meta_desc'];
    $meta_key=$row['meta_keyword'];
    }else{
     header('location:product.php');
    }
   }
if(isset($_POST['submit'])){
   $category_id=get_safe_value($con,$_POST['category_id']);
    $name=get_safe_value($con,$_POST['product_name']);
    $mrp=get_safe_value($con,$_POST['product_mrp']);
    $sprice=get_safe_value($con,$_POST['product_sprice']);
    $qnty=get_safe_value($con,$_POST['product_qnt']);
    $short_desc=get_safe_value($con,$_POST['short_desc']);
    $description=get_safe_value($con,$_POST['pdescription']);
    $meta_title=get_safe_value($con,$_POST['meta_title']);
    $meta_desc=get_safe_value($con,$_POST['meta_desc']);
    $meta_key=get_safe_value($con,$_POST['meta_keyword']);

    $sql="select * from product where product_name='$name'";  //check the data exist or not
    $res=mysqli_query($con,$sql) or die(mysqli_error($con));
    $check=mysqli_num_rows($res);
    
    if($check>0){  
              if(isset($_GET['id'])&&$_GET['id']){
                  $getdata=mysqli_fetch_assoc($res);
                  if($id==$getdata['product_id']){
                     
                  }else{
                     $msg='already data axist';
                  }
               }else{
                  $msg='already data axist';

               }

         
   }
       
       if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && 
       $_FILES['image']['type']!='image/jpeg' ){
          $msg="please select only png,jpg and jpeg format";
       }
   if($msg==''){
      if(isset($_GET['id']) && $_GET['id']!=''){
                     if($_FILES['image']['name']!=''){
                        $image=rand(111111111,999999999).' '.$_FILES['image']['name'];
                        move_uploaded_file($_FILES['image']['tmp_name'],'upload/'.$image);
        $update_sql="UPDATE product SET category_id='$category_id',product_name='$name',
         product_mrp='$mrp',product_sprice='$sprice',product_qnt='$qnty',product_img='$image', short_desc='$short_desc',
         pdescription ='$description', meta_title='$meta_title',meta_desc='$meta_desc',
         meta_keyword='$meta_key' WHERE product_id='$id'";
         }else{
            $update_sql="UPDATE product SET category_id='$category_id',product_name='$name',
            product_mrp='$mrp',product_sprice='$sprice',product_qnt='$qnty',short_desc='$short_desc',
            pdescription ='$description', meta_title='$meta_title',meta_desc='$meta_desc',
            meta_keyword='$meta_key' WHERE product_id='$id'";
         }
          mysqli_query($con,$update_sql) or die(mysqli_error($con));
    }else{
           $image=rand(111111111,999999999).' '.$_FILES['image']['name'];
           move_uploaded_file($_FILES['image']['tmp_name'],'upload/'.$image);
     mysqli_query($con,"insert into product (category_id,product_name,product_mrp,product_sprice,product_qnt,
     product_img,short_desc,pdescription,meta_title,meta_desc,meta_keyword,status) values('$category_id','$name','$mrp','$sprice',
     '$qnty','$image','$short_desc','$description','$meta_title','$meta_desc','$meta_key','1')") or die(mysqli_error($con));
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
                        <div class="card-body card-block">
                       <form method="POST" enctype="multipart/form-data"> 
                        <div class="form-group">
                           <label for="category" class=" form-control-label">Product category</label>
                          <select class="form-control" name="category_id">
                             <option>select category</option>
                             <?php
                             $res=mysqli_query($con,"select * from category order by category_name desc");
                             while($row=mysqli_fetch_assoc($res)){
                                if($row['id']=$category_id){
                                echo"<option selected value=".$row['id'].">".$row['category_name']."</option>";
                                }else{
                                 echo"<option value=".$row['id'].">".$row['category_name']."</option>";
                                }
                             }
                             ?>

                          </select>
                        </div>
                        <div class="form-group">
                           <label for="category" class=" form-control-label">Product Name </label>
                           <input type="text" name="product_name" placeholder="Enter your  product name" class="form-control" required  value="<?php echo $name?>">
                        </div>                        <div class="form-group">
                           <label for="category" class=" form-control-label">Product MRP</label>
                           <input type="text" name="product_mrp" placeholder="Enter your product mrp" class="form-control" required  value="<?php echo $mrp?>">
                        </div>
                        <div class="form-group">
                           <label for="category" class=" form-control-label">Product price</label>
                           <input type="text" name="product_sprice" placeholder="Enter your product sprice" class="form-control" required  value="<?php echo $sprice?>">
                        </div>
                        <div class="form-group">
                           <label for="category" class=" form-control-label">Product QNTy</label>
                           <input type="text" name="product_qnt" placeholder="Enter your product qnty" class="form-control" required  value="<?php echo $qnty?>">
                        </div>
                        <div class="form-group">
                           <label for="category" class=" form-control-label">Product Image</label>
                           <input type="file" name="image" placeholder="Enter your product image" class="form-control" <?php echo $image_required?>>
                        </div>
                        <div class="form-group">
                           <label for="category" class=" form-control-label">Product short Description</label>
                           <textarea type="text" name="short_desc" placeholder="Enter your short description" class="form-control"><?php echo $short_desc?></textarea>
                        </div>
                        <div class="form-group">
                           <label for="category" class=" form-control-label">Product Description</label>
                           <textarea type="text" name="pdescription" placeholder="Enter your product description" class="form-control"><?php echo $description?></textarea>
                        </div>
                        <div class="form-group">
                           <label for="category" class=" form-control-label">Meta Title</label>
                           <textarea type="text" name="meta_title" placeholder="Enter your meta title" class="form-control"><?php echo $meta_title?></textarea>
                        </div>
                        <div class="form-group">
                           <label for="category" class=" form-control-label">Meta Description</label>
                           <textarea type="text" name="meta_desc" placeholder="Enter your meta description" class="form-control"><?php echo $meta_desc?></textarea>
                        </div>
                        <div class="form-group">
                           <label for="category" class=" form-control-label">Meta Keyword</label>
                           <textarea type="text" name="meta_keyword" placeholder="Enter your meta keyword" class="form-control"><?php echo $meta_key ?></textarea>
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