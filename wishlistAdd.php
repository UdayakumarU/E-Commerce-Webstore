<?php
session_start();
include('includes/config.php');
if(isset($_SESSION['user']))
{
    $productid = $_POST['productid'];  
    $userid = $_SESSION['userid'];

    $row = mysql_fetch_array(mysql_query("select * from wishlist where userid = '$userid' and productid = '$productid'")); 
    if($row[0]==0)
    {
        mysql_query("INSERT into wishlist(userid,productid) values('$userid','$productid')");
        echo 3;
   }
   else
   {
   	 echo 4;
   }
}
else
{
 
   echo 2;
}
?>