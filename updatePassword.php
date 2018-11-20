<?php
session_start();
include('includes/config.php');
    $newp = $_POST['newp'];
    $confirm = $_POST['confirm'];    
    $current = $_POST['current'];  
	$userid = $_SESSION['userid'];

    $row = mysql_fetch_array(mysql_query("SELECT * from user where userid = '$userid'"));
    if(strcmp($row['password1'],$current) == 0)
    {
    	$result = mysql_query("UPDATE user set password1 = '$newp'");
    	if($result)
    		echo 1;
    }
    else
    	echo 2;
?>