<?php
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
include('includes/config.php');
$scid = intval($_GET['scid']);
$cid=intval($_GET['cid']);
$ret = mysql_query("select * from subcategory where id='$scid'");
$sctitle = mysql_fetch_array($ret);
?>


<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <title><?php echo $sctitle['subcategoryName'];?></title>
        <link rel="shortcut icon" href="images/favicon.png" />
        <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,800">
        <link rel='stylesheet' href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <link rel="stylesheet" href="css/4.0.0/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/searchbar.css">
        <link rel="stylesheet" href="css/searchbar.css">

    </head>

    <body>
          <?php include('navbar.php');?>
        <!--second nav bar-->
        <?php include('menu-navigation.php');?>

        <nav aria-label="breadcrumb">
            <?php
                $rt = mysql_query("select * from category where id='$cid'");
                $row = mysql_fetch_array($rt);
                $ret = mysql_query("select * from subcategory where id='$scid'");
                while ($rw=mysql_fetch_array($ret)) 
               {
            ?>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item">
                        <a href="category.php?cid=<?php echo htmlentities($rw['categoryid']);?>">
                            <?php echo htmlentities($row['categoryName']);?> 
                        </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo htmlentities($rw['subcategoryName']);?></li>
                    </ol>
            <?php 
               } 
            ?>
        </nav>

<div class = "container-fluid">
    <div class="row">
    <div class = "col-md-12">
        <?php
            $query=mysql_query("select * from products where subCategoryid='$scid'");
            $num=mysql_num_rows($query);
            if($num==0)
            {?>

                <div class="item  col-xs-2 col-lg-3"> <h3>Coming Soon</h3>
                </div>
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
                        <a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><img  src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" alt="" class="card-img-top">
                        </a>                                         
                        <div class="card-body text-center">
                            <h6 class="name ">
                            <a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">  <?php echo htmlentities($row['productName']);?>
                            </a>
                        </h6>
                        <div class="product-price"> 
                            <h6><?php if($row['offer'] > 0) 
                                { ?>
                                    <strike >
                                        ₹ <?php echo htmlentities($row['productpricebd']);?>
                                    </strike>  &nbsp;
                                <?php 
                                } ?>  
                                <span style="font-size: 20px">
                                    ₹ <?php echo htmlentities($row['productPrice']);?>
                                </span>
                            </h6>
                            <?php if($row['offer'] > 0) { ?>
                                <h6 class ="inline" style="color:green">
                                    <?php echo htmlentities($row['offer'])."% off";?>
                                </h6>
                            <?php }else  {?>
                                <br>
                            <?php }?>
                        </div>   
                            <a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>" class="btn btn-secondary btn-sm" role="button">Buy Now</a>
                        <a onclick ="wishlist('<?php echo $row["id"];?>');"class="btn btn-danger btn-sm" role="button">
                                <i class="material-icons"  style="font-size: 15px; color:white">favorite</i>
                        </a>
                         </div>
                    </div>
                </div> 
            <?php 
                }?>
               </div>
          <?php  } 
        ?>
           </div>
        </div>
    </div>
        <h5 style="margin: 5% 0 20% 5%"><h5>


        <?php include('footer.php');?>
        
  
   <script src="js/4.0.0/jquery-3.2.1.min.js"></script>
     <script src="js/loginform.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="js/4.0.0/bootstrap.min.js"></script>
            </body>
</html>
