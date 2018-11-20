<?php
session_start();

if(isset($_SESSION['url']))
	$url = $_SESSION['url'];
else
	$url = "index.php"; 

if (isset($_POST['submit']))
{
	include('includes/config.php');
	$user = $_POST['user'];
	$password = $_POST['password'];
	if(empty($user)||empty($password))
   	{
   		$_SESSION['signup'] =2;
   	  	
   	}
   	else
   	{
		$result = mysql_query("select * from user WHERE email = '$user' OR phone='$user' AND password1='$password'");
		$row = mysql_fetch_array($result);
		if($row[0]<1)
		{
			$_SESSION['signup'] = 6;
        	
    	}
    	else
    	{
    		 if(($row['password1'] == $password)==false)
	    	{
	    	  $_SESSION['signup'] = 7;
	    	  
	    	  	
	    	    
	    	}
	    	else 
	    	{
	    		if($row['activationKey'] != 0)
	    		{
	    			$_SESSION['signup'] = 4;
	    			
	    		

	    		}
	    		else
	    		{
	    			$_SESSION['user']=$row['name'];
	    			$_SESSION['userid'] = $row['userid'];
	    			$_SESSION['signup'] = 3;
	    			
	    		}	
	    	}

    	}
	}
	
}
else{
	$_SESSION['signup'] =2;
	
}
header("Location: $url");
?>
