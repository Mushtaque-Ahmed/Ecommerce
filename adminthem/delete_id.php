<?php
 require('config.inc.php');
 $id=$_GET['id'];
 $sql="delete from category where id='$id'";
 $res=mysqli_query($con,$sql) or die(mysqli_error($con));
 if($res){
     header('location:categories.php');

 } 
 mysqli_close($con);
?>