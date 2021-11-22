<?php
  session_start();
require('config.inc.php');
require('function.inc.php');
$login_id=get_safe_value($con,$_POST['login_id']);
$login_pass=get_safe_value($con,$_POST['login_pass']);
 $sql="select * from register where email='$login_id' && password='$login_pass'";
$query=mysqli_query($con,$sql) or die(mysqli_error($con));
$num=mysqli_num_rows($query);
if($num>0){
    $row=mysqli_fetch_assoc($query);
    $_SESSION['USER_LOGIN']='YES';
    $_SESSION['USER_ID']=$row['id'];
    $_SESSION['USER_NAME']=$row['name'];
    echo "valid";
}else{
    echo "invalid";
}
?>