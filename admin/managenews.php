<?php
	
	session_start();
///////////////////////////////
	if(isset($_SESSION['loginadmin']))
	{
		$conn = mysqli_connect("localhost","root","","sahardb");
		if(! $conn)
		{
			die("Connection Failed".mysqli_error());
		}
	
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>صفحه مدیریت خبرها</title>
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
		<form action="" method="post" enctype="multipart/form-data">
		<tr>
			<td>
				<b>Name News:</b> 
			</td>
			<td>
				<input name="newstitle" type="text">
			</td>
		</tr>
		<tr>
			<td>
				<b>please enter category news:</b>
			</td>
			<td>
				<select name="newscat">
				<option>Category News</option>
				<?php
					$sql="SELECT * FROM tblnewscat";
					$result=mysqli_query($conn,$sql);
					while ($row=mysqli_fetch_assoc($result))
					{
						$newscatID=$row['newscatID'];
						$newscatname=$row['newscatname'];
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
				<textarea name="newssummary" cols="50" rows="5"></textarea>
			</td>
		</tr>
		<tr>
			<td>
				<b>News Desc:</b> 
			</td>
			<td>
				<textarea name="newsdesc" cols="50" rows="10"></textarea>
			</td>
		</tr>
		<tr>
			<td>
				<b>Author:</b> 
			</td>
			<td>
				<input type="text" name="author" id="author">
			</td>
		</tr>
		<tr>
			<td>
				<b>Image News:</b> 
			</td>
			<td>
				<input name="newsimage" type="file">
			</td>
		</tr>
		<tr>
			<td>
				<td>
					<input type="submit" name="submit" value="News Registration">
				</td>
			</td>
		</tr>
		<tr>
			<td>
				<td>
					<input type="reset" value="Cancell">
				</td>
			</td>
		</tr>
		<tr>
			<td>
				<td>
					<a href="profile.php">Back To Profile</a>
				</td>
			</td>
		</tr>
		</form>
	</table>
	<?php
		if(isset($_POST['submit']))
		{
			$nt=$_POST['newstitle'];
			$nc=$_POST['newscat'];
			$ns=$_POST['newssummary'];
			$nd=$_POST['newsdesc'];
			$a=$_POST['author'];
			
			$ni=$_FILES['newsimage']['name'];
			$nitmp=$_FILES['newsimage']['tmp_name'];
			$pathni='newsimg/'.$ni;
			
			if($nt != "" && $nc != "" && $ns != "" && $nd != "" && $ni != "")
			{
				move_uploaded_file($nitmp,$pathni);
				$sql="INSERT INTO `tblnews`(`newstitle`,`newscat`,`newssummary`,`newsdesc`,`author`,`newsimage`) VALUES('$nt','$nc','$ns','$nd','$a','$ni')";
				
				if(! mysqli_query($conn,$sql))
					die("Failed to record news<br>".mysqli_error($conn));
			}	
			else
			{
				header("location:managenews.php");
			}
		}
		$sql="SELECT * FROM tblnews";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0)
		{
			echo("<br><br>
				  <table border='1 solid chocolate' 
				  		 style='border: 1px solid chocolate;
						 direction:rtl; 
						 text_alin:right; 
						 background-color: cornsilk'><tr>
														<td>Number News</td>
														<td>Name News</td>
														<td>Category News</td>
														<td>Summary News</td>
														<td>Desc News</td>
														<td>Author Name</td>
														<td>View</td>
														<td>Image News</td>
														<td>Operation</td></tr>");
				
			while ($row=mysqli_fetch_assoc($result))
			{
				$nc=$row['newscat'];
				$sql="SELECT * FROM tblnewscat WHERE `newscatID`='$nc'";
				$res=mysqli_query($conn,$sql);
				$r=mysqli_fetch_assoc($res);
				$ni=$row['newsimage'];
				echo("<tr>
						  <td>".$row['newsID']."</td>
						  <td>".$row['newstitle']."</td>
						  <td>".$r['newscatname']."</td>
						  <td>".$row['newssummary']."</td>
						  <td>".$row['newsdesc']."</td>
						  <td>".$row['author']."</td>
						  <td>".$row['viewed']."</td>
						  <td>
						  	  <img height='25' width='30' src='newsimg/$ni'/>
							  <br>".$row['newsimage']."</td>
						  <td>
						  	  <a href=deletenews.php?ID=".$row['newsID'].">Delete</a>
					    	| <a href=editnews.php?ID=".$row['newsID'].">Edit</a>
							  </td></tr>");
			}
			echo("</table><br><br>");
		}
		else
		{
			echo("No news has been recorded");
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
	
	
	
	






	
	