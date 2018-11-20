<?php
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
include('includes/config.php');
$flag = intval($_GET['flag']);
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <title>Top Sales</title>
        <link rel="shortcut icon" href="images/favicon.png" />
        <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

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

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <?php 
                    if($flag==0)
                    {?>
                        <li class="breadcrumb-item active" aria-current="page">Top sales</li>
                <?php 
                    }
                    else 
                    {?>
                        <li class="breadcrumb-item active" aria-current="page">Special offer</li>
                <?php 
                    }?>
            </ol>
        </nav>
<div class = "container-fluid">
    <div class="row">
    <div class = "col-md-12">
     <?php
        if($flag == 0)
            {
            $query=mysql_query("select * from products where salesCount >= 0");
           }
        else
            {
            $query=mysql_query("select * from products where offer >= 30");
            }    
            $num=mysql_num_rows($query);
            if($num==0)
            {?>

                <div class="item  col-xs-4 col-lg-4"> <h3>Coming Soon</h3>
                </div>
                <h5 style="margin: 5% 0 25% 5%"><h5>
        <?php 
             } 
            else 
            { ?>
            <div class="row grid-group-item">
            <?php
                while ($row=mysql_fetch_array($query)) 
                {?>                            
                <div class="item col-md-4 col-sm-6 col-lg-3">
                    <div id="product" class ="thumbnail card  h-100">
                        <a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><img  src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" alt="" class="card-img-top"></a>                                       
                    <div class="card-body text-center">
                        <div class="product-price"> 
                             <h6>
                                ₹. <?php echo htmlentities($row['productPrice']);?>            
                            </h6>
                        </div>  
                        <h6 class="name ">
                        <a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">   <?php echo htmlentities($row['productName']);?>
                        </a>
                        </h6>
                    </div>
                </div>
            </div>
            <?php 
                }?>
            </div>
           <?php } 
        ?>
            </div>
        </div>
    </div>
        <?php include('footer.php');?>
      
      
   <script src="js/4.0.0/jquery-3.2.1.slim.min.js"></script>
    <script src="js/loginform.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="js/4.0.0/bootstrap.min.js"></script> 
    </body>
</html>
