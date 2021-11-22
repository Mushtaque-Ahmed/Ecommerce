<?php
$con=mysqli_connect("localhost","root","","ecom") or die(mysqli_connect_error($con));
if(!$con){
    echo " db not connected";
}
?>