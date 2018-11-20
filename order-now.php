<?php 
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
include('includes/config.php');

if(isset($_POST['placeorder']))
 {
 		  date_default_timezone_set('Asia/Kolkata');// change according timezone
		  $userid = $_SESSION['userid'];
		  $name = $_POST['name'];
		  $area = $_POST['area'];
		  $city = $_POST['city'];
		  $state = $_POST['state'];
		  $pincode = $_POST['pincode'];
		  $landmark = $_POST['landmark'];
		  $productid = $_POST['pid'];
		  $orderquantity = $_POST['quantity'];
		  $size = $_POST['size'];
		  $pay = $_POST['pay'];
		  $save = $_POST['save'];
		  $orderdate = date( 'd-m-Y h:i:s A', time () );
		  $status = 'Yet to deliver';

		  $result = mysql_query("INSERT into orders (userid,name,area,city,state,pincode,landmark,productid,orderquantity,size,pay,save,orderdate,status)values('$userid','$name','$area','$city','$state','$pincode','$landmark','$productid','$orderquantity','$size','$pay','$save','$orderdate','$status')");
		  mysql_query("UPDATE products SET quantity = quantity-'$orderquantity'");
		  mysql_query("UPDATE user SET area = '$area',city='$city',state='$state',pincode='$pincode',landmark='$landmark',orders = orders+1 WHERE userid='$userid'");

		  if($result){

		  	$row = mysql_fetch_array(mysql_query("SELECT * from orders where orderdate = '$orderdate'"));
		    $_SESSION['orderid']=$row['orderid'];
		  	$_SESSION['order']=3;
		  }
		  else{
		  	$_SESSION['order']=2;
		  }
		  header("location:index.php");
 }
if(isset($_POST['submit']))
{

	$quantity = $_POST['quantity'];
	if($quantity < 1)
		header("Location:". $_POST['url']);
	$price = $_POST['total'];
	$saving = $_POST['save'];
	$size = $_POST['size'];
	$pid=intval($_GET['pid']);
	$row = mysql_fetch_array(mysql_query("SELECT * from products where id ='$pid'"));
	$shippingCharge = $row['shippingCharge'];
	if($price < 500)
		$pay = $shippingCharge + $price;
	else
		$pay = $price;
}
?>


<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <title>Sona Miller</title>
        <meta http-equiv="x-ua-compatible" content="ie=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

	    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,800">
	    <link rel='stylesheet' href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	    <link rel="stylesheet" href="css/4.0.0/bootstrap.min.css">
	    <link rel="stylesheet" href="css/style.css">
	    <style>
	    	label
	    	{
	    		margin-left: 10px;
	    	}
	    </style>
	</head>
	<body>
		<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light " >
	    	<a class="navbar-brand py-0" href="index.php"> <img src="images/logo.png" width="150" height="30" class="d-inline-block align-top" alt="" >
	    	</a>
	    </nav>

	    <div class="container">
	    	<div class="row">
	    	<div class="col-md-9">
		    	<div class="jumbotron">
		    		<?php 
		    		$userid = $_SESSION['userid'];
		    		$row= mysql_fetch_array(mysql_query("select * from user where userid ='$userid'"));
		    		?>
		    		<h5>Contact<i class="material-icons" style="float: left;">done</i></h5>
		    		<div class="container" style="width: 80%">

		    			  <div class="input-group mb-3">
	                            <div class="input-group-prepend">
	                                <span class="input-group-text">
	                                 <i class="material-icons" style="float: left;">stay_primary_portrait</i>
	                                </span>
	                            </div>
	                            <input type="text" class="form-control" id="total" value="<?php echo htmlentities($row['phone']);?>" readonly>
	                       </div>
			    		   <div class="input-group mb-3">
	                            <div class="input-group-prepend">
	                                <span class="input-group-text">
	                                <i class="material-icons" style="float: left;">email</i>
	                                </span>
	                            </div>
	                            <input type="text" class="form-control" id="total" value="<?php echo htmlentities($row['email']);?>" readonly>
	                       </div>
			    	</div>
		    	</div>
		    	<div class="jumbotron">
		    		<h5>Delivery Address</h5>
		 			<form  method="post">
				        
				        <div class="form-row ">
				        	<label>Name</label>
				            <input type="text" class="form-control" value="<?php echo htmlentities($row['name']);?>" name="name"required="true">
				        </div><br>
				        <div class="form-row">
				         	<label>Area and street</label>
				            <input type="text-area" class="form-control" name="area" value = "<?php echo htmlentities($row['area']);?>" required="true">
				      
				        </div><br>
				        <div class="form-row">
				          <div class="col-md-6">
				          	<label>City/Town</label>
				            <input type="text" class="form-control" name="city" value="<?php echo htmlentities($row['city']);?>" required="true">
				          </div>
				          <div class="col-md-6">
				          	<label>State</label>
				            <input type="text" class="form-control" value="<?php echo htmlentities($row['state']);?>" name="state" required="true">
				          </div>
				        </div><br>
				        <div class="form-row">
				          <div class="col-md-6">
				          	<label>Pincode</label>
				            <input type="text" class="form-control" value="<?php echo htmlentities($row['pincode']);?>" name="pincode" required="true">
				          </div>
				          <div class="col-md-6">
				          	<label>Landmark(optional)</label>
				            <input type="text" class="form-control" value="<?php echo htmlentities($row['landmark']);?>" name="landmark">
				          </div>
				          <input type='hidden' name='pid' value="<?php echo $pid;?>"">
				        <input type='hidden' name='quantity' value="<?php echo $quantity;?>">
				        <input type='hidden' name='pay' value="<?php echo $pay;?>">
				        <input type='hidden' name='save' value="<?php echo $saving;?>">
				        <input type='hidden' name='size' value="<?php echo $size;?>">
				        </div>
				         

				       
				        <button type="placeorder" name="placeorder" class="btn btn-primary" style="margin-top: 10px">Save and Deliver here</button>
			 		</form>
		  		</div>
	  		</div>
		  		<div class="col-md-3">
		  			<ul class="list-group">
	                    <li class="list-group-item active">Price Details</li>  
	                    <li class="list-group-item">
	                     	<span style="float:left">
	                     		Total Items 
	                     	</span>
	                        <span style="float:right">
	                        	<?php  if($quantity >1) echo $quantity.' items'; else echo '1 item'?>
	                    	</span> 

	                    </li>
	                   <!-- <li class="list-group-item">
	                     	<span style="float:left">
	                     		Delivery Charges
	                     	</span>
	                        <span style="float:right">
	                        	<?php if($price < 500) 
	                        			echo '₹'.$shippingCharge; 
	                        		else 
	                        			echo 'FREE';
	                        	?>
	                    	</span> 
	                    </li>-->
	                    <li class="list-group-item" style="margin-top: 10px;height: auto;padding-top:25px">
	                    	<span style="float:left">Amount Payable</span>
	                     	<b><span style="float:right;color: green">₹<?php  echo $pay;?></span></b> 
							<b style="float:left;font-size: 14px;color:#888">( *Exclusive of tax and shipping charges )</b>
						</li>
						<?php  
							if($saving> 0)
							{
						?>
							<li class="list-group-item">
		                    	<span style="font-size: 13px">
		                    		
		                     		<b>This order saves ₹<?php  echo $saving;?></b>
		                     	</span>
		                    </li>
		                <?php 
		            		}
		            	?>
					</ul>
	            </div>
	        </div>
		</div>
	</div>
	</body>
</html>


