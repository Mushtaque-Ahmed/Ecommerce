<?php
 require('config.inc.php');
 require('function.inc.php');
   $name=get_safe_value($con,$_POST['name']);
   $email=get_safe_value($con,$_POST['email']);
   $mobile=get_safe_value($con,$_POST['mobile']);
   $password=get_safe_value($con,$_POST['password']);
   $added_on=date('Y-m-d h:i:s');

   $sql="select * from register where email='$email'";
   $query=mysqli_query($con,$sql) or die(mysqli_error($con));
   $num=mysqli_num_rows($query);
   if($num==1){
       echo "registered";
   }else{
       $sql1="insert into register(name,email,mobile,password,added_on)
       values('$name','$email','$mobile','$password','$added_on')";
       $res=mysqli_query($con,$sql1) or die(mysqli_error($con));
       echo "thanks";

   }

?>