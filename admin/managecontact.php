<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>مدیریت تماس ها</title>
	<link href="css_admin/style.css" rel="stylesheet" type="text/css">
	<link href="css_admin/tem.css" rel="stylesheet" type="text/css">
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

			$conn = mysqli_connect("localhost","root","","sahardb");
			if(! $conn){
				die("اتصال برقرار نشد".mysqli_error());
			}

			$sql = "SELECT * FROM `tbcontact` order by `coDate` DESC";

			$result = mysqli_query($conn,$sql);

			//var_dump($result);

			if(mysqli_num_rows($result)>0){

				echo("<table border='1'><tr><td>شماره کاربر</td><td>نام کاربر</td><td>ایمیل کاربر</td><td>موضوع پیام </td><td>متن پیام </td></tr>");
				while($row = mysqli_fetch_assoc($result)){
					echo ("<tr><td>".$row['coID']."</td><td>".$row['coName']."</td><td>".$row['coEmail']."</td><td>".$row['coSubject']."</td><td>".$row['coMessage']."</td><td><a href='deletecontact.php?ID=".$row['coID']."'>حذف</a></td></tr>");
				}
				echo("</table>");
			}
			else{
				echo("هیچ پیامی وجود ندارد");
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
