<?php
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
include('includes/config.php');
?>


<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <title>Contact Us</title>
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
    <?php include('sendmail.php');?>
      
      <div class="contact-section" style="padding-top: 40px;">
       
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <form  method="post">
              <div class="col-md-12 form-line">
                <label for="exampleInputUsername"><h4 style="color: var(--blue);">Contact Us</h4></label> 
                 <?php 
                 if(isset($_SESSION['feedback']))
                 {
                    if($_SESSION['feedback']==3)
                    {
                        $_SESSION['feedback']=0;
                 ?>
                        <div class="alert alert-success nortification animateOpen">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;
                        </span>
                      <strong>Success!</strong> <br>We will contact you shortly.
                      </div>
                       
                 <?php
                    }
                    else if ($_SESSION['feedback']==2)
                    {
                       $_SESSION['feedback']=0;
                 ?>
                      <div class="alert alert-danger nortification animateOpen">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;
                        </span>
                      <strong>Retry!</strong> <br>Send your feedback again.
                      </div>
                  <?php
                    }
                  }
                  ?>
                  <div class="form-group">
                    <label for="exampleInputUsername">Your name</label>
                    <input type="text" name="name" class="form-control" id="" placeholder=" Enter Name" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail">Email Address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail" placeholder=" Enter Email id" required>
                  </div>  
                  <div class="form-group">
                    <label for="telephone">Mobile No.</label>
                    <input type="tel" class="form-control" id="telephone"  name="phone" placeholder=" Enter 10-digit mobile no." required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for ="description"> Comments</label>
                    <textarea class="form-control" id="description" placeholder="Comments here" name="comments"  style="height:265px !important;"></textarea>
                  </div>
                  <div style="padding-bottom: 20px">

                    <button type="submit" value="submit" name="submit"class="btn btn-primary submit" style="float=right;">Send</button><br>
                  </div>
                  
              </div>
            </form>
          </div>
          <div class="col-md-6">
              <label for ="description"> 
                <i class="material-icons" style="float: left; padding-right: 18px;">stay_primary_portrait</i>+91 944-2700-377
              </label><br>
              <label for ="description"> 
                <i class="material-icons" style="float: left; padding-right: 18px;">local_shipping</i>+91 944-2700-377
              </label><br>
              
              <label for ="description"> 
                <i class="material-icons" style="float: left; padding-right: 18px;" >build</i>+91 944-2505-939
              </label><br>
              <label for ="description"> 
                <ion-icon size="large" name="logo-whatsapp" style="float: left; padding-right: 10px;"></ion-icon>+91 944-2505-939
              </label><br>
               <label for ="description"> 
                <i class="material-icons" style="float: left; padding-right: 18px;">email </i> online@valliappa.com
              </label><br>
              <label for ="description"> 
                <i class="material-icons" style="float: left; padding-right: 18px;">place</i>Address
              </label><br>  
              <iframe width="100%" height="400" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=Sona%20Towers%2C%20Millers%20Road%2C%20Vasanth%20Nagar%2C%20Bengaluru%2C%20Karnataka%2C%20India+(My%20Business%20Name)&amp;ie=UTF8&amp;t=&amp;z=15&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                    <a href="https://www.maps.ie/create-google-map/">Google map generator</a>
              </iframe>
          
          </div>
          </div>
      </div>
    </div>







        
       <?php include('footer.php');?>   

    <script src="https://unpkg.com/ionicons@4.2.5/dist/ionicons.js"></script>
        <script src="js/loginform.js"></script>  
    <script src="js/4.0.0/jquery-3.2.1.slim.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="js/4.0.0/bootstrap.min.js"></script>
            </body>
</html>
