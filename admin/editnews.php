<?php
	session_start();

	if(isset($_SESSION['loginadmin']))
	{
		$ncid=$_GET['ID'];
		$conn = mysqli_connect("localhost","root","","sahardb");
		if(! $conn)
		{
			die("Connection Failed".mysqli_error());
		}
		
		$sql="SELECT * FROM `tblnews` WHERE `newsID`='$ncid'";
		$result=mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($result);
		
		$nt=$row['newstitle'];
		
		$nc=$row['newscat'];
		$sql="SELECT * FROM tblnewscat WHERE `newscatID`='$nc'";
		$res=mysqli_query($conn,$sql);
		$r=mysqli_fetch_assoc($res);
		$ncn=$r['newscatname'];
		
		$ns=$row['newssummary'];
		$nd=$row['newsdesc'];
		
		$ni=$row['newsimage'];
		$pathnewsimage='newsimg/'.$ni;
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>صفحه ویرایش خبرها</title>
	<link href="css_admin/style_page.css" type="text/css" rel="stylesheet">
	<link href="css_admin/tem.css" type="text/css" rel="stylesheet">
</head>

<body>
	
	<?php
		include("template/header.php");
	?>
	
	<div id="container">
		<main>
	
	<table>
		<form action="" method="post" enctype="multipart/from-data">
			<tr>
				<td>
					<b>Name News:</b> 
				</td>
				<td>
					<input type="text" name="updatednt" value="<?php echo($nt);?>">
				</td>
			</tr>
			<tr>
				<td>
					<b>Please enter category news:</b>
				</td>
				<td>
					<select name="updatednewscat">
						<option>Category News</option>
					<?php
						$sql="SELECT * FROM tblnewscat";
						$result=mysqli_query($conn,$sql);
						while($rows=mysqli_fetch_array($result))
						{
							$newscatID=$rows['newscatID'];
							$newscatname=$rows['newscatname'];
							echo("<option value='$newscatID'>$newscatname</option>");
						}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<b>News Summary:</b> 
				</td>
				<td>
					<textarea name="updatednewssummary" cols="50" rows="5"><?php echo($ns); ?></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<b>Desc News:</b> 
				</td>
				<td>
					<textarea name="updatednewsdesc" cols="50" rows="10" ><?php echo($nd); ?></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<b>Author:</b> 
				</td>
				<td>
					<input type="text" name="updatedauthor" value="<?php echo($row['author']); ?>">
				</td>
			</tr>
			<tr>
				<td>
					<b>Image News:</b> 
				</td>
				<td>
					<img src="<?php echo($pathnewsimage);?>" height="45" width="60"/>
				</td>
			</tr>
			<tr>
				<td>
					<td>
						<input name="pudatednewsimage" type="file">
					</td>
				</td>
			</tr>
			<tr>
				<td>
					<td>
						<input type="submit" name="submit" value="Edit News">
					</td>
				</td>
			</tr>
		</form>
	</table>
	<?php
		
		if(isset($_POST['submit']))
		{
			$unt=$_POST['updatednt'];
			$unc=$_POST['updatednewscat'];
			$uns=$_POST['updatednewssummary'];
			$und=$_POST['updatednewsdesc'];
			$ua=$_POST['updatedauthor'];
			
			if(isset($_FILES['updatednewsimage']) && $_FILES['updatednewsimage']['error']==0)
			{
				$ni=$_FILES['updatednewsimage']['name'];
				$unit=$_FILES['updatednewsimage']['tmp_name'];
				$upi='newsimg/'.$ni;
				move_uploaded_file($unit,$upi);
			}
			
			if($unt != "" && $uns != "" && $und != "")
			{
				$sql="UPDATE `tblnews` SET `newstitle`='$unt', `newscat`='$unc' , `newssummary`='$uns',`newsdesc`='$und',`author`='$ua',`newsimage`='$ni' WHERE `newsID`='$ncid'";
				
				$result=mysqli_query($conn,$sql);
				
				if($result)
				{
					header("location:managenews.php");
				}
				else
				{
					echo("Editing Failed".mysqli_error());
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
<?php
	}
	else
	{
		header("location:login.php");
	}
?>








