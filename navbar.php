<?php include('forgetPassword.php'); ?>
<?php include('signup.php'); ?>

 <div id = "wishlistNotification"></div>
  <div id = "passwordUpdationNotify"></div>
<?php

if(isset($_SESSION['rating']))
{
    if($_SESSION['rating']==3)
    {
        $_SESSION['rating']=0;
?>
        <div class="alert alert-success nortification animateOpen">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;
         </span>
        <strong>Rated successfully!</strong> <br>Thank you for your review
        </div>
                       
<?php
   }
   else if ($_SESSION['rating']==2)
    {
      $_SESSION['rating']=0;
    ?>
        <div class="alert alert-danger nortification animateOpen">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;
            </span>
            <strong>Retry!</strong> <br>Review the product again.
        </div>
<?php
    }
}

if(isset($_SESSION['order']))
{
    if($_SESSION['order']==3)
    {
        $_SESSION['order']=0;

?>
        <div class="alert alert-success nortification animateOpen">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;
         </span>
        <strong>Success!</strong> <br>Order placed successfully
        </div>
                      
<?php
        include('order-message.php'); 
   }
   else if ($_SESSION['order']==2)
    {
      $_SESSION['order']=0;
    ?>
        <div class="alert alert-danger nortification animateOpen">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;
            </span>
            <strong>Failed!</strong> <br>Order the product again!.
        </div>
<?php
    }
}
 
if(isset($_SESSION['forgetPassword']))
{
    if($_SESSION['forgetPassword']==3)
    {
        $_SESSION['forgetPassword']=0;
?>
        <div class="alert alert-success nortification animateOpen">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;
         </span>
        <strong>Success!</strong> <br>Check your mail to Reset your password
        </div>
                       
<?php
   }
   else if ($_SESSION['forgetPassword']==2)
    {
      $_SESSION['forgetPassword']=0;
    ?>
        <div class="alert alert-danger nortification animateOpen">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;
            </span>
            <strong>Retry!</strong> <br>You have entered a wrong mail id.
        </div>
<?php
    }
}

if(isset($_SESSION['signup']))
{
    if($_SESSION['signup']==3)//SUCCESS
    {
        $_SESSION['signup']=0;
?>
        <div class="alert alert-success  nortification animateOpen">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;
         </span>
        <strong>Welcome! <?php echo $_SESSION['user'];?></strong> <br>
             Now we are ready to help you.
        </div>
        <?php
    }
    else if ($_SESSION['signup']==8)//INVALID MAIL
    {
        $_SESSION['signup']=0;
?>
    <div class="alert alert-danger  nortification animateOpen">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;
         </span>
        <strong>Invalid Mail id!</strong> <br>
         Try with correct mail id. 
    </div>
<?php
    }
    else if ($_SESSION['signup']==7)//WRONG PASSWORD(SIGN IN)
    {
        $_SESSION['signup']=0;
?>
    <div class="alert alert-danger  nortification animateOpen">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;
         </span>
        <strong>Wrong Password!</strong> <br>
         Enter correct password to login. 
    </div>
<?php
    }
    else if ($_SESSION['signup']==6)//USER NOT FOUND(SIGN IN)
    {
        $_SESSION['signup']=0;
?>
    <div class="alert alert-danger nortification animateOpen">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;
         </span>
        <strong>User not found!</strong> <br>
         Create your new account.  
    </div>
    
<?php 
    }
    else if($_SESSION['signup']==5)//USER ALREADY EXIT(SIGN UP)
    {
        $_SESSION['signup']=0;
?>
        <div class="alert alert-danger  nortification animateOpen">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;
         </span>
        <strong>User already exist!</strong> <br>
        Try with new mail id and Phone number. 
        </div>
                       
<?php
   }
   else if ($_SESSION['signup']==4)//NOT ACTIVATED(U,I)
    {
      $_SESSION['signup']=0;
    ?>
        <div class="alert alert-warning  nortification animateOpen">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;
            </span>
            <strong> Activate Your Account!</strong> <br>Activation link has been sent to your mail id.
        </div>
<?php
    }
    else if ($_SESSION['signup']==2)//SUBMISSION ERROR(U,I)
    {
        $_SESSION['signup']=0;
?>
    <div class="alert alert-danger nortification animateOpen">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;
            </span>
            <strong>Error</strong> <br>Submission failed. Retry again.
        </div>
<?php
    }
}
?>  
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light " >
    <a class="navbar-brand py-0" href="index.php"> <img src="images/logo.png" width="180" height="40" class="d-inline-block align-top" alt="" >
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
    </button>

                     
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="navbar-nav ml-auto">
            <form class="form-inline mr-auto"  action="search.php" method="GET">
                <div class="input-group">
                    <input type="text" name="query" class="form-control" placeholder="" aria-label="Search" aria-describedby="basic-addon2" >
                    <div class="input-group-append " >
                        <button class="btn btn-outline-secondary " type="submit"> <i class="material-icons" style="float: right;">search</i></button>
                    </div>
                </div>
            </form>
        </div>
                
        <ul class="navbar-nav ml-auto">
            <li class="nav-item" style="padding-left: 10px;">
                <a class="nav-link " href="index.php">Home</a>
            </li>
            <li class="nav-item" style="padding-left: 10px;">
                <a class="nav-link" href="about.php">About Us
                </a>
            </li>
            <li class="nav-item" style="padding-left: 10px;">
                <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
    <?php  
        if(!isset($_SESSION['user']))
        {
            ?>
            <li class="nav-item" style="padding-left: 10px;">
                <a class="nav-link" data-toggle="modal" data-target="#form" href="#" onClick="$('#signin').show(); $('#signup').hide();$('#forget').hide()"><i class="material-icons">lock</i>Sign in</a>
            </li>
    <?php 
        } 
        else 
        {   ?>
              <li class="nav-item">
                <div class="dropdown" >
                    <a class="btn" href="#" role="button">
                        <i class="material-icons" style="float: left">shopping_cart</i>
                        
                        <?php echo $_SESSION['user'];?>
                    </a>
                  
                    <div class="dropdown-menu dropdown-menu-right" style="width: 8px">
                        
                        <a class="dropdown-item" href="wishlist.php" >
                            <i class="material-icons">     
                                 favorite
                            </i>
                            Wishlist
                        </a>
                        <a class="dropdown-item" href="orders.php" >
                            <i class="material-icons">
                                assignment_turned_in
                            </i>
                            Orders
                        </a>
                        <a class="dropdown-item" href="myProfile.php">
                            <i class="material-icons">
                                settings
                            </i>
                            Settings
                        </a>
                        <a class="dropdown-item" href="logout.php">
                            <i class="material-icons">
                                power_settings_new
                            </i>
                            Logout
                        </a>
                    </div>
                </div>
            </li>  
        <?php }   ?>
        </ul>
    </div>
</nav>
<?php include('loginform.php'); ?>