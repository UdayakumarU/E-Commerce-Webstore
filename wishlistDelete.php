<?php
session_start();
include('includes/config.php');
    $productid = $_POST['productid'];  
    $userid = $_SESSION['userid'];
    mysql_query("DELETE from wishlist where userid = '$userid' and productid = '$productid'"); 
 	echo 1;
?>