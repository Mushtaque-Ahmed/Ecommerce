<?php
   require('config.inc.php');
   require('function.inc.php');


   if(isset($_POST['submit'])){
     $user=get_safe_value($con,$_POST['user']);
     $pass=get_safe_value($con,$_POST['pass']);

     $sql="select * from admin where user='$user' && password='$pass'";
     $query=mysqli_query($con,$sql) or die(mysqli_error($con));
     $num=mysqli_num_rows($query);
     if($num==1){
       $_SESSION['user']='$user';
       header('location:index.php');
     }else{
       header('location:login.php');
     }
   }
      
      /*if(isset($_POST['submit'])){
        $username=get_safe_value($con,$_POST['user']);
        $password=get_safe_value($con,$_POST['pass']);

       $sql="select * from admin where user='$username' && password='$password'";
       $query=mysqli_query($con,$sql) or die(mysqli_error($con));
       $num=mysqli_num_rows($query);
    
      if($num==1){
          $_SESSION['ADMIN_LOGIN']='yes';
          $_SESSION['ADMIN_USER']=$username;
          header('location:index.php');
          die();
      }else{
           $_SESSION['wrong-pass']='pleae try again';
          header('location:login.php');

      }
       

    } */ 
?>