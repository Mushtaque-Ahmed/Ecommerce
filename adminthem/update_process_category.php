<?php
require('config.inc.php');
require('function.inc.php');
 if(isset($_POST['submit'])){
     $id=get_safe_value($con,$_POST['post_id']);
     $cat_name=get_safe_value($con,$_POST['category_name']);
 
    $sql1="select * from category where category_name='$cat_name'";
    $query=mysqli_query($con,$sql1) or die(mysqli_error($con));
    $check=mysqli_num_rows($query);
    if($check>0){
        ?>
        <script>
            alert('Duplicate data not allowed');
        </script>
        <?php
     header('location:categories.php');
    }else{
       
        $sql="update category set category_name='$cat_name' where id='$id'";
        mysqli_query($con,$sql) or die(mysqli_error($con));
        header('location:categories.php');
    }
     
}
     
?>