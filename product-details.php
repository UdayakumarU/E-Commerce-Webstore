<?php 
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
include('includes/config.php');
$pid=intval($_GET['pid']);
$producttitle = mysql_fetch_array(mysql_query("select productName from products where id='$pid' "));
?>


<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <title><?php echo $producttitle['productName'];?></title>
        <link rel="shortcut icon" href="images/favicon.png" />
        <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,800">
    <link rel='stylesheet' href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="css/4.0.0/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/searchbar.css">
<style>
  
   
  #myCarousel .list-group{
    white-space:nowrap;
    overflow-y: hidden;
    border: 1px solid #ddd;
}

#myCarousel .carousel-indicators {
    position: static;
    left: initial;
    width: initial;
    margin-left: initial;

}

#myCarousel .carousel-indicators > li {
    text-indent: initial; 
    height: initial;
    width: initial;
    
}

#myCarousel .carousel-indicators > li.active img {
    opacity: 0.7;
    border: 1px blue solid ;
}
  </style>

    </head>

    <body>
    	 <?php include('navbar.php');?>
        <!--second nav bar-->
        <?php include('menu-navigation.php');?>
        <nav aria-label="breadcrumb">
        	<?php
           $q= mysql_query("select * from products where id ='$pid'"); 
        $row=mysql_fetch_array($q);

        $cat=mysql_query("select * from category where id =".$row['categoryid']);
        $sub=mysql_query("select * from subcategory where id =".$row['subCategoryid']);

				$catr=mysql_fetch_array($cat);
        $subr=mysql_fetch_array($sub); 
			?>
  					<ol class="breadcrumb">
   						<li class="breadcrumb-item">
                <a href="index.php">Home</a>
              </li>
    					<li class="breadcrumb-item">
                <a href="category.php?cid=<?php echo htmlentities($row['categoryid']);?>">
                  <?php echo htmlentities($catr['categoryName']);?> 
                </a>
              </li>
    					<li class="breadcrumb-item">
                <a href ="sub-category.php?scid=<?php echo htmlentities($row['subCategoryid']);?>&amp;cid=<?php echo htmlentities($row['categoryid']);?>">
                  <?php echo htmlentities($subr['subcategoryName']);?>
                </a>
              </li>
    					<li class="breadcrumb-item active" aria-current="page"><?php echo htmlentities($row['productName']);?></li>
  					</ol>
  			<?php  
  		?>
		</nav>
		<div class='container-fluid'>
			<?php include('thumbslider.php');?>
		</div>
 		<?php include('footer.php');?>






  
<script src="https://unpkg.com/ionicons@4.2.5/dist/ionicons.js"></script>
 <script src="js/loginform.js"></script>
 <script src="js/4.0.0/jquery-3.2.1.min.js"></script>

<script src='js/jquery.elevatezoom.js'></script>

<script>
$(document).ready(function() {
    $('#quantity').change(function(e) {
        var quantity = $(this).val();
        var price = '<?php echo $price; ?>';
        var productCount = '<?php echo $productCount; ?>';
        price = price * quantity;
        price =price.toFixed(2);
       $('#price').val(price);
       $('#price').css({"color":"black","font-weight": "bold"});
        var offer = 0;

        if((productCount - quantity) > -1)
        {
          if(quantity == 25)
          {
            offer = 0 ;
          }
          else if(quantity == 50)
          {
            offer = 8.77;
          }
          else if(quantity == 100)
          {
            offer = 18.24;
          }
         

        var total = price - (price*(offer/100));
        var save = price - total;
        total = total.toFixed(2);
        save = save.toFixed(2);
        $('#save').val(save);
        $('#save').css({"color":"green","font-weight": "bold"});
        $('#total').val(total);
        $('#total').css({"color":"green","font-weight": "bold"});
        var nostack = document.getElementById('stack');
         nostack.innerHTML="<b style='color:#777;font-size:13px'>( *Exclusive of tax and shipping charges )</b>";
      }
      else
      {
        $('#quantity').val("No stack");
        $('#total').css({"color":"red","font-weight": "bold"});
        $('#price').val("0.00");
        $('#price').css({"color":"red","font-weight": "bold"});
        $('#save').val("0.00");
        $('#save').css({"color":"red","font-weight": "bold"});
        $('#total').val("0.00");
        $('#total').css({"color":"red","font-weight": "bold"});
        var nostack = document.getElementById('stack');
        nostack.innerHTML = "<b style='color:red'>No Stack</b>"
      }
    });
  
});
</script>
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="js/4.0.0/bootstrap.min.js"></script>

<script>
$(document).click(function(e) {
    if (!$(e.target).is('.btn') && !$(e.target).is('.form-control') && !$(e.target).is('.para') && !$(e.target).is('.card-body') && !$(e.target).is('.list-group-item')) {
        $('.collapse').collapse('hide');        
    }
});
</script>
<script>
  if ( $(window).width() > 750) { 
    $('#zoom_00').elevateZoom(); 
    $('#zoom_01').elevateZoom(); 
    $('#zoom_02').elevateZoom();
    $('#zoom_03').elevateZoom();
    $('#zoom_04').elevateZoom();
  }
</script>

    </body>
</html>
