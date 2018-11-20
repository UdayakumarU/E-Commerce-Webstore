<?php
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
include('includes/config.php');
?>


<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <title>company name</title>
        <link rel="shortcut icon" href="images/favicon.png" />
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,800">
        <link rel='stylesheet' href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
        <link rel="stylesheet" href="css/4.0.0/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/4.0.0/owl.carousel.css" >
        <link rel="stylesheet" href="css/4.0.0/owl.theme.default.css">
        <link rel="stylesheet" href="css/searchbar.css">

        <!---Cusomize  .crop -->
      
    </head>

    <body style=" background-color: #eee;">
         
        <?php include('navbar.php');?>
        
        <!--second nav bar-->
        <?php include('menu-navigation.php');?>
        <div class="container-fluid">
            <div class = "row ">
                <div class= "col-md-3 crop">
                   <a href="top-sales.php?flag=1"> 
                     <img id='imgoffer' class="img-fluid img-resposive" src="images/offers.jpg" alt="offer">
                   </a>
                </div>
                <div class=col-md-9 >
                    <div id="carouselExampleControls" class="carousel slide " data-ride="carousel">
                        <div class="carousel-inner" >
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="images/apron-medical-coat.jpg" alt="First slide">
                             </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/banner1.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/banner2.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/banner3.jpg" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="container-fluid">
          
                <?php include('product-slide.php');?>
           <br>
        
        <?php 
            $query=mysql_query("select * from category");
            $row = mysql_fetch_array($query);
        ?>
       
           
                 <?php include('product-slide-uniforms.php');?>
              
            <br>
        
      
    
           
        </div>
<?php include('footer.php');?>
   
<script src="js/4.0.0/jquery-3.2.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="js/4.0.0/bootstrap.min.js"></script>
        
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
<script src="js/loginform.js"></script>

<script>
 $(document).ready(function() {
 
  $("#top-sales").owlCarousel({
    
    loop:true,
    margin: 10,
    nav:true,
    dots: false,
    navText: ["<img src='images/prev.png'>","<img src='images/next.png'>"],
    responsiveClass: true,
     responsive: {
        200:{
          items: 2,
          nav:false
        },
        500:{
          items: 3
        },
        720:{
          items: 4
        },
        940:
        {
            items: 5
        },
        1090:
        {
            items: 6
        }

    }
  });
  
});
</script>

<script>
 $(document).ready(function() {
 
  $("#uniforms").owlCarousel({
    
    loop:true,
    margin: 10,
    nav:true,
    dots: false,
    hover : false,
    navText: ["<img src='images/prev.png'>","<img src='images/next.png'>"],
    responsiveClass: true,
  responsive: {
        200:{
           items: 2,
          nav:false
        },
        500:{
          items: 3
        },
        720:{
          items: 4
        },
        940:
        {
            items: 5
        },
        1090:
        {
            items: 6
        }
    }
  });
  
});
</script>
<script>
 $(document).ready(function() {
 
  $("#home-textiles").owlCarousel({
    
    loop:true,
    margin: 10,
    nav:true,
    dots: false,
    navText: ["<img src='images/prev.png'>","<img src='images/next.png'>"],
    responsiveClass: true,
     responsive: {
        200:{
           items: 2,
          nav:false
        },
        500:{
          items: 3
        },
        720:{
          items: 4
        },
        940:
        {
            items: 5
        },
        1090:
        {
            items: 6
        }
    }
      });
  
});
</script>


    </body>
</html>
