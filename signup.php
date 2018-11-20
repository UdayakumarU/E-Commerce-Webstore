<?php
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;
	if (isset($_POST['signup']))
	{
		include('includes/config.php');
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$password = $_POST['password'];
		$activationKey = md5(microtime().rand());
		$result = mysql_query("select * from user WHERE email = '$email' OR phone='$phone'");
		$row = mysql_fetch_array($result);
		if($row[0]>0)
		{
			$_SESSION['signup']=5;	
		}
		else
		{
			
			$sql="INSERT into user(name,email,phone,password1,activationKey) values('$name','$email','$phone','$password','$activationKey')";
			if(!mysql_query($sql)){
				$_SESSION['signup']=2;
				
			}
			else
			{
				
				require 'PHPMailer/Exception.php';		
				require 'PHPMailer/PHPMailer.php';
				require 'PHPMailer/SMTP.php';

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

		        $mail->Host = 'mail.domain.com';
				$mail->SMTPAuth = true;  
		        $user = trim('user@domain.com');
				$pass = trim('password');
				$mail->Username = $user;
				$mail->Password = $pass;
				$mail->SMTPSecure = 'tls'; 
				$mail->Port = 587;   
				$mail->SetFrom($user, 'Company');
		        $mail->AddAddress($email);

		        $mail->Subject = trim("Account Activation ");
		        $mail->isHTML(true); 

		        $message = '<html><body>';
		        $message .= '<img src="images/logo.jpg alt="Sonamiller" class="w-100">';
		        $message .= '<h1>Account Activation</h1>';
		        $message .='<h3><a href="domain.in/createAccount.php?activationKey='.$activationKey .'">Click here to Activate your Account</a></h3>';
		        $message .= "</body></html>";
		        $mail->MsgHTML($message);
		        
		        try 
		        {
		         if(!$mail->validateAddress($email))
		        	$_SESSION['signup']=8;
		        else
		         {
		             $mail->Send();
		             $_SESSION['signup']=4;
		         }
		        
		             
		        } 
		        catch (phpmailerException $e)
		        {
		          echo $e->getMessage();
		        } 
		        catch (Exception $e)
		        {
		          echo $e->getMessage();
		        }
		    }
						
						
		}
	}
?>