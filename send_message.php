<?php
 require('config.inc.php');
 require('function.inc.php');
 $name=get_safe_value($con,$_POST['name']);
 $email=get_safe_value($con,$_POST['email']);
 $mobile=get_safe_value($con,$_POST['mobile']);
 $message=get_safe_value($con,$_POST['message']);
 $added_on=date('Y-m-d h:i:s');
 mysqli_query($con,"insert into contact(name,email,mobile,comment,added_on)
  values('$name','$email','$mobile','$message','$added_on')") or die(mysqli_error($con));
  echo "thank you";

?>