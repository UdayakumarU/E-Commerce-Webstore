<?php
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;

		require 'PHPMailer/Exception.php';		
		require 'PHPMailer/PHPMailer.php';
		require 'PHPMailer/SMTP.php';
 	if(isset($_POST['submit']))
 	{	
 		$mail = new PHPMailer(true);
 		$mail->SMTPDebug = 2;    
    	$mail->isSMTP();  
		$mail->Host = 'mail.domain.com';
		$mail->SMTPAuth = true;  
		//$user = trim('erudayu1010@gmail.com');
		//$pass = trim('hihihihi19');
		$user = trim('user@domain.com');
		$pass = trim('password');
		$mail->Username = $user;
		$mail->Password = $pass;
	//	$mail->SMTPSecure = 'tls'; 
		 $mail->Port = 25;   
		$mail->SetFrom($user, 'company name');
        $mail->AddAddress('admin@domain.com');
		$mail->isHTML(true); 
		
        	$message = '<html><body>';
		$message .= '<h1>Customer</h1>';
		$message .='<h3>Name :'.$_POST["name"].'</h3>';
		$message .='<h3>Email:'.$_POST["email"].'</h3>';
		$message .='<h3>Phone:'.$_POST["phone"].'</h3>';
		$message .='<p><h3>'.$_POST["comments"].'</h3></p>';
		$message .= "</body></html>";
		 
		$mail->Subject = trim("Customer Feedback");
		$mail->MsgHTML($message);
		
        	try 
        	{
   			$mail->Send();
   			$_SESSION['feedback']=3;
		} 
		catch (phpmailerException $e)
		{
    			$_SESSION['feedback']=2;
		} 
		catch (Exception $e)
		{
    			$_SESSION['feedback']=2;
		}
 	}
?>