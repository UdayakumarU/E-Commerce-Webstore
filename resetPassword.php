<?php
session_start();
if(isset($_SESSION['url']))
  $url = $_SESSION['url'];
else
  $url = "index.php"; 

if(isset($_POST['submit']))
{
  
  include('includes/config.php');
  $password = $_POST['password'];
  $email = $_GET['email'];
  
  $result = mysql_query("update user set password1='$password' where email='$email'");
  $result = mysql_query("select * from user WHERE email = '$email'");
  $row = mysql_fetch_array($result);
  $_SESSION['user'] = $row['name'];
  $_SESSION['userid'] = $row['userid'];
  $_SESSION['signup'] = 3;
  header("Location: $url?login Success");
}
?>


<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <title>Reset Password</title>
        <link rel="shortcut icon" href="images/favicon.png" />
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,800">
        <link rel='stylesheet' href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
        
        <link rel="stylesheet" href="css/4.0.0/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/searchbar.css">
 <style>
 body, h6, button
  {
    font-family: "Whitney SSm A", "Whitney SSm B", "Avenir", "Segoe UI", "Ubuntu", "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-weight: normal;
  }
</style> 
</head>

<body>
    <div class ="container col-md-6">
      <div class="jumbotron " >
        <h4 class="text-center"><img src="images/logo.png"   width="250" height="40"alt="" ></h4>
        <form method="post" onsubmit=" return resetPassword()">
          <br>
          <h6 style="text-align: center;margin-bottom: 40px"> Enter new Password</h6>
              <div id = 'msg'></div>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="material-icons">lock</i>
                      </span>
                  </div>
                <input type="password" class="form-control" placeholder="New Password" id ="password" name="password" required="true">
              </div>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="material-icons">lock</i>
                      </span>
                  </div>
                  <input type="password" class="form-control" placeholder="Confirm Password" id ="password2" name="password2" required="true">
              </div>
            <div class="wrapper" style="text-align: center;" >
                <button class="btn btn-primary" type="submit" name="submit" >Reset Password</button>
            </div>
          </form>
      </div>
   </div>
   <script>    
    function resetPassword()
     {
       var password = document.getElementById('password').value;
       var password2 = document.getElementById('password2').value;
       var msg = document.getElementById('msg');
       if(password.length<8)
       {
        msg.className='alert alert-danger';
        msg.innerHTML = 'password atleast 8 characters';
        return false;
       }
       else
       {
           if(password != password2)
           {
              msg.className='alert alert-danger';
            msg.innerHTML = 'Passwords Miss match';
            return false;
           }
           else
           {
             return true; 
           }
       }
       
     }
     </script>

</body>
</html>