<?php
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
include('includes/config.php');
?>


<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <title>Orders</title>
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
            $query =mysql_query("SELECT * from products join orders on orders.productid = products.id where orders.userid = '$userid'");
            if(mysql_num_rows($query) == 0)
            {
        ?>     
                <div class="item  col-md-5 py-5" >
                    <h4 style="margin-bottom: 100%">No Orders</h4>
                </div>
        <?php 
            }
            else
            {
        ?>   
          <div class="container py-5">
            <div class="card">
                <div class = "card-header">
                    <h5>Orders</h5>
                </div>
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
                                <div class="col-md-5 px-5  py-3">
                                    <div class="card-block px-3">
                                        <h6 class="name ">
                                            <a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">   <h6><?php echo htmlentities($row['productName']);?></h6>
                                            </a>
                                        </h6>
                                        <div class="product-price"> 
                                             <h6>
                                                Quantity : <span style="float: right"><?php echo htmlentities($row['orderquantity']);?></span>
                                            </h6>
                                            <h6>
                                                Size : <span style="float: right"><?php echo htmlentities($row['size']);?></span>
                                            </h6>
                                            <h6>
                                                Payable amount :<span style="float: right"> ₹<?php echo htmlentities($row['pay']);?></span>
                                            </h6>
                                           
                                            <h6>
                                                You saved : <span style="float: right">₹<?php echo htmlentities($row['save']);?></span>
                                            </h6>

                                        </div>  </div></div>
                                        <div class="col-md-4 px-5  py-3">
                                    <div class="card-block px-3">
                                        <strong style="float: right">
                                            <span class="value">
                                            
                                            <?php 
                                                if($row['status']=='Yet to deliver')
                                                { 
                                                 echo "<p style='color:red;'> Yet to deliver</p>";
                                                 $flag = 0;
                                                }
                                                else
                                                {
                                                 echo "<p style='color:green'>Product delivered</p>";
                                                 $flag = 1;
                                                }
                                            ?>
                                            </span>
                                        </strong>
                                    </div>
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
                $result = mysql_fetch_array(mysql_query("select * from user where userid = '$userid'"));
                if(!$result['profilepic'])
                {
            ?>
                     <img class="card-img-top h-50" src="http://getdrawings.com/img/cool-facebook-profile-picture-silhouette-2.jpg"  alt="Card image cap" >
            <?php
                }
                else 
                {   echo'<img class="card-img-top h-50" src="data:image/jpeg;base64,'.base64_encode($result['profilepic'] ).'" class="img-thumnail" />'; 
                }
            ?> 
            <div class="card-body">
               
                <h4 class="card-title"><strong><?php echo $result['name'];?></strong></h4>
            </div> 
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?php echo $result['email'];?></li>
                <li class="list-group-item"><?php echo $result['phone'];?></li>
                 <li class="list-group-item"><?php echo $result['area'].', ';?><?php echo $result['city'].', ';?><?php echo $result['state'];?></li>
                 <?php 
                    
                    $userid = $_SESSION['userid'];
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
    </body>
</html>
