<?php
 		
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;

		require 'PHPMailer/Exception.php';		
		require 'PHPMailer/PHPMailer.php';
		require 'PHPMailer/SMTP.php';

		$orderid = $_SESSION['orderid'];
		$row = mysql_fetch_array(mysql_query("SELECT * from ((orders JOIN user on orders.userid = user.userid) join products on orders.productid = products.id) where orders.orderid = '$orderid'")); 
		$customermail = $row['email'];

        $message = '<html><body>';
		$message .= '<h2>Customer Details:</h2>';
		$message .='<h3>Name :'.$row["name"].'</h3>';
		$message .='<h3>Address:<br>'.$row["area"].',<br>'.$row["city"].',<br>'.$row["state"].',<br>'.$row["pincode"].'</h3>';
		$message .= '<br><h2>Product Details:</h2>';
		$message .='<h3>Product Name :'.$row["productName"].'</h3>';
		$message .='<h3>Size :'.$row["size"].'</h3>';
		$message .='<h3>Quantity :'.$row["orderquantity"].'</h3>';
		$message .='<h3>Payable Amount:'.$row["pay"].'</h3>';
		$message .= "</body></html>";
		

 		$mail = new PHPMailer(true);
 		$mail->SMTPDebug = 2;    
    	$mail->isSMTP();  
		$mail->SMTPOptions = array(
   			 		'ssl' => array(
        					'verify_peer' => false,
       						'verify_peer_name' => false,
        					'allow_self_signed' => true
  					  )
					);
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;  
		$user = trim('user@domain.com');
		$pass = trim('password');
		$mail->Username = $user;
		$mail->Password = $pass;
		$mail->SMTPSecure = 'tls'; 
		$mail->Port = 587;   
		$mail->SetFrom($user, 'company name');
 		//$mail->SetFrom('test@veecreate.com', 'Sonamiller');
        $mail->AddAddress('admin@domain.com');
        $mail->AddAddress($customermail);
		$mail->isHTML(true); 
		$mail->Subject = trim("Order placed");
		$mail->MsgHTML($message);
		
        try 
        {
   			$mail->Send();
   			
		} 
		catch (phpmailerException $e)
		{
    			
		} 
		catch (Exception $e)
		{
    			
		}
 	
?>