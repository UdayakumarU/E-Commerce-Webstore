<?php
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
include('includes/config.php');
?>
 
<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <title>Sona Miller</title>
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

        <!---Cusomize-->
      
    </head>
<body>
      <?php include('navbar.php');?>
        <!--second nav bar-->
        <?php include('menu-navigation.php');?>
        <br>

<div class = "container-fluid">
    <div class="row">
    <div class = "col-md-2">
        <h5>Featured links</h5>
    </div>
    <div class = "col-md-10">
<?php
    $query = $_GET['query']; 
     
    $min_length = 3;
     
    if(strlen($query) >= $min_length){ 
        $query = htmlspecialchars($query); 
         
        $query = mysql_real_escape_string($query);
         
        $raw_results = mysql_query("SELECT * FROM products WHERE (`productName` LIKE '%".$query."%')") or die(mysql_error());
             
       
         
        if(mysql_num_rows($raw_results) > 0){
         echo "Showing results for \"".$query."\""; ?>
             <div class="row grid-group-item">
           <?php while($results = mysql_fetch_array($raw_results)){?>
                 <div class="item  col-xs-3 col-lg-3 ">
                    <div id="product" class ="thumbnail card  h-100">
                        <a href="product-details.php?pid=<?php echo htmlentities($results['id']);?>"><img  src="admin/productimages/<?php echo htmlentities($results['productName']);?>/<?php echo htmlentities($results['productImage1']);?>" alt="" class="card-img-top">
                        </a>                                         
                        <div class="card-body text-center">
                            <h6 class="name ">
                            <a href="product-details.php?pid=<?php echo htmlentities($results['id']);?>">  <?php echo htmlentities($results['productName']);?>
                            </a>
                        </h6>
                        <div class="product-price"> 
                            <h6><?php if($results['offer'] > 0) 
                                { ?>
                                    <strike >
                                        ₹ <?php echo htmlentities($results['productpricebd']);?>
                                    </strike>  &nbsp;
                                <?php 
                                } ?>  
                                <span style="font-size: 20px">
                                    ₹ <?php echo htmlentities($results['productPrice']);?>
                                </span>
                            </h6>
                            <?php if($results['offer'] > 0) { ?>
                                <h6 class ="inline" style="color:green">
                                    <?php echo htmlentities($results['offer'])."% off";?>
                                </h6>
                            <?php }else  {?>
                                <br>
                            <?php }?>
                        </div>   
                                        
                        <a href="product-details.php?pid=<?php echo htmlentities($results['id']);?>" class="btn btn-secondary btn-sm" role="button">Buy Now</a>
                        <a onclick ="wishlist('<?php echo $results["id"];?>');"class="btn btn-danger btn-sm" role="button">
                                <i class="material-icons"  style="font-size: 15px; color:white">favorite</i>
                        </a>
                         </div>
                    </div>
                </div> 
               
           <?php }
             
        }
        else{ 
            echo "No results found for \"".$query."\"";
        }
         
    }
    else{ 
        echo "No results found ".$query;
    }
?>
</div>
</div>
</div>

       
   <script src="js/4.0.0/jquery-3.2.1.slim.min.js"></script>
 <script src="js/loginform.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="js/4.0.0/bootstrap.min.js"></script>
</body>
</html>