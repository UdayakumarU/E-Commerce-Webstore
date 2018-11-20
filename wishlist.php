<?php
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
include('includes/config.php');
?>


<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <title>Wishlist</title>
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
    <div class="container-fluid">
        <div class=row>
            <div class="col-md-8">
            <?php
                $userid = $_SESSION['userid'];
                $query =mysql_query("SELECT * from products join wishlist on wishlist.productid = products.id where wishlist.userid = '$userid' ");
                if(mysql_num_rows($query) == 0)
                {
            ?>     
                <div class="item  col-md-5 py-5" >
                    <h4 style="margin-bottom: 100%">Your Wishlist is empty</h4>
                </div>
            <?php 
                }
                else
                {
                ?>   
                <div class="container py-5"  >
                    <div class="card">
                        <div class = "card-header"><h5>Wishlist</h5></div>
                    </div>
                    <?php
                        while($row = mysql_fetch_array($query)) 
                        {
                    ?>  
                        <div class="card bg-light text-dark" >
                            <div class="row ">
                                <div class="col-md-3 ">
                                    <a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><img  src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" alt="" class="w-100">
                                    </a>     
                                </div>                                  
                                <div class="col-md-9 px-5  py-3">
                                    <div class="card-block px-3">
                                        <h6 class="name ">
                                            <a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">  <?php echo htmlentities($row['productName']);?>
                                            </a>
                                        </h6>
                                        <div class="product-price"> 
                                            <h6><?php if($row['offer'] > 0) 
                                            { ?>
                                                <strike >
                                                    ₹.<?php echo htmlentities($row['productpricebd']);?>
                                                </strike>  &nbsp;
                                            <?php 
                                            } ?>  
                                            
                                               <span style="font-size: 20px">₹.<?php echo htmlentities($row['productPrice']);?></span>
                                            </h6>
                                            <?php if($row['offer'] > 0) { ?>
                                                <h6 class ="inline" style="color:green">
                                                    <?php echo htmlentities($row['offer'])."% off";?>
                                                </h6>
                                            <?php } ?>
                                        </div>   
                                        <strong>
                                            <span class="value">
                                                <?php 
                                                    if($row['productAvailability']=='Out of Stock')
                                                    { 
                                                     echo "<p style='color:red;''>Out of Stock </p>";
                                                     $flag = 0;
                                                    }
                                                    else
                                                    {
                                                     echo "<p style='color:green'>In Stock </p>";
                                                     $flag = 1;
                                                    }
                                                ?>  
                                            </span>
                                        </strong>
                                    </div>
                                    <a role = "button" onclick ="wishlistDelete('<?php echo $row["id"];?>');" class="float-right" style="color: #666;cursor: pointer;" >
                                        <i class="material-icons">delete</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                <?php   } ?>
                </div>
    <?php   }  ?>
          
    </div>
    <div class="col-md-3 py-5">
        <div class="card ">
         <?php 
                $userid = $_SESSION['userid'];
                $result = mysql_query("select * from user where userid = '$userid'");
                $row = mysql_fetch_array($result);
                $email =$row['email']; 
                $phone =$row['phone'];
                $username = $row['name'];
                if(!$row['profilepic'])
                {
            ?>
                <img class="card-img-top h-50" src="http://getdrawings.com/img/cool-facebook-profile-picture-silhouette-2.jpg"  alt="Profile picture" >
                <?php
                }
                else 
                {   echo'<img class="card-img-top h-50" src="data:image/jpeg;base64,'.base64_encode($row['profilepic'] ).'" class="img-thumnail" />'; 
                }
            ?> 
            
            <div class="card-body">
                <h4 class="card-title"><strong><?php echo $username;?></strong></h4>
            </div>

            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?php echo $email?></li>
                <li class="list-group-item"><?php echo $phone?></li>
                <li class="list-group-item"><?php echo $row['area'].', ';?><?php echo $row['city'].', ';?><?php echo $row['state'];?></li>
                 <?php 
                    $orders = mysql_fetch_array(mysql_query("SELECT count(userid) as count from orders where userid = '$userid'"));
                                    ?>
                <li class="list-group-item">Order<span class="badge badge-primary" style="float: right"><?php echo $orders[0];?></span></li>
                <?php 
                    
                $wish=mysql_fetch_array(mysql_query("SELECT count(userid) as count from wishlist where userid='$userid'"));
                ?>
                <li class="list-group-item">Wishlist<span class="badge badge-primary" style="float: right"><?php echo $wish[0];?></span></li>
            </ul>
            <div class="card-body">
                <a href="myProfile.php" class="card-link">Edit Profile</a>
            </div>
        </div>
    </div>
</div>
</div>



        
       <?php include('footer.php');?>   

    <script src="https://unpkg.com/ionicons@4.2.5/dist/ionicons.js"></script>
        <script src="js/loginform.js"></script>  
    <script src="js/4.0.0/jquery-3.2.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="js/4.0.0/bootstrap.min.js"></script>

<script>
    function wishlistDelete(x) 
    {
    
        $.ajax({
                url: "wishlistDelete.php",
                type: "POST",
                data: {'productid': x },
                success: function (result) 
                { 
                    window.location.reload();
                    setTimeout(notify(result),5000);
                    
                }                
            });
        function notify(result)
        {
            console.log(result);
            var msg = document.getElementById('wishlistNotification');
            if(result == 1)
            {
                msg.innerHTML='<div class="alert alert-danger nortification animateOpen"><span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span><strong>Removed!</strong> <br>Product removed from your wishlist</div>';

            }
        }
    }
</script>
    </body>
</html>
