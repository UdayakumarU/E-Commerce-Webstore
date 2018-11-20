<?php

session_start();

$_SESSION['url'] = $_SERVER['REQUEST_URI'];

include('includes/config.php');

?>



<!DOCTYPE html>

<html class="no-js" lang="en">

    <head>

        <title>About Us</title>

        <link rel="shortcut icon" href="images/favicon.png" />

        <link rel="shortcut icon" href="images/logo.ico" style=" border-radius: 50%" />

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

<div class="container">
<div class="row">

       <h5 style="padding:20px 0px 30px 0px"> About US </h5>
</div></div>
   	<?php include('footer.php');?>



       	

  <script src="js/loginform.js"></script>

  <script src="js/4.0.0/jquery-3.2.1.slim.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  
  <script src="js/4.0.0/bootstrap.min.js"></script>

    </body>

</html>

