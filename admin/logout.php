<?php
	session_start();
//////////////////////////////////
	session_destroy();
	//unset($_SESSION['loginuser']);
	header("location:login.php");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>صفحه خروج از صفحه پروفایل</title>
	<link href="Css/style.css" type="text/css" rel="stylesheet">
	<link href="Css/tem.css" type="text/css" rel="stylesheet">
</head>

<body>
	<?php
		include("template/header.php");
	?>
	
	<div id="container">
		<main>
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