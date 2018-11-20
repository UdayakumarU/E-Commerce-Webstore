<?php
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI']; 
include('includes/config.php');
if(isset($_POST["insert"]))  
 {  
      $profilepic = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
      $query = "UPDATE user set profilepic='$profilepic'";  
      mysql_query($query);
       
 } 
if(isset($_POST['personal']))
{
  $userid = $_SESSION['userid'];
  $name = $_POST['name'];
  $area = $_POST['area'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $pincode = $_POST['pincode'];
  $profilepic = addslashes(file_get_contents($_FILES["profilepic"]["tmp_name"]));
  $profile_update = mysql_query("UPDATE user set name='$name',area='$area',city='$city',state='$state',pincode='$pincode' where userid ='$userid'");
  if($profile_update)
  {
    $_SESSION['user'] = $name;
    $_SESSION['profile'] = 3;
  }
  else
  {
    $_SESSION['profile'] = 2;
  }
}
if(isset($_POST['password_update']))
{

}
?>


<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <title>Edit Profile</title>
        <link rel="shortcut icon" href="images/favicon.png" />
        <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,800">
        <link rel='stylesheet' href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
        <link rel="stylesheet" href="css/4.0.0/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/searchbar.css">
    </head>

    <body>
        <?php include('navbar.php');?>
        <!--second nav bar-->
        <?php include('menu-navigation.php');?>
        <?php 
          $userid = $_SESSION['userid'];
          $row = mysql_fetch_array(mysql_query("SELECT * from user where userid = '$userid'")); 
        ?>
    <div class="container">
      <div class="jumbotron">
        <h5>Personal Information</h5><br>
        <div class="col-md-8">
          <div class="form-row">
            <?php 
              if(!$row['profilepic'])
                {
            ?>
                  <img src="http://getdrawings.com/img/cool-facebook-profile-picture-silhouette-2.jpg" alt="Profile Picture" style="height: 150px;width: 150px" class="img-thumnail">
                  <form method="post" enctype="multipart/form-data">  
                     <input type="file" name="image" id="image" />  
                     <br />  
                     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />  
                </form> 
                <p>Image should be less than 25kb</p>
            <?php 
                }
                else
                {
            ?>
                 <?php 
                 echo'<img src="data:image/jpeg;base64,'.base64_encode($row['profilepic'] ).'" height="200" width="200" class="img-thumnail" />';?>

                  <form method="post" enctype="multipart/form-data">

                     <input type="file" name="image" id="image" />  
                     <br />  
                     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />  
                </form> 
                <p>Image should be less than 25kb</p>
            <?php
                }
            ?>
          </div><br>
          <form method ="POST">
        
          
          
          <div class="form-row">
            <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo htmlentities($row['name']);?>">
          </div><br>

          <h6>Address</h6>
          <div class="form-row">
            <input type="text-area" class="form-control" name="area" value = "<?php echo htmlentities($row['area']);?>"placeholder="Area and Street" style="height: 100px;" required="true">
          </div><br>
          <div class="form-row">
            <div class="col-md-6">
              <input type="text" class="form-control" name="city" value="<?php echo htmlentities($row['city']);?>" placeholder="City/Town" required="true">
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" value="<?php echo htmlentities($row['state']);?>" name="state" placeholder="State" required="true">
            </div>
          </div><br>
          <div class="form-row">
            <div class="col-md-6">
              <input type="text" class="form-control" value="<?php echo htmlentities($row['pincode']);?>" name="pincode" placeholder="Pincode" required="true">
            </div>
          </div>
        
         <button type="submit" name='personal' class="btn btn-primary" style="float: right">Save</button>
      </form>
      </div>
    </div>
    <div class="jumbotron">
          <div class="col-md-12">
            <h5>Change Password</h5><br>
             <div  class="col-md-6">
              <div id='passwordUpdation' style="padding: 10px"></div>
            </div>
            <div class="form-row">
             <div class="col-md-3">
                <input id="current" type="password" class="form-control" name="current" placeholder="Current password">
              </div>
              <div class="col-md-3">
                <input id="new" type="password" class="form-control" name="new" placeholder="New password">
              </div>
              <div class="col-md-3">
                <input id="confirm" type="password" class="form-control" name="confirm" placeholder="Confirm password">
              </div>
            </div>
          </div>
        <a role= "button" onclick="updatePassword()" class="btn btn-primary" style="float: right;color: white;">Save</a>

      </div>
      <br><br>
</div>



        
       <?php include('footer.php');?>   

    <script src="https://unpkg.com/ionicons@4.2.5/dist/ionicons.js"></script>
        <script src="js/loginform.js"></script>  
   <script src="js/4.0.0/jquery-3.2.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="js/4.0.0/bootstrap.min.js"></script>
     <script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();
           var msg = document.getElementById('passwordUpdationNotify');  
           if(image_name == '')  
           {  
                
                msg.innerHTML ='<div class="alert alert-danger nortification animateOpen"><span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>Please Select Image</div>';
                return false; 
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     msg.innerHTML ='<div class="alert alert-danger nortification animateOpen"><span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>Invalid Image File</div>'; 
                     $('#image').val('');  
                     return false;  
                }
                  return true;  
           }  
      });  
 });  
 </script>
    <script>
    function updatePassword() 
    {
        var current = document.getElementById('current').value;
        var newp = document.getElementById('new').value;
        var confirm = document.getElementById('confirm').value;
        var msg = document.getElementById('passwordUpdation');
        if(newp.length<8)
        {
          msg.className='alert-danger';
          msg.innerHTML = 'password atleast 8 characters';
          document.getElementById('new').value='';
          document.getElementById('confirm').value=''
        }
        else 
        {
          if(newp.localeCompare(confirm) != 0)
          {
            msg.className='alert-danger';
            msg.innerHTML = 'Unmatching password';
            document.getElementById('new').value='';
            document.getElementById('confirm').value=''
          }
          else
          {
              $.ajax({
                      url: "updatePassword.php",
                      type: "POST",
                      data: {'newp': newp,'current':current,'confirm': confirm }, 
                      success: function (result) 
                      { 
                        notify(result);
                      }                
                  });
              function notify(result)
              {
                  console.log(result);
                  var msg = document.getElementById('passwordUpdationNotify');
                  if(result == 1)
                  {
                       msg.innerHTML ='<div class="alert alert-success nortification animateOpen"><span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>Password updated successfully</div>';
                        document.getElementById('current').value='';
                        document.getElementById('new').value='';
                        document.getElementById('confirm').value='';

                  }
                  else if(result == 2)
                  {
                      msg.innerHTML ='<div class="alert alert-danger nortification animateOpen"><span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>Invalid current password</div>';
                        document.getElementById('current').value='';

                  }
              }
          }
        }
        
    }
</script>
            </body>
</html>
