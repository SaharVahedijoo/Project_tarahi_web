<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>حدف دسته خبرها</title>
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
	
		session_start();
	//////////////////////////////////////////////
	
	if(isset($_SESSION['loginadmin']))
	{
	
		$coid=$_GET['ID'];
		$conn = mysqli_connect("localhost","root","","sahardb");
		if(! $conn){
			die("اتصال برقرار نشد".mysqli_error());
		}
	
		$sql="DELETE FROM `tblnewscat` WHERE `newscatID`='$coid'";
	
		$result = mysqli_query($conn,$sql);
	
		if($result){
			header("location:managenewscat.php");
		}
		else{
			echo("خطا در حذف".mysqli_error());
		}
	
		mysqli_close($conn);
	}
	else
	{
		header("location:login.php");
	}
	?>
			
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