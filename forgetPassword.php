<?php
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

      

if (isset($_POST['pass']))
{
	   include('includes/config.php');
	   $email = $_POST['email'];
		$result = mysql_query("select * from user WHERE email = '$email'");
		$row = mysql_fetch_array($result);
		if($row[0]<1)
		{
			$_SESSION['forgetPassword']=2;
    	}
    	else
    	{
    	require 'PHPMailer/Exception.php';      
        require 'PHPMailer/PHPMailer.php';
        require 'PHPMailer/SMTP.php';
        $mail->SMTPDebug = 2;    
        $mail->isSMTP(); 
        $mail = new PHPMailer(true);

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
        $mail->SetFrom($user, 'company');
        //$mail->SetFrom('test@veecreate.com', 'Sonamiller');
        $mail->AddAddress('admin@domain.com');
        $mail->isHTML(true); 


        $message = '<html><body>';
        $message .= '<img src="images/logo.jpg alt="company" class="w-100">';
        $message .= '<h1>Reset Password</h1>';
        $message .='<h3><a href="domain.in/resetPassword.php?email='.$email.'">Click here to Reset password</a></h3>';
        $message .= "</body></html>";
        $mail->Subject = trim("Reset Password");
        $mail->MsgHTML($message);
        
        try 
        {
          $mail->Send();
          $_SESSION['forgetPassword']=3;
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

?>
