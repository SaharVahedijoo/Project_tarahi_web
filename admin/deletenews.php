<?php
	session_start();
	
	if(isset($_SESSION['loginadmin']))
	{
		
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>صفحه حدف خبرها</title>
	<link href="Css/style.css" type="text/css" rel="stylesheet">
	<link href="Css/tem.css" type="text/css" rel="stylesheet">
</head>

<body>
	
	<?php
		include("template/header.php");
	?>
	
	<div id="container">
		<main>
	
	<?php
		
		$coid=$_GET['ID'];
		$conn = mysqli_connect("localhost","root","","sahardb");
		if(! $conn)
		{
			die("Connection Failed".mysqli_error());
		}
		
		$sql="DELETE FROM `tblnews` WHERE `newsID`='$coid'";
		$result=mysqli_query($conn,$sql);
		if($result)
		{
			header("location:managenews.php");
		}
		else
		{
			echo("Error Deleting".mysqli_errno());
		}
		
		mysqli_close($conn);
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
<?php
	}
	else
	{
		header("location:login.php");
	}
?>




