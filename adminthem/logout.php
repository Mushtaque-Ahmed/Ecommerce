<?php
 session_start();
 unset($_SESSION['ADMIN_LOGIN']);
 unset($_SESSION['username']);
 header ('location:login.php');
?>