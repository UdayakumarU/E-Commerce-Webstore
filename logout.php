<?php

  session_start();
/*	if(isset($_SESSION['url']))
		$url = $_SESSION['url'];
	else*/
		$url = "index.php"; 
  session_unset();
  session_destroy();
    header("Location: $url");
    exit();
?>