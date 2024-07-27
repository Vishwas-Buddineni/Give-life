<?php
session_start();
$un=$_SESSION['un'];
session_destroy();
header('Location:admin-home1.php');
?>