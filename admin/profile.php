<?php

	session_start();
	//////////////////////////////////////////////
	
//	if(isset($_SESSION['loginadmin']))
//	{
//		$timeout = 6000;
//		$duration = time() - $_SESSION['login_time'];
//		
//		if($duration > $timeout)
//		{
//			header("location:logout.php");
//		}
//		else
//		{
//			echo("hi <b>".$_SESSION['loginadmin']."</b> welcome to this page");
//		}
//		
//		echo("<br><br>time: ".$duration." second");
//		header("refresh:1 ; url=profile.php");
//		
//	}
//	else
//	{
//		header("location:login.php");
//	}
	
	
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>صفحه مدیریت</title>
	<link href="css_admin/style_page.css" type="text/css" rel="stylesheet">
	<link href="css_admin/tem.css" type="text/css" rel="stylesheet">
</head>

<body>
	<?php
		include("template/header.php");
	?>
	
	<div id="container">
		<main>
			
			<?php
			if(isset($_SESSION['loginadmin']))
	{
		$timeout = 6000;
		$duration = time() - $_SESSION['login_time'];
		
		if($duration > $timeout)
		{
			header("location:logout.php");
		}
		else
		{
			echo("hi <b>".$_SESSION['loginadmin']."</b> welcome to this page");
		}
		
		echo("<br><br>time: ".$duration." second");
		header("refresh:1 ; url=profile.php");
		
	}
	else
	{
		header("location:login.php");
	}
	
		?>
			
	<br><br>
	<!--<a href="managecontact.php">Manage Contacts</a><br><br>
	<a href="managenewscat.php">Manage Category News</a><br><br>
	<a href="managenews.php">Manage News</a><br><br>
	<a href="logout.php">logout</a>-->
			
		
		</main>
		<?php
		include("template/sidebar.php");
	?>
	</div>
	
	<?php
		include("template/footer.php");
	?>
</body>
</html>