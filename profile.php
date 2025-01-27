<?php

	session_start();
	//////////////////////////////////////////////
	
	if(isset($_SESSION['loginuser']))
	{
		$timeout = 10;
		$duration = time() - $_SESSION['login_time'];
		
		if($duration > $timeout)
		{
			header("location:logout.php");
		}
		else
		{
			echo("hi <b>".$_SESSION['loginuser']."</b> welcome to this page");
		}
		
		echo("<br><br>time: ".$duration." second");
		header("refresh:1 ; url=profile.php");
		
	}
	
	
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>صفحه پروفایل</title>
	<link href="Css/style.css" type="text/css" rel="stylesheet">
</head>

<body>
	<br><br>
	<a href="logout.php">logout</a>
</body>
</html>