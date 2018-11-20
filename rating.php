<?php
session_start();
include('includes/config.php');
$url = $_POST['url'];
if(isset($_POST['rating']))
 {
		date_default_timezone_set('Asia/Kolkata');
		
		$productid = $_POST['productid'];
		$rate = $_POST['rate'];
		$userid = $_SESSION['userid'];
		$username = $_SESSION['user'];
		$review = $_POST['review'];
		$reviewdate = date( 'd-m-Y h:i:s A', time () );
		$result = mysql_query("insert into rating (productid,rate,userid,username,review,reviewdate)values('$productid','$rate','$userid',$username','$review','$reviewdate')");

		$rating_avg = mysql_fetch_array(mysql_query("select avg(rate) as avg from rating where productid='$productid'"));
		$rating = $rating_avg['avg'];
		$result1=mysql_query("update products set rating = '$rating' where id = '$productid'");

		if($result && $result1)
			$_SESSION['rating']=3;
		else
			$_SESSION['rating']=2;
}
header("location:".$url)
?>