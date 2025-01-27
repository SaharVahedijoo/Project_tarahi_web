<?php

	$n = $nameError = "";
	$e = $emailError = "";
	$m = $messageError = "";
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		
		if(empty($_POST["name"])){
			$nameError = "لطفا نام را وارد کنید";
		}
		else{
			$n=htmlspecialchars($_POST['name']);
			if(! preg_match("/^[a-zA-Z ]*$/" , $n)){
				$nameError="برای نام فقط حروف لاتین را انتخاب کنید";
			}
		}
		
		if(empty($_POST["email"])){
			$emailError = "لطفا ایمیل را وارد کنید";
		}
		else{
			$e=htmlspecialchars($_POST['email']);
			if(! preg_match("/^[_a-z0-9-]+\@[a-z0-9-]+\.[a-z]{2,3}$/" , $e)){
				$emailError="لطفا در وارد کردن ایمیل خود دقت کنید";
			} 
		}
		
		if(empty($_POST["message"])){
			$messageError = "لطفا پیام را وارد کنید";
		}
		else{
			$m=htmlspecialchars($_POST['message']);
		}
	}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>تماس با ما</title>
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
		<form method="post" action="contactus.php"><br>
			
			<tr>
				<td>
			 		<b>Name</b>
				</td>
				<td>
					<input name="name" type="text">
				</td>
				<td>
					<span class="err">*<?php echo ($nameError);?></span><br><br>
				</td>
			</tr>
			<tr>
				<td>
					<b>Email</b>
				</td>
				<td>
					<input name="email" type="email">
				</td>
				<td>
					<span class="err">*<?php echo($emailError);?></span><br><br>
				</td>
			</tr>
			<tr>
				<td>
					<b>Subject</b>
				</td>
				<td>
					<input name="subject" type="text"><br><br>
				</td>
			</tr>
			<tr>
				<td>
					<b>Message</b>
				</td>
				<td>
					<textarea name="message"></textarea><br><br>
				</td>
				<td>
					<span class="err">*<?php echo ($messageError);?></span><br><br>
				</td>
			</tr>
			<tr>
				<td>
					<input id="btn" type="reset" value="cancel">
				</td>
				<td>
					<input id="btn" type="submit" value="send" name="submit">
				</td>
			</tr>

		</form>	
	</table>
	<?php
	
		$conn=mysqli_connect("localhost","root","","sahardb");
		
		if(!$conn){
			die("ارتباط با دیتابیس برقرار نشد".mysqli_connect_error());
		}
		
		mysqli_query($conn,"SET CHARACTER SET utf8");
		
		if(isset($_POST["submit"])){
			
			
			$s=$_POST['subject'];
			
			if(($n != "" && $nameError == "") && ($e != "" && $emailError == "") && ($m != "" && $messageError == "")){
		
				$sql="INSERT INTO `tbcontact`(`coName`, `coEmail`, `coSubject`, `coMessage`) VALUES ('$n','$e','$s','$m')";

				$result = mysqli_query($conn,$sql);

					if($result){
						echo("ارسال پیام شما با موفقیت انجام شد");
					}
					else{
						echo("ارسال پیام شما انجام نشد".mysqli_error($conn));
					}
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