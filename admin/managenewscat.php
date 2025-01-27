<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>مدیریت دسته اخبار</title>
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
		<form action="managenewscat.php" method="post">
			<tr>
				<td>
					<b>Number Category News:</b>
				</td>
				<td>
					<input type="text" name="newscatID"><br><br>
				</td>
			</tr>
			<tr>
				<td>
					<b>Name Category News:</b>
				</td>
				<td>
					<input type="text" name="newscatname"><br><br>
				</td>
			</tr>
			<tr>
				<td>
					<td>
						<input type="submit" name="submit" value="Registe category">
					</td>
				</td>
			</tr>
		</form>
	</table>

	<?php
	
	
			session_start();
		//////////////////////////////////////////////

		if(isset($_SESSION['loginadmin']))
		{

			$conn = mysqli_connect("localhost","root","","sahardb");
					if(! $conn)
					{
						die("اتصال برقرار نشد".mysqli_error());
					}

					if(isset($_POST['submit']))
					{
						$ncID=$_POST['newscatID'];
						$ncname=$_POST['newscatname'];

						if($ncID != "" && $ncname != "")
						{
							$sql="INSERT INTO `tblnewscat`(`newscatID`, `newscatname`) VALUES ('$ncID','$ncname')";

							$result=mysqli_query($conn,$sql);

							if($result)
							{
								//echo("دسته خبر ثبت شد");
								header("location:managenewscat.php");
							}
							else
							{
								echo("خطا در ثبت دسته خبر".mysqli_error());
							}
						}
					}

					$sql="SELECT * FROM `tblnewscat` ORDER BY `newscatID` ASC";
					$result=mysqli_query($conn,$sql);

					if(mysqli_num_rows($result)>0)
					{
						echo("<br><br> 
							  <table border='solid chocolate' style='border: 1px solid chocolate;direction:rtl; text_alin:right; background-color: cornsilk'> 
								  <tr><td>شماره دسته خبر</td>
								  <td>نام دسته خبر</td>
								  <td>عملیات</td></tr>");

						while($row = mysqli_fetch_assoc($result))
						{
							echo("<tr><td>".$row['newscatID']."</td>
									  <td>".$row['newscatname']."</td>
									  <td>
									  <a href='editnewscat.php?ID=".$row['newscatID']."'>ویرایش</a>
									| <a href='deletenewscat.php?ID=".$row['newscatID']."'>حذف</a> 
									  </td></tr>");
						}
						echo("</table>");
					}
					else
					{
						echo("دسته خبری وجود ندارد");
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