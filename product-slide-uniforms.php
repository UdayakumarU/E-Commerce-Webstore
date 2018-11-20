<div id = "productSection" class="card">
    <div class="card-header">
        <h4 class="float-left">Uniforms</h4>
        <div id="view-all" class="float-right">
            <a href="category.php?cid=2">
                <button class ="btn btn-primary btn-sm">View all</button>
            </a>
        </div>
    </div>
    <div class="card-body" id = "productSectionBody">
        <div class ="row">
            <div id="uniforms" class="owl-carousel owl-theme">
            <?php
                $ret=mysql_query("select * from products where categoryid = 2");
                while ($row=mysql_fetch_array($ret)) 
                {
            ?>
                <div class="item">
                    <div id="card-product" class ="card h-100">
                        <a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
                            <img  src="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['productName']);?>/<?php echo htmlentities($row['productImage1']);?>" alt="img"  class="card-img-top hoverable">
                        </a>
                        <div class="card-body text-center">
                                       
                            <h6 class="name ">
                           
                                    <a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>" ><?php echo htmlentities($row['productName']);?>
                                     </a>
                            </h6> 
                        
                            <div class="product-details">
                                <span class="text-center">
                                    <h6>
                                        <span style="font-size: 18px">
                                            ₹<?php echo htmlentities($row['productPrice']);?>
                                        </span>
                                             <?php if($row['offer'] > 0) 
                                                { ?>
                                                    <strike style="font-size: 13px;color:#666" >
                                                        ₹<?php echo htmlentities($row['productpricebd']);?>
                                                    </strike>  &nbsp;
                                                    <span style="font-size: 13px;color:green">
                                                    <?php echo htmlentities($row['offer'])."% off";?>
                                                </span>
                                                <?php 
                                                } ?>  
                                            
                                               
                                    </h6>
                                </span>
                                            
                            </div>
                            <a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>" class="btn btn-secondary btn-sm" role="button">Buy Now</a>
                            <a onclick ="wishlist('<?php echo $row["id"];?>');"class="btn btn-danger btn-sm" role="button">
                                <i class="material-icons"  style="font-size: 15px;color:white">favorite</i>
                            </a>
                                        
                        </div>
                    </div>
                </div>
            <?php 
                } 
            ?>
            </div>
        </div>
    </div>
</div>