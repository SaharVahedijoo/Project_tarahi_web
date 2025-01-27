<?php

	$errors =array();
	$u =$usernameError ="";
	$p =$passError ="";
	$e =$emailError ="";
	$filename ="";
	$exp ="";
	$fileext ="";
/////////////////////////////////////////////////////////////////////////////بررسی اتصال به سرور و سابمیت

	if($_SERVER['REQUEST_METHOD'] == "POST" && (isset($_POST['submit'])))
	{
		////////////////////////////////////////////////////////////////////بررسی باکس یوزرنیم
		if(empty($_POST["username"]))
		{
			$usernameError = "لطفا نام کاربری خود را وارد کنید";
		}
		else
		{
			$u=htmlspecialchars($_POST['username']);
			if(! preg_match("/^[a-zA-Z ]*$/" , $u))
			{
				$usernameError="برای نام کاربری فقط حروف لاتین را انتخاب کنید";
			}
		}
		/////////////////////////////////////////////////////////////////////بررسی باکس پسورد
		if(empty($_POST["password"]))
		{
			$passError = "لطفا رمز خود را وارد کنید";
		}
		else
		{
			$p=md5(htmlspecialchars($_POST['password']));
		}
		////////////////////////////////////////////////////////////////////بررسی باکس ایمیل
		if(empty($_POST["email"]))
		{
			$emailError = "لطفا ایمیل را وارد کنید";
		}
		else
		{
			$e=htmlspecialchars($_POST['email']);
			if(! preg_match("/^[_a-z0-9-]+\@[a-z0-9-]+\.[a-z]{2,3}$/" , $e))
			{
				$emailError="لطفا در وارد کردن ایمیل خود دقت کنید";
			} 
		}
		///////////////////////////////////////////////////////////////////////////بررسی دریافت فایل
		if(isset($_FILES['myupload']) && $_FILES['myupload']['error']==0)
		{
			$exts=array('jpg','jpeg','png');
			
			$filename=$_FILES['myupload']['name'];
			$exp=explode('.',$filename);
			$fileext=strtolower(end($exp));
			
			if(in_array($fileext,$exts)==false)
			{
				$errors[]="نوع فایل غیر مجاز است";
			}
			
			$filesize=$_FILES['myupload']['size'];
			if($filesize>9000000)
			{
				$errors[]="اندازه فایل غیر مجاز است";
			}
		}
	
//////////////////////////////////////////////////////////////////////////////اتصال به پایگاه داده

	/*echo("<pre>");
	print_r($_FILES);
	echo("</pre>");*/
	
	$conn = mysqli_connect("localhost","root","","sahardb");
	if(! $conn)
	{
		die("اتصال برقرار نشد".mysqli_error());
	}

		if(empty($errors))
		{ 
			
		$tmppath=$_FILES['myupload']['tmp_name']; 
		$destpath="admin/photos/".$filename;
		
		move_uploaded_file($tmppath,$destpath);
			
		if(($u != "" && $usernameError == "") && ($p != "" && $passError == "")&& ($e != "" && $emailError == "") )
		{
			$sql="INSERT INTO `tblusers`(`username`, `password`,`email`, `imgname`)  VALUES('$u','$p','$e','$filename')";

				$result=mysqli_query($conn,$sql);
			

				if($result)
				{
					echo("ثبت نام شما با موفقیت انجام شد");
				}
				else
				{
					echo("ثبت نام انجام نشد".mysqli_error);
				}
			}
		}
	
		else
		{
			for($i=0;$i<count($errors);$i++)
			{
				echo($errors[$i]."<br>");
			}
		}
	
	mysqli_close($conn);
	}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ثبت نام</title>
	<link href="Css/style.css" type="text/css" rel="stylesheet">
	<link href="Css/tem.css" type="text/css" rel="stylesheet">
	<style>
		.err{color: red;}
	</style>
</head>

<body>
	<?php
		include("template/header.php");
	?>
	<div id="container">
		<main>
	<table border="0">
		<form action="register.php" method="post" enctype="multipart/form-data">
			<tr>
				<td>
					<b>UserName</b>
				</td>
				<td>
					<input type="text" name="username"><br><br>
				</td>
				<td>
					<span class="err">*<?php echo ($usernameError);?></span><br><br>
				</td>
			</tr>
			<tr>
				<td>
					<b>Password</b>
				</td>
				<td>
					<input type="password" name="password"><br><br>
				</td>
				<td>
					<span class="err">*<?php echo ($passError);?></span><br><br>
				</td>
			</tr>
			<tr>
				<td>
					<b>Email</b>
				</td>
				<td>
					<input name="email" type="email"><br><br>
				</td>
				<td>
					<span class="err">*<?php echo($emailError);?></span><br><br>
				</td>
			</tr>
			<tr>
				<td>
					<td>
					
						<input type="file" name="myupload"><br><br>
					</td>
				</td>
			</tr>
			<tr>
				<td>
					<td>
						<input type="submit" name="submit" value="register">
					</td>
				</td>
			</tr>
		</form>
	</table>
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