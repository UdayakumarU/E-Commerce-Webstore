<?php 
                $ret=mysql_query("select * from products where id='$pid'");
               while($row=mysql_fetch_array($ret))
                {
?>

<div class="row">
    <div class="col-md-4" id="slider" >
        <div class="row">
            <div class="col-md-12"  >
                <div id="myCarousel" class="carousel slide">
                    <!-- main slider carousel items -->
                    <div class="carousel-inner"   style="border: 1px solid #ddd">
                        <div class="active item carousel-item" data-slide-number="0">
                            <img id="zoom_00" src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>"  class="img-fluid img-responsive">
                        </div>
                        <div class="item carousel-item" data-slide-number="1">
                            <img id="zoom_01" src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage2']);?>" class="img-fluid img-responsive">
                        </div>
                        <div class="item carousel-item " data-slide-number="2">
                            <img  id="zoom_02" src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage3']);?>" class=" img-fluid img-responsive">
                        </div>
                        <div class="item carousel-item " data-slide-number="3">
                            <img id="zoom_03" src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage3']);?>" class=" img-fluid img-responsive">
                        </div>
                        <div class="item carousel-item " data-slide-number="4">
                            <img id="zoom_04" src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage3']);?>" class=" img-fluid img-responsive">
                        </div>
                    </div>
                    <!-- main slider carousel nav controls -->
                
                    <ul class="carousel-indicators list-inline" style="width:100%;padding-top: 2px;border: 1px solid #ddd;">
                        <li class="list-inline-item active">
                            <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#myCarousel">
                                <img src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" class="img-fluid">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a id="carousel-selector-1" data-slide-to="1" data-target="#myCarousel">
                                <img src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage2']);?>" class="img-fluid">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a id="carousel-selector-2" data-slide-to="2" data-target="#myCarousel">
                                <img src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage3']);?>" class="img-fluid">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a id="carousel-selector-2" data-slide-to="3" data-target="#myCarousel">
                                <img src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage3']);?>" class="img-fluid">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a id="carousel-selector-2" data-slide-to="4" data-target="#myCarousel">
                                <img src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage3']);?>" class="img-fluid">
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class='col-md-8' id="product-description" style="overflow: hidden;">
        <div class="row">
            <div class='col-md-8'>
                <h4 class="name"><?php echo htmlentities($row['productName']);?></h4>
                <!--RATING-->
                <a data-toggle="collapse" href="#rating" aria-expanded="false" aria-controls="collapseExample"style="text-decoration: none" >
                    <?php 
                     $result = mysql_fetch_array(mysql_query("select * from rating where productid ='$pid'"));
                    if($result[0]<1)
                        {                
                    ?>
                        <b >Be the first to review this product</b>
                    <?php 
                        } 
                    else 
                        {
                    ?>
                        <span class="badge badge-secondary">
                            <i class="material-icons" style="font-size: 12px">star</i>
                            <?php echo htmlentities($row['rating']);?>
                        </span>
                    <?php
                        }
                    ?>

                </a>
                <div class ="collapse " id = "rating" style="z-index: 10;position: absolute;">
                    <div class ="card" style="width: 18rem;box-shadow: 1px 1px 2px 2px #888888;">
                        <div class="card-header">
                            <strong>Reviews and Rating</strong>
                        </div>
                        <div class = "card-body" >
                        <?php 
                        $query = mysql_query("SELECT * from rating where productid = '$pid'");
                        $reviews = mysql_fetch_array($query);
                        if($reviews[0]>=1)
                            {
                            ?>
                            <ul class="list-group list-group-flush" style="height: 150px; overflow-y: auto;" >
                            <?php 
                                
                                while($reviews = mysql_fetch_array($query))
                                {
                                     if(strlen($reviews['review'])>3)
                                        {
                            ?>
                                <li class="list-group-item">
                                    <span class="badge badge-success"> 
                                        <?php echo $reviews['rate'];?>
                                    </span>
                                    <p><?php echo $reviews['review'];?></p>
                            
                                    <span style="font-size: 12px;color: #999">
                                        <b><?php echo $reviews['username']. " ";?></b>
                                        <?php echo $reviews['reviewdate'];?>
                                    </span>
                                </li>
                            <?php           
                                        } 
                                }

                            ?>
                            </ul>
                            <?php 
                            }
                                if(isset($_SESSION['user']))
                                    $username = $_SESSION['user'];
                                else
                                    $username = null;
                                $rate_result=mysql_fetch_array(mysql_query("select * from orders join user on user.userid = orders.userid where orders.productid = '$pid' and user.name = '$username' and orders.status !='yet to deliver'"));
                                if($rate_result[0]>0)
                                {
                            ?>
                                    <form action="rating.php" method="POST">
                                    <br>
                                    <b> Add your review</b><br><br>
                                    <input type='hidden' name='url' value="<?php echo $_SESSION['url'];?>">
                                    <input type='hidden' name='productid' value="<?php echo $pid;?>">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-outline-warning ">
                                            <input type="radio" name="rate" id="option1" value="1" autocomplete="off" > 1
                                        </label>
                                        <label class="btn btn-outline-warning">
                                            <input type="radio" name="rate" id="option2" value="2" autocomplete="off"> 2
                                        </label>
                                        <label class="btn btn-outline-warning active">
                                            <input type="radio" name="rate" id="option3" value="3"  autocomplete="off" checked> 3
                                        </label> 
                                        <label class="btn btn-outline-warning">
                                            <input type="radio" name="rate" id="option4" value="4" autocomplete="off"> 4
                                        </label>
                                        <label class="btn btn-outline-warning">
                                            <input type="radio" name="rate" id="option5" value="5" autocomplete="off"> 5
                                        </label>  
                                    </div>
                                       <textarea class="form-control" rows="3" name="review" placeholder="Review..." style="margin: 10px 0px">
                                      </textarea>
                                    <button class="btn btn-outline-secondary" type="submit" name="rating">Submit</button>
                                    </form>
            
                        <?php   }
                                else
                                {
                        ?>
                                    <p> Oops! You are not allowed to rate this product.You hava to purchase this product.</p> 
      
                        <?php   }
                        ?>
                    </div>
                </div>
            </div>

                     <!--SM ASSURED-->&nbsp;
                <a  data-toggle="collapse" href="#smcard" aria-expanded="false" aria-controls="collapseExample">
                  <img src="images/smassured.jpg" height="35" class="img-responsive">
                </a>
                 <div class ="collapse " id = "smcard" style="z-index: 10;position: absolute;">
                        <div class ="card" style="width: 18rem;box-shadow: 1px 1px 2px 2px #888888; outline:none;">
                            <div class="card-header">
                                <strong>SonaMiller Assured</strong>
                                 
                            </div>
                            <div class = "card-body" >
                                 <p class="para"><i class="material-icons" style="float:left">label_important</i>
                                 You get exactly what you ordered</p>
                                 <p class="para"><i class="material-icons" style="float:left">label_important</i>Products delivered within 2-4 days</p>  

                               
                            </div>
                        </div>
                    </div>

                
               <!-- <h4 style="padding-top: 10px;">
                    <span class="price"><strong>₹ <?php echo htmlentities($row['productPrice']);?></strong></span><br>
                </h4>-->

                <div class="product-details">
                    <h6>
                        <?php if($row['offer'] > 0) 
                        { ?>
                            <strike style="color:#666" >
                                ₹<?php echo htmlentities($row['productpricebd']);?>
                            </strike>  &nbsp;
                            <span style="color:green">
                                <?php echo htmlentities($row['offer'])."% off";?>                             </span>
                        <?php 
                        } ?>  
                    </h6>
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
              <!--  <div class="row">
                    <div class ="col-md-8">
                        <span class="label">Shipping Charge :</span>
                        <span class="value"> 
                        <?php 
                            if($row['shippingCharge']==0)
                            {
                                echo "Free";
                            }
                            else
                            {
                                echo "₹ ".htmlentities($row['shippingCharge']);
                            }
                        ?>  
                        
                        </span>
                    </div>
                </div>-->
                <div class="share" style="padding-top: 15px">
                <ul class="list-unstyled social">
                    <li class="list-inline-item">
                        <a href="" target="_blank">
                            <ion-icon size="large" name="logo-facebook"></ion-icon>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="" target="_blank">
                            <ion-icon size="large" name="logo-twitter"></ion-icon>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href=""  target="_blank">
                            <ion-icon size="large" name="logo-googleplus"></ion-icon>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="" target="_blank">

                            <ion-icon size="large" name="logo-pinterest"></ion-icon>
                        </a>
                    </li>
                     <li class="list-inline-item">
                        <a href="" target="_blank">
                            <ion-icon size="large" name="logo-linkedin"></ion-icon>
                        </a>
                    </li>

                    <li class="list-inline-item">
                        <a href="" data-action="share/whatsapp/share">
                            <ion-icon size="large" name="logo-whatsapp"></ion-icon>
                        </a>
                    </li>

                </ul>
            </div>
            <h6><b style="color: #999">Size</b></h6>
            <form action="order-now.php?pid=<?php echo $pid?>" method="POST">
            <div class="btn-group btn-group-toggle" data-toggle="buttons" style="z-index: 0">
                <label class="btn  btn-outline-secondary active">
                    <input type="radio" name="size" id="option1" value="Small" autocomplete="off" checked> S
                </label>
                <label class="btn  btn-outline-secondary">
                    <input type="radio" name="size" id="option2" value="Medium" autocomplete="off"> M
                </label>
                <label class="btn btn-outline-secondary">
                    <input type="radio" name="size" id="option3" value="Large" autocomplete="off"> L
                </label>   
            </div>
            
            <h6 style="padding-top:20px"><b style="color: #999">Description</b></h6>
            <p><?php echo $row['productDescription'];?></p>

            <h6 style="padding-top:10px"><b style="color: #999">Highlights</b></h6>
            <p><?php echo $row['highlights'];?></p>
               
            <h6 style="color: #999">
                <strong><i class="material-icons" style="float: left;">verified_user</i>
                        &nbsp;Safe and Secure Payments.Easy returns.100% Authentic products.
                </strong>
            </h6>
            
               
        </div>
            <?php 
                $price =  $row['productPrice'];
                $productCount = $row['quantity'];
            ?>
            <div class="col-md-4">
                <div class="card">
                        <div class="card-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    Quantity
                                </span>
                            </div>
                            <select type="text" class="form-control" id="quantity" name="quantity">
                                <option>select</option>
                                <option>25</option>
                                <option>50</option>
                                <option>100</option>
                              </select>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    Price
                                </span>
                            </div>
                            <input type="text" class="form-control" id="price" name="price" value="<?php echo $price?> " readonly>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                   Save
                                </span>
                            </div>
                            <input type="text" class="form-control" id="save" name="save" value="0.00" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                Total
                                </span>
                            </div>
                            <input type="text" class="form-control" id="total" name="total" value="<?php echo $price?>" readonly>
                        </div>
                        
                          <div id='stack'></div>
                         <input type='hidden' name='url' value="<?php echo $_SESSION['url'];?>">
                         <?php 
                            if(!isset($_SESSION['user']))
                            {?>
                                <a class="btn btn-primary float-right" data-toggle="modal" data-target="#form" href="#" onClick="$('#signin').show(); $('#signup').hide();$('#forget').hide()">Sign in to Order</a>
                                <div id='stack'></div>
                        <?php
                            }
                            else
                            {?>
                            <?php 
                                if($row['productAvailability']=='Out of Stock')
                                {
                            ?>   
                                 <input value="No Stock" class="btn btn-primary float-right" disabled="true"> 
                                   
                            <?php 
                                } 
                                else 
                                {
                            ?>       
                                     <button type="submit" name="submit" role="button" class="btn btn-primary float-right"> Order now</button>
                            <?php 
                                }
                            }
                            ?><br>
                    </div> 
                    

                 </form>
            </div>
        </div>
        </div>
    </div>
</div>
<?php 
}
?>