<?php
	
	session_start();
////////////////////////////////////////////////
//	$conn = mysqli_connect("localhost","root","","sahardb");
//		if(! $conn)
//		{
//			die("اتصال برقرار نشد".mysqli_error());
//		}
//
//		if(isset($_POST['submit']))
//		{
//			$u=$_POST['username'];
//			$p=md5($_POST['password']);
//
//			$sql="SELECT * FROM `tbladmin` WHERE `username`='$u' AND `password`='$p'";
//
//			$result = mysqli_query($conn,$sql);
//
//			if(mysqli_num_rows($result)>0)
//			{
//				$_SESSION['loginadmin']=$u;
//				$_SESSION['login_time']=time();
//				header("location:profile.php");
//			}
//			else
//			{
//				echo("نام کاربری یا رمز عبور صحیح نمی باشد");
//			}
//		}
//
//	mysqli_close($conn);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>صفحه ورود</title>
	<link href="css_admin/style_page.css" type="text/css" rel="stylesheet">
	<link href="css_admin/tem.css" type="text/css" rel="stylesheet">
</head>

<body>
	
	<?php
		include("template/header.php");
	?>
	
	<div id="container">
		<main>
	
	<table border=0>
		<form action="login.php" method="post"> 
			<tr>
				<td>
					<b>UserName:</b>
				</td>
				<td>
					<input type="text" name="username"><br><br>
				</td>
			</tr>
			<tr>
				<td>
					<b>Password:</b>
				</td>
				<td>
					<input type="password" name="password"><br><br>
				</td>
			</tr>
			<tr>
				<td>
					<td>
						<input type="submit" name="submit" value="login"><br><br>
					</td>
				</td>
			</tr>
		</form>
	</table>

<?php
	$conn = mysqli_connect("localhost","root","","sahardb");
		if(! $conn)
		{
			die("اتصال برقرار نشد".mysqli_error());
		}

		if(isset($_POST['submit']))
		{
			$u=$_POST['username'];
			$p=md5($_POST['password']);

			$sql="SELECT * FROM `tbladmin` WHERE `username`='$u' AND `password`='$p'";

			$result = mysqli_query($conn,$sql);

			if(mysqli_num_rows($result)>0)
			{
				$_SESSION['loginadmin']=$u;
				$_SESSION['login_time']=time();
				header("location:profile.php");
			}
			else
			{
				echo("نام کاربری یا رمز عبور صحیح نمی باشد");
			}
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
