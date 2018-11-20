<?php 
    session_start();
    include('includes/config.php');
    $activationKey = $_GET['activationKey'];

    $result = mysql_query("select *  from user where activationKey='$activationKey'");
    $row = mysql_fetch_array($result);
   
   if($row[0]>0)
   {
      $activationKey = 0;
      $email = $row['email'];
      $result = mysql_query("update user set activationKey='$activationKey' where email='$email'");
      $_SESSION['user'] = $row['name'];
      $_SESSION['userid'] = $row['userid'];
      $_SESSION['signup'] = 3;
      header("Location: index.php?login=Success");
    }
   else
    {
      header("Location: index.php");
    }
?> 