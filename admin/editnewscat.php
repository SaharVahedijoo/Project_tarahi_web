<?php
	
	session_start();
		//////////////////////////////////////////////

//		if(isset($_SESSION['loginadmin']))
//		{
//			
//			$ncid=$_GET['ID'];
//			$conn = mysqli_connect("localhost","root","","sahardb");
//
//			if(! $conn)
//			{
//				die("اتصال برقرار نشد".mysqli_error());
//			}
//			
//			//////////////////////////////////////
//
//			$sql2="SELECT * FROM `tblnewscat` WHERE `newscatID`='$ncid'";
//			$result= mysqli_query($conn,$sql2);
//			$row=mysqli_fetch_assoc($result);
//			$ncname2=$row['newscatname'];
//			
//			/////////////////////////////////////
//				if(isset($_POST['submit']))
//				{
//					$ncname=$_POST["newscatname"];
//
//					$sql="UPDATE `tblnewscat` SET `newscatname`='$ncname' WHERE `newscatID`='$ncid'";
//
//					$result= mysqli_query($conn,$sql);
//
//						if($result)
//						{
//							header("location:managenewscat.php");
//						}
//						else
//						{
//							echo("ویرایش انجام نشد".mysqli_error());
//						}
//					mysqli_close($conn);
//
//				}
//			
//		}
//		else
//		{
//			header("location:login.php");
//		}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ویرایش دسته خبر</title>
	<link href="css_admin/style_page.css" type="text/css" rel="stylesheet">
	<link href="css_admin/tem.css" type="text/css" rel="stylesheet">
</head>

<body>
	
	<?php
		include("template/header.php");
	?>
	
	<div id="container">
		<main>
	
	<table border="0">
		<form action="" method="post">
			<tr>
				<td>
					<b>Name Category News:</b>
				</td>
				<td>
					<input type="text" name="newscatname" placeholder="<?php echo($ncname2); ?>">
				</td>
			</tr>
			<tr>
				<td>
					<td>
						<input type="submit" name="submit" value="Edit Category News">
					</td>
				</td>
			</tr>
		</form>
	</table>

<?php
	if(isset($_SESSION['loginadmin']))
		{
			
			$ncid=$_GET['ID'];
			$conn = mysqli_connect("localhost","root","","sahardb");

			if(! $conn)
			{
				die("اتصال برقرار نشد".mysqli_error());
			}
			
			//////////////////////////////////////

			$sql2="SELECT * FROM `tblnewscat` WHERE `newscatID`='$ncid'";
			$result= mysqli_query($conn,$sql2);
			$row=mysqli_fetch_assoc($result);
			$ncname2=$row['newscatname'];
			
			/////////////////////////////////////
				if(isset($_POST['submit']))
				{
					$ncname=$_POST["newscatname"];

					$sql="UPDATE `tblnewscat` SET `newscatname`='$ncname' WHERE `newscatID`='$ncid'";

					$result= mysqli_query($conn,$sql);

						if($result)
						{
							header("location:managenewscat.php");
						}
						else
						{
							echo("ویرایش انجام نشد".mysqli_error());
						}
					mysqli_close($conn);

				}
			
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



